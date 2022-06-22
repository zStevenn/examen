<?php
require APPROOT . '/views/includes/header.php';
// echo $data["title"];
?>
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-5">
        <?=
        $data["subjectTable"];
        $data["error"]; ?>
      </div>
      <div class="row">
        <!-- Form to create a new subject -->
        <form action="<?= $data["subjecturl"] ?>" method="post">
          <input type="text" name="subject" placeholder="Enter new subject here">
          <input type="hidden" name="id" value="<?= $data["id"]; ?>">
          <button type="submit">Submit subject</button>
        </form>
      </div>
    </div>
  </div>
</div>
<ul>
  <li><a href="<?= URLROOT; ?>/instructors/index">Back to lesson overview</a><br></li>
</ul>