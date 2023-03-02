<h1>LE CONTENU</h1>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Famille</th>
            <th>Attribut</th>
            <th>Valeur</th>
            <th>Option</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($content as $content): ?>
        <tr>
            <!-- Table Row -->
            <td>
                <?= $content->getId() ?>
            </td>
            <td>
                <?= $content->getFamille() ?>
            </td>
            <td>
                <?= $content->getWhat() ?>
            </td>
            <td>
                <?= $content->getAttribut() ?>
            </td>

            <td>
                <a href="<?= lien("content", "modifier", $content->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("content", "supprimer", $content->getid()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>
            <a href="<?= lien("content", "ajouter", $content->getId()) ?>"><i class="fas fa-plus text-success"></i></a>
            </td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>

