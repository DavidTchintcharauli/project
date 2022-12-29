<?php

    $servername = "localhost";
    $username = "root";
   
    $password = '';
    $dbname = "";

    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userEmail = $_POST['userEmail'];
    $birthDate = $_POST['birthDate'];
    $passWord = $_POST['password'];
    $replayPassword = $_POST['replayPassword'];

    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
        $sql = "INSERT INTO registration(userName, firstName, lastName, userEmail, password, replayPassword)
            VALUES ('$userName', '$firstName', '$lastName', '$userEmail', '$passWord', '$replayPassword')";
            
        if ($conn->query($sql)===TRUE){
            echo "$lastName";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
?>