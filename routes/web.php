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


Route::get('/tasks', function () {
    return view('tasks', [
        'tasks' => [
            'Go to the store',
            'Go to the bank',
            'Walk the dog',
        ]
    ]);
});


Route::get('/ideas', function () {
    $ideas = session('ideas', []);
    return view('ideas', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas', function () {
    $idea = request('idea');

    // session()->push() es un metodo de laravel para agregar un nuevo valor a un array en la session
    session()->push('ideas', $idea);
    return redirect('/ideas');
});

// Ruta temporal!! luego cambiar a delete
Route::get('/delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/ideas');
});