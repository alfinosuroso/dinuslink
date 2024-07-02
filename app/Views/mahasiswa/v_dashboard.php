<?= $this->extend('/mahasiswa/layout') ?>
<?= $this->section('content') ?>
<!-- Our Services -->
<section class="service" id="service">
    <div class="container">
        <div class="_section-wrapper">
            <h2 class="section-title black">
                LAYANAN KAMI
            </h2> <!-- /.section-title -->
            <div class="underline blue"></div>
            <div class="row">
                <div class="">
                    <img src="Sight/assets/images/service.png" alt="service" class="service-img img-responsive">
                </div>
                <div class="col-md-offset-4 col-md-8 col-sm-12 services">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    PENYESUAIAN PARTNER
                                </h3>
                                <p class="section-item-detail">
                                    Menemukan partner menyesuaikan bakat, minat, atau kebutuhan untuk perlombaanmu.
                                </p>
                            </div> <!-- /.service-item -->
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    EVENT KEDEPANNYA
                                </h3>
                                <p class="section-item-detail">
                                    Lihat dan buat event untuk akses yang lebih mudah bagi seluruh mahasiswa.
                                </p>
                            </div> <!-- /.service-item -->
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    Komunitas terpercaya
                                </h3>
                                <p class="section-item-detail">
                                    Gabung pada komunitas yang kalian inginkan atau buat sendiri komunitasmu! 
                            </div> <!-- /.service-item -->
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    UDINUS only
                                </h3>
                                <p class="section-item-detail">
                                    Dikhususkan untuk anak UDINUS yang berfokus pada perlombaan dan minat yang diinginkan.
                                </p>
                            </div> <!-- /.service-item -->
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    Berita Terbaru
                                </h3>
                                <p class="section-item-detail">
                                   Temukan berita terbaru mengenai penghargaan dan kejuaraan dari mahasiswa UDINUS
                                </p>
                            </div> <!-- /.service-item -->
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="service-item">
                                <h3 class="section-item-title">
                                    GRATIS
                                </h3>
                                <p class="section-item-detail">
                                    Daftar gratis untuk menjadi partner dengan klik sign in!
                                </p>
                            </div> <!-- /.service-item -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.section-wrapper -->
    </div> <!-- /.container -->
</section> <!-- /.service -->

<?= $this->include('/mahasiswa/components/portfolio_partner') ?>

<!-- Quote -->
<section class="note blue">
    <div class="container section-wrapper text-center">
        <p class="quote">
            “Kemenangan akhir dalam persaingan berasal dari kepuasan batin karena mengetahui bahwa Kamu telah melakukan yang terbaik dan mendapatkan hasil maksimal dari apa yang telah Kamu berikan.”
        </p> <!-- /.quote -->
        <div class="quoter">Howard Cosell</div>
    </div> <!-- /.container -->
</section> <!-- /.note -->
<?= $this->endSection() ?>