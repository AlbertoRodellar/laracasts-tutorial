<?php

use Illuminate\Support\Facades\Route;


// En vez de route get return view se puede hacer con una sola linea usando Route::view
// Route::view('/url', 'view-name');
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');