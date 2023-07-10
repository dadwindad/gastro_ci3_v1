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
    <h1>Login</h1>
    <form action="<?= site_url('register/showLogin') ?>" method="post">
        Login : <input type="text" name="user">
        <br>
        Pass : <input type="pass" name="pass">
        <button type="submit">Login</button>
    </form>
</body>

</html>