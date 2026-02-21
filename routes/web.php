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

Route::get('/ideas-database', function () {
    // $ideas = Idea::all();
    // $ideas = Idea::where('state', 'completed')->get();

    // Esta query es para filtrar las ideas por estado en la url ?state=completed por ejemplo, se movera a un controlador luego
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();
    return view('ideas2', [
        'ideas' => $ideas
    ]);
});

Route::post('/ideas-database', function () {
    $idea = request('idea');

    Idea::create([
        'description' => request('idea'),
        'state' => 'completed'
    ]);

    return redirect('/ideas-database');
});