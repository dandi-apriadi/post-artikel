<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/dashboard/dist/css/adminlte.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dashboard/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/styles/dashboard.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/library/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/library/sweetalert/sweetalert2.min.css') ?>" />
  <link href="<?= base_url('assets/library/datatables/css/dataTables.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/library/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/library/lightbox/css/lightbox.css') ?>">
  <link href="<?= base_url('assets/library/chartjs/chart.min.css') ?>" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo_polimdo.png') ?>" />

  <!-- Javascript Files -->
  <script src="<?= base_url('assets/library/sweetalert/sweetalert2.all.min.js') ?>"></script>
  <script src="<?= base_url('assets/dashboard/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/library/chartjs/chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/javascript/function_all.js') ?>"></script>
  <script src="<?= base_url('assets/library/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/library/select2/js/select2.min.js') ?>"></script>

  <style type="text/css">
    .sidebar-dashboard{
      background-color: #2997ea;
      color: #ffffff;
    }

    .sidebar-dashboard .nav-link{
      color: #ffffff;
      transition: 0.8s;
    }

    .sidebar-dashboard .brand-link{
      color: #ffffff;
    }

    .sidebar-dashboard .info a{
      color: #ffffff;
    }

    .sidebar-dashboard .nav-link:hover{
      background-color: rgb(255, 255, 255);
    }

    .sidebar-dashboard .brand-link:hover{
      color: #fafafa;
    }

    .sidebar-dashboard .info a:hover{
      color: #fafafa;
    }
  </style>
</head>