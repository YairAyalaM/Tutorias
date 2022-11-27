<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user','id_student','aprobada1','aprobada2','aprobada3','aprobada4','aprobada5','aprobada6','aprobada7',
    ];

    public function tutelado(){
        return $this->hasMany(Lesson::class,'id'); //un tutor tiene muchos alumnos
    }
}
