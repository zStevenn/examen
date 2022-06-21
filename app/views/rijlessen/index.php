<?php
require APPROOT . '/views/includes/header.php';
?>
    <table>
        <thead>
        <th>datum</th>
        <th>onderdeel</th>
        </thead>
        <tbody>
        <?=$data['row']?>
        </tbody>
    </table>
    <a href="<?=URLROOT;?>/homepages/index">terug</a>


<?php
require APPROOT . '/views/includes/footer.php';
?>