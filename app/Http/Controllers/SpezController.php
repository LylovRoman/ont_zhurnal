<?php

namespace App\Http\Controllers;

use App\Models\Discip;
use App\Models\Spez;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpezController extends Controller
{
    public function showAll(){
        $spezs = Spez::all();
        return view('discip', compact('spezs'));
    }
    public function showSpezsJson(){
        $spezs = Spez::all();
        return response($spezs);
    }
    public function showSpezJson($kod){
        $spez = Spez::where('kod', $kod)->get();
        return response($spez);
    }
    public function showDiscipJson($kod){
        $discips = Discip::where('spez', $kod)->get();
        return response($discips);
    }

    public function addSpez(Request $request){
        Spez::create($request);
    }
    public function addDiscip(Request $request){
        Discip::create($request);
    }
    public function updateSpez(Request $request, $id){
        Spez::where('kod', $id)->update($request);
    }
    public function updateDiscip(Request $request, $id){
        Discip::where('kod', $id)->update($request);
    }
    public function deleteSpez($id){
        Spez::where('kod', $id)->delete();
    }
    public function deleteDiscip($id){
        Discip::where('kod', $id)->delete();
    }
}
