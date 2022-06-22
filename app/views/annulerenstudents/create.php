<?php
    require APPROOT . '/views/includes/header.php';
    echo $data['title']; 
?>

<form action="<?= URLROOT; ?>/annulerenstudents/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input class="form-control" type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-label" for="Reden">Reden</label>
                    <input class="form-control" type="text" name="Reden" id="Reden" value="<?= $data['Reden']; ?>">
                    <div class="errorForm"><?= $data['RedenError']; ?></div>
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