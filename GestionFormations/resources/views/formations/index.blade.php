@extends('layouts.app')

@section('title', 'Liste des formations')

@section('content')
<h2>Formations</h2>

<a href="{{ route('formations.create') }}" class="btn btn-primary mb-3">Ajouter une formation</a>

<form method="GET" class="mb-3">
    <input type="text" name="search" placeholder="Recherche par titre" class="form-control" value="{{ request('search') }}">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="?sort=titre">Titre</a></th>
            <th>Description</th>
            <th><a href="?sort=date_debut">Début</a></th>
            <th>Fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($formations as $formation)
        <tr>
            <td>{{ $formation->titre }}</td>
            <td>{{ $formation->description }}</td>
            <td>{{ $formation->date_debut }}</td>
            <td>{{ $formation->date_fin }}</td>
            <td>
                <a href="{{ route('formations.edit', $formation) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('formations.destroy', $formation) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
