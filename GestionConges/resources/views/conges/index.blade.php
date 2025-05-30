@extends('layouts.app')

@section('content')
<a href="{{ route('conges.create') }}" class="btn btn-primary mb-3">Ajouter Congé</a>

<form method="GET" class="mb-3">
    <input type="text" name="search" placeholder="Recherche..." class="form-control mb-2" value="{{ request('search') }}">
    <button class="btn btn-outline-secondary">Chercher</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="?sort=nom_employe">Employé</a></th>
            <th><a href="?sort=type_conge">Type</a></th>
            <th>Début</th>
            <th>Fin</th>
            <th><a href="?sort=statut">Statut</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conges as $conge)
        <tr>
            <td>{{ $conge->nom_employe }}</td>
            <td>{{ $conge->type_conge }}</td>
            <td>{{ $conge->date_debut }}</td>
            <td>{{ $conge->date_fin }}</td>
            <td>
                @if($conge->statut == 'en_attente')
                    <span class="badge bg-warning text-dark">En attente</span>
                @elseif($conge->statut == 'approuve')
                    <span class="badge bg-success">Approuvé</span>
                @elseif($conge->statut == 'rejete')
                    <span class="badge bg-danger">Rejeté</span>
                @elseif($conge->statut == 'refuse')
                    <span class="badge bg-danger">Refusé</span>
                @endif
            </td>
            <td>
                <a href="{{ route('conges.show', $conge) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('conges.edit', $conge) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('conges.destroy', $conge) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $conges->withQueryString()->links() }}
@endsection
