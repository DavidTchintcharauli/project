<?php

require_once "functions.php";

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id19159302_dbname', '', '');
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
        $statement = $pdo->prepare("INSERT INTO project (title, description, image, price, create_date)
                VALUES (:title, :description, :image, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
        header('Location: create_project.php');
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/responsive.css">
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="./styles/project.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet"/>
    <script src="./js/script.js" defer></script>
    <script src="./js/project.js" defer></script>
    <title>Project CRUD</title>
</head>
<body>
    <header class="d-flex">
        <div class="container d-flex">
            <a href="./index.html">
                <img class="logo" src="./assets/img/logo.svg" alt="">
            </a>
        <nav>
            <div class="d-flex">
                <a href="#" class="">
                    <img src="./assets/icons/browse.svg" width="45px" alt="Browse">
                    <h5>Browse</h5>
                </a>
                <a href="#" class="">
                    <img src="./assets/icons/post icon.svg" width="45px" height="45px" alt="Jobs">
                    <h5>Request Post</h5>
                </a>
            </div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary position-relative">
                    <img src="./assets/icons/messages icon.svg" width="45px" alt="Browse">
                    <h5>Messages <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden"></span>
                      </span></h5>
                      </button>
                <a href="#" class="">
                    <img src="./assets/icons/managment icons.svg" width="45px" height="45px" alt="Jobs">
                    <h5>Managment</h5>
                </a><a href="#" class="">
                    <img src="./assets/icons/notification icon.svg" width="45px" height="45px" alt="Jobs">
                    <h5>notification</h5>
                </a>
                <div class="dropdown">
                    <img src="./assets/icons/profile-icon.svg" width="45px" height="45px" alt="Jobs">
                    <h5 class="dropbtn"><?php echo $_SESSION["userName"]; ?></h5>
                    <div class="dropdown-content">
                    <a href="home.php">View profile</a>
                    <a href="#">Membership</a>
                    <a href="#">Settings</a>
                    <a href="#">Balance</a>
                    <a href="#">Add funds</a>
                    <a href="#">Withdraw funds</a>
                    <a href="#">Transaction history</a>
                    <a href="#">Financial dashboard</a>
                    <a href="#">Support</a>
                    <a href="#">Invite friend</a>
                    <a href="./index.html">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        </div>
    </header>
<h1>Tell us what you need done</h1>
<h4>Contact skilled FL within minutes. View profiles, ratings, portfolios and chat with them. Pay the FL only when you are 100% satisfied with their work.</h4>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" action="auth.php" enctype="multipart/form-data">
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
<footer class="d-flex">
        <div class="container d-flex">
            <a href="#">
                <img class="logo" src="./assets/img/logo.svg" alt="">
            </a>
        <nav class="footer-position">
            <div class="d-flex" >
                <a href="#" class="">
                    <img src="./assets/icons/english.svg" width="45px" alt="English">
                    <h5>English</h5>
                </a>
                <a href="#" class="">
                    <img src="./assets/icons/help & sapport.svg" width="45px" alt="Help & Support">
                    <h5>Help & Support</h5>
                </a>
                <a href="#" class="">
                    <img src="./assets/icons/about.svg" width="45px" alt="About Us">
                    <h5>About Us</h5>
                </a>
                <a href="#" class="">
                    <img src="./assets/icons/rules.svg" width="45px" alt="Rules">
                    <h5>Rules</h5>
                </a>
            </div>
            <div class="d-flex">
                <a href="#" class="">
                    <img src="./assets/icons/android icon.svg" width="45px" alt="Android App">
                    <h5>Android App</h5>
                </a>
                <a href="#" class="">
                    <img src="./assets/icons/apple icon.svg" width="45px" alt="IOS App">
                    <h5>IOS App</h5>
                </a>
            </div>
        </nav>
        </div>
    </footer>
</body>
</html>