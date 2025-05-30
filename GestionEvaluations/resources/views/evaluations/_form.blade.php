<div class="row g-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_employe" class="form-label">ID Employé <span class="text-danger">*</span></label>
            <input type="number" name="id_employe" id="id_employe" class="form-control @error('id_employe') is-invalid @enderror" value="{{ old('id_employe', $evaluation->id_employe ?? '') }}" required>
            @error('id_employe')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_responsable" class="form-label">ID Responsable</label>
            <input type="number" name="id_responsable" id="id_responsable" class="form-control @error('id_responsable') is-invalid @enderror" value="{{ old('id_responsable', $evaluation->id_responsable ?? '') }}">
            @error('id_responsable')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="note" class="form-label">Note <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="number" name="note" id="note" class="form-control @error('note') is-invalid @enderror" min="0" max="20" step="0.1" value="{{ old('note', $evaluation->note ?? '') }}" required>
                <span class="input-group-text">/20</span>
            </div>
            @error('note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="date" class="form-label">Date d'évaluation <span class="text-danger">*</span></label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', isset($evaluation) ? $evaluation->date->format('Y-m-d') : date('Y-m-d')) }}" required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group">
            <label for="commentaire" class="form-label">Commentaire</label>
            <textarea name="commentaire" id="commentaire" class="form-control @error('commentaire') is-invalid @enderror" rows="4">{{ old('commentaire', $evaluation->commentaire ?? '') }}</textarea>
            @error('commentaire')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>{{ isset($evaluation) ? 'Mettre à jour' : 'Enregistrer' }}
        </button>
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary ms-2">
            <i class="fas fa-arrow-left me-1"></i>Retour
        </a>
    </div>
</div>