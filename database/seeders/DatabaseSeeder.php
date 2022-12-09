<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 
// deberia descargar imagenes y llenar la tabla con la ruta, pero no
        Storage::deleteDirectory('posts'); //no me funciona
        Storage::makeDirectory('posts');//no me funciona

        $this->call(UserSeeder::class);//no me funciona
        Category::factory(4)->create();//no me funciona
        Tag::factory(8)->create();//no me funciona
        $this->call(PostSeeder::class);//no me funciona
    }
}
