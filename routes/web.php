<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontEndController::class, 'index'])->name('home');

// Projects
Route::get('/projects', [FrontEndController::class, 'projects'])->name('projects');

// Experience
Route::get('/experience', [FrontEndController::class, 'experience'])->name('experience');

// Contact
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontEndController::class, 'send'])->name('contact.send');
