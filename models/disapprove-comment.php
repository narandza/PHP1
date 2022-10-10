<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query="UPDATE comment SET status_id = 0 WHERE id = :id";
    $prepare = $conn->prepare($query);
    $prepare->bindParam(":id",$id);
    $execute=$prepare->execute();
    if($execute){
        $_SESSION["SuccessMessage"] = "Comment Dissapproved";
        RedirectTo("../comments.php");
    }else{
        $_SESSION["ErrorMessage"] = "Something went wrong.Try Again";
        RedirectTo("../comments.php");
    }

}
?>