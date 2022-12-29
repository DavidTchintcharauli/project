<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['userName'])){
 ?>
 
 <?php 

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id19159302_dbname', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM project ORDER BY create_date DESC');

$project = $statement->fetchAll(PDO::FETCH_ASSOC);
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/responsive.css">
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="./styles/home_post.css">
    <link rel="stylesheet" href="./styles/body_style.css">
    <script src="./js/app.js" defer></script>
</head>
<body>
    <?php require_once 'body/profile_header.html'; ?>    
    <!-- <div class="first-container"> -->
    <a href="profile.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
    <div class="b1">
        <div class="a1">
            <div class="c1">
                <h3>Welcome back</h3>
                <h3>gela</h3>
            </div>
            <div class="c1">
                <h3>Complated jobs</h3>
                <h3>154</h3>
            </div>
            <div class="c1">
                <h3>cash</h3>
                <h3>$345 USD</h3>
            </div>
        </div>
        <div class="a2">
            <div>
            <h1>News Feed</h1>
                <?php
                $c=1;
                
                $con=mysqli_connect('localhost', 'root', '', 'id19159302_dbname');
                if ($con) {
                    echo "Connection Done";
                }else{
                    echo 'Connection Faild';
                }
                $sel="SELECT * FROM project ORDER BY create_date DESC";
                $query=$con->query($sel);
                while ($row=$query->fetch_assoc())
                {
                ?>
            <div>
                <div class="post_container">
                    <div class="post_container_header">
                        <div class="post_profile">
                        <div class="post_photo"><?php if ($row['image']): ?>
                    <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" class="post_photo">
                        <?php endif; ?></div>
                        <div class="post_name"><?php echo $row['title']; ?></div>
                        </div>
                        <div class="post_price">$<?php echo $row['price']; ?>USD</div>
                    </div>
                        <div class="post_text"><?php echo $row['description'];?></div>
                </div>
            </div>
            <?php
                }
            ?>
            </div>
        </div>
        <div class="a3">
            <h3>secend container</h3>
        </div>
    </div>
    <!--</div>-->
    <?php require_once 'body/footer.html'; ?>
</body>
</html>
<?php 
}else{
     header("Location: index.html");
     exit();
}
 ?>