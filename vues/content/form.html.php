<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $content): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $content ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Envoyer un content </h1>

<form method="post" enctype="multipart/form-data">
    <label for="famille">famille</label>
    <input type="text" name="famille" id="famille" class="form-control" required value="<?= !empty($content) ? $content->getFamille() : "" ?>">

    <label for="what">contenu</label>
    <input type="text" name="what" id="what" class="form-control" required value="<?= !empty($content) ? $content->getWhat() : "" ?>" >
    

    <label for="attribut">Valeur</label>
    <textarea name="attribut" id="attribut"  class="form-control" value="<?= !empty($content) ? $content->getAttribut() : "" ?>"></textarea>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>

