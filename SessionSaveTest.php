<?php
/**
 * Created by PhpStorm.
 * User: gcedarblade
 * Date: 6/23/2017
 * Time: 11:39 AM
 */
session_start();

$_POST['myData'];

$_SESSION['savedDrugs'] = $_POST['myData'];

var_dump($_POST)

?>