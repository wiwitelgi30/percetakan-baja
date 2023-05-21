<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= base_url('assets/pelanggan/img/apple-icon.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/pelanggan/img/favicon.ico'); ?> ">

    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/templatemo.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/custom.css'); ?>">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?= base_url('assets/pelanggan/css/fontawesome.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php $this->load->view('pelanggan/layouts/navbar');?>
    <?php $this->load->view('pelanggan/layouts/header');?>
    <?php $this->load->view($content);?>
    <?php $this->load->view('pelanggan/layouts/footer');?>

    <!-- Start Script -->
    <script src="<?= base_url('assets/pelanggan/js/jquery-1.11.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/templatemo.js'); ?>"></script>
    <script src="<?= base_url('assets/pelanggan/js/custom.js'); ?>"></script>
    <!-- End Script -->
</body>

</html>