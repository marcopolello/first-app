<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ristorante;

class PostmanController extends Controller
{
    public function index()
    {
        $ristoranti = Ristorante::all();

        $citta = $ristoranti->pluck('citta')->unique()->toArray();
        
        return response()->json($citta[0]);
    }
}
