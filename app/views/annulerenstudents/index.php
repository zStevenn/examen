<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<table class = "table">
  <thead>
    <th>date</th>
    <th>instructeurnaam</th>
    <th>status</th>
    <th>annuleerles</th>
  </thead>
  <tbody>
    <?=$data['AnnulerenStudents']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index" class="btn btn-danger">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';

