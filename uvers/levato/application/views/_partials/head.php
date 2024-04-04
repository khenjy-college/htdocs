<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tbl7 as $tl7) : ?>
    <title><?= $title ?> - <?= $tl7->$tabel7_field2 ?> - <?= $this->session->userdata($tabel9_field6) ?></title>

    <!-- menampilkan favicon -->
    <link rel="icon" href="img/<?= $tl7->$tabel7_field3 ?>" type="image/png">

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