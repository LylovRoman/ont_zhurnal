<?php

namespace App\Http\Controllers;

use App\Models\Vychitka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VychitkaController extends Controller
{
    public function showAll(){
        $vychitka = DB::table('uroki_prepod')->get()->where('KODPREPOD', '=', Auth::user()->id);
        return view('vychitka', compact('vychitka'));
    }
    public function showVychitkaJson(){
        $nagruzki = Vychitka::all();
        return response($nagruzki);
    }
}
