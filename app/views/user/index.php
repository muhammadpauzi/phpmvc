<div class="container">
    <div class="row mt-4">
        <div class="col-6">
            <?= Flasher::flash(); ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3 tambahFormModal" data-toggle="modal" data-target="#formModal">
                Tambah Data User
            </button>
            <form action="<?= BASEURL; ?>/user/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari user.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <h3 class="mb-3">Daftar User</h3>
            <ul class="list-group">
                <?php if (empty($data['users'])) : ?>
                    <p class="text-center mt-4">Data tidak ditemukan!</p>
                <?php endif; ?>
                <?php foreach ($data['users'] as $user) : ?>
                    <li class="list-group-item">
                        <?= $user['nama']; ?>
                        <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge badge-primary float-right">detail</a>
                        <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge badge-danger float-right mx-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">hapus</a>
                        <a href="<?= BASEURL; ?>/user/ubah/" class="badge badge-success float-right ubahFormModal" data-toggle="modal" data-target="#formModal" data-id="<?= $user['id']; ?>">ubah</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/user/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btnFormModal">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>