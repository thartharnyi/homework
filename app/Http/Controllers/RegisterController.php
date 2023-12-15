<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $cleanData=request()->validate([
            'name'=>['required','max:20'],
            'email'=>['required','email'],
            'username'=>['required','max:20'],
            'password'=>['required','min:8','max:20'],
        ]);
        $cleanData['password']=bcrypt($cleanData['password']);
        //you will encounter mass_assignment_error in this session
        //User::create($cleanData);
        $user=new User();
        $user->name=$cleanData['name'];
        $user->email=$cleanData['email'];
        $user->username=$cleanData['username'];
        $user->password=$cleanData['password'];
        $user->save();

        //login
        auth()->login($user);

        return redirect('/')->with('message',' Welcome'.$user->name);
    }
}
