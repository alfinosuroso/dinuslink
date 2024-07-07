<?= $this->extend('/admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">Verifikasi Event</h1>

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
                <td><?php
                    if ($item['status'] == NULL) {
                        echo ('BELUM DITINJAU');
                    } else {
                        echo $item['status'];
                    }
                    ?>
                </td>
                <td><?php echo $item['created_at'] ?></td>
                <td><?php echo $item['updated_at'] ?></td>
                <td>

                    <form action="<?= base_url('verifeventadm/accept') ?>" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin untuk accept ini?')">Accept</button>
                    </form>
                    <a href="<?= base_url('verifeventadm/reject/' . $item['id']) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin untuk reject ini?')">
                        Reject
                    </a>
                </td>

                <td>
                    <form action="<?= base_url('verifeventadm/updateStatus') ?>" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <select name="status" class="form-control" required>
                            <option value="" disabled <?= empty($item['status']) ? 'selected' : '' ?>>--Select Status--</option>
                            <option value="accept" <?= strtolower($item['status']) == 'accept' ? 'selected' : '' ?>>Accept</option>
                            <option value="pending" <?= strtolower($item['status']) == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="reject" <?= strtolower($item['status']) == 'reject' ? 'selected' : '' ?>>Reject</option>
                        </select>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin untuk mengubah status ini?')">Update Status</button>
                    </form>
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
                  
            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashData('failed')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('failed') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                  
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table datatable">
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
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['nim'] ?></td>
                                <td><?= $item['judul'] ?></td>
                                <td><?= $item['deskripsi'] ?></td>
                                <td><?= $item['tanggal'] ?></td>
                                <td>
                                    <?php if ($item['gambar'] != '' && file_exists("img-event/" . $item['gambar'])) : ?>
                                        <img src="<?= base_url("img-event/" . $item['gambar']) ?>" class="img-fluid" style="max-width: 100px;" data-bs-toggle="modal" data-bs-target="#imageModal-<?= $item['id'] ?>">
                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModal-<?= $item['id'] ?>" tabindex="-1" aria-labelledby="imageModalLabel-<?= $item['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="imageModalLabel-<?= $item['id'] ?>">Image Preview</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="<?= base_url("img-event/" . $item['gambar']) ?>" class="img-fluid" alt="Event Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($item['proposal'] != '' && file_exists("img-event/" . $item['proposal'])) : ?>
                                        <img src="<?= base_url("CustomAssets/assets/pdf-icon.svg") ?>" width="50px" data-bs-toggle="modal" data-bs-target="#proposalModal-<?= $item['id'] ?>" alt="PDF Icon">
                                        <!-- Proposal Modal -->
                                        <div class="modal fade" id="proposalModal-<?= $item['id'] ?>" tabindex="-1" aria-labelledby="proposalModalLabel-<?= $item['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="proposalModalLabel-<?= $item['id'] ?>">Proposal Preview</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <iframe src="<?= base_url("img-event/" . $item['proposal']) ?>" class="w-100" style="height: 500px;" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= $item['status'] ?></td>
                                <td><?= $item['updated_at'] ?></td>
                                <td>
                                    <?php if ($item['status'] != "ACCEPT") : ?>
                                        <form action="<?= base_url('verifeventadm/accept') ?>" method="post" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin untuk accept ini?')">Accept</button>
                                        </form>

                                        <?php if ($item['status'] != "REJECT") : ?>
                                            <a href="<?= base_url('verifeventadm/reject/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin untuk reject ini?')">
                                                Reject
                                            </a>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <p class="text-muted">Anda sudah Accept event ini</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
                    <div class="form-group mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="Nim" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="form-group mb-3">
                        <label for="proposal">Proposal</label>
                        <input type="file" class="form-control" id="proposal" name="proposal">
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="PENDING">PENDING</option>
                            <option value="ACCEPT">ACCEPT</option>
                            <option value="REJECT">REJECT</option>
                        </select>
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
<!-- End Modal Tambah Data -->

<?= $this->endSection() ?>