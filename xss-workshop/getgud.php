<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2: Get Gud</title>

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
            <h1> <a href="getgud.php">Get Gud</a> </h1>

            <div class="container">
                In order to be eligible for the closed beta, you must be over 13. Please confirm your age. 

                <hr />

                <?php
                if (isset($_GET["userBday"])){
                    $bDay = $_GET["userBday"];

                    $bDayDate = explode("-", $bDay);

                    echo "You were born in the year " . $bDayDate[0] . ". <br>";

                    if (intval($bDayDate[0]) < (date("Y") - 13)){
                        echo "You are eligible for the closed beta! <br>";
                    }
                    else{
                        echo "You are not eligible for the closed beta at this time. <br>";
                    }

                }

                else{
                    echo '
                    <div class="w-50 bg-light">
                        <form action="getgud.php" method="get">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="userBday" id="userBday" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm Age</button>
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
                <h3>Using HTTP requests to send Javascript</h3>
                <p>
                Using input fields isn't the only way of inserting code to pull off an XSS. Depending on how the 
                client sends data to the server, it is also possible to send Javascript in the URL of a webpage.
                </p>
                <p>
                For this, we're going to need to take a closer look at how the internet actually works. When you 
                visit a webpage, what you are doing is making a Hypertext Transfer Protocol (HTTP) request to a server
                asking that it send you any files (HTML, CSS, Javascript) associated with that page. The request can 
                be further refined by adding more information. For example, if you filled out the 'name' field in 
                Exercise 1 and hit 'Submit,' you sent a request to the server that included a 'name' variable with 
                a value of whatever you input into the field. Code on the server side, often PHP, will use the values 
                of these variables to change the files it sends back to you as the user. 
                </p>
                <p>
                There are two main forms of HTTP requests: POST and GET. POST requests send all variables in the body of 
                the request itself. A POST request looks something like this:
                </p>

                <div class="card my-3">
                    <div class="card-header">
                        Example POST request:
                    </div>
                    <div class="card-body">
                        <code class="card-text">
                        POST /test/demo_form.php HTTP/1.1 <br>
                        Host: infosecucalgary.ca <br>
                        field1=value1&field2=value2  <br> 
                        </code>
                    </div>
                </div>



                <p>GET requests send all variables in the URL of the page. Try it out for yourself by going to 
                <a href="https://youtube.com">Youtube</a> and putting in a search query. The URL of the results page 
                will look something like this:</p>

                <div class="card my-3">
                    <div class="card-header">
                        Example GET request URL:
                    </div>
                    <div class="card-body">
                        <code class="card-text">
                        https://youtube.com/results?search=just+testing <br>
                        </code>
                    </div>
                </div>

                <p>
                    It is possible to do XSS with POST requests, but it is much easier to do with GET requests, because 
                    the variable values are right there in the URL. Of course, to actually exploit this you'll need to 
                    know what the correct variable names are, which isn't always apparent. You might notice that this page 
                    has no clear way for you to input custom strings of text, but there might still be a way around that. 
                    Try to smoke test it, let's see what you can find! Once you have successfully smoke tested this page, 
                    you can continue on to Exercise 3: Make it Stick.
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
                    When you choose an option from the list and click 'submit,' how is your request being sent to the 
                    server? How can you tell if it's a GET or a POST request? How could you modify the request to send 
                    something the developer never intended as an option? 
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