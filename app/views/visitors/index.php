<h3><?= $data["title"]; ?></h3>
<!-- Form for signing up for a lessonpackage -->
<form action="#" method="POST">
  <label>First Name</label>
  <input type="text" placeholder="Enter first name" name="firstname" required>
  <br>
  <label>Infix</label>
  <input type="text" placeholder="Enter infix" name="infix" required>
  <br>
  <label>Last name</label>
  <input type="text" placeholder="Enter last name" name="lastname" required>
  <br>
  <label>Email address</label>
  <input type="email" placeholder="Enter email" name="email" required>
  <br>
  <label>Lesson package</label>
  <select name="lessonpackage">
    <!-- Echo packageoptions variable given with the Visitors controller -->
    <?= $data["packageoptions"]; ?>
  </select>
  <br>
  <button type="submit" value="submit">Submit</button>
</form>