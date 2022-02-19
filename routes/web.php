<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/Restrito/dashboard', function () {
    return view('/Restrito/dashboard');
})->name('dashboard');

Route::resource('/Restrito/product', 'ProductController')->middleware('auth');
Route::resource('/Restrito/tag', 'TagController')->middleware('auth');