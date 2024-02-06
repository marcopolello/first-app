<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ristorante;

class RistoranteController extends Controller
{
    public function index()
    {
        return Ristorante::all();
    }
 
    public function show($id)
    {
        return Ristorante::find($id);
    }

    public function store(Request $request)
    {
        return Ristorante::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Ristorante::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Ristorante::findOrFail($id);
        $article->delete();

        return 204;
    }
}
