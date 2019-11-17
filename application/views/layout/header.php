<?php $site = $this->pengaturan_model->get_all(); ?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <title><?= $site->judul ?></title>
    <!--meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ClassWork Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
      SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
      addEventListener("load", function () {
      	setTimeout(hideURLbar, 0);
      }, false);
      
      function hideURLbar() {
      	window.scrollTo(0, 1);
      }
    </script>
    <!--//meta tags ends here-->
    <!--booststrap-->
    <link href="<?= base_url('assets/template/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <link rel="icon" href="<?= base_url('assets/admin/foto/'.$site->icon); ?>" type="image/png">
    <!-- font-awesome icons -->
    <link href="<?= base_url('assets/template/') ?>css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
    <!-- //font-awesome icons -->
    <link href="<?= base_url('assets/template/') ?>css/blast.min.css" rel="stylesheet" />
    <link rel="<?= base_url('assets/template/') ?>stylesheet" type="text/css" href="css/style10.css" />
    <!--stylesheets-->
    <link href="<?= base_url('assets/template/') ?>css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Merriweather:300,400,700,900" rel="stylesheet">
  </head>