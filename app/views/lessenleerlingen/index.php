<?php
require APPROOT . '/views/includes/header.php';
?>
    <table>
        <thead>
        <th>Les nummer</th>
        <th>datum</th>
        <th>Instructeur naam</th>
        <th>Opmerking inzien</th>
        <th>Onderwerp inzien</th>
        </thead>
        <tbody>
        <?=$data['row']?>
        </tbody>
    </table>
    <a href="<?=URLROOT;?>/homepages/index">terug</a>


<?php
require APPROOT . '/views/includes/footer.php';
?>
