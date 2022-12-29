<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=id19159302_dbname', '', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM project ORDER BY create_date DESC');

$project = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="app.css" rel="stylesheet"/>
    <title>Products CRUD</title>
</head>
<body>
<h1>Tell us what you need done</h1>
<h4>Contact skilled FL within minutes. View profiles, ratings, portfolios and chat with them. Pay the FL only when you are 100% satisfied with their work.</h4>

<p>
    <a href="create_project.php" type="button" class="btn btn-sm btn-success">Post project</a>
</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($project as $i => $project) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
            </td>
            <td><?php echo $project['about'] ?></td>
            <td><?php echo $project['skills'] ?></td>
            <td><?php echo $project['photo'] ?></td>
            
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>