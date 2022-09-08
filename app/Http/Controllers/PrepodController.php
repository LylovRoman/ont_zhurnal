<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrepodController extends Controller
{
    public function showAll(){
        $prepods = User::all();
        dd($prepods);
    }
}
