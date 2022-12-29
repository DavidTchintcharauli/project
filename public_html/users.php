<?php 
  session_start();
  include_once "./chat/php/config.php";
  if(!isset($_SESSION['id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href=".././styles/home.css">
    <link rel="stylesheet" href=".././styles/style.css">
    <link rel="stylesheet" href=".././styles/responsive.css">
    <link rel="stylesheet" href=".././styles/profile.css">
    <link rel="stylesheet" href=".././styles/home_post.css">
    <link rel="stylesheet" href=".././styles/body_style.css">
    <script src="./js/app.js" defer></script>
</head>
<?php include_once "./body/profile_header.html"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM registration WHERE userName = {$_SESSION['userName']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
