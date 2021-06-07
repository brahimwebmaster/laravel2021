<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Mail\Contact;
use Mail;

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
        Auth::login($user);
        // envoi mail to log file
        Mail::to($user->email)
        ->send(new Contact(['nom'=>$user->name,'email'=>$user->email,'message'=>'Votre compte a été crée']));

        return redirect()->route('acceuil')->with('success','Votre compte : '. $user->email.' a été creé !');
    }

 public function postLogin(Request $request) {

     $validData = $request->validate([
         'email'=>['required','email'],
         'password'=>['required']
     ]);
     $remember  = ( !empty( $request->remember ) )? true : false;

     $credentials = ['email'=>$validData['email'],'password'=> $validData['password']];

       if(Auth::attempt($credentials,$remember)) {
        $user = User::where(["email" => $credentials['email']])->first();
        // $request->session()->regenerate();
         Auth::login($user, $remember);
         return redirect()->intended()->with('success','Vous êtes connecté !!'); 
         } 
    return back()->withErrors(['email' => 'Email ou mot de passe invalide !']);
 }

 public function logout (Request $request) {
     Auth::logout();
     $request->session()->invalidate();
     return back();
 }
}
