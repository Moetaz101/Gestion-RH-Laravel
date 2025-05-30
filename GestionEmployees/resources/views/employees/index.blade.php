@extends('layouts.app')

@section('title', 'Liste des employés')

@section('content')
<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Ajouter un Employé</a>

<form method="GET" class="mb-3">
    <input type="text" name="search" placeholder="Rechercher..." class="form-control" value="{{ request('search') }}">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="?sort=nom">Nom</a></th>
            <th><a href="?sort=prenom">Prénom</a></th>
            <th>Email</th>
            <th>Poste</th>
            <th>Date d'embauche</th>
            <th>Salaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->nom }}</td>
            <td>{{ $employee->prenom }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->poste }}</td>
            <td>{{ $employee->date_embauche }}</td>
            <td>{{ $employee->salaire }} TND</td>
            <td>
                <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet employé ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $employees->links() }}
@endsection
