<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    
    protected $table = 'pendencias';
    protected $fillable = [
        'usuario_id',
        'valor',     
    ];
}
