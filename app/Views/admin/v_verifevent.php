<?= $this->extend('/admin/layout') ?>
<?= $this->section('content') ?>
<!-- Table with stripped rows -->
<table class="table datatable">
    <br>
    <h1>Verifikasi Event</h1>

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

    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Gambar</th>
            <th scope="col">Proposal</th>
            <th scope="col">Status</th>
            <th scope="col">Di-update</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($verifyEvent as $index => $item) : ?>
            <tr>
                <th scope="row"><?php echo $index + 1 ?></th>
                <td><?php echo $item['nama'] ?></td>
                <td><?php echo $item['nim'] ?></td>
                <td><?php echo $item['judul'] ?></td>
                <td><?php echo $item['deskripsi'] ?></td>
                <td><?php echo $item['tanggal'] ?></td>
                <td>
                    <?php if ($item['gambar'] != '' && file_exists("img-event/" . $item['gambar'])) : ?>
                        <img src="<?php echo base_url() . "img-event/" . $item['gambar'] ?>" width="100px">
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($item['proposal'] != '' && file_exists("img-event/" . $item['proposal'])) : ?>
                        <img src="<?php echo base_url() . "img-event/" . $item['proposal'] ?>" width="100px">
                    <?php endif; ?>
                </td>
                <td><?php echo $item['status'] ?></td>
                <td><?php echo $item['created_at'] ?></td>
                <td><?php echo $item['updated_at'] ?></td>
                <td>
                    <?php
                    if ($item['status'] != "ACCEPT") {
                    ?>
                        <form action="<?= base_url('verifeventadm/accept') ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin untuk accept ini?')">Accept</button>
                        </form>

                        <?php
                        if ($item['status'] != "REJECT") {
                        ?>
                            <a href="<?= base_url('verifeventadm/reject/' . $item['id']) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin untuk reject ini?')">
                                Reject
                            </a>
                        <?php
                        }
                        ?>
                    <?php
                    } else if ($item['status'] == "ACCEPT") {
                    ?>
                        <p>Anda sudah Accept event ini</p>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <!-- Edit Modal Begin -->
            <div class="modal fade" id="editModal-<?= $item['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('verifeventadm/edit/' . $item['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $item['nama'] ?>" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" name="nim" class="form-control" id="nim" value="<?= $item['nim'] ?>" placeholder="Nim" required>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" value="<?= $item['judul'] ?>" placeholder="Judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $item['deskripsi'] ?>" placeholder="Deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $item['tanggal'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                    <img src="<?= base_url('img-event/' . $item['gambar']) ?>" width="100px">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check" name="check" value="1">
                                    <label class="form-check-label" for="check">
                                        Ceklis jika ingin mengganti foto
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Proposal</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                    <img src="<?= base_url('img-event/' . $item['gambar']) ?>" width="100px">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check" name="check" value="1">
                                    <label class="form-check-label" for="check">
                                        Ceklis jika ingin mengganti foto
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" name="status" class="form-control" id="status" value="<?= $item['status'] ?>" placeholder="Status" required>
                                </div>
                                <div class="form-group">
                                    <label for="created_at">Dibuat</label>
                                    <input type="date" class="form-control" id="created_at" name="created_at" value="<?= $item['created_at'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="updated_at">Di-update</label>
                                    <input type="date" class="form-control" id="updated_at" name="updated_at" value="<?= $item['updated_at'] ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal End -->
        <?php endforeach ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('verifeventadm/create') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $item['nama'] ?>" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="<?= $item['nim'] ?>" placeholder="Nim" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="<?= $item['judul'] ?>" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $item['deskripsi'] ?>" placeholder="Deskripsi" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $item['tanggal'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <img src="<?= base_url('img-event/' . $item['gambar']) ?>" width="100px">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Proposal</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <img src="<?= base_url('img-event/' . $item['gambar']) ?>" width="100px">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status" value="<?= $item['status'] ?>" placeholder="Status" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah Data -->

<?= $this->endSection() ?>