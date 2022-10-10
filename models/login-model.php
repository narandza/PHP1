<?php
 header("Content-type: application/json");
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include '../include/session.php';
    require_once "../config/connection.php";
    include "../include/functions.php";
    global $conn;
    try{
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $passencode = md5($password);

        $execute = login($username,$passencode);
        if($execute){
            $user = fetchUser($username);
            if($user->role_id==1){
                $_SESSION["userRole"] = $user->role_id;
                $_SESSION["userName"] = $user->first_name;
                $_SESSION['SuccessMessage'] = "Welcome ".$_SESSION["userName"];
                RedirectTo("../dashboard.php");
            }
            else if($user->role_id==2){
                $_SESSION["userRole"] = $user->role_id;
                $_SESSION["userName"] = $user->first_name;
                RedirectTo("../blog.php");
            }
        }
    }
        catch(PDOExeption $ex){
            $_SESSION['ErrorMessage'] = "Something Went Wrong";
            http_response_code(500);
        }
    }
 else{
    RedirectTo('../login.php');
    http_response_code(404);
 }