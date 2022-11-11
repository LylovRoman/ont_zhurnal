<?php

namespace App\Http\Controllers;

use App\Models\Discip;
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
    public function showAllNagruzkaJson(){
        $nagruzki = Nagruzka::where('prepod', Auth::user()->id)->get();

        return response($nagruzki);
    }
    public function showNagruzkaJson($id){
        $nagruzka = Nagruzka::where('id', $id)->get();
        return response($nagruzka);
    }
    public function updateNagruzka(Request $request){
        Nagruzka::where('id', $request->id)->update([
            'id' => $request->id,
            'predmet' => $request->predmet,
            'sem1' => $request->sem1,
            'sem2' => $request->sem2,
            'haracter' => $request->haracter,
            'tip' => $request->tip,
            'itogo' => $request->sem1 + $request->sem2,
            'gruppa' => $request->gruppa
        ]);
        return redirect('/nagruzka');
    }
    public function showNagruzkaLatestJson(){
        $nagruzka = Nagruzka::orderBy('id', 'desc')->first();
        return response($nagruzka);
    }
    public function addNagruzka(Request $request){
        Nagruzka::create([
            'id' => $request->id,
            'prepod' => Auth::id(),
            'predmet' => $request->predmet,
            'sem1' => $request->sem1,
            'sem2' => $request->sem2,
            'haracter' => $request->haracter,
            'tip' => $request->tip,
            'itogo' => $request->sem1 + $request->sem2,
            'gruppa' => $request->gruppa
        ]);
        return redirect('/nagruzka');
    }
    public function deleteNagruzka(Request $request){
        Nagruzka::where('id', $request->id)->delete();
    }
}
