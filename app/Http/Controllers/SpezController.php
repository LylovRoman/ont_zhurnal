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
    public function showDiscipEditJson($kod){
        $discips = Discip::where('kod', $kod)->get();
        return response($discips);
    }
    public function showDiscipLatestJson(){
        $discip = Discip::orderBy('kod', 'desc')->first();
        return response($discip);
    }
    public function showSpezLatestJson(){
        $spez = Spez::first();
        return response($spez);
    }
    public function addSpez(Request $request){
        Spez::create([
            'kod' => $request->kod,
            'name' => $request->name
        ]);
        return redirect('/discip');
    }
    public function addDiscip(Request $request){
        Discip::create([
            'kod' => $request->kod,
            'name' => $request->name,
            'spez' => $request->spez,
            'sem1' => $request->sem1,
            'sem2' => $request->sem2,
            'sem3' => $request->sem3,
            'sem4' => $request->sem4,
            'sem5' => $request->sem5,
            'sem6' => $request->sem6,
            'sem7' => $request->sem7,
            'sem8' => $request->sem8,
            'sokr' => $request->sokr
        ]);
        return redirect('/discip');
    }
    public function updateSpez(Request $request){
        Spez::where('kod', $request->kod)->update([
            'kod' => $request->kod,
            'name' => $request->name
        ]);
        return redirect('/discip');
    }
    public function updateDiscip(Request $request){
        Discip::where('kod', $request->kod)->update([
            'kod' => $request->kod,
            'name' => $request->name,
            'spez' => $request->spez,
            'sem1' => $request->sem1,
            'sem2' => $request->sem2,
            'sem3' => $request->sem3,
            'sem4' => $request->sem4,
            'sem5' => $request->sem5,
            'sem6' => $request->sem6,
            'sem7' => $request->sem7,
            'sem8' => $request->sem8,
            'sokr' => $request->sokr
        ]);
        return redirect('/discip');
    }
    public function deleteSpez(Request $request){
        Spez::where('kod', $request->kod)->delete();
    }
    public function deleteDiscip(Request $request){
        Discip::where('kod', $request->kod)->delete();
    }
}
