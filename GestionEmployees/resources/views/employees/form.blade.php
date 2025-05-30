@php
    $isEdit = isset($employee);
@endphp

<div class="mb-3">
    <label>Nom</label>
    <input type="text" name="nom" class="form-control" value="{{ old('nom', $employee->nom ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Prénom</label>
    <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $employee->prenom ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Poste</label>
    <input type="text" name="poste" class="form-control" value="{{ old('poste', $employee->poste ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Date d'embauche</label>
    <input type="date" name="date_embauche" class="form-control" value="{{ old('date_embauche', $employee->date_embauche ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Salaire</label>
    <input type="number" step="0.01" name="salaire" class="form-control" value="{{ old('salaire', $employee->salaire ?? '') }}" required>
</div>

<button type="submit" class="btn btn-success">{{ $isEdit ? 'Mettre à jour' : 'Créer' }}</button>
<a href="{{ route('employees.index') }}" class="btn btn-secondary">Annuler</a>
