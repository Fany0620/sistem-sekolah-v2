<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        ->get();


        return view('students.index', [
            'title' => $title,
            'students' => $students
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