@extends('layouts.app')
@section('title', 'Ajouter Responsable RH')
@section('content')
<form action="{{ route('responsablerh.store') }}" method="POST">
    @include('responsablerh.form')
</form>
@endsection
