<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendencias extends Model
{
    protected $table = 'pendencias';
    protected $fillable = [
        'titulo',
        'valor',
        'conta_id'
    ];
}
