<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'richard@ski.sch.id';
        $userStudentEmail = 'andi@ski.sch.id';

        //User Teacher
        User::UpdateOrCreate(
            [ 'email' => $userTeacherEmail],
            [
                'name' => 'Richard',
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        //User Student
        User::UpdateOrCreate(
            [
                'email' => $userStudentEmail,
            ],
            [
                'name' => 'Andi',
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );
    }
}
