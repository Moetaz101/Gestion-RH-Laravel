<?php

// app/Http/Controllers/ResponsableRHController.php

namespace App\Http\Controllers;

use App\Models\ResponsableRH;
use Illuminate\Http\Request;

class ResponsableRHController extends Controller
{
    public function index(Request $request)
    {
        $query = ResponsableRH::query();

        if ($request->filled('search')) {
            $query->where('id', $request->search)
                  ->orWhere('nom', 'like', '%'.$request->search.'%')
                  ->orWhere('prenom', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('sort')) {
            $query->orderBy($request->sort, $request->get('direction', 'asc'));
        }

        $responsables = $query->paginate(5);
        return view('responsablerh.index', compact('responsables'));
    }

    public function create()
    {
        return view('responsablerh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'login' => 'required|unique:responsable_r_h_s',
            'mot_de_passe' => 'required',
        ]);

        ResponsableRH::create($request->all());
        return redirect()->route('responsablerh.index')->with('success', 'Responsable ajouté !');
    }

    public function show(ResponsableRH $responsablerh)
    {
        return view('responsablerh.show', compact('responsablerh'));
    }

    public function edit(ResponsableRH $responsablerh)
    {
        return view('responsablerh.edit', compact('responsablerh'));
    }

    public function update(Request $request, ResponsableRH $responsablerh)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'login' => 'required|unique:responsable_r_h_s,login,'.$responsablerh->id,
            'mot_de_passe' => 'required',
        ]);

        $responsablerh->update($request->all());
        return redirect()->route('responsablerh.index')->with('success', 'Responsable mis à jour !');
    }

    public function destroy(ResponsableRH $responsablerh)
    {
        $responsablerh->delete();
        return redirect()->route('responsablerh.index')->with('success', 'Responsable supprimé !');
    }
}
