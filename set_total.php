<?php

session_start();

$total = (float) $_GET["total"];

$_SESSION["jmlTotal"] = $total;

