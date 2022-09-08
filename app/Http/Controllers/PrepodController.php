<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrepodController extends Controller
{
    public function showAll(){
        $prepods = User::all();
        dd($prepods);
    }
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->route('home');
        } else {
            $user = User::where('login', $request->login)->first();
            if ($user && $user->password == $request->password){
                Auth::login($user);
            }
        }
        return \Illuminate\Support\Facades\Redirect::to('/');
    }
    public function register(Request $request){
        if(Auth::check()){
            return redirect()->route('home');
        } else {
            $user = User::where('login', $request->login)->first();
            if (!$user){
                $fio = explode(' ', $request->FIO);
                User::create([
                    'login' => $request->login,
                    'password' => $request->password,
                    'FIO' => $request->FIO,
                    'Fam' => $fio[0],
                    'name' => $fio[1],
                    'patronymic' => $fio[2],
                    'token' => ''
                ]);
            }
        }
        return \Illuminate\Support\Facades\Redirect::to('/');
    }
}
