@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list-ul me-2"></i>Liste des évaluations</h5>
            <a href="{{ route('evaluations.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Nouvelle évaluation
            </a>
        </div>
    </div>
    
    <div class="card-body">
        <!-- Formulaire de recherche -->
        <form id="searchForm" action="{{ route('evaluations.index') }}" method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                        <input type="text" name="commentaire" class="form-control" placeholder="Rechercher par commentaire" value="{{ request('commentaire') }}">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <input type="number" name="note" class="form-control" placeholder="Note" step="0.1" min="0" max="20" value="{{ request('note') }}">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search me-1"></i>Rechercher
                    </button>
                    <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo me-1"></i>Réinitialiser
                    </a>
                </div>
            </div>
        </form>

        <!-- Tableau des évaluations -->
        <div class="table-responsive">
            <table class="table table-hover table-striped border">
                <thead class="table-light">
                    <tr>
                        <th>
                            <a href="{{ route('evaluations.index', ['sort' => 'id', 'order' => $sort === 'id' && $order === 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'order', 'page'])) }}" class="text-decoration-none text-dark">
                                ID
                                @if ($sort === 'id')
                                    <i class="fas fa-sort-{{ $order === 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
                        <th>ID Employé</th>
                        <th>ID Responsable</th>
                        <th>
                            <a href="{{ route('evaluations.index', ['sort' => 'note', 'order' => $sort === 'note' && $order === 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'order', 'page'])) }}" class="text-decoration-none text-dark">
                                Note
                                @if ($sort === 'note')
                                    <i class="fas fa-sort-{{ $order === 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
                        <th>Commentaire</th>
                        <th>
                            <a href="{{ route('evaluations.index', ['sort' => 'date', 'order' => $sort === 'date' && $order === 'asc' ? 'desc' : 'asc'] + request()->except(['sort', 'order', 'page'])) }}" class="text-decoration-none text-dark">
                                Date
                                @if ($sort === 'date')
                                    <i class="fas fa-sort-{{ $order === 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @else
                                    <i class="fas fa-sort ms-1 text-muted"></i>
                                @endif
                            </a>
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($evaluations as $evaluation)
                    <tr>
                        <td>{{ $evaluation->id }}</td>
                        <td>{{ $evaluation->id_employe }}</td>
                        <td>{{ $evaluation->id_responsable ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-{{ $evaluation->note >= 15 ? 'success' : ($evaluation->note >= 10 ? 'warning' : 'danger') }}">
                                {{ number_format($evaluation->note, 1) }}
                            </span>
                        </td>
                        <td>{{ Str::limit($evaluation->commentaire, 50) }}</td>
                        <td>{{ $evaluation->date->format('d/m/Y') }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('evaluations.show', $evaluation) }}" class="btn btn-info text-white" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('evaluations.edit', $evaluation) }}" class="btn btn-warning text-white" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $evaluation->id }}" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            
                            <!-- Modal de confirmation de suppression -->
                            <div class="modal fade" id="deleteModal{{ $evaluation->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $evaluation->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $evaluation->id }}">Confirmation de suppression</h5>
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
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>Aucune évaluation trouvée
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $evaluations->appends(request()->except('page'))->links() }}
        </div>
    </div>
</div>
@endsection