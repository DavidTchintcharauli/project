


<?php 
require_once "functions.php";



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id19159302_dbname', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "blalala";
    exit;
}

$statement = $pdo->prepare('SELECT * FROM registration WHERE id = :id');
$statement->bindValue(':id', $id);




$errors = [];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   

    $image = $_FILES['image'] ?? null;
    $imagePath = '';

    if (!is_dir('images')) {
        mkdir('images');
    }

    if ($image && $image['tmp_name']) {
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

   
    

    

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO registration SET image = :image                                      
        WHERE id = :id");
        
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':id', $id);


       
        
    
        $statement->execute();
        header('Location: home.php');
    }

    //     $statement->execute($param);
    //     // echo "Hello world!<br>";
    //     // header('Location:home.php'); //aq sheidzleba iyos problema
    // }
    
    else {
        echo "Hello world!";
    }

}




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
    <link rel="stylesheet" href="./styles/project.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <script src="./js/script.js" defer></script>
    <script src="./js/project.js" defer></script>
</head>
<body class>
    <?php require_once 'body/profile_header.html'; ?>   

    <div class="container body-container project">
        <div class="project-header">
            </div>

            <div class="project-body">
                <div>
                    <div>
                        <div class="form-group">
                            
                            <!-- aq unda iyos namdvili kodis 74/80 xazebi -->

                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                     <label>Project Image</label><br>
                                    <input type="file" name="image">
                                </div>
                            
                                
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'body/footer.html'; ?>
</body>
</html>
<?php 
// }else{
//      header("Location: index.html");
//      exit();
// }
 ?>

<?php require_once './body/footer.html'; ?>