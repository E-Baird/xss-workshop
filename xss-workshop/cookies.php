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
            <h1> <a href="cookies.php">Cookie Monster</a> </h1>

            <hr />

            <a href="blog.php" target="_blank">Click here to go to the Cookie Monster webpage</a>

            <hr />

            <p>
                <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExplanation" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Exercise Explanation
                </a>
            </p>
            <div class="collapse" id="collapseExplanation">
                <div class="card card-body">
                    <h3>Launching an actual, dangerous XSS attack</h3>
                    <p>
                    Now, to put it all together. You've discovered that a page is vulnerable to cross-site scripting
                    by doing a smoke test. You've investigated different ways of getting your attack to an end user. 
                    You're left with the final piece of the puzzle: 
                    what are you actually going to get the victim's browser... to... do, exactly?
                    </p>
                    <p>
                    Most sites know well enough to avoid sending sensitive data like passwords out in the open, but you 
                    can still collect data from a user. What we're going to try to do is a very common XSS attack: we're 
                    going to steal a cookie. How do you go about getting someone to give up their cookies? Javascript has 
                    some built-in properties that can help here: <code>document.cookie</code> is a getter and setter that 
                    will return a string of key-value pairs for all of the cookies currently set in the browser. 
                    </p>
                    <p>
                    This exercise follows a very common format for XSS in CTFs: a webapp that allows users to input info,
                    and something that tells you that somewhere, an admin or moderator will review whatever you send. The 
                    goal is to send something that will steal the admin's cookie when they view your submission. This one 
                    is quite a big difficulty jump from the previous exercises, and it will require you to modify your payload 
                    beyond just <code>&lt;script&gt; alert(1) &lt;&sol;script&gt;</code>. Don't be afraid to try things, do some research, and struggle for a 
                    bit before using your hint or asking for help. If you need some ideas, the <a href="resources.html">Resources</a>
                    page is probably a good place to start. 
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
                        Your goal is to get the victim's broswer to run some Javascript that gets the value of 
                        <code>document.cookie</code>, and then have the Javscript send that value somewhere you can see 
                        it... If only there were a way to redirect users and their cookies to a page that you had a little 
                        more control over. Maybe one where you could view the network traffic coming in and out? 
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