<h1>Confirmation de la suppression du Message n°<?= $message->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $message->getNom() ?>
    </li>
    <li class="list-group-item">
        <strong>Email : </strong> <?= $message->getEmail() ?>
    </li>
    <li class="list-group-item">
        <strong>Contenu : </strong> <?= $message->getContent() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("message", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
