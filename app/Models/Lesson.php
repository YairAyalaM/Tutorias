<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user','id_student','aprobada1','aprobada2','aprobada3','aprobada4','aprobada5','aprobada6','aprobada7',
        'cal1','cal2','cal3','cal4','cal5','cal6','cal7','promedio',
        'punto5','punto6','punto7','punto8','punto9','punto10',
    ];

    public function tutelado(){
        return $this->hasMany(Lesson::class,'id'); //un tutor tiene muchos alumnos
    }
}
