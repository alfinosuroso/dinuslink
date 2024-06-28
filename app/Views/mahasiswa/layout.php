<?php
$hlm = "Beranda";
if (uri_string() != "") {
    $hlm = ucwords(uri_string());
}
?>

<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->

<head>
    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <title>DINUS LINK - <?php echo $hlm ?></title>

    <link rel="stylesheet" href="Sight/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Sight/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="Sight/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="Sight/assets/css/owl.theme.css">
    <link rel="stylesheet" href="Sight/assets/css/main.css">
    <?php
    if ($hlm == "Beranda") {
    ?>
        <link rel="stylesheet" href="Sight/assets/css/one-page.css">
    <?php
    }
    ?>
    <?php
    if ($hlm != "Beranda") {
    ?>
        <link rel="stylesheet" href="Sight/assets/css/section.css">
        <link rel="stylesheet" href="Sight/assets/css/about.css">
    <?php
    }
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
				<script src="assets/js/html5shiv.js"></script>
				<script src="assets/js/respond.js"></script>
			<![endif]-->

    <!--[if IE 8]>
		    	<script src="assets/js/selectivizr.js"></script>
		    <![endif]-->
</head>

<body>

    <?= $this->include('mahasiswa/components/header') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('mahasiswa/components/footer') ?>

    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/contact.js"></script>
    <!-- // <script src="assets/js/smoothscroll.js"></script> -->
    <script src="assets/js/script.js"></script>


</body>

</html>