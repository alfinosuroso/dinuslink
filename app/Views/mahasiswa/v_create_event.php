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

        <form class="row form">
            <h3>Masukkan Detail Event</h3>

            <div class="col-md-12 col-xs-12 form-group">
                <label class="sr-only">Judul</label>
                <input name="judul" class="form-control" type="text" placeholder="Judul">
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12 form-group">
                    <label class="sr-only">Deskripsi</label>
                    <textarea class="message form-control" placeholder="Deskripsi"></textarea>
                </div> <!-- /.form-group -->
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <small>Upload Gambar</small>
                <input name="gambar" type="file" class="form-control">
            </div>


            <div class="col-md-12 col-xs-12 form-group">
                <small>Tanggal Event</small>
                <input name="tanggal" type="date" class="form-control">
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <input type="radio" name="tab" value="" checked />
                <small>Upload Proposal Event</small>
                <input type="radio" name="tab" value="" />
                <small>Upload Bukti Pertanggungjawaban Event</small>
            </div>

            <div class="col-md-12 col-xs-12 form-group">
                <input name="proposal" type="file" class="form-control">
            </div>

            <div class="row">
                <input class="btn btn-sub blue-btn" type="submit" value="Upload Event (in progress)">
            </div>
        </form> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.contact -->



<?= $this->endSection() ?>