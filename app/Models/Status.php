<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_lesson','status1','status2','status3','status4','status5','status6','status7'
    ];
}
