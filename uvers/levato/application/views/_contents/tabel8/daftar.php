<?php switch ($this->session->userdata($base_url . $tabel9_field6)) {
    // case $tabel9_field6_value3:
  case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel8_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl8 as $tl8) : ?>
        <tr>
          <td></td>
          <td><?= $tl8->$tabel8_field6 ?></td>
          <td>
            <a class="btn btn-light text-info" data-toggle="modal" data-target="#lihat<?= $tl8->$tabel8_field1 ?>" href="#">
              <i class="fas fa-eye"></i>
            </a>

            <?php foreach ($tbl5 as $tl5) : ?>
              <?php if ($tl8->$tabel8_field1 == $tl5->$tabel8_field1) { ?>
                <a class="btn btn-light text-info" data-toggle="modal" data-target="#<?= $tabel5 . $tl8->$tabel8_field1 ?>" href="#">
                  <i class="fas fa-bed"></i>
                </a>
                <?php break; } endforeach ?>

      
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>
