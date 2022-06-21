<?php
require APPROOT . '/views/includes/header.php';
//var_dump($data);exit();
?>
<div class="container-fluid">
    <?php echo $data["title"];?>
    <table class = "table">
        <thead>
        <th scope="col">License Plate</th>
        <th scope="col">Type</th>
        <th scope="col">Date</th>
        <th scope="col">Mileage</th>
        </thead>
        <!--    Loads the data from the controller and puts it in a table body-->
        <tbody>
        <?=$data['Mileage']?>
        </tbody>
    </table>
    <a href="<?=URLROOT;?>/homepages/index" class="btn">terug</a>
</div>