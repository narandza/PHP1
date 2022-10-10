<?php
    include "../include/functions.php";
 header("Content-type: application/json");
 if(isset($_GET['id'])){
    include '../include/session.php';
    require_once "../config/connection.php";
    global $conn;
    try{
        $id = $_GET['id'];
        if($id == 1){
            $_SESSION['ErrorMessage'] = "Can't delete this admin";
            RedirectTo('../admins.php');
        }
        else{
           $query = "DELETE FROM users WHERE id = :id";
           $prepare = $conn->prepare($query);
           $prepare->bindParam(":id",$id);
           $execute = $prepare->execute();
           if($execute){
            $_SESSION['SuccessMessage'] = "Admin deleted.";
            RedirectTo('../admins.php');
           }
        }
    }
    catch(PDOExeption $ex){
        $_SESSION['ErrorMessage'] = "Something Went Wrong".$ex;
        http_response_code(500);
    }
 }
 else{
    RedirectTo('../admins.php');
    http_response_code(404);
 }