<?php
$hlm = "Beranda";
if (uri_string() != "") {
    $hlm = ucwords(uri_string());
}
?>
<?= $this->extend('/mahasiswa/layout') ?>
<?= $this->section('content') ?>

<!-- Contact with us -->
<section class="contact section-wrapper" id="contact">
    <div class="container">
        <h2 class="section-title black">
            Buat Event
        </h2> <!-- /.section-title -->
        <div class="underline blue"></div>

        <form class="row form" action="<?= base_url('create-event') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <h3>Masukkan Detail Event</h3>

            <div class="col-md-12 col-xs-12 form-group">
                <label class="sr-only">Judul</label>
                <input name="judul" id="judul" class="form-control" type="text" placeholder="Judul" required>
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12 form-group">
                    <label class="sr-only">Deskripsi</label>
                    <textarea class="message form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" required></textarea>
                </div> <!-- /.form-group -->
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <small>Upload Gambar</small>
                <input name="gambar" id="gambar" type="file" class="form-control" required>
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <small>Tanggal Event</small>
                <input name="tanggal" id="tanggal" type="date" class="form-control" size="20" min="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <input type="radio" name="tab" value="1" checked />
                <small>Upload Proposal Event</small>
                <input type="radio" name="tab" value="2" />
                <small>Upload Bukti Pertanggungjawaban Event</small>
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <input name="proposal" id="proposal" type="file" class="form-control" required>
            </div>

            <div class="row">
                <input class="btn btn-sub blue-btn" type="submit" value="Upload Event">
            </div>
        </form> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.contact -->



<?= $this->endSection() ?>