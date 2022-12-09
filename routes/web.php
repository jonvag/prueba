<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


/* para que tome las rutas se ejecuta el comando php artisan optimize */
/* para que agarre cambios de taildwin se ejecuta npm run build  */
Route::get('/', [PostController::class, 'index'])->name('posts.index');
/* Route::get('admin', function () {
    return 'epaleee';
}); */
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');


/* rutas para la parte ADMIN */






/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
