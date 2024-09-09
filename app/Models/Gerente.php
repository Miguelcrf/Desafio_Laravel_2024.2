<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Gerente extends Authenticatable
{
    use HasFactory;
    protected $table = 'gerentes';
    protected $fillable = [
        'name',
        'email',
        'password',
        'endereço',
        'telefone',
        'nascimento',
        'cpf',
        'conta_id',
        'photo'
    ];
}
