<h1>LES PROJETS</h1>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>titre</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Option</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($projet as $projet): ?>
        <tr>
            <!-- Table Row -->
            <td>
                <?= $projet->getId() ?>
            </td>
            <td>
                <?= $projet->getTitre() ?>
            </td>
            <td>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($projet->getPhoto()); ?>" alt="Ma superbe image" class="img-thumbnail">
            </td>
            <td>
                <?= $projet->getDescription() ?>
            </td>

            <td>
                <a href="<?= lien("projet", "modifier", $projet->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("projet", "supprimer", $projet->getid()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>
            <a href="<?= lien("projet", "ajouter", $projet->getId()) ?>"><i class="fas fa-plus text-success"></i></a>
            </td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>

