<?php
require APPROOT . '/views/includes/header.php';

?>

<form action="<?= URLROOT; ?>Locations/create" method="post">
    <table>
        <tbody>
        <tr>
                <td>

                    <!-- <input class="form-control" type="hidden" name="Id" id="Id" value="<?= $data['Id']; ?>"> -->
                
                </td>
            </tr>
            <tr>
                <td>

                    <input class="form-control" type="hidden" name="Id" id="Id" value="<?= $data['Id']; ?>">
                    <div class="errorForm"><?= $data['StraatError']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-label" for="Straat">Wijzigen van straat en huisnummer</label>
                    <input class="form-control" type="text" name="Straat" id="Straat" value="<?= $data['Straat']; ?>">
                    <div class="errorForm"><?= $data['StraatError']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-label" for="Woonplaats">Woonplaats veranderen</label>
                    <input class="form-control" type="text" name="Woonplaats" id="Woonplaats" value="<?= $data['Woonplaats']; ?>">
                    <div class="errorForm"><?= $data['WoonplaatsError']; ?></div>
                </td>
            </tr>
            <tr>
        <td>
          <input type="submit" value="Submit">
        </td>
      </tr>
        </tbody>
    </table>
    <?php
    require APPROOT . '/views/includes/footer.php';
    ?>