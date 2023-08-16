<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produit;
use Illuminate\Http\Request;

class produitController extends Controller
{

    public function index()
    {
        $pro = produit::all();
        $categories = categorie::all();
        return view('boutique.gerer-produit', compact('pro', 'categories'));
    }
public function afficher ()
{
    $pro = produit::all();
    return view('boutique.afficher', compact('pro'));
}


    public function create()
    {
        return view('boutique.gerer-produit');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'quantité' => 'required',
            'categorie_id' => 'required', 
            'image' => 'required',
        ]);

        $product = produit::create([
            'nom' => $data['nom'],
            'prix' => $data['prix'],
            'description' => $data['description'],
            'quantité' => $data['quantité'],
            'image' => $data['image'],
            'categorie_id' => $data['categorie_id'],
        ]);

        $category = categorie::find($data['categorie_id']);
        $product->cate()->associate($category);
        $product->save();

        return redirect()->back()->with('success', 'Données ajoutées avec succès.');
    }



    public function effacer($id)
    {
        $pro = produit::findOrFail($id);
        $pro->delete();
        return redirect()->back()->with('success', 'Données ajoutées avec succès.');
    }
    public function edit($id)
    {
        $pro = produit::findOrFail($id);
        return redirect()->back()->with('success', 'Données ajoutées avec succès.');
    }

    public function update(Request $request, $id)
    {
        $pro = produit::findOrFail($id);
        $pro->update([
            'nom' => $request->input('nom'),
            'prix' => $request->input('prix'),
             'description' => $request->input('description'),
             'quantité' => $request->input('quantité'),
             'categorie' => $request->input('categorie'),
             'image' => $request->input('image'),
        ]);

        return redirect()->back()->with('success', 'Données ajoutées avec succès.');
    }


}
