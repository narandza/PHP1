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
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $email = $_POST['Email'];
        $password_confirm = $_POST['ConfirmPassword'];

        if(empty($username)||empty($password)||empty($password)){
            $_SESSION['ErrorMessage'] = "All fields must be filled out";
            RedirectTo('../admins.php');
            exit;
        }
        elseif($password != $password_confirm){
            $_SESSION['ErrorMessage']= 'Password does not match with one in confirm column';
            RedirectTo('../admins.php');
        }
        else{
            $passencode = md5($password);
            $execute = addAdmin($username,$passencode,$firstName,$lastName,$email);
            if($execute){
                $_SESSION['SuccessMessage'] = "New Admin Added ";
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