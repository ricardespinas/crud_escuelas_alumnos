<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login.index');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirigir al usuario a la página de inicio
            return redirect()->route('alumnos.index');
        }

        // Si las credenciales no son correctas, redirigir con error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
