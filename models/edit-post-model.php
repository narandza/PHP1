<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_POST['Submit'])){
    $id = $_GET['id'];
    $Title =$_POST['PostTitle'];
    $CategoryID  = $_POST['CategorySelect'];
    $Post = $_POST['PostText'];
    $admin = "Dimitrije Jovanovic";
    $Image = $_FILES['PostImage']['name'];
    $Target ="../upload/".basename($_FILES['PostImage']['name']);
    if(empty($Title)){
        $_SESSION['ErrorMessage'] = "Title cant be empty";
        RedirectTo('../edit-post.php?edit=$id');
        exit;
    }
    elseif(strlen($Title)<2){
        $_SESSION['ErrorMessage']= 'Title should be atleast 2 charaters';
        RedirectTo('../edit-post.php?edit='.$id);
        exit;
    }
    elseif(strlen($Title)>100){
        $_SESSION['ErrorMessage']= 'Title too long';
        RedirectTo('../edit-post.php?edit='.$id);
        exit;
    }
    elseif($CategoryID==0){
        $_SESSION['ErrorMessage']= 'Must select a category';
        RedirectTo('../edit-post.php?edit='.$id);
        exit;
    }
    elseif(strlen($Post)<1){
        $_SESSION['ErrorMessage']= 'Post can\'t be empty' ;
        RedirectTo('../edit-post.php?edit='.$id);
        exit;
    }
    else{
        global $conn;
        $query = "UPDATE post SET title = :title , category_id = :category_id ,author = :author, image = :image, post = :post 
        WHERE id = :id ";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":title",$Title);
        $prepare->bindParam(":category_id",$CategoryID);
        $prepare->bindParam(":author",$admin);
        $prepare->bindParam(":image",$Image);
        $prepare->bindParam(":post",$Post);
        $prepare->bindParam(":id",$id);
        $execute=$prepare->execute();
        move_uploaded_file($_FILES["PostImage"]['tmp_name'],$Target);
        if($execute){
            $_SESSION['SuccessMessage'] = "Post edited  succesfully";
            RedirectTo('../dashboard.php');
        }
        else{
            $_SESSION['ErrorMessage'] = "Post failed to Edit";
            RedirectTo('../dashboard.php');
        }
    }
}

?>
