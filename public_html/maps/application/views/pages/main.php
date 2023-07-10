<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<body>
	<p id="fr">Hello Main</p>
	<a href="<?= site_url('map') ?>">map</a>
	<a href="<?= site_url('welcome') ?>">welcome</a>
	<a href="<?= site_url('form/community') ?>">form</a>
	<br>
	<img src="<?= base_url('img') ?>/berger.jpg" width="200" alt="">

</body>

</html>