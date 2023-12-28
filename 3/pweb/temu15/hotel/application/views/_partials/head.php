<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tabel7 as $tl7) : ?>
    <title><?= $title ?> - <?= $tl7->nama ?> <?= $this->session->userdata('level') ?></title>

    <!-- menampilkan favicon -->
    <link rel="icon" href="img/<?= $tl7->favicon ?>" type="image/gif">

  <?php endforeach; ?>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">

  <!-- css untuk datatables bertema bootstrap -->
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">

  <!-- Add Intro.js CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/introjs.min.css">

  <!-- css pribadi -->
  <link rel="stylesheet" href="css/style.css">
</head>