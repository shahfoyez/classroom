<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(){
        $attributes=request()->validate([
            'fname'=> 'required | min:1 | max:255',
            'lname'=> 'required | min:1 | max:255',
            'username'=> ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email'=> 'required | email | max:255 | unique:users,email',
            'image'=> 'required | mimes:jpg,png,jpeg | max:5048',
            'password'=> ['confirmed','required', 'min:4', 'max: 255'],
            'role' => 'required'
        ]);
        $extension = request()->image->extension();
        $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
        $imageName = $imageName.'.'.$extension;
        $move= request()->image->move(public_path('uploads/profiles'), $imageName);
        // dd(request()->input('fname'));
        $user= User::create([
            'fname'=> request()->input('fname'),
            'lname'=> request()->input('lname'),
            'username'=> request()->input('username'),
            'email'=> request()->input('email'),
            'image'=> $imageName,
            'password'=> request()->input('password'),
            'role' => request()->input('role'),
        ]);
        // $user= User::create($attributes);
        session()->regenerate(); //session fixation
        auth()->login($user);
        // session()->flash('success', 'Your account has been created');

        return redirect('/dashboard')->with('success', 'Your account has been created');
    }

}
