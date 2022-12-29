<?php
    $servername = "localhost";
    $username = "root";

    $password = '';

    $dbname = "id19159302_dbname";

    //database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Check connection
    if (!$conn) {
        echo "Connection failed!";
    }
?>