<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_prenda',
        'valor_previsto',
        'valor_gasto',
        'user_id'
    ];

    public $timestamps = false;
}
