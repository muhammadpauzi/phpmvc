<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['user']['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $data['user']['umur']; ?></h6>
                    <p class="card-text"><?= $data['user']['email']; ?></p>
                    <a href="<?= BASEURL; ?>/user" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>