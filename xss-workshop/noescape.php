<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 4: Cookie Monster</title>

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
        <div class="container my-1">
            <h1> <a href="noescape.php">No Escape</a> </h1>

            <hr />

            <a href="blog2/bootstrap/index.php" target="_blank">Click here to go to the No Escape page!</a>

            <hr />

            <p>
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExplanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Exercise Explanation
                </a>
            </p>
            <div class="collapse" id="collapseExplanation">
                <div class="card card-body">
                    <h3>Not So Easy</h3>
                    <p>
                    All of the examples we have seen so far have used really, <i>really</i> bad security. When a website gets 
                    any kind of user input, the server should check for dangerous characters and do something about them - often 
                    times, this is done by replacing them with visually identical symbols that the computer doesn't treat as code. 
                    So far, none of the exercises have been doing any of this.
                    </p>
                    <p>
                    Now, the developer has attempted to add some form of input sanitization or character escaping. However, this process 
                    isn't as straightforward as it might seem, and it's pretty easy to accidentally do a bad job. Like user authentication, 
                    input sanitization is the kind of thing that is best done by using someone else's premade, pre-tested code (such as PHP's 
                    <code>htmlgetspecialchars()</code> function or the DOMPurify plugin for Javascript), instead of trying to implement it 
                    by hand yourself.
                    </p>
                    <p>
                    Try to get another cookie from this page. This is the final challenge - after this, you have a pretty good baseline of 
                    understanding for Cross Site Scripting in CTFs!
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
                    <p>
                        Try sending some example payloads, and see what happens. What are you allowed to send, and what gets blocked? It appears 
                        that some kinds of input get modified. Knowing that the developers were trying to prevent XSS, what do you think they might 
                        be checking for? 
                    </p>
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
