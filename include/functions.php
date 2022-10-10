<?php
    function RedirectTo($location){
        header("Location:".$location);
        exit;
    }

    function fetchAll($table){
        global $conn;
        $viewQuery = "SELECT * FROM $table";
        $prepare = $conn->prepare($viewQuery);
        $data= $prepare->execute();
        $data= $prepare->fetchAll();
        return $data;
    }

    function deleteData($tableName,$columnName,$equalsTo){
        global $conn;
        $query = 'DELETE FROM '.$tableName.' WHERE '.$columnName.' = :id';
        $delete = $conn->prepare($query);
        $delete->bindParam(":id",$equalsTo);
        $result = $delete->execute();
        return $result;
    }

    function fetchPostsByOrderDesc(){
        global $conn;
        $query = "SELECT * FROM post ORDER BY datetime DESC";
        $prepare = $conn->prepare($query);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;
    }
    function fetchPostsByOrderDescLimit($a ,$b){
        global $conn;
        $query = "SELECT * FROM post ORDER BY datetime DESC LIMIT $a,$b";
        $prepare = $conn->prepare($query);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;
    }
    function fetchWithId($table,$id){
        global $conn;
        $query = "SELECT * FROM $table WHERE id = :id";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":id",$id);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;
    }
    
    function search(){
        global $conn;
        if(isset($_GET['SearchButton'])){
            $search = $_GET['Search'];
            $query= "SELECT * from post p 
            INNER JOIN categories c 
            ON p.category_id = c.id 
            WHERE p.datetime LIKE '%$search%' 
            OR p.title LIKE '%$search%'
            OR c.name LIKE '%$search%' 
            OR p.post LIKE '%$search%' ORDER BY p.datetime DESC";
            $prepare=$conn->prepare($query);

            $data=$prepare->execute();
            $data= $prepare->fetchAll();
            return $data;
        }
        else{
            fetchPostsByOrderDescLimit(5);
        }
    }
    function fetchPostsByCategory($categoryName){
        global $conn;
        $query = "SELECT * FROM categories c INNER JOIN post p ON c.id = p.category_id WHERE c.name = :catName ORDER BY p.datetime DESC";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":catName", $categoryName);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;

    }
    function fetchCommentByPostId($id){
        global $conn;
        $query = "SELECT * FROM comment WHERE post_id = :id AND status_id=1";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":id",$id);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;
    }
    
    function fetchCommentsByOrderDesc(){
        global $conn;
        $query = "SELECT * FROM comment ORDER BY datetime DESC";
        $prepare = $conn->prepare($query);
        $data = $prepare->execute();
        $data = $prepare->fetchAll();
        return $data;
    } 

    function shortDisplay($string,$lenght){
        if(strlen($string)>$lenght){
            $string=substr($string,0,$lenght).'...';
            }
        return $string;
    }

    function fetchNumberOfComments($postID,$status){
        global $conn;
        $query = "SELECT COUNT(*) AS total FROM comment WHERE post_id=$postID AND status_id = $status";
        $prepare = $conn->prepare($query);
        $data=$prepare->execute();
        $data=$prepare->fetch();
        return $data;
    }

    function fetchUnaaprovedComments(){
        global $conn;
        $query = "SELECT COUNT(*) AS total FROM comment WHERE status_id = 0";
        $prepare = $conn->prepare($query);
        $data=$prepare->execute();
        $data=$prepare->fetch();
        return $data;
    }

    function addAdmin($username,$passencode,$firstName,$lastName,$email){
        global $conn;
        $query = "INSERT INTO users (username, password , first_name, last_name , email, role_id) VALUES ( :user , :pass, :firstName ,:lastName ,:email , 1)";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":user",$username);
        $prepare->bindParam(":pass",$passencode);
        $prepare->bindParam(":firstName",$firstName);
        $prepare->bindParam(":lastName",$lastName);
        $prepare->bindParam(":email",$email);
        $execute=$prepare->execute();
        return $execute;
    }

    function countPosts(){
        global $conn;
        $query = "SELECT COUNT(*) AS total FROM post";
        $prepare = $conn->prepare($query);
        $execute=$prepare->execute();
        $execute=$prepare->fetch();
        return $execute;
    }

    function displayPosts($noPosts){
        if(isset($_GET['SearchButton'])){
            $posts = search();
        }
        elseif(isset($_GET['category'])){
            $categoryName = $_GET['category'];
            $posts=fetchPostsByCategory($categoryName);
        }
        elseif(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page==0||$page<1){
                $showPost=0;
            }
            $showPost = ($page*5)-$noPosts;
            $posts = fetchPostsByOrderDescLimit($showPost,$noPosts);
        }
        else{
            $posts=fetchPostsByOrderDescLimit(0,$noPosts);
        }
        return $posts;
    }
    function checkUser($column,$value){
        global $conn;
        $query = "SELECT * FROM users WHERE $column  = :val";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":val",$value);
        $execute=$prepare->execute();
        $execute=$prepare->fetch();
        return($execute);
    }
    function newUser($username,$passencode,$firstName,$lastName,$email){
        global $conn;
        $query = "INSERT INTO users (username, password , first_name, last_name , email, role_id ) VALUES ( :user , :pass, :firstName ,:lastName ,:email , 2 )";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":user",$username);
        $prepare->bindParam(":pass",$passencode);
        $prepare->bindParam(":firstName",$firstName);
        $prepare->bindParam(":lastName",$lastName);
        $prepare->bindParam(":email",$email);
        $execute=$prepare->execute();
        return $execute;
    }

    function login($username, $pass){
        global $conn;
        $query = "SELECT * FROM users WHERE username = :user AND password = :pass";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":user",$username);
        $prepare->bindParam(":pass",$pass);
        $execute=$prepare->execute();
        return $execute;
    }

    function fetchUser($username){
        global $conn;
        $query = "SELECT * FROM users WHERE username = :user";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":user",$username);
        $execute=$prepare->execute();
        $execute=$prepare->fetch();
        return $execute;
    }
    function admin(){
        if(isset( $_SESSION["userRole"])){
            if( $_SESSION["userRole"] == 1)
            {
                return true;
            }
        }
    }

    function confirmAdmin(){
        if(!admin()){
            RedirectTo("blog.php");
        }
    }

    function fetchAnswers($id){
        global $conn;
        $query = "SELECT * FROM quiz_questions q INNER JOIN quiz_answeres a ON q.id = a.question_id
        WHERE a.question_id = :id";
        $prepare = $conn->prepare($query);
        $prepare->bindParam(":id",$id);
        $execute=$prepare->execute();
        $execute=$prepare->fetchAll();
        return $execute;
    }
?>