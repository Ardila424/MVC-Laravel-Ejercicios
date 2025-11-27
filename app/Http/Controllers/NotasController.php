<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index()
    {
        $notas = Nota::orderBy('created_at', 'desc')->get();
        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        return view('notas.form', ['nota' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string'
        ]);
        
        Nota::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category ?? 'General'
        ]);
        
        return redirect()->route('notas.index');
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.form', compact('nota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string'
        ]);
        
        $nota = Nota::findOrFail($id);
        $nota->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category ?? 'General'
        ]);
        
        return redirect()->route('notas.index');
    }

    public function destroy($id)
    {
        Nota::findOrFail($id)->delete();
        return redirect()->route('notas.index');
    }
}
