<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    public function index ()
{

    return view('boutique.ajouter-categorie');
}

public function create()
{

    return view('boutique.ajouter-categorie');
}






public function store(Request $request)
{
    $data = $request->validate([
        'nom' => 'required',
        'description' => 'nullable',


    ]);


    categorie::create($data);

    return redirect()->back()->with('success', 'Données ajoutées avec succès.');
}


}
