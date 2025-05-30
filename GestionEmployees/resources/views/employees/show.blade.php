@extends('layouts.app')

@section('title', 'Détails de l\'Employé')

@section('content')
<ul class="list-group">
    <li class="list-group-item"><strong>Nom :</strong> {{ $employee->nom }}</li>
    <li class="list-group-item"><strong>Prénom :</strong> {{ $employee->prenom }}</li>
    <li class="list-group-item"><strong>Email :</strong> {{ $employee->email }}</li>
    <li class="list-group-item"><strong>Poste :</strong> {{ $employee->poste }}</li>
    <li class="list-group-item"><strong>Date d'embauche :</strong> {{ $employee->date_embauche }}</li>
    <li class="list-group-item"><strong>Salaire :</strong> {{ $employee->salaire }} TND</li>
</ul>
<a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection
