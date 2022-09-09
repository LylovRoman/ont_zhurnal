<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UrokiController extends Controller
{
    public function showAll(){
        $uroki = DB::table('uroki_prepod')->get()->where('KODPREPOD', '=', Auth::user()->id);
        return view('uroki', compact('uroki'));
    }
    public function getJSON(){
        return response()->json(DB::table('uroki_prepod')->get()->where('KODPREPOD', '=', Auth::user()->id), 200);
    }
}
