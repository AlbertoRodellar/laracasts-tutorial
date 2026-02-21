<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;


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


// index
Route::get('/ideas-db', function () {
    // $ideas = Idea::all();
    // $ideas = Idea::where('state', 'completed')->get();

    // Esta query es para filtrar las ideas por estado en la url ?state=completed por ejemplo, se movera a un controlador luego
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();
    return view('ideas.index', [
        'ideas' => $ideas
    ]);
});

// show
// Route model binding, se usa para inyectar un modelo directamente en la ruta,
// Laravel se encarga de buscar el modelo por su id y pasarlo a la funcion, si no lo encuentra lanza un error 404
// Se han de machear si o si el /ideas-db/{idea} con el Idea $idea
Route::get('/ideas-db/{idea}', function (Idea $idea) {
    return view('ideas.show', [
        'idea' => $idea
    ]);
});


// store
Route::post('/ideas-db', function () {
    $idea = request('idea');

    Idea::create([
        'description' => request('description'),
        'state' => 'completed'
    ]);

    return redirect('/ideas-db');
});

// edit
Route::get('/ideas-db/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        'idea' => $idea
    ]);
});

// update
Route::patch('/ideas-db/{idea}', function (Idea $idea) {
    $idea->update([
        'description' => request('description'),
    ]);

    return redirect("/ideas-db/{$idea->id}");
});


// destroy
Route::delete('/ideas-db/{idea}', function (Idea $idea) {
    $idea->delete();
    return redirect('/ideas-db');
});