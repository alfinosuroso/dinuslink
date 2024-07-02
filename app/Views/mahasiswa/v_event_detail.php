<?= $this->extend('/mahasiswa/layout') ?>
<?= $this->section('content') ?>

<section class="portfolio" id="portfolio">
    <div class="container section-wrapper">
        <!-- Event Detail -->
        <h2 class="section-title black">
            <?php echo $event['judul']; ?>
        </h2> <!-- /.section-title -->
        <div class="underline blue"></div>

        <div class="row">
            <!-- Left Column for Image -->
            <div class="col-md-6">
                <div class="portfolio-item">
                    <div class="portfolio-img">
                        <?php if ($event['gambar'] != '' and file_exists("img-event/" . $event['gambar'] . "")) : ?>
                            <img src="<?php echo base_url() . "img-event/" . $event['gambar'] ?>" class="port-item img-fluid">
                        <?php endif; ?>
                    </div> <!-- /.portfolio-img -->
                </div> <!-- /.portfolio-item -->
            </div> <!-- /.col-md-6 -->

            <!-- Right Column for Details -->
            <div class="col-md-6">
                <div class="portfolio-item-details">
                    <h3><?php echo $event['judul']; ?></h3>
                    <p><?php echo $event['deskripsi']; ?></p>
                    <p><strong>Dibuat oleh:</strong> <?php echo $event['nama']; ?></p>
                    <p><strong>Tanggal event:</strong> <?php echo date("Y-m-d", strtotime($event['tanggal'])); ?></p>
                </div> <!-- /.portfolio-item-details -->
            </div> <!-- /.col-md-6 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.portfolio -->


<?= $this->endSection() ?>
