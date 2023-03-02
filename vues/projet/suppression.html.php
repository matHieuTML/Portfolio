<h1>Confirmation de la suppression du Projet n°<?= $projet->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Titre : </strong> <?= $projet->getTitre() ?>
    </li>
    <li class="list-group-item">
        <strong>Photo : </strong>     <img src="data:image/jpeg;base64,<?php echo base64_encode($projet->getPhoto()); ?>" alt="Ma superbe image" class="img-thumbnail" >
    </li>
    <li class="list-group-item">
        <strong>description : </strong> <?= $projet->getDescription() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("projet", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
