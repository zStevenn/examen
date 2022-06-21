
<form method="POST"
      action="<?php echo URLROOT; ?>/CallSicknes/index">
    <label>E-mail</label>
    <select name="email">
        <option value="a@a.nl">a</option>
        <option value="f@f.nl">f </option>
        <option value="c@c.nl">c </option>
        <option value="s@s.nl">s </option>
        <option value="v@v.nl">v </option>
    </select>
    <br><br>

    <label>Reason</label>
    <input type="text" name="reason" placeholder="Type reason">
    <br><br>

    <!--Button-->
    <button id="submit" type="submit" value="submit">Invoegen</button>
</form>