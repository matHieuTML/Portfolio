<h1>LES MESSAGES</h1>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>Email</th>
            <th>Contenu</th>
            <th>Option</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($message as $message): ?>
        <tr>
            <!-- Table Row -->
            <td>
                <?= $message->getId() ?>
            </td>
            <td>
                <?= $message->getNom() ?>
            </td>
            <td>
                <?= $message->getEmail() ?>
            </td>
            <td>
                <?= $message->getContent() ?>
            </td>

            <td>
                <a href="<?= lien("message", "modifier", $message->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("message", "supprimer", $message->getid()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>
            <a href="<?= lien("message", "ajouter", $message->getId()) ?>"><i class="fas fa-plus text-success"></i></a>
            </td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>
