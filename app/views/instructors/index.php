<?php
require APPROOT . '/views/includes/header.php';
echo $data["title"];
//var_dump($data);exit();
?>
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
    <tbody>
    <?=$data['instructors']?>
    </tbody>
</table>
