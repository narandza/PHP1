<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_GET['id'])){
    global $conn;
    $id = $_GET['id'];
    $query="DELETE FROM categories WHERE id = :id";
    $prepare = $conn->prepare($query);
    $prepare->bindParam(":id",$id);
    $execute=$prepare->execute();
    if($execute){
        $_SESSION["SuccessMessage"] = "Category Deleted";
        RedirectTo("../categories.php");
    }else{
        $_SESSION["ErrorMessage"] = "Something went wrong.Try Again";
        RedirectTo("../categories.php");
    }
}
?>