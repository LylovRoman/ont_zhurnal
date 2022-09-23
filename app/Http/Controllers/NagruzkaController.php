<?php

namespace App\Http\Controllers;

use App\Models\Nagruzka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NagruzkaController extends Controller
{
    public function showAll(){
        $nagruzki = Nagruzka::all()->where('prepod', '=', Auth::user()->id);
        return view('nagruzka', compact('nagruzki'));
    }
    public function showNagruzkaJson(){
        $nagruzki = Nagruzka::all();
        return response($nagruzki);
    }
}
