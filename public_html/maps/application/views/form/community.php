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
    <h1>form</h1>
    <form action="<?= site_url('form/showCommunity') ?>" method="post">
        name : <input type="text" name="name">
        <br>
        lname : <input type="text" name="lname">
        <br>
        <button type="submit">SAVE</button>
    </form>
</body>

</html>