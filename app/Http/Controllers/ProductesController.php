<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

class ProductesController extends Controller
{
    public function index()
    {
        $productes = Producte::all();
        return view('index', compact('productes'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validació dels camps del formulari
        $validatedData = $request->validate([
            'nom' => 'required|string|max:50',
            'preu' => 'required|numeric',
            // Altres camps que puguis tenir
        ]);

        // Crear un nou producte
        $producte = new Producte();
        $producte->nom = $request->nom;
        $producte->preu = $request->preu;
        // Altres atributs del producte
        $producte->save();

        return redirect()->route('productes.index')->with('success', 'Producte creat correctament!');
    }

    public function show($id)
    {
        $producte = Producte::findOrFail($id);
        return view('show', compact('producte'));
    }

    public function incrementStock($id)
    {
        $producte = Producte::findOrFail($id);
        $producte->estoc += 1;
        $producte->save();

        return redirect()->back()->with('success', 'Estoc incrementat correctament.');
    }

    public function decrementStock($id)
    {
        $producte = Producte::findOrFail($id);
        if ($producte->estoc > 0) {
            $producte->estoc -= 1;
            $producte->save();
            return redirect()->back()->with('success', 'Estoc disminuït correctament.');
        } else {
            return redirect()->back()->with('error', 'No es pot disminuir l\'estoc per sota de zero.');
        }
    }
}
