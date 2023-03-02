<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>nom</th>
            <th>Email</th>
            <th>Contenu</th>
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
    </tbody>
    <tfoot>

    </tfoot>
</table>
