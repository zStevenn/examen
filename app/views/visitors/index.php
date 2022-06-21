<h3><?= $data["title"]; ?></h3>
<!-- Form for signing up for a lessonpackage -->
<form action="" method="POST">
  <label>First Name</label>
  <input type="text" placeholder="Enter first name" name="firstname" value="<?= $data['firstname']; ?>" required>
  <span><?= $data['firstnameError']; ?></span>
  <br>
  <label>Infix</label>
  <input type="text" placeholder="Enter infix" name="infix" value="<?= $data['infix']; ?>">
  <span><?= $data['infixError']; ?></span>
  <br>
  <label>Last name</label>
  <input type="text" placeholder="Enter last name" name="lastname" value="<?= $data['lastname']; ?>" required>
  <span><?= $data['lastnameError']; ?></span>
  <br>
  <label>Email address</label>
  <input type="email" placeholder="Enter email" name="email" value="<?= $data['email']; ?>" required>
  <span><?= $data['emailError']; ?></span>
  <br>
  <label>Lesson package</label>
  <select name="lessonpackage">
    <!-- Echo packageoptions variable given with the Visitors controller -->
    <?= $data["packageoptions"]; ?>
  </select>
  <span><?= $data['lessonpackageError']; ?></span>
  <br>
  <button type="submit" value="submit">Submit</button>
</form>
<a href="<?= URLROOT; ?>/homepages/index">Back to homepage index</a>