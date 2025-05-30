@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier un congé</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('conges.update', $conge->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_employe" class="form-label">Nom de l'employé</label>
            <input type="text" name="nom_employe" class="form-control" value="{{ old('nom_employe', $conge->nom_employe) }}" required>
        </div>

        <div class="mb-3">
            <label for="type_conge" class="form-label">Type de congé</label>
            <select name="type_conge" class="form-select" required>
                <option value="annuel" {{ $conge->type_conge === 'annuel' ? 'selected' : '' }}>Annuel</option>
                <option value="maladie" {{ $conge->type_conge === 'maladie' ? 'selected' : '' }}>Maladie</option>
                <option value="maternite" {{ $conge->type_conge === 'maternite' ? 'selected' : '' }}>Maternité</option>
                <option value="autre" {{ $conge->type_conge === 'autre' ? 'selected' : '' }}>Autre</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $conge->date_debut) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $conge->date_fin) }}" required>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" class="form-select" required>
                <option value="en_attente" {{ $conge->statut === 'en_attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuve" {{ $conge->statut === 'approuve' ? 'selected' : '' }}>Approuvé</option>
                <option value="rejete" {{ $conge->statut === 'rejete' ? 'selected' : '' }}>Rejeté</option>
                <option value="refuse" {{ $conge->statut === 'refuse' ? 'selected' : '' }}>Refusé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('conges.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
