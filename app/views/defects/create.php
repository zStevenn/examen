<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>

<form action="<?= URLROOT; ?>/defects/create" method="post">
  <table>
    <tbody>
      <tr>        
        <td>
          <label class= "form-label" for="Kenteken">Kenteken</label>
          <input class="form-control" type="text" name="Kenteken" id="Kenteken" value="<?= $data['Kenteken']; ?>">
          <div class="errorForm"><?= $data['KentekenError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label class= "form-label" for="Mankement">Mankement</label>
          <input class="form-control" type="text" name="Mankement" id="Mankement" value="<?= $data['Mankement']; ?>">
          <div class="errorForm"><?= $data['MankementError']; ?></div>
        </td>
      </tr>
        <td>
          <input type="submit" value="Verzenden">
        </td>
      </tr>
    </tbody>
  </table>

</form>

<?php
  require APPROOT . '/views/includes/footer.php';
?>