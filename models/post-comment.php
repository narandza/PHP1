<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_POST['Submit'])){
    $id = $_GET['id'];
    $Name =$_SESSION['userName'];
    $Comment = $_POST['Comment'];
    if(empty($Comment)){
        $_SESSION['ErrorMessage'] = "All fields are required";
    }
    elseif(strlen($Comment)>100){
        $_SESSION['ErrorMessage']= 'Max comment lenght is 500 characters';
    }
else{
    global $conn;
    $query = "INSERT INTO comment(name,comment,status_id,post_id)
    VALUES ( :name, :comment ,0 ,:post_id)";
    $prepare = $conn->prepare($query);
    $prepare->bindParam(":name",$Name);
    $prepare->bindParam(":comment",$Comment);
    $prepare->bindParam(":post_id",$id);
    $execute=$prepare->execute();
    if($execute){
        $_SESSION['SuccessMessage'] = "Comment added succesfully";
        RedirectTo('../full-post.php?id='.$id);
    }
    else{
        $_SESSION['ErrorMessage'] = "Comment failed to Add";
        RedirectTo('../full-post.php?id='.$id);
    }
}


    }
    
?>
