<?php  require APPROOT . '/views/includes/header.php';
var_dump($data)
?>
<li><a href="<?= URLROOT ?>/pages/index">Return</a></li>
<!-- A table to put the data in that comes from the controller ReadVehicles.php -->
<div class="card">
  <div class="card-body">
  <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Brand</th>
            <th scope="col">Type</th>
            <th scope="col">License plate</th>
            <th scope="col">Electric</th>
            <th scope="col">Instructor name</th>

          </tr>
        </thead>
        <tbody>
        <?php echo $data;
        
    
        ?>
        </tbody>
      </table>

  </div>
</div>



<?php   require APPROOT . '/views/includes/footer.php';?>