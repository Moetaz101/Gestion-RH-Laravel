<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    // Affiche la liste avec recherche + tri
    public function index(Request $request)
    {
        $query = Conge::query();

        // Recherche par ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Recherche par nom
        if ($request->filled('nom_employe')) {
            $query->where('nom_employe', 'like', '%' . $request->nom_employe . '%');
        }

        // Recherche par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        // Tri par colonne
        $sort = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');
        $query->orderBy($sort, $direction);

        $conges = $query->paginate(10)->appends($request->all());

        return view('conges.index', compact('conges'));
    }

    // Formulaire de création
    public function create()
    {
        return view('conges.create');
    }

    // Enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'nom_employe' => 'required|string|max:255',
            'type_conge' => 'required|string|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'statut' => 'required|in:en_attente,approuve,rejete,refuse',
        ]);

        Conge::create($request->all());

        return redirect()->route('conges.index')->with('success', 'Congé ajouté avec succès.');
    }

    // Affichage détaillé
    public function show(Conge $conge)
    {
        return view('conges.show', compact('conge'));
    }

    // Formulaire d'édition
    public function edit(Conge $conge)
    {
        return view('conges.edit', compact('conge'));
    }

    // Mise à jour
    public function update(Request $request, Conge $conge)
    {
        $request->validate([
            'nom_employe' => 'required|string|max:255',
            'type_conge' => 'required|string|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'statut' => 'required|in:en_attente,approuve,rejete,refuse',
        ]);

        $conge->update($request->all());

        return redirect()->route('conges.index')->with('success', 'Congé mis à jour avec succès.');
    }

    // Suppression
    public function destroy(Conge $conge)
    {
        $conge->delete();

        return redirect()->route('conges.index')->with('success', 'Congé supprimé avec succès.');
    }
}
