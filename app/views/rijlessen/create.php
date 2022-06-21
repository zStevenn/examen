<!-- the title of the update-->
<?= $data['title'];?>
<!-- the form to get the controller in the view en use it to do the methods-->
<form action="<?= URLROOT; ?>/rijlessen/create" method="POST">
    <table>
        <tbody>
        <tr>
            <td>
                <input type="text" name="opm" id="name" value="">
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="les" value="<?=$data["row"]->ID;?>"
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="OK">
            </td>
        </tr>

        </tbody>
    </table>
</form>
