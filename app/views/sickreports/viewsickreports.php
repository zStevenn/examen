<?php

require APPROOT . '/views/includes/header.php';
//var_dump($data);exit();
?>
<div class="container-fluid">
    <h3>Ziekmeldingen</h3>
    <table class="table">
        <thead>
        <th scope="col">Sick Report Nr</th>
        <th scope="col">Date</th>
        <th scope="col">action</th>
        </thead>
        <!--    Loads the data from the controller and puts it in a table body-->
        <tbody>
        <?= $data['viewsickreports'] ?>
        </tbody>
    </table>
    <a href="<?= URLROOT; ?>/sickreports/index" class="btn">terug</a>
</div>
