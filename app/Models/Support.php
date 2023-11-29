<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    // campos que podem ser usados no array para gravar na tabela
    protected $fillable = [
        'subject',
        'body',
        'status'
    ];

}
