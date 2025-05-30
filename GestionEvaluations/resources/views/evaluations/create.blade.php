@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Créer une nouvelle évaluation</h5>
    </div>
    
    <div class="card-body">
        <form action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            @include('evaluations._form')
        </form>
    </div>
</div>
@endsection