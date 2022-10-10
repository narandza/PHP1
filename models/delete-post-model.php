<?php
include '../include/session.php';
require_once "../config/connection.php";
include "../include/functions.php";
if(isset($_POST['Submit'])){
        global $conn;
        $id = $_GET['id'];
        echo $id;
        $query = "DELETE FROM post WHERE id = :id";
        $prepare=$conn->prepare($query);
        $prepare->bindParam(":id",$id);
        $exec=$prepare->execute();
        $_SESSION['SuccessMessage'] = "Post deleted succesfully";
        header("Location: ../dashboard.php");
}
