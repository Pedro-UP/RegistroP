<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentesPC extends Model
{
    use HasFactory;
    protected $fillable = ['tipocomponente', 'descripcion', 'cantidad', 'precio', 'imagen'];

}
