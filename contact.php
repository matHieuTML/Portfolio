<?php 
include 'includes/init.inc.php';
use Modeles\Entites\Message;
use Controleurs\MessageControleur;
$send = new MessageControleur();
$send->ajouterUser();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Envoyer un message </h1>

<form method="post" enctype="multipart/form-data">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" class="form-control" required >

    <label for="email">email</label>
    <input type="email" name="email" id="email" class="form-control" required >

    <label for="content">Contenu</label>
    <textarea name="content" id="content"  class="form-control"></textarea>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
</form>

</body>
</html>
