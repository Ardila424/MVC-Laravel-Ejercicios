<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContrasenasController extends Controller
{
    public function index()
    {
        return view('contrasenas.index', ['password' => null]);
    }

    public function generar()
    {
        $length = 12; // Fijo en 12 caracteres
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
        $password = '';
        
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        
        return view('contrasenas.index', compact('password'));
    }
}
