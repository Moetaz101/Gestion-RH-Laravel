@extends('layouts.app')
@section('title', 'Modifier Responsable RH')
@section('content')
<form action="{{ route('responsablerh.update', $responsablerh) }}" method="POST">
    @method('PUT')
    @include('responsablerh.form')
</form>
@endsection
