<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('date', 'asc')->orderBy('time', 'asc')->limit(10)->get();
        return view('calendario.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string'
        ]);
        
        Evento::create($request->all());
        
        return redirect()->route('calendario.index');
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        return redirect()->route('calendario.index');
    }
}
