<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";

$_SESSION["userRole"] = null;
session_destroy();
RedirectTo("../login.php")

?>