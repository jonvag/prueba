<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //relacion uno a muchos
    protected $fillable = ['name', 'slug'];
/* no me funciona esto, que es para poner en la url el slug en vez de el id */
    /* public function getRouteKeyName(){
        return "slug";
    } */

    public function posts(){

        return $this->hasMany(Post::class);
}
}
