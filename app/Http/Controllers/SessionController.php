<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
         return view('login');
    }
    public function store(){
        $attributes=request()->validate([
            'email'=> 'required | email',
            'password'=> 'required'
        ]);

        // attempt to authenticate
        // attempt() does both checking email and password match and signing session
        if(!auth()->attempt($attributes)){
            // if auth failed
            throw ValidationException::withMessages([
                'error'=>'Credential not matched.'
            ]); //automaticly returns current input
        }
        session()->regenerate(); //session fixation

        return redirect('/dashboard')->with('success', 'You are loged In'); //with value assign in session
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'You are loged out!');
    }

}
