<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center" style="display: <?php echo $data['display']; ?>;">
        <div class="col-10">
            <div class="alert alert-success" role="alert">
                <?php echo $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Nationaliteit</th>
                        <th>Vermogen (mln)</th>
                        <th>Geboortedatum</th>
                        <th>Aantal Albums</th>
                        <th>Bewerken</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['result'] as $zangeres) : ?>
                        <tr>
                            <td><?php echo $zangeres->Naam; ?></td>
                            <td><?php echo $zangeres->Nationaliteit; ?></td>
                            <td><?php echo $zangeres->Vermogen; ?></td>
                            <td><?php echo $zangeres->Geboortedatum; ?></td>
                            <td><?php echo $zangeres->AantalAlbums; ?></td>
                            <td class="text-center">
                                <a href="<?php echo URLROOT; ?>/ZangeressenController/update/<?php echo $zangeres->Id; ?>">
                                    <i class="bi bi-pencil-fill text-warning"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo URLROOT; ?>/ZangeressenController/delete/<?php echo $zangeres->Id; ?>"
                                   onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?php echo URLROOT; ?>/ZangeressenController/create" class="btn btn-success">
                Nieuwe zangeres toevoegen
            </a>
            <a href="<?php echo URLROOT; ?>/homepages/index" class="btn btn-primary">
                Terug
            </a>

        </div>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
