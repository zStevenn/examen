<?php
require APPROOT . '/views/includes/header.php';
// echo $data["title"];
?>
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-5">
        <?= $data["subjectTable"] ?>
      </div>
    </div>
  </div>
</div>
<ul>
  <li><a href="<?= URLROOT; ?>/instructors/index">Back to lesson overview</a><br></li>
</ul>