<?php

use App\Http\Controllers\IdeaController;
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

//!CRUD DATABASE
// Rutas especificas antes de las dinamicas, si no /create daria 404 porque entraria en la ruta dinamica de show /ideas-db/{idea}
// y no encontraria el modelo con ese id
Route::get('/ideas-db', [IdeaController::class, 'index']);
Route::get('/ideas-db/create', [IdeaController::class, 'create']);
Route::post('/ideas-db', [IdeaController::class, 'store']);
Route::get('/ideas-db/{idea}', [IdeaController::class, 'show']);
Route::get('/ideas-db/{idea}/edit', [IdeaController::class, 'edit']);
Route::patch('/ideas-db/{idea}', [IdeaController::class, 'update']);
Route::delete('/ideas-db/{idea}', [IdeaController::class, 'destroy']);

// Route::resource es una forma de generar todas las rutas de un CRUD de una sola vez:
// se le pasa el nombre de la ruta y el controlador, y laravel se encarga de generar las rutas correspondientes a cada metodo del controlador
// Route::resource('ideas-db', IdeaController::class);