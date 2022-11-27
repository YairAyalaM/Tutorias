<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; 
    protected $fillable = [
        'matricula','nombre','apellido','carrera','semestre','materia1','materia2','materia3','materia4','materia5','materia6','materia7', 'id_user'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id_user');//un estudiante pertenece a un tutor $this hace referencia a la clase
    }

    public function lessons(){
        return $this->belongsTo(lesson::class, 'id_lesson');//un estudiante pertenece a una tutoria $this hace referencia a la clase
    }
}
