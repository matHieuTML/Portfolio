<h1>Confirmation de la suppression du Projet n°<?= $content->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>famille : </strong> <?= $content->getFamille() ?>
    </li>
    <li class="list-group-item">
        <strong>content : </strong>     <?= $content->getWhat() ?>
    </li>
    <li class="list-group-item">
        <strong>Attribut : </strong> <?= $content->getAttribut() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("content", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
