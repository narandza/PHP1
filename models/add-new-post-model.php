<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_POST['Submit'])){
    $Title =$_POST['PostTitle'];
    $CategoryID  = $_POST['CategorySelect'];
    $Post = $_POST['PostText'];
    $admin = $_SESSION['userName'];
    $Image = $_FILES['PostImage']['name'];
    $Target ="../upload/".basename($_FILES['PostImage']['name']);
    if(empty($Title)){
        $_SESSION['ErrorMessage'] = "Title cant be empty";
        RedirectTo('../add-new-post.php');
        exit;
    }
    elseif(strlen($Title)<2){
        $_SESSION['ErrorMessage']= 'Title should be atleast 2 charaters';
        RedirectTo('../add-new-post.php');
        exit;
    }
    elseif(strlen($Title)>100){
        $_SESSION['ErrorMessage']= 'Title too long';
        RedirectTo('../add-new-post.php');
        exit;
    }
    elseif($CategoryID==0){
        $_SESSION['ErrorMessage']= 'Must select a category';
        RedirectTo('../add-new-post.php');
        exit;
    }
    elseif(strlen($Post)<1){
        $_SESSION['ErrorMessage']= 'Post can\'t be empty' ;
        RedirectTo('../add-new-post.php');
        exit;
    }
    else{
        global $conn;
        $query = "INSERT INTO post(title,category_id,author,image,post)
        VALUES ( :title, :category_id, :author , :image , :post)";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":title",$Title);
        $prepare->bindParam(":category_id",$CategoryID);
        $prepare->bindParam(":author",$admin);
        $prepare->bindParam(":image",$Image);
        $prepare->bindParam(":post",$Post);
        $execute=$prepare->execute();
        move_uploaded_file($_FILES["PostImage"]['tmp_name'],$Target);
        if($execute){
            $_SESSION['SuccessMessage'] = "Post added  succesfully";
            RedirectTo('../add-new-post.php');
        }
        else{
            $_SESSION['ErrorMessage'] = "Post failed to Add";
            RedirectTo('../add-new-post.php');
        }
    }
}

?>
