<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // Captura o termo de busca enviado pelo GET
        $busca = $request -> input('busca');

        if ($busca) {
            // select * from users where name = 'ana'
            // select * from users where name = '%ana%'
            $usuarios = User::where('name', 'like', "%(busca)%", 'and') 
            -> orderBy('name', 'ASC') 
            -> get();

        } else {
            $usuarios = User::orderBy('name', 'ASC') -> get();
        }

        // Retorna a view do painel
        return view('admin.dashboard', compact('usuarios', 'busca'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($dadosValidados);

        return redirect('/admin')->with('sucesso', 'Usuário cadastrado com sucesso.');
    }
}
