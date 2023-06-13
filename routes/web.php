<?php
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){
    Route::resource('projects',ProyectoController::class);
});

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProyectoController::class);
    
    Route::get('/pdf2', [ProyectoController::class, 'getPDF'])->name('PDF_Example');


});

require __DIR__.'/auth.php';
