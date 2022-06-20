<h3><?= $data["title"]; ?></h3>
<!-- Form for signing up for a lessonpackage -->
<form action="" method="POST">
  <label>First Name</label>
  <input type="text" placeholder="Enter first name" name="firstname" required>
  <span><?= $data['formvalues']->x; ?></span>
  <br>
  <label>Infix</label>
  <input type="text" placeholder="Enter infix" name="infix">
  <span><?= $data['formvalues']->infixError; ?></span>
  <br>
  <label>Last name</label>
  <input type="text" placeholder="Enter last name" name="lastname" required>
  <span><?= $data['formvalues']->lastnameError; ?></span>
  <br>
  <label>Email address</label>
  <input type="email" placeholder="Enter email" name="email" required>
  <span><?= $data['formvalues']->emailError; ?></span>
  <br>
  <label>Lesson package</label>
  <select name="lessonpackage">
    <!-- Echo packageoptions variable given with the Visitors controller -->
    <?= $data["packageoptions"]; ?>
  </select>
  <span><?= $data['formvalues']->lessonpackageError; ?></span>
  <br>
  <button type="submit" value="submit">Submit</button>
</form>
<a href="<?= URLROOT; ?>/homepages/index">Back to homepage index</a>

<?php var_dump($data); ?>