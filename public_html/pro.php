<?php



    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
    }
        $sql = "INSERT INTO project (title, description, price)
            VALUES ('$title', '$description', '$price')";
            
        if ($conn->query($sql)===TRUE){
            echo "$lastName";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
?>