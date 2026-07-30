<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = [
            [
                'id' => 1,
                'nis' => '2024001',
                'name' => 'Budi Ariyanto',
                'class' => 'XII AKL 1',
                'major' => 'RPL'
            ],
              [
                'id' => 2,
                'nis' => '2024001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'RPL'
            ],
              [
                'id' => 3,
                'nis' => '2024001',
                'name' => 'Budi ',
                'class' => 'XII TKJ 2',
                'major' => 'RPL'
            ]
        ];
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        return view('student.show', [
            'title' => $title
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Buat data siswa baru';
        return view('student.create', [
            'title' => $title
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Ubah Data Siswa';
        return view('student.edit', [
            'title' => $title
        ]);
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data siswa";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa";
    }
}