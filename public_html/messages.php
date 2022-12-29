<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>browse</title>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/responsive.css">
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="./styles/home_post.css">
    <link rel="stylesheet" href="./styles/body_style.css">
    <link rel="stylesheet" href="./styles/browse.css">
    <script src="./js/app.js" defer></script>
</head>
<body>
    <?php require_once './body/profile_header.html'; ?>
    <div class="table_div">        
        <table class="">
        <thead class="">
          <tr>
            <th>userName</th>
            <th>lastName</th>
            <th>Rating</th>
            <th>Completed jobs</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "id19159302_dbname";

          $connection = new mysqli($servername, $username, $password, $database);

          if ($connection->connect_error){
            die("connection failed:" . $connection->connect_error);
          }

          $sql="SELECT * FROM registration";
          $result = $connection->query($sql);

          if (!$result){
            die("invalid query: " . $connection->error);
          }

          while($row = $result->fetch_assoc()){
            echo "
          <tr>
            <td>" . $row["userName"] . "</td>
            <td>" . $row["firstName"] . "</td>
            <td>" . $row["lastName"] . "</td>
            <td>" . $row["userEmail"] . "</td>
            
          </tr>
          ";
          }         
          ?>
        </tbody>
        </table> 
    </div>
    <?php require_once './body/footer.html'; ?>
</body>
</html>