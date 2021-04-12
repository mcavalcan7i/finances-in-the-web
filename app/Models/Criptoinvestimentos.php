<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criptoinvestimentos extends Model
{
    use HasFactory;
    protected $fillable = ['nome_criptoinvestimento', 'valor_real', 'valor_cripto', 'data_criptoinvestimento', 'cotacao_dia', 'user_id'];
}
