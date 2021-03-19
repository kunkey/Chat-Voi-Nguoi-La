<?php
error_reporting(1);
require 'Core.php';

use Core\System;

$kun = new System;
$user = $kun->user();

if(empty($_SESSION['token'])) header('Location: signin.html'); else require 'pages/main.php';