<!-- Header -->
<section class=<?php echo (uri_string() == '') ? "header" : "portfolio-header" ?> id="header">

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">DINUS LINK</a>
            </div> <!-- /.navbar-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class=<?php echo (uri_string() == '') ? "active" : "" ?>><a href=".">Beranda</a></li>
                    <li class=<?php echo (uri_string() == 'partner') ? "active" : "" ?>><a href="partner">Partner</a></li>
                    <li class=<?php echo (uri_string() == 'event') ? "active" : "" ?>><a href="event">Event</a></li>
                    <li class=<?php echo (uri_string() == 'berita') ? "active" : "" ?>><a href="berita">Berita</a></li>
                    <li class=<?php echo (uri_string() == 'profil') ? "active" : "" ?>><a href="profil">Profil</a></li>
                </ul> <!-- /.nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <!-- Check if its beranda -->
    <?php
    if (uri_string() == '') {
    ?>
        <div class="container">
            <div class="header-table">
                <div class="header-wrapper">
                    <h1 class="header-title">
                        TEMUKAN PARTNER TERBAIKMU DISINI!
                    </h1>
                    <p class="header-subtitle">
                        SINCE 2024
                    </p>
                </div> <!-- /.header-wrapper -->
            </div>
        </div> <!-- /.container -->
    <?php
    }
    ?>

    <!-- Check if its partner -->
    <?php
    if (uri_string() == 'partner') {
    ?>
        <section class="section-background">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href=".">Beranda</a></li>
                    <li class="active">&nbsp;Partner</li>
                </ol>
            </div> <!-- /.container -->
        </section> <!-- /.section-background -->
    <?php
    }
    ?>

    <!-- Check if its event -->
    <?php
    if (uri_string() == 'event') {
    ?>
        <section class="section-background">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index-multipage.html">Beranda</a></li>
                    <li class="active">&nbsp;Event</li>
                </ol>
            </div> <!-- /.container -->
        </section> <!-- /.section-background -->
    <?php
    }
    ?>

    <!-- Check if its berita -->
    <?php
    if (uri_string() == 'berita') {
    ?>
        <section class="section-background">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index-multipage.html">Beranda</a></li>
                    <li class="active">&nbsp;Berita</li>
                </ol>
            </div> <!-- /.container -->
        </section> <!-- /.section-background -->
    <?php
    }
    ?>

    <!-- Check if its profil -->
    <?php
    if (uri_string() == 'profil') {
    ?>
        <section class="section-background">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index-multipage.html">Beranda</a></li>
                    <li class="active">&nbsp;Profil</li>
                </ol>
            </div> <!-- /.container -->
        </section> <!-- /.section-background -->
    <?php
    }
    ?>
</section> <!-- /#header -->