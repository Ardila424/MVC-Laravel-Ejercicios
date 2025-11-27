<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    public function index()
    {
        $todos = Tarea::orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        
        Tarea::create([
            'title' => $request->title,
            'completed' => false
        ]);

        return redirect()->route('tareas.index');
    }

    public function toggle($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->completed = !$tarea->completed;
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    public function destroy($id)
    {
        Tarea::findOrFail($id)->delete();
        return redirect()->route('tareas.index');
    }
}
