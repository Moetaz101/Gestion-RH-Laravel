<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index(Request $request)
    {
        $query = Formation::query();

        if ($request->has('search')) {
            $query->where('titre', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort')) {
            $query->orderBy($request->sort);
        }

        $formations = $query->get();

        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        return view('formations.create');
    }

    public function store(Request $request)
    {
        Formation::create($request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]));

        return redirect()->route('formations.index')->with('success', 'Formation créée.');
    }

    public function edit(Formation $formation)
    {
        return view('formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation)
    {
        $formation->update($request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]));

        return redirect()->route('formations.index')->with('success', 'Formation mise à jour.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'Formation supprimée.');
    }
}
