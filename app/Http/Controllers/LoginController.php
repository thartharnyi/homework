<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function create(){
        return view('login.create');
    }

    public function store(){
        $cleanData=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:8']
        ],[
            'email.exists'=>'Your email does not exist',
            'password.required'=>'Password lo nay par tal'
        ]);

        // $user=User::where('email',$cleanData['email'])->first();
        
            if(auth()->attempt($cleanData)){
                
                return redirect('/')->with('message','Welcome '.auth()->user()->name);
            }
            else{
                return back()->withErrors([
                    'password'=>'your password is something wrong'
                ]);
            }
            
        }
        
    }

