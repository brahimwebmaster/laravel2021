<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class AuthController extends Controller
{
public function login(){

   return view('auth.login');
}

public function register(){

    return view('auth.register');
}

public function subscribe(Request $request){

    $validData = $request->validate(
        [
         'name'=>['required','max:100'],
         'email'=>['required','email','max:255','unique:users'],
         'password'=>['required','min:8','confirmed']
        ]    
        );

        $user = User::create([
            'name'=> $validData['name'],
            'email'=> $validData['email'],
            'password'=> Hash::make($validData['password'])
        ]);
        return redirect()->route('acceuil')->with('success','Votre compte : '. $user->email.' a été creé !');
    }

 public function postLogin(Request $request) {
     $validData = $request->validate([
         'email'=>['required','email'],
         'password'=>['required']
     ]);

     $credentials = ['email'=>$validData['email'],'password'=> $validData['password']];

       if(Auth::attempt($credentials)) {
         $request->session()->regenerate();
         return redirect()->route('acceuil')->with('success','Vous êtes connecté !!');   
         } 
    return back()->withErrors(['email' => 'Email ou mot de passe invalide !']);
 }

 public function logout (Request $request) {
     Auth::logout();
     $request->session()->invalidate();
     return back();
 }
}
