<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[fillable('nis', 'name', 'gender', 'major', 'class')]
#[table('students')]

class Student extends Model
{
    
}
