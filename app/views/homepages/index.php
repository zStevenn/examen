<?php
require APPROOT . '/views/includes/header.php';

?>
<div class="container">
<p><h3><?= $data["title"]; ?></h3></p>
<a href="<?=URLROOT;?>/instructors/index" class="btn">Instructors</a>
<a href="<?=URLROOT;?>/mileages/index" class="btn">Mileage</a>
<a href="<?=URLROOT;?>/sickreports/index" class="btn">Sick Reports</a>
</div>

