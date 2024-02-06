<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ristorante;

class PostmanController extends Controller
{
    public function index()
    {
        $ristoranti = Ristorante::all();

        $url = route('percorso');
        
        return response()->json($ristoranti);
    }
}
