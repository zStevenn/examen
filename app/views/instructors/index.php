<?php
require APPROOT . '/views/includes/header.php';
echo $data["title"];
?>
<table>
    <thead>
    <th>E-mail</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Phone number</th>
    <th>Address</th>
    <th>License plate</th>
    <th>Car Brand</th>
    <th>Car model</th>
    <th>Electric</th>
    </thead>
    <tbody>
    <?=$data['instructors']?>
    </tbody>
</table>
