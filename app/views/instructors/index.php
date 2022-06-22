<?php
require APPROOT . '/views/includes/header.php';
// echo $data["title"];
?>
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?= $data["scheduleinfo"] ?>
      </div>
    </div>
  </div>
</div>
<ul>
  <li><a href="<?= URLROOT; ?>/homepages/index">Back to home menu</a><br></li>
</ul>