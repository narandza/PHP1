<?php include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
$Questions = fetchAll("quiz_questions");
if(isset($_POST['Submit'])){
    
    $a = $_POST['rb1'];
    echo $a;
}
?>