<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">

    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker (success only) -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/update" method="post">
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam" value="<?= $_POST['naam'] ?? $data['zangeres']->Naam; ?>">
                    <?php if (isset($data['errors']['naam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['naam']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="nationaliteit" class="form-label">Nationaliteit</label>
                    <input name="nationaliteit" type="text" class="form-control <?= isset($data['errors']['nationaliteit']) ? 'is-invalid' : ''; ?>" id="nationaliteit" value="<?= $_POST['nationaliteit'] ?? $data['zangeres']->Nationaliteit; ?>">
                    <?php if (isset($data['errors']['nationaliteit'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['nationaliteit']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen (in miljoenen)</label>
                    <input name="vermogen" type="number" min="0" step="0.01" class="form-control <?= isset($data['errors']['vermogen']) ? 'is-invalid' : ''; ?>" id="vermogen" value="<?= $_POST['vermogen'] ?? $data['zangeres']->Vermogen; ?>">
                    <?php if (isset($data['errors']['vermogen'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['vermogen']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="geboortedatum" class="form-label">Geboortedatum</label>
                    <input name="geboortedatum" type="date" class="form-control <?= isset($data['errors']['geboortedatum']) ? 'is-invalid' : ''; ?>" id="geboortedatum" value="<?= $_POST['geboortedatum'] ?? $data['zangeres']->Geboortedatum; ?>">
                    <?php if (isset($data['errors']['geboortedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['geboortedatum']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="aantalalbums" class="form-label">Aantal Albums</label>
                    <input name="aantalalbums" type="number" min="0" max="100" class="form-control <?= isset($data['errors']['aantalalbums']) ? 'is-invalid' : ''; ?>" id="aantalalbums" value="<?= $_POST['aantalalbums'] ?? $data['zangeres']->AantalAlbums; ?>">
                    <?php if (isset($data['errors']['aantalalbums'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['aantalalbums']; ?></div>
                    <?php endif; ?>
                </div>
                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['zangeres']->Id; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
        </div>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
