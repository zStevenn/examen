<?php
require APPROOT . '/views/includes/header.php';
//var_dump($data);exit();
?>
<div class="container-fluid">
    <?php echo $data["title"];?>
<table class = "table">
    <thead>
    <th scope="col">E-mail</th>
    <th scope="col">First name</th>
    <th scope="col">Last name</th>
    <th scope="col">Phone number</th>
    <th scope="col">Address</th>
    <th scope="col">License plate</th>
    <th scope="col">Car Brand</th>
    <th scope="col">Car model</th>
    <th scope="col">Electric</th>
    </thead>
<!--    Loads the data from the controller and puts it in a table body-->
    <tbody>
    <?=$data['instructors']?>
    </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index" class="btn">terug</a>
</div>