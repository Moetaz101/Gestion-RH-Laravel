<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Affiche la liste des évaluations avec options de recherche et tri.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Evaluation::query();

        // Recherche par commentaire
        if ($request->has('commentaire') && !empty($request->commentaire)) {
            $query->where('commentaire', 'like', '%' . $request->commentaire . '%');
        }

        // Recherche par note
        if ($request->has('note') && !empty($request->note)) {
            $query->where('note', $request->note);
        }

        // Recherche par date
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('date', $request->date);
        }

        // Tri
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';
        
        // Sécurisation du tri
        if (!in_array($sort, ['id', 'note', 'date'])) {
            $sort = 'id';
        }
        
        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'asc';
        }
        
        $evaluations = $query->orderBy($sort, $order)->paginate(10);
        
        return view('evaluations.index', compact('evaluations', 'sort', 'order'));
    }

    /**
     * Affiche le formulaire de création d'une évaluation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evaluations.create');
    }

    /**
     * Enregistre une nouvelle évaluation dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_employe' => 'required|integer',
            'id_responsable' => 'nullable|integer',
            'note' => 'required|numeric|min:0|max:20',
            'commentaire' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Evaluation::create($validatedData);

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation créée avec succès.');
    }

    /**
     * Affiche les détails d'une évaluation spécifique.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Affiche le formulaire d'édition d'une évaluation.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    /**
     * Met à jour une évaluation spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $validatedData = $request->validate([
            'id_employe' => 'required|integer',
            'id_responsable' => 'nullable|integer',
            'note' => 'required|numeric|min:0|max:20',
            'commentaire' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $evaluation->update($validatedData);

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation mise à jour avec succès.');
    }

    /**
     * Supprime une évaluation spécifique de la base de données.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Évaluation supprimée avec succès.');
    }
}