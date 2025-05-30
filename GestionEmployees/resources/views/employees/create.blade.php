@extends('layouts.app')

@section('title', 'Ajouter un Employé')

@section('content')
<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    @include('employees.form')
</form>
@endsection
