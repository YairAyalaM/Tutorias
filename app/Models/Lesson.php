<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user','id_student'
    ];

    public function tutelado(){
        return $this->hasMany(Lesson::class,'id'); //un tutor tiene muchos alumnos
    }
}
