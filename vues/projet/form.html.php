<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $projet): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $projet ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Envoyer un projet </h1>

<form method="post" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" class="form-control" required value="<?= !empty($projet) ? $projet->getTitre() : "" ?>">

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo" class="form-control" required >
    <img src="data:image/jpeg;base64,<?php echo base64_encode($projet->getPhoto()); ?>" alt="Ma superbe image" class="img-thumbnail" >

    <label for="description">Contenu</label>
    <textarea name="description" id="description"  class="form-control"><?= $projet->getDescription() ?? "" ?></textarea>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>

