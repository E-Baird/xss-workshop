<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to my Very Secure Webapp</title>

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
                <a href="#" class="nav-link">Home</a>
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
            <h1>Introduction to Cross-Site Scripting</h1>
            <p>
            Cross-site scripting, known as XSS, is a type of web vulnerability that allows an attacker to 
            insert malicious Javascript onto a webpage. Many web exploits such as SQL injections attempt to 
            gain access to files on the server hosting the page, but XSS is slightly different- because 
            Javascript is a client-side language that sits inside HTML, XSS targets other viewers who visit 
            the webpage after the attacker has added their own code. At its most harmless, XSS attacks can 
            be used to visually modify the content on a page, but at its most dangerous, XSS can be used to 
            intercept or modify sensitive data passed from client to server. 
            </p>
            <p>
            This site is designed to contain a number of security flaws that allow you to try out a variety of 
            different styles of XSS attacks. To get started, go to 'Where there's smoke' under Exercises.
            </p>
        </div>
    </article>


    <footer class="this-footer font-small">
        <div class="container text-center">
            <span class="text-muted">Made for UCalgary's Information Security Club 2021</span>
        </div>
    </footer>


</body>
</html>