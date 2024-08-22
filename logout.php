<?php
session_start();
require 'classes/Auth.php';

Auth::logout();
header('Location: login.php');
exit();
?>
