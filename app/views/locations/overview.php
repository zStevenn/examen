<?php
  require APPROOT . '/views/includes/header.php';

?>
  <div class="card-body">
  <table class="table table-hover table-striped">
        <thead>
          <tr>
            
            <th scope="col">ID</th>
            <th scope="col">Straat</th>
            <th scope="col">Woonplaats</th>
          </tr>
        </thead>
        <tbody>
        <?php echo $data['location'];

        ?>
        </tbody>
      </table>




<?php
    require APPROOT . '/views/includes/footer.php';
    ?>