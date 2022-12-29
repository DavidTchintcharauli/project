<?php

    $servername = "localhost";
    $username = "";
    $password = '';
    $dbname = "";

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
    $sql = "INSERT INTO project(title, price)
        VALUES ('$title', '$price')";
        
    if ($conn->query($sql)===TRUE){
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>