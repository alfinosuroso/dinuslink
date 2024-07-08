<?= $this->extend('/admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="my-4">Verifikasi Event</h1>

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
                                        <img src="<?= base_url("img-event/" . $item['gambar']) ?>" class="img-fluid clickable-image" style="max-width: 100px;" data-bs-toggle="modal" data-bs-target="#imageModal-<?= $item['id'] ?>" data-id="<?= $item['id'] ?>">
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
                                        <img src="<?= base_url("CustomAssets/assets/pdf-icon.svg") ?>" class="clickable-pdf" width="50px" data-bs-toggle="modal" data-bs-target="#proposalModal-<?= $item['id'] ?>" alt="PDF Icon" data-id="<?= $item['id'] ?>">
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
                                <td><?= $item['status'] ?? 'BELUM DITINJAU' ?></td>
                                <td><?= $item['created_at'] ?></td>
                                <td><?= $item['updated_at'] ?></td>
                                <td>
                                    <form action="<?= base_url('verifeventadm/updateStatus') ?>" method="post" class="submit-form">
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <select name="status" class="form-control" required>
                                            <option value="" disabled <?= empty($item['status']) ? 'selected' : '' ?>>--Select Status--</option>
                                            <option value="accept" <?= strtolower($item['status']) == 'accept' ? 'selected' : '' ?>>Accept</option>
                                            <option value="pending" <?= strtolower($item['status']) == 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="reject" <?= strtolower($item['status']) == 'reject' ? 'selected' : '' ?>>Reject</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-submit" data-id="<?= $item['id'] ?>" onclick="return validateForm(this)">Update Status</button>
                                    </form>
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const clickableImages = document.querySelectorAll('.clickable-image');
    const clickablePdfs = document.querySelectorAll('.clickable-pdf');

    const handleImageClick = (event) => {
        localStorage.setItem(`imageClicked-${event.target.dataset.id}`, 'true');
    };

    const handlePdfClick = (event) => {
        localStorage.setItem(`pdfClicked-${event.target.dataset.id}`, 'true');
    };

    clickableImages.forEach((img) => {
        img.addEventListener('click', handleImageClick);
    });

    clickablePdfs.forEach((pdf) => {
        pdf.addEventListener('click', handlePdfClick);
    });

    window.validateForm = (button) => {
        const id = button.dataset.id;
        const imageClicked = localStorage.getItem(`imageClicked-${id}`) === 'true';
        const pdfClicked = localStorage.getItem(`pdfClicked-${id}`) === 'true';

        if (!imageClicked || !pdfClicked) {
            alert('Pastikan anda melihat/meninjau gambar dan PDF terlebih dahulu');
            return false;
        }

        return confirm('Anda yakin untuk mengubah status ini?');
    };
});

</script>


<?= $this->endSection() ?>
