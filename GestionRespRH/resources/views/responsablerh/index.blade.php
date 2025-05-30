@extends('layouts.app')

@section('title', 'Liste des Responsables RH')

@section('content')
<form method="GET" class="row g-3 mb-3">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Rechercher...">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <a href="{{ route('responsablerh.create') }}" class="btn btn-success">Ajouter</a>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><a href="?sort=id">ID</a></th>
            <th><a href="?sort=nom">Nom</a></th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($responsables as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->nom }}</td>
            <td>{{ $r->prenom }}</td>
            <td>{{ $r->login }}</td>
            <td>
                <a href="{{ route('responsablerh.show', $r) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('responsablerh.edit', $r) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('responsablerh.destroy', $r) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $responsables->links() }}
@endsection
