<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    // Muestra el formulario de registro de usuario
    public function create()
    {
        return view('users.create');
    }

    // Registra un usuario en la base de datos
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('users.index');
    }

    // Muestra el formulario de actualización de usuario
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('users.index');
    }

    public function show($id){
        $user = User::find($id);
        return view('users.profile', compact('user'));
    }
}
