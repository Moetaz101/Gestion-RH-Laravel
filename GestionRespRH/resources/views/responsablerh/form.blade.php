<!-- resources/views/responsablerh/form.blade.php -->
@csrf
<div class="mb-3">
    <label>Nom</label>
    <input type="text" name="nom" class="form-control" value="{{ old('nom', $responsablerh->nom ?? '') }}">
</div>
<div class="mb-3">
    <label>Prénom</label>
    <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $responsablerh->prenom ?? '') }}">
</div>
<div class="mb-3">
    <label>Login</label>
    <input type="text" name="login" class="form-control" value="{{ old('login', $responsablerh->login ?? '') }}">
</div>
<div class="mb-3">
    <label>Mot de passe</label>
    <input type="text" name="mot_de_passe" class="form-control" value="{{ old('mot_de_passe', $responsablerh->mot_de_passe ?? '') }}">
</div>
<button class="btn btn-primary">Valider</button>
