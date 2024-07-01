<?= $this->extend('/admin/layout') ?>
<?= $this->section('content') ?>

<br>
<h1>Daftar Berita</h1>

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<?php
if (session()->getFlashData('failed')) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<table class="table datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul Berita</th>
            <th>Isi Berita</th>
            <th>Gambar Berita</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($berita as $index => $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['judul_berita'] ?></td>
                <td><?= $item['isi_berita'] ?></td>
                <td>
                    <?php if ($item['gambar_berita'] && file_exists("img/" . $item['gambar_berita'])) : ?>
                        <img src="<?= base_url() . "img/" . $item['gambar_berita'] ?>" width="100px">
                    <?php endif; ?>
                </td>
                <td><?= $item['created_at'] ?></td>
                <td><?= $item['updated_at'] ?></td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $item['id'] ?>">
                        Ubah
                    </button>
                    <a href="<?= base_url('beritaadm/delete/' . $item['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                        Hapus
                    </a>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal-<?= $item['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('beritaadm/edit/' . $item['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul_berita">Judul Berita</label>
                                    <input type="text" name="judul_berita" class="form-control" id="judul_berita" value="<?= $item['judul_berita'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="isi_berita">Isi berita</label>
                                    <input type="text" name="isi_berita" class="form-control" id="isi_berita" value="<?= $item['isi_berita'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_berita">Gambar Berita</label>
                                    <input type="file" class="form-control" id="gambar_berita" name="gambar_berita">
                                    <img src="<?= base_url('img/' . $item['gambar_berita']) ?>" width="100px">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check" name="check" value="1">
                                    <label class="form-check-label" for="check">Ceklis jika ingin mengganti foto</label>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </tbody>
</table>

<!-- Modal untuk tambah data -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('beritaadm') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control" id="judul_berita" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_berita">Isi berita</label>
                        <input type="text" name="isi_berita" class="form-control" id="isi_berita" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_berita">Gambar Berita</label>
                        <input type="file" class="form-control" id="gambar_berita" name="gambar_berita">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
