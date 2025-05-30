@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Modifier l'évaluation #{{ $evaluation->id }}</h5>
    </div>
    
    <div class="card-body">
        <form action="{{ route('evaluations.update', $evaluation) }}" method="POST">
            @csrf
            @method('PUT')
            @include('evaluations._form')
        </form>
    </div>
</div>
@endsection