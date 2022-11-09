<?php

namespace App\Http\Controllers;

use App\Models\Vychitka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VychitkaController extends Controller
{
    public function showAll(){
        $vychitka = Vychitka::where('KODPREPOD', Auth::user()->id);
        return view('vychitka');
    }
    public function showAllVychitkaJson(Request $request){
        if(empty($request->month) || $request->month == 0) {
            $vychitka = Vychitka::where('KODPREPOD', Auth::user()->id)->get();
        } else {
            $vychitka = Vychitka::where('MESYAC', $request->month)->where('KODPREPOD', Auth::user()->id)->get();
        }
        return response($vychitka);
    }
    public function showVychitkaJson($kod){
        $vychitka = Vychitka::where('KOD', $kod)->get();
        return response($vychitka);
    }
    public function filterVychitka($mesyac){
        $vychitka = Vychitka::where('MESYAC', $mesyac)->get();
        return response($vychitka);
    }
    public function updateVychitka(Request $request){
        Vychitka::where('KOD', $request->KOD)->update([
            'KOD' => $request->KOD,
            'GOD' => $request->GOD,
            'MESYAC' => $request->MESYAC,
            'PREDMET' => $request->PREDMET,
            'TIP' => $request->TIP,
            'GRUPPA' => $request->GRUPPA,
            'VSEGO' => $request->VSEGO,
        ]);
        return redirect('/vychitka');
    }
    public function showVychitkaLatestJson(){
        $vychitka = Vychitka::orderBy('KOD', 'desc')->first();
        return response($vychitka);
    }
    public function addVychitka(Request $request){
        Vychitka::create([
            'KOD' => $request->KOD,
            'KODPREPOD' => Auth::id(),
            'MESYAC' => $request->MESYAC,
            'GOD' => $request->GOD,
            'PREDMET' => $request->PREDMET,
            'TIP' => $request->TIP,
            'GRUPPA' => $request->GRUPPA,
            'VSEGO' => $request->VSEGO,
        ]);
        return redirect('/vychitka');
    }
    public function deleteVychitka(Request $request){
        Vychitka::where('KOD', $request->KOD)->delete();
    }
}
