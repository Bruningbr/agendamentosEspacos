<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'user_type' => 'required|in:aluno,professor,coordenador',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'user_type' => $validated['user_type'],
        ]);

        return response()->json([
            'msg' => 'Cadastro',
            'dados' => $user,
        ], 201);
    }

    // Listar todos os registros da tabela
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    // Listar usuario po ID
    public function show($id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->json([
                'msg' => 'Usuario não encontrado',
            ]);
        }

        return response()->json($user);

    }
}
