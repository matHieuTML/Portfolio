<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Envoyer un message </h1>

<form method="post" enctype="multipart/form-data">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" required value="<?= !empty($message) ? $message->getNom() : "" ?>">

    <label for="email">email</label>
    <input type="email" name="email" id="email" class="form-control" required value="<?= $message->getEmail() ?? "" ?>">

    <label for="content">Contenu</label>
    <textarea name="content" id="content"  class="form-control"><?= $message->getContent() ?? "" ?></textarea>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>
