<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<table class = "table">
  <thead>
    <th>Kenteken</th>
    <th>Model</th>
    <th>Add Defect</th>

  </thead>
  <tbody>
    <?=$data['Defects']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index" class="btn btn-danger">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';

