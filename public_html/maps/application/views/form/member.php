<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Member</h1>
    <form action="<?= site_url('form/showCommunity') ?>" method="post">
        name : <input type="text" name="user">
        <br>
        pass : <input type="text" name="pass">
        <br>
        email : <input type="text" name="email">
        <br>
        name : <input type="text" name="name">
        <br>
        lastname : <input type="text" name="last_name">
        <br>
        <button type="submit">SAVE</button>
    </form>
</body>

</html>