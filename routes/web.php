<?php

use Illuminate\Support\Facades\Route;


// En vez de route get return view se puede hacer con una sola linea usando Route::view
// Route::view('/url', 'view-name');

Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Pasar datos a una vista con datos en la url ?person=Alberto
Route::get('/', function () {
    return view('welcome', [
        'greeting' => 'Hello',
        'person' => request('person', 'World')
    ]);
});