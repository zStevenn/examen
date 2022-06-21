<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<table class = "table">
  <thead>
    <th>studentname</th>
    <th>instructorname</th>
    <th>streetname</th>
    <th>lessondate</th>
    <th>studentemail</th>
    <th>instructoremail</th>
  </thead>
  <tbody>
    <?=$data['ActiveStudents']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index" class="btn btn-danger">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';

