<?php 
session_start(); 
include "db.php";
if (isset($_POST['userName']) && isset($_POST['pass'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $userName = validate($_POST['userName']);
    $pass = validate($_POST['pass']);
    if (empty($userName)) {
        header("Location: home.html?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: home.html?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM registration WHERE userName='$userName' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['userName'] === $userName && $row['password'] === $pass) {
                
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }else{
                header("Location:auth.html?error=Incorrect User name or password");
                exit();
            }
        }else{
            header("Location: auth.html?error=Incorrect User name or password");
            exit();
        }
    }
}else{
    header("Location:auth.html");
    exit();
}