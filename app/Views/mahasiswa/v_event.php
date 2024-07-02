<?php

$desc = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor maxime, doloribus nam sunt nostrum voluptatibus dolorem atque omnis consequuntur, commodi quod veritatis, libero ipsum optio tenetur ex quis! Necessitatibus voluptate ipsa repellat sit, obcaecati quisquam praesentium. Odio adipisci a sed commodi est obcaecati, non, cupiditate totam eos numquam explicabo soluta quod? Eligendi quae perspiciatis voluptate, dicta ratione repudiandae numquam quos reprehenderit vel neque quo dignissimos amet facilis labore. Facere ullam blanditiis perferendis, animi reiciendis, molestiae delectus harum laborum officiis tenetur, expedita recusandae perspiciatis assumenda iusto! Consequatur minima possimus adipisci, corporis, ex odit vitae nostrum animi asperiores enim officia voluptatibus corrupti.";
?>

<?= $this->extend('/mahasiswa/layout') ?>
<?= $this->section('content') ?>

<section class="portfolio" id="portfolio">
    <div class="container section-wrapper">
        <!-- Event kedepan -->
        <h2 class="section-title black">
            Event
        </h2> <!-- /.section-title -->
        <div class="underline blue"></div>

        <!-- Search Form -->

        <div class="row">
            <div class="col-md-4">
                <div class="search">
                    <form method="get" action="<?php echo base_url('event'); ?>">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" name="search" placeholder="Cari event.." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?php foreach ($events as $index => $event) : ?>
                <div class="col-md-3">
                    <div class="portfolio-item">
                        <div class="portfolio-img">
                            <?php if ($event['gambar'] != '' and file_exists("img-event/" . $event['gambar'] . "")) : ?>
                                <img src="<?php echo base_url() . "img-event/" . $event['gambar'] ?>" class="port-item">
                            <?php endif; ?>
                            <div class="portfolio-img-hover">
                                <a href="<?php echo base_url('event/detail/' . $event['id']); ?>"><img src="<?php echo base_url() ?>Sight/assets/images/plus.png" alt="plus" class="plus"></a>
                            </div> <!-- /.portfolio-img-hover -->
                        </div> <!-- /.portfolio-img -->
                        <div class="portfolio-item-details">
                            <div class="portfolio-item-name-truncate">
                                <?php echo $event['judul'] ?><br>
                                <small><?php echo $event['deskripsi'] ?></small>
                            </div> <!-- /.portfolio-item-name-truncate -->
                            <p>
                                <strong>
                                    Dibuat oleh :
                                </strong>
                                <?php echo $event['nama'] ?>
                            </p>
                            <div class="port-heart">
                                <i class="ion-ios-calendar"></i> <strong> Tanggal event:
                                </strong>
                                <?php echo date("Y-m-d", strtotime($event['tanggal'])); ?>
                            </div> <!-- /.port-heart -->
                        </div> <!-- /.portfolio-item-details -->
                    </div> <!-- /.portfolio-item -->
                </div> <!-- /.col-md-4 -->
            <?php endforeach ?>
        </div> <!-- /.row -->

        <!-- Event mahasiswa -->
        <?php
        if (is_array($verifyEvent) && count($verifyEvent) > 0 && session('nama') != "") {
        ?>
            <h2 class="section-title black">
                Event Anda
            </h2> <!-- /.section-title -->
            <div class="underline blue"></div>
            <div class="row">
                <?php foreach ($verifyEvent as $index => $verify) : ?>
                    <?php if (session('nama') == $verify['nama']) {
                    ?>
                        <div class="col-md-3">
                            <div class="portfolio-item">
                                <div class="portfolio-img">
                                    <?php if ($verify['gambar'] != '' and file_exists("img-event/" . $verify['gambar'] . "")) : ?>
                                        <img src="<?php echo base_url() . "img-event/" . $verify['gambar'] ?>" class="port-item">
                                    <?php endif; ?>
                                    <div class="portfolio-img-hover">
                                        <a href="#"><img src="<?php echo base_url() ?>Sight/assets/images/plus.png" alt="plus" class="plus"></a>
                                    </div> <!-- /.portfolio-img-hover -->
                                </div> <!-- /.portfolio-img -->
                                <div class="portfolio-item-details">
                                    <div class="portfolio-item-name-truncate">
                                        <?php echo $verify['judul'] ?>
                                        <?php echo '(' . $verify['status'] . ')' ?>
                                        <br>
                                        <small><?php echo $verify['deskripsi'] ?></small>
                                    </div> <!-- /.portfolio-item-name-truncate -->
                                    <p>
                                        <strong>
                                            Dibuat oleh :
                                        </strong>
                                        <?php echo $verify['nama'] ?>
                                    </p>
                                    <div class="port-heart">
                                        <i class="ion-ios-calendar"></i> <strong> Tanggal event:
                                        </strong> <?php echo date("Y-m-d", strtotime($verify['tanggal'])); ?>
                                    </div> <!-- /.port-heart -->
                                </div> <!-- /.portfolio-item-details -->
                            </div> <!-- /.portfolio-item -->
                        </div> <!-- /.col-md-4 -->
                    <?php
                    }
                    ?>
                <?php endforeach ?>
            </div> <!-- /.row -->
        <?php
        }
        ?>
    </div> <!-- /.container -->
</section> <!-- /.portfolio -->

<a href=<?php echo (session('nama') == "" ? "/login" : "create-event") ?>>
    <button class='btn btn-sub-bottomright green-btn'><i class="fa fa-plus"></i>
        <?php
        echo (session('nama') == "" ? "Masuk untuk buat Event" : "Buat Event")
        ?>
    </button>
</a>


<?= $this->endSection() ?>