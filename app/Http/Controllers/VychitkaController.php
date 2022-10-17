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
        return view('vychitka', compact('vychitka'));
    }
    public function showAllVychitkaJson(){
        $vychitka = Vychitka::all();
        return response($vychitka);
    }
    public function showVychitkaJson($kod){
        $vychitka = Vychitka::where('KOD', $kod)->get();
        return response($vychitka);
    }
    public function updateVychitka(Request $request){
        Vychitka::where('KOD', $request->KOD)->update([
            'KOD' => $request->KOD,
            'KODPREPOD' => $request->KODPREPOD,
            'MESYAC' => $request->MESYAC,
            'GOD' => $request->GOD,
            'PREDMET' => $request->PREDMET,
            'TIP' => $request->TIP,
            'GRUPPA' => $request->GRUPPA,
            'U1' => $request->U1,
            'U2' => $request->U2,
            'U3' => $request->U3,
            'U4' => $request->U4,
            'U5' => $request->U5,
            'U6' => $request->U6,
            'U7' => $request->U7,
            'U8' => $request->U8,
            'U9' => $request->U9,
            'U10' => $request->U10,
            'U11' => $request->U11,
            'U12' => $request->U12,
            'U13' => $request->U13,
            'U14' => $request->U14,
            'U15' => $request->U15,
            'U16' => $request->U16,
            'U17' => $request->U17,
            'U18' => $request->U18,
            'U19' => $request->U19,
            'U20' => $request->U20,
            'U21' => $request->U21,
            'U22' => $request->U22,
            'U23' => $request->U23,
            'U24' => $request->U24,
            'U25' => $request->U25,
            'U26' => $request->U26,
            'U27' => $request->U27,
            'U28' => $request->U28,
            'U29' => $request->U29,
            'U30' => $request->U30,
            'U31' => $request->U31,
            'HARAKT' => $request->HARAKT,
            'VSEGO' => $request->VSEGO,
            'PREDMETNAME' => $request->PREDMETNAME
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
            'KODPREPOD' => $request->KODPREPOD,
            'MESYAC' => $request->MESYAC,
            'GOD' => $request->GOD,
            'PREDMET' => $request->PREDMET,
            'TIP' => $request->TIP,
            'GRUPPA' => $request->GRUPPA,
            'U1' => $request->U1,
            'U2' => $request->U2,
            'U3' => $request->U3,
            'U4' => $request->U4,
            'U5' => $request->U5,
            'U6' => $request->U6,
            'U7' => $request->U7,
            'U8' => $request->U8,
            'U9' => $request->U9,
            'U10' => $request->U10,
            'U11' => $request->U11,
            'U12' => $request->U12,
            'U13' => $request->U13,
            'U14' => $request->U14,
            'U15' => $request->U15,
            'U16' => $request->U16,
            'U17' => $request->U17,
            'U18' => $request->U18,
            'U19' => $request->U19,
            'U20' => $request->U20,
            'U21' => $request->U21,
            'U22' => $request->U22,
            'U23' => $request->U23,
            'U24' => $request->U24,
            'U25' => $request->U25,
            'U26' => $request->U26,
            'U27' => $request->U27,
            'U28' => $request->U28,
            'U29' => $request->U29,
            'U30' => $request->U30,
            'U31' => $request->U31,
            'HARAKT' => $request->HARAKT,
            'VSEGO' => $request->VSEGO,
            'PREDMETNAME' => $request->PREDMETNAME
        ]);
        return redirect('/vychitka');
    }
    public function deleteVychitka(Request $request){
        Vychitka::where('KOD', $request->KOD)->delete();
    }
}
