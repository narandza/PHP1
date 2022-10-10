<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include '../include/session.php';
    require_once "../config/connection.php";
    include "../include/functions.php";
    global $conn;
    try{
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $email = $_POST['Email'];
        $password_confirm = $_POST['cPassword'];

        if(empty($username)||empty($password)||empty($password)||empty($email)){
            $_SESSION['ErrorMessage'] = "All fields must be filled out";
            RedirectTo('../registration.php');
            exit;
        }
        elseif($password != $password_confirm){
            $_SESSION['ErrorMessage']= 'Password does not match with one in confirm column';
            RedirectTo('../registration.php');
        }
        else{

            $existsUsername = checkUser("username",$username);
            if($existsUsername){
                $_SESSION['ErrorMessage']= 'Username taken.';
                RedirectTo('../registration.php');
                exit;
            }
            $existsEmail = checkUser("email", $email);
            if($existsEmail){
                $_SESSION['ErrorMessage']= 'User with this email alrady exists';
                RedirectTo('../registration.php');
                exit;
            }
            $passencode = md5($password);
            $execute = newUser($username,$passencode,$firstName,$lastName,$email);
            if($execute){
                $_SESSION['SuccessMessage'] = "Successfull registration! Now log in!";
                RedirectTo('../login.php');
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