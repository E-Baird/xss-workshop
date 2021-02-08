<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xss-workshop";

// connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3: Make it Stick</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a href="resources.html" class="nav-link">Resources</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Exercises
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="smoke.php">Where there's Smoke</a>
                    <a class="dropdown-item" href="getgud.php">Get Gud</a>
                    <a class="dropdown-item" href="cookies.php">Cookie Monster</a>
                    <a class="dropdown-item" href="noescape.php">No Escape</a>
                </div>
            </li>
        </ul>
    </nav>
    
    <article>
        <div class="container">
            <h1><a href="persistent.php">Make it Stick</a></h1>

            <div class="container">
                Thanks for showing your support for our new product! We'd like to take this time to ask you for your opinion. 
                Please fill out the comment form below, we'll use what you say to help inform us as we make the next generation 
                of VSW!

                <hr />

                <div class="w-50 bg-light">
                    <form action="persistent.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="userName" id="userName" aria-describedby="emailHelp" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label>Comment</label><br>
                            <textarea class="form-control" name="userComment" id="userComment" cols="30" placeholder="Give us your opinion" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Get in Touch!</button>
                    </form>

                    <?php
                    // set variables when post request received from form 
                    if(isset($_POST["userName"]) && isset($_POST["userEmail"]) && isset($_POST["userComment"])){
                        $uname = htmlspecialchars($_POST["userName"]);
                        $userEmail = htmlspecialchars($_POST["userEmail"]);
                        $comment = addslashes($_POST["userComment"]);

                        // insert record into database 
                        $sql = "INSERT INTO comments (uname, email, comment)
                        VALUES ('$uname', '$userEmail', '$comment')";

                        if(mysqli_query($conn, $sql)){
                            echo "Thank you for your feedback, " . $uname . "! <br>";
                        }
                        else{
                            echo "Sorry, there was an error processing your comment. <br>";
                        }
                    }
                    ?>
                </div>

                <hr />

            </div>

            <div class="container">
                <h5>Comments:</h5>
                <?php
                if (isset($_POST["clearComments"])){
                    $sql = "TRUNCATE TABLE comments";
                
                    if(mysqli_query($conn, $sql)){
                        echo "Comments table cleared! <br>";
                    }
                    else{
                        echo "There was an error clearing the table: " . $conn->$error;
                    }
                }

                // display previous comments 
                $sql = "SELECT uname, comment FROM comments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="card border-primary my-3" style="width:70%;">
                            <div class="card-header">
                                <i>' . $row["uname"] . '</i> says:
                            </div>
                            <div class="card-body">
                                <p class="card-text">' . $row["comment"] . '</p>
                            </div>
                        </div>
                        ';
                    }
                } 
                else{
                    echo "No Comments!";
                }

                $conn->close();
                ?>

                <form action="persistent.php" method="post">
                    <button class="btn btn-dark" type="submit" name="clearComments" 
                            id="clearComments" data-toggle="tooltip" title="This will clear the comments table so that you can practice the exercise again">Clear comments</button>
                </form>
            </div>

            <hr />

            <p>
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExplanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Exercise Explanation
                </a>
            </p>
            <div class=" collapse" id="collapseExplanation">
                <div class="card card-body">
                    <h3>Persistent XSS, or, 'Why're ya hittin' yourself?'</h3>
                    <p>
                    As we mentioned earlier, the whole goal of an XSS is to get another client to visit a webpage 
                    with malicious Javascript that an attacker has added. This might make you wonder what the point 
                    has been of all our smoke tests so far. After all, popping up an alert on your own screen, or turning
                    the whole page into italics, isn't super dangerous- you're doing it to yourself! 
                    There are a few ways that attackers can get their code onto someone else's browser. The first, and 
                    probably simplest, is to just plain convince someone to click on a link with suspicious variables set. 
                    For example, maybe a phishing scam is used to get people to click. This style of XSS is called 
                    Reflected cross-site scripting, because the victim is more or less sending the attack to themselves,
                    whether or not they know it.
                    </p>
                    <p>
                    A subtler method, and the focus of this exercise, is persistent XSS. Here, the goal is to find a way to 
                    get your Javascript to 'stick,' so that any time any user visits the site from here on out, your 
                    code will be included when the page loads. This most often happens when a page displays content from 
                    previous visitors in some way. 
                    </p>
                    <p>
                    Try to get some persistent XSS running on this page. You can test it by clicking away to the homepage, then 
                    coming back to this exercise. If you've done it properly, your attack should hit you every time you reload 
                    this page. Once you've made your XSS stick, you're ready to move on to Exercise 4: No Escape. 
                    </p>
                </div>
            </div>

            <p>
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseHint" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Need a Hint?
                </a>
            </p>
            <div class="collapse" id="collapseHint">
                <div class="card card-body text-muted">
                    If your goal is to force new users to view your code, you should probably try to attack a place where 
                    previous users' input gets displayed on the page for everyone else to see.
                </div>
            </div>
            <div style="min-height:50px;"></div>
    </article>


    <footer class="this-footer font-small">
        <div class="container text-center">
            <span class="text-muted">Made for UCalgary's Information Security Club 2021</span>
        </div>
    </footer>

    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>
</html>