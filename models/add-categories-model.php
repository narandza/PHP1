<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_POST['Submit'])){
    $Category =$_POST['Category'];
    $admin = $_SESSION['userName'];
    if(empty($Category)){
        $_SESSION['ErrorMessage'] = "All fields must be filled out";
        RedirectTo('../categories.php');
        exit;
    }
    elseif(strlen($Category)>99){
        $_SESSION['ErrorMessage']= 'Too long name for Category';
        RedirectTo('../categories.php');
    }
    else{
        global $conn;
        $query = "INSERT INTO categories(name,creator)
        VALUES ( :name, :creator)";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":name",$Category);
        $prepare->bindParam(":creator",$admin);
        $execute=$prepare->execute();
        if($execute){
            $_SESSION['SuccessMessage'] = "Category added  succesfully";
            RedirectTo('../categories.php');
        }
        else{
            $_SESSION['ErrorMessage'] = "Category failed to Add";
            RedirectTo('../categories.php');
        }
    }
}
?>