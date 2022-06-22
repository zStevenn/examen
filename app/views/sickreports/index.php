<?php
require APPROOT . '/views/includes/header.php';
//var_dump($data);exit();
?>
<div class="container-fluid">
    <h3>Ziekmeldingen</h3>
    <table class = "table">
        <thead>
        <th scope="col">Name</th>
        <th scope="col">Phonenumber</th>
        <th scope="col">Email</th>
        <th scope="col">Data & Time</th>
        <th scope="col">Reason</th>
        <th scope="col">Better</th>
        <th scope="col">Add action</th>
        </thead>
        <!--    Loads the data from the controller and puts it in a table body-->
        <tbody>
        <?=$data['sickreports']?>
        </tbody>
    </table>
    <h3>New Ziekmeldingen</h3>
    <table class = "table">
        <thead>
        <th scope="col">Name</th>
        <th scope="col">Phonenumber</th>
        <th scope="col">Email</th>
        <th scope="col">Data & Time</th>
        <th scope="col">Reason</th>
        <th scope="col">Add action</th>
        </thead>
        <!--    Loads the data from the controller and puts it in a table body-->
        <tbody>
        <?=$data['newsickreports']?>
        </tbody>
    </table>
    <a href="<?=URLROOT;?>/homepages/index" class="btn">terug</a>
</div>
