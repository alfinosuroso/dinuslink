<?= $this->extend('/admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    
    <h2>Berita</h2>
    <div class="row">
        <?php foreach ($berita as $key => $item) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('img/' . $item['gambar_berita']) ?>" class="card-img-top" alt="Gambar Berita">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['judul_berita'] ?></h5>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('/admin/v_berita/' . $item['id']) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <h2>Event</h2>
    <div class="row">
        <?php foreach ($lomba as $key => $item) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('img-event/' . $item['gambar']) ?>" class="card-img-top" alt="Gambar">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['judul'] ?></h5>
                        <p class="card-text">Tanggal: <?= $item['tanggal'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('/admin/v_event/' . $item['id']) ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <h2>Komunitas</h2>
    <div class="row">
        <?php foreach ($komunitas as $key => $item) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nama_komunitas'] ?></h5>
                        <p class="card-text"><?= $item['status'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('/admin/v_komunitas/' . $item['id']) ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>
