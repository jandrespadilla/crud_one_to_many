<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuadros extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','category_id'];

    public function categorias (){
        return $this->belongsTo(Category::class, 'category_id', 'id');

    }
}
