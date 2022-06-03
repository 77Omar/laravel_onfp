<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index() { //formulaire de connexion
       $data = [
           'title' => 'Login - '.config('app.name'),
           'description' => 'Connexion à votre compte - '.config('app.name'),
       ];
       return view('auth.login', $data);
    }

    public function login() { //Traitement du login
       // dd(request()->all());
         request()->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);
        // dd(request()->has('remember')); //si c coher true sion false (se souvenir)
        // attempt méthode reviendra true si l'authentification a réussi. Sinon, false sera retourné.
        $remember = request()->has('remember');
        if(Auth::attempt(['email' =>request('email'), 'password'=>request('password')], $remember)){
             return redirect('/');
        }
        return back()->withError('Mauvais identifiants.')->withInput();
    }
}
