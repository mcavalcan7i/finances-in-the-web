<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CredenciaisContato extends Model
{
    use HasFactory;
    protected $table = "credenciais_contato";
    protected $fillable = ['nome_credencial_contato', 'email_credencial_contato'];
}
