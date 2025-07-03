<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kicks Up <?php echo($titulo); ?></title>  
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->
    
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>"  rel="stylesheet" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/bootstrap-icons.css')?>"  rel="stylesheet" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">-->
    <!-- CSS de DataTables local -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap5.min.css') ?>">

    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/icons8-sneaker-60.png')?>">
    <link href="<?php echo base_url('assets/css/mi-estilo.css')?>" rel="stylesheet">

  </head>
  <body>
    <div class="text-center my-4">
      <a href="<?php echo base_url('/')?>">
        <img src="<?php echo base_url('assets/img/logo.png')?>" alt="Logo de Kicks Up" class="logo mb-3">
      </a>
    </div>
