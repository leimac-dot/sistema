<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Definimos los campos que se pueden llenar (nombre y email)
    protected $fillable = ['nombre', 'email'];
}