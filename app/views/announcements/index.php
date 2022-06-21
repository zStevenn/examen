<?php
  require APPROOT . '/views/includes/header.php';
 var_dump($data)
?>
<div class="row">
<div class="card col-6">
  <div class="card-body">
    Instructor
  <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Send Annoucement</th>
          </tr>
        </thead>
        <tbody>
        <?php echo $data["InstructorData"];
        
    
        ?>
        </tbody>
      </table>

  </div>
</div>
<div class="card col-6">
  Student
  <div class="card-body">
  <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Send Annoucement</th>
          </tr>
        </thead>
        <tbody>
        <?php echo $data["StudentData"];
        
    
        ?>
        </tbody>
      </table>

  </div>
</div>
</div>


<?php 
  require APPROOT . '/views/includes/footer.php';
?>
