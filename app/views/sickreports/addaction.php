<?php
include APPROOT . '/views/includes/header.php';
?>
<div class="container">
    <form action="<?= URLROOT ?>/sickreports/addAction" method="post">
        <table>
            <body>
            <tr>
                <td>
                    <label class= "form-label" for="action">Add action</label>
                    <input class="form-control" type="text" name="action" id="action" value="<?= $data["action"]; ?>">
                    <div class="errorForm"><?= $data['actionError']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="intructor" value="<?= $data["intructor"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?= URLROOT ?>/sickreports/index" class="btn">Cancel</a>

                    <input class="btn" type="submit" value="Add action">
                </td>
            </tr>
            </body>
        </table>
    </form>
</div>