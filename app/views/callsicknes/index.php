
<form method="POST"
      action="<?php echo URLROOT; ?>/CallSicknes/index">
    <?php echo $data['emailError']; ?>

    <br>
    <label>E-mail</label>
    <input type="email" name="email" placeholder="Type E-mail">
    <br><br>


    <label>Reason</label>
    <input type="text" name="reason" placeholder="Type reason">
    <br><br>

    <!--Button-->
    <button id="submit" type="submit" value="submit">Invoegen</button>
</form>