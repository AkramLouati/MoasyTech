<?php

session_start();
$_SESSION["connectedUsername"] = null;

header('Location:  login.php');
