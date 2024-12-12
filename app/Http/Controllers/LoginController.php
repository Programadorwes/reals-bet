<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $messages = [
            'email.required' => 'O campo E-mail é obrigatório.',
            'password.required' => 'O campo Senha é obrigatório.',
            'email.email' => 'O campo E-mail deve ser um endereço de e-mail válido.',
            'password.min' => 'A Senha deve ter no mínimo 8 caracteres.',
        ];
    
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && !$user->active) {
            return redirect()->back()->withErrors(['email' => 'Este usuário está inativo.']);
        }
    
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors(['login' => 'Usuário ou senha inválidos.']);
        }
    
        return to_route('users.index');
    }
    
    
}
