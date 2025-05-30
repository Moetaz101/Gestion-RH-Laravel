@extends('layouts.app')

@section('title', 'Modifier une formation')

@section('content')
<h2>Modifier une formation</h2>

<form action="{{ route('formations.update', $formation) }}" method="POST">
    @method('PUT')
    @include('formations.form')
</form>
@endsection
