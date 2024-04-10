<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\HomeController;

use App\Livewire\CreateNoticia;
use App\Models\Noticia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('noticias', NoticiaController::class)->except(['index']);
    Route::get('/dashboard', [NoticiaController::class, 'index'])->name('dashboard');
    Route::get('create-noticia', CreateNoticia::class)->name('create-noticia');
    Route::post('salvar-noticia', [NoticiaController::class, 'store'])->name('salvar-noticia');
    Route::get('/noticias/{noticia}/editar', function (Noticia $noticia) {
        return view('editar-noticia', compact('noticia'));
    });
    
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
