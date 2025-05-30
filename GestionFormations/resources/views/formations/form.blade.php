@csrf
<div class="mb-3">
    <label for="titre" class="form-label">Titre</label>
    <input type="text" name="titre" class="form-control" value="{{ old('titre', $formation->titre ?? '') }}">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $formation->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="date_debut" class="form-label">Date Début</label>
    <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $formation->date_debut ?? '') }}">
</div>

<div class="mb-3">
    <label for="date_fin" class="form-label">Date Fin</label>
    <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $formation->date_fin ?? '') }}">
</div>

<button type="submit" class="btn btn-success">Valider</button>
