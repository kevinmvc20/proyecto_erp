<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request);

        //dd($request->get('username'));
        $this->validate($request, [
            'ci' => 'required',
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|max:60|email',
            'password' => 'required|confirmed|min:6',
            'telefono' => 'required'
        ]);

        User::create([
            'name'=> $request->name,
            'ci' => $request->ci,
            'username' => Str::lower($request->username),
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
        ]);


        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index');
    }
}
