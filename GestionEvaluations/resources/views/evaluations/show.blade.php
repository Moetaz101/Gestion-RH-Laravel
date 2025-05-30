@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Détails de l'évaluation #{{ $evaluation->id }}</h5>
            <div>
                <a href="{{ route('evaluations.edit', $evaluation) }}" class="btn btn-warning text-white me-2">
                    <i class="fas fa-edit me-1"></i>Modifier
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fas fa-trash me-1"></i>Supprimer
                </button>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="bg-light" style="width: 35%;">ID</th>
                            <td>{{ $evaluation->id }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">ID Employé</th>
                            <td>{{ $evaluation->id_employe }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">ID Responsable</th>
                            <td>{{ $evaluation->id_responsable ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Note</th>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-{{ $evaluation->note >= 15 ? 'success' : ($evaluation->note >= 10 ? 'warning' : 'danger') }} me-2">
                                        {{ number_format($evaluation->note, 1) }}
                                    </span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-{{ $evaluation->note >= 15 ? 'success' : ($evaluation->note >= 10 ? 'warning' : 'danger') }}" 
                                             role="progressbar" 
                                             style="width: {{ ($evaluation->note / 20) * 100 }}%" 
                                             aria-valuenow="{{ $evaluation->note }}" 
                                             aria-valuemin="0" 
                                             aria-valuemax="20">
                                        </div>
                                    </div>
                                    <small class="ms-2 text-muted">{{ number_format($evaluation->note, 1) }}/20</small>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Date d'évaluation</th>
                            <td>{{ $evaluation->date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Créé le</th>
                            <td>{{ $evaluation->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Dernière mise à jour</th>
                            <td>{{ $evaluation->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="fas fa-comment me-2"></i>Commentaire</h6>
                    </div>
                    <div class="card-body">
                        @if($evaluation->commentaire)
                            <p class="card-text">{{ $evaluation->commentaire }}</p>
                        @else
                            <p class="text-muted text-center py-5">Aucun commentaire disponible.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Retour à la liste
            </a>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette évaluation ? Cette action est irréversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('evaluations.destroy', $evaluation) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection