<?php
  require APPROOT . '/views/includes/header.php';
var_dump($data)
?>

  <div class="card-body">
  <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Datum</th>
            <th scope="col">Woonplaats</th>
            <th scope="col">Straat</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
        <?php echo $data['alllessons'];

        ?>
        </tbody>
      </table>
     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ophaallocatie wijzigen
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Wijzige ophaalplek aankomende lessen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Datum</th>
            <th scope="col">Woonplaats</th>
            <th scope="col">Straat</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
        <?php echo $data['editlessons'];

        ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>


<?php 
  require APPROOT . '/views/includes/footer.php';
?>
