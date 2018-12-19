<?php 

$subtotal = $_GET["subtotal"];

session_start();

$_SESSION["subtotal"] = $subtotal;

var_dump($_SESSION);
