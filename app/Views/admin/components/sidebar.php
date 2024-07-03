<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'admin') ? "" : "collapsed" ?>" href="admin">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'beritaadm') ? "" : "collapsed" ?>" href="beritaadm">
                <i class="bi-book-half"></i>
                <span>Berita</span>
            </a>
        </li><!-- End Berita Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'eventadm') ? "" : "collapsed" ?>" href="eventadm">
                <i class="bi-calendar-check"></i>
                <span>Event</span>
            </a>
        </li><!-- End Event Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'verifeventadm') ? "" : "collapsed" ?>" href="verifeventadm">
                <i class="bi bi-check-lg"></i>
                <span>Verifikasi Event</span>
            </a>
        </li><!-- End Verifikasi Event Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'komunitasadm') ? "" : "collapsed" ?>" href="#">
                <i class="bi-chat-quote"></i>
                <span>Komunitas</span>
            </a>
        </li><!-- End Komunitas Nav -->

    </ul>

</aside><!-- End Sidebar-->
