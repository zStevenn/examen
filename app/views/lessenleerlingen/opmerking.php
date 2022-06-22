<?php
require APPROOT . '/views/includes/header.php';
?>
<table>
    <thead>
    <th>opmerking</th>
    </thead>
    <tbody>
    <?=$data['row']?>
    </tbody>
</table>
<a href="<?=URLROOT;?>/lessenleerlingen/index">terug</a>


<?php
require APPROOT . '/views/includes/footer.php';
?>
