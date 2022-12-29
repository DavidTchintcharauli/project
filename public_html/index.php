<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/responsive.css">
    <script src="./js/app.js" defer></script>
</head>
<body>
    <?php require_once 'body/header.html'; ?>
    

    <div class="container body-container">
        <div class="blog-container">
            <div class="card" id="card1">
                <h3>Search for a job</h3>
            </div>
            <br>
            <div class="card" id="card2">
                <h3>Find a person you know</h3>
            </div>
            <img class="body-img" id="card-image" src="./assets/img/connection-icon.jpg" width="500px" alt="">
        </div>
        <br>
        <br>
        <br>
        <div class="card blog-container site-name">
            <h1>Connection</h1>
        </div>
        <br>
        <br>
        <br>
        <div class="blog-container topics-container">
            <div class="explore">
                <h1>Explore topics you are interested in</h1>
            </div>
            <div class="topic-btn-containers">
                <app-suggested-skills class="app-suggested-skills-container">
                    <div class="checboxes">
                    <div class="topics">
                            <h5>CS</h5>
                        </div>
                        <div class="topics">
                            <h5>JS</h5>
                        </div>
                        <div class="topics">
                            <h5>AL</h5>
                        </div>
                        <div class="topics">
                            <h5>MC</h5>
                        </div><div class="topics">
                            <h5>IS</h5>
                        </div>
                        <div class="topics">
                            <h5>WR</h5>
                        </div>
                        <div class="topics">
                            <h5>JA</h5>
                        </div>
                        <div class="topics">
                            <h5>BT</h5>
                        </div>
                        <div class="topics">
                            <h5>PT</h5>
                        </div>
                        
                      </div> 
                </app-suggested-skills>
            </div>
        </div>
    </div>

    <?php require_once 'body/footer.html'; ?>
</body>
</html>