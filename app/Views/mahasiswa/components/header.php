<!-- Header -->
<section class="header" id="header">

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
                <a class="navbar-brand" href="index-multipage.html">DINUS LINK</a>
            </div> <!-- /.navbar-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index-multipage.html">Beranda</a></li>
                    <li><a href="about.html">Partner</a></li>
                    <li><a href="service.html">Event</a></li>
                    <li><a href="portfolio.html">Berita</a></li>
                    <li><a href="contact.html">Profil</a></li>
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
</section> <!-- /#header -->