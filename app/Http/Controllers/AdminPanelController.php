<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ristorante;
use Inertia\Inertia;
use Illuminate\Support\Str;

class AdminPanelController extends Controller
{
    public function index()
    {
        $ristoranti = Ristorante::all();
    
        return Inertia::render('AdminPanel/Index', [
            'ristoranti' => $ristoranti
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            // Aggiungi eventuali altre regole di validazione per i campi del ristorante
        ]);

        Ristorante::create([
            'nome' => $request->input('nome'),
            // Aggiungi eventuali altri campi del ristorante da creare
        ]);

        return redirect()->route('admin.index');
    }
    public function delete($id)
{
    $ristorante = Ristorante::find($id);
    
    if ($ristorante) {
        $ristorante->delete();
        // Gestisci la conferma di eliminazione o altre azioni necessarie
        return redirect()->route('admin.index');
    } else {
        // Gestisci il caso in cui il ristorante non sia stato trovato
        return response()->json(['message' => 'Ristorante non trovato'], 404);
    }
}
}
