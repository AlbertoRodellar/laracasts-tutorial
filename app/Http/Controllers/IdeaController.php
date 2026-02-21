<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $ideas = Idea::where('state', 'completed')->get();

        // Esta query es para filtrar las ideas por estado en la url ?state=completed por ejemplo, se movera a un controlador luego
        // $ideas = Idea::query()
        //     ->when(request('state'), function ($query, $state) {
        //         $query->where('state', $state);
        //     })
        //     ->get();
        $ideas = Idea::all();
        return view('ideas.index', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        // Validar datos se puede hacer inline en el controlador o con un Form Request que es una clase dedicada a la validacion de datos
        // $request->validate([
        //     'description' => 'required|min:10'
        // ]);
        Idea::create([
            'description' => $request->description,
            'state' => 'completed'
        ]);

        return redirect('/ideas-db');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Route model binding, se usa para inyectar un modelo directamente en la ruta,
    // Laravel se encarga de buscar el modelo por su id y pasarlo a la funcion, si no lo encuentra lanza un error 404
    // Se han de machear si o si el /ideas-db/{idea} con el Idea $idea
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update([
            'description' => $request->description,
        ]);

        return redirect("/ideas-db/{$idea->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect('/ideas-db');
    }
}
