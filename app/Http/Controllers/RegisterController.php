<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest'); //POur se connecter il faut avoir une invitation
    }
    public function index() {
        $data= [
            'title' =>'Inscription - '.config('app.name'),
            'description' => 'Inscription sur le site ' .config('app.name'),
        ];
        return view('auth.register', $data);
    }

    public function register(Request $request){
        request()->validate([
            'name'=>'required|min:3|max:20|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|between:5,20',
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        $success = 'Inscription Terminer.';
        return back()->withSuccess($success); //On va afficher ca o nivo register.blade en utilisant les session
     }
}
