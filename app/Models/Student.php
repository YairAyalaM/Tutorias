<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; 
    protected $fillable = [
        'nombre', 'id_user'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id_user');//un estudiante pertenece a un tutor $this hace referencia a la clase
    }
}
