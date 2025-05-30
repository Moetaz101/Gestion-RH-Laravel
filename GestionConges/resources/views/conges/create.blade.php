@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('conges.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nom Employé</label>
        <input type="text" name="nom_employe" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Type Congé</label>
        <input type="text" name="type_conge" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date Début</label>
        <input type="date" name="date_debut" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date Fin</label>
        <input type="date" name="date_fin" class="form-control" required>
    </div>
        <div class="mb-3">
    <label for="statut" class="form-label">Statut</label>
    <select name="statut" class="form-select" required>
        <option value="en_attente" selected>En attente</option>
        <option value="approuve">Approuvé</option>
        <option value="rejete">Rejeté</option>
        <option value="refuse">Refusé</option>
    </select>
</div>
    <div class="mb-3">
        <label>Motif</label>
        <textarea name="motif" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">Enregistrer</button>
</form>
@endsection
