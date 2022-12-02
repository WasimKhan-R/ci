<?php
if (session()->get("success")) {
    ?>
<p>
    <?php echo session()->get("success"); ?>
</p>
<?php
}

if (session()->get("error")) {
?>
<p>
    <?php echo session()->get("error"); ?>
</p>
<?php
}
?>

<form action="<?php echo site_url('form-save'); ?>" method="post">

    <p>Name :- <input type="text" placeholder="Enter your name" name="text_name"></p>
    <p>Age :- <input type="text" placeholder="Enter your age" name="text_age"></p>
    <p>Phone Number :- <input type="text" placeholder="Enter your phone number" name="text_number"></p>
    <p><button type="submit">SUBMIT</button></p>
</form>