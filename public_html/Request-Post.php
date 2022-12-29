<?php 
require_once "functions.php";
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id19159302_dbname', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$description = '';
$price = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

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

    if (!$title) {
        $errors[] = 'Project title is required';
    }
    

    if (!$price) {
        $errors[] = 'Project price is required';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO project (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
    
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
            <h1>Tell us what you need done</h1>
            <p>Contact skilled FL within minutes. View profiles, ratings, portfolios and chat with them. Pay the FL only when you are 100% satisfied with their work.</p>
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
                                <div class="form-group">
                                    <label>Project title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
                                </div>
                                <div class="form-group">
                                    <label>Project description</label>
                                    <textarea class="form-control" name="description"><?php echo $description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Project price</label>
                                    <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
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