<?php

    $servername = "localhost";
   
    $dbname = "id19159302_dbname";

    
    $username = "root";
    $password = "";
    

    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userEmail = $_POST['userEmail'];
    $birthDate = $_POST['birthDate'];
    $passWord = $_POST['password'];

    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
        $sql = "INSERT INTO registration(userName, firstName, lastName, userEmail, password )
            VALUES ('$userName', '$firstName', '$lastName', '$userEmail', '$passWord')";
            
        if ($conn->query($sql)===TRUE){
            echo "$lastName";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // $conn->close();
?>