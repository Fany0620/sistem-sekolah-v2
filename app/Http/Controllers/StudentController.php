<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn($query, $class) => $query->where('class', '=', $class))
            ->when($major, fn($query, $major) => $query->where('major', '=', $major))

            ->paginate(10)
            ->withQueryString();

        $SchoolClasses = ['10 AKL', '11 AKL', '11 TKJ 1', '11 TKJ 2', '10 BID', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'TKJ', 'BID'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'SchoolClasses' => $SchoolClasses,
            'majors' => $majors
        ]);
    }

    public function show(Student $student)
    {

        $title = 'Sistem Sekolah - Detail Siswa';
        $student = Student::find($id);

        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah | Menambah Siswa';
        return view('students.create',[
            'title' => $title
        ]);
    }

    public function edit(student $student)
    {
        $title = 'Sistem Sekolah | Mengubah Data Siswa';

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function store(StoreRequest $request)
    {
        //validasi
        $validatedRequest = $request->validated();

        //tambahkan data ke database
       Student::create($validatedRequest);

        //Handle If Success
        return redirect()->route('students.index');

    }

    public function update(UpdateRequest $request, Student $student)
    {
        //validasi
        $validatedRequest = $request->validate;

        //update data 
        $student->update($validatedRequest);

        //Handle If Success
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}