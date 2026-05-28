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
            <form action="<?= URLROOT; ?>/SmartphoneController/create" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk" value="<?= $_POST['merk'] ?? ''; ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model" value="<?= $_POST['model'] ?? ''; ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="9999" step="0.01" class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>" id="prijs" value="<?= $_POST['prijs'] ?? ''; ?>">
                    <?php if (isset($data['errors']['prijs'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="geheugen" class="form-label">Geheugen (GB)</label>
                    <input name="geheugen" type="number" min="0" max="4000" class="form-control <?= isset($data['errors']['geheugen']) ? 'is-invalid' : ''; ?>" id="geheugen" value="<?= $_POST['geheugen'] ?? ''; ?>">
                    <?php if (isset($data['errors']['geheugen'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['geheugen']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="besturingssysteem" class="form-label">Besturingssysteem</label>
                    <input name="besturingssysteem" type="text" class="form-control <?= isset($data['errors']['besturingssysteem']) ? 'is-invalid' : ''; ?>" id="besturingssysteem" value="<?= $_POST['besturingssysteem'] ?? ''; ?>">
                    <?php if (isset($data['errors']['besturingssysteem'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['besturingssysteem']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="schermgrootte" class="form-label">Schermgrootte</label>
                    <input name="schermgrootte" type="number" min="0" max="10" step="0.01" class="form-control <?= isset($data['errors']['schermgrootte']) ? 'is-invalid' : ''; ?>" id="schermgrootte" value="<?= $_POST['schermgrootte'] ?? ''; ?>">
                    <?php if (isset($data['errors']['schermgrootte'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['schermgrootte']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>" id="releasedatum" value="<?= $_POST['releasedatum'] ?? ''; ?>">
                    <?php if (isset($data['errors']['releasedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="megapixels" class="form-label">Megapixels</label>
                    <input name="megapixels" type="number" min="0" max="200" class="form-control <?= isset($data['errors']['megapixels']) ? 'is-invalid' : ''; ?>" id="megapixels" value="<?= $_POST['megapixels'] ?? ''; ?>">
                    <?php if (isset($data['errors']['megapixels'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['megapixels']; ?></div>
                    <?php endif; ?>
                </div>
                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['smartphone']->Id ?? ''; ?>">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
        </div>
    </div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
