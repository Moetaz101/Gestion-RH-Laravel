@extends('layouts.app')

@section('title', 'Créer une formation')

@section('content')
<h2>Créer une formation</h2>

<form action="{{ route('formations.store') }}" method="POST">
    @include('formations.form')
</form>
@endsection
