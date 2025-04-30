<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        // 1) Validación
        $data = $request->validate([
            'user'     => 'required|string',
            'password' => 'required|string',
            'rol'      => 'required|integer|exists:rol,id_rol'
        ]);

        // 2) Busca usuario con su rol
        $user = User::where('user', $data['user'])
            ->where('id_rol', $data['rol'])
            ->first();

        // 3) Verifica contraseña
        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);

            // 4) Redirige según rol
            return redirect()
                ->route($user->id_rol == 1 ? 'admin.dashboard' : 'user.dashboard')
                ->with('success', 'Bienvenido, ' . $user->user);
        }

        // 5) Error de credenciales
        return back()->withErrors([
            'login_error' => 'Usuario, contraseña o rol incorrecto.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión

        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login'); // Redirige a donde desees
    }
}