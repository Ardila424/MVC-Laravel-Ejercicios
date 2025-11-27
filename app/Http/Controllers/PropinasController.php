<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropinasController extends Controller
{
    public function index()
    {
        return view('propinas.index', ['result' => null]);
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'percentage' => 'required|numeric|min:0|max:100'
        ]);

        $amount = floatval($request->amount);
        $percentage = floatval($request->percentage);
        
        $tip = $amount * ($percentage / 100);
        $total = $amount + $tip;
        
        $result = [
            'amount' => $amount,
            'percentage' => $percentage,
            'tip' => $tip,
            'total' => $total
        ];
        
        return view('propinas.index', compact('result'));
    }
}
