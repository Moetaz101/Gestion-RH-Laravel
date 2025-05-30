@extends('layouts.app')

@section('title', 'Modifier un Employé')

@section('content')
<form method="POST" action="{{ route('employees.update', $employee) }}">
    @csrf
    @method('PUT')
    @include('employees.form', ['employee' => $employee])
</form>
@endsection
