<?php foreach ($tbl7 as $tl7): ?>
  <?php foreach ($tbl23 as $tl23):
  if ($tl7->$tabel7_field13 == $tl23->$tabel23_field1) { ?>
    <img src="img/tabel23/<?= $tl23->$tabel23_field4 ?>" class="img-fluid rounded">
    
    <h1 class="text-center"><?= $tabel23_alias ?> <?= $tl23->$tabel23_field2 ?></h1>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <p><?= nl2br($tl23->$tabel23_field3) ?></p>
      </div>
      
      <div class="col-md-6">
        <?php foreach ($dekor as $dk): ?>
          <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" class="img-fluid rounded">
          <?php endforeach ?>
    </div>
  </div>
  <?php } endforeach ?>
  
  <?php endforeach; ?>
