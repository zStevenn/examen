<?php
include APPROOT . '/views/includes/header.php';
    ?>
<div class="container">
<form action="<?= URLROOT ?>/mileages/update" method="post">
    <table>
        <body>
        <tr>
            <td>
                <label class= "form-label" for="mileage">New mileage</label>
                <input class="form-control" type="number" name="mileage" id="mileage" value="<?= $data["mileage"]; ?>">
                <div class="errorForm"><?= $data['mileageError']; ?></div>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="car" value="<?= $data["car"]; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input class="btn" type="submit" value="Verzenden">
            </td>
        </tr>
        </body>
    </table>
    <a href="<?= URLROOT ?>/mileages/index" class="btn">Terug</a>
</form>
</div>