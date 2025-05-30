@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Détails du congé</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Employé : {{ $conge->nom_employe }}</h5>
            <p class="card-text"><strong>Type de congé :</strong> {{ ucfirst($conge->type_conge) }}</p>
            <p class="card-text"><strong>Date de début :</strong> {{ $conge->date_debut }}</p>
            <p class="card-text"><strong>Date de fin :</strong> {{ $conge->date_fin }}</p>
            
            <p class="card-text"><strong>Statut :</strong>
    @if($conge->statut == 'en_attente')
        <span class="badge bg-warning text-dark">En attente</span>
    @elseif($conge->statut == 'approuve')
        <span class="badge bg-success">Approuvé</span>
    @elseif($conge->statut == 'rejete')
        <span class="badge bg-danger">Rejeté</span>
    @elseif($conge->statut == 'refuse')
        <span class="badge bg-danger">Refusé</span>
    @endif
</p>

            


        </div>
    </div>

    <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('conges.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
