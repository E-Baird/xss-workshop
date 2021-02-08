<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1: Where there's Smoke</title>
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
            <h1><a href="smoke.php">Where there's Smoke...</a></h1>

            <div class="container">
                Welcome to VSW: Very Secure Webapp! Here at VSW, we take your security seriously. Our product isn't quite ready yet, 
                but if you would like to join our super-exclusive closed beta, sign up for our email list below!

                <hr />

                <?php
                if (isset($_GET["userName"]) && isset($_GET["userEmail"])){
                    $uname = $_GET["userName"];
                    $email = $_GET["userEmail"];

                    echo "Hey " . $uname . ", thank you for registering! We'll be in touch. <br>";
                }
                else{
                    echo '
                    <div class="w-50 bg-light">
                        <form action="smoke.php" method="get">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="userName" id="userName" aria-describedby="emailHelp" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign Me Up!</button>
                        </form>
                    </div>
                    ';
                }

                ?>

            </div>

            <hr />

            <p>
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExplanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Exercise Explanation
                </a>
            </p>
            <div class=" collapse" id="collapseExplanation">
                <div class="card card-body">
                <h3>Finding vulnerabilities and your first XSS attack</h3>
                <p>
                    As with SQL injections, the first goal of an XSS attack is to see if a webpage is vulnerable in 
                    the first place. Launching a small, often harmless attack to determine if the page is succeptible 
                    is called a 'smoke test.' There are a couple of options available for us to exploit, but the most common 
                    point of entry for an XSS (and the most basic) is a form field where a user can input data. Again 
                    similar to a SQL injection, we will try to input a string which the computer interprets as a command 
                    that it should execute- in this case, instead of inserting a SQL query, we will insert some HTML or 
                    Javascript.
                </p>
                <p>
                    On a securely-written web app, the developers should be checking for important HTML and Javascript 
                    characters such as <code>&lt;</code> and <code>&gt;</code>, and replacing them with visually-identical 
                    symbols that look the same to the end user, but will not be treated as instructions by the computer. 
                    Of course, this particular site was made by a rather lazy developer...
                </p>
                <p>
                    Try to smoke test this page, and figure out which of the input forms are vulnerable to cross-site 
                    scripting attacks. Once you've successfully determined that the page is vulnerable, you're ready to 
                    move on to Exercise 2: Get Gud.
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
                    Things to try might include opening an HTML tag that changes the way the rest of 
                    the site is displayed (this one is kind of the opposite of a SQL injection where you comment out 
                    the rest of the intended query), or inserting a <code>&lt;script&gt;&lt;/script&gt;</code> tag and 
                    putting some simple Javascript inside.
                </div>
            </div>

        </div>
        <div style="min-height:50px;"></div>
    </article>


    <footer class="this-footer font-small">
        <div class="container text-center">
            <span class="text-muted">Made for UCalgary's Information Security Club 2021</span>
        </div>
    </footer>
</body>
</html>