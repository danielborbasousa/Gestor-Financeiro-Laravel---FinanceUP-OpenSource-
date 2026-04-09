<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\cadastroRequest;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class cadastroController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(cadastroRequest $request)
    {
        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
        
    }

    public function login(Request $request) {

    $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Autenticação bem-sucedida, redireciona para a dashboard
        return redirect()->route('dashboard');
    }
        
    return redirect()->back()->withErrors(['message' => 'Credenciais inválidas.']);

    }

    public function logout() {
        Auth::logout();

        return redirect('/login');
    }
}
