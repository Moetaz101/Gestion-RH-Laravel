@extends('layouts.app')
@section('title', 'Détail Responsable RH')
@section('content')
<ul class="list-group">
    <li class="list-group-item">Nom : {{ $responsablerh->nom }}</li>
    <li class="list-group-item">Prénom : {{ $responsablerh->prenom }}</li>
    <li class="list-group-item">Login : {{ $responsablerh->login }}</li>
</ul>
<a href="{{ route('responsablerh.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection
