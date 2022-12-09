<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at']; /* guarded funciona con los campos que no queieres habilitar asignacion masiva, lo contrario de fillable */

    //relacion uno a muchos inversa

    public function user(){

        return $this->belongsTo(User::class);
    }
    public function category(){

        return $this->belongsTo(Category::class);
    }

    //relacion mucho a muchos
    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    //relacion uno a uno polimorfica
    public function image(){

        return $this->morphOne(Image::class, 'imageable');
    }
}
 