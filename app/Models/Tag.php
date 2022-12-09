<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'color'];

    /* no me funciona esto, que es para poner en la url el slug en vez de el id */
    /* public function getRouteKeyName(){
        return "slug";
    }  */

    //relacion muchos a muchos
    public function posts(){

        return $this->belongsToMany(Post::class);
}
}
