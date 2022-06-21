<?php
require APPROOT . '/views/includes/header.php';
echo $data["title"];
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <!-- Echo gemaakte tabel van instructeurs -->
      <h5>Instructors</h5>
      <?= $data["instructordata"]; ?>
    </div>
    <div class="col-6">
      <!-- Echo gemaakte tabel van beschikbare auto's -->
      <h5>Available Cars</h5>
      <?= $data["availablecars"]; ?>
    </div>
  </div>
</div>


<ul>
  <li><a href="<?= URLROOT; ?>/homepages/index">Back to homepage index</a></li>
</ul>