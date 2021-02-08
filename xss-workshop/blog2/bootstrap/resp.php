<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    setcookie("Member", "none");

    $servername = "localhost";
    $username = "root";
    $password = "friendlikeworriedawkward";
    $dbname = "xss_workshop";

    // connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Add new comment from comment form
    // set variables when post request received from form 
    if(isset($_POST["userName"]) && isset($_POST["userComment"])){
        $uname = htmlspecialchars($_POST["userName"]);
        $comment = addslashes($_POST["userComment"]);
        
        // extremely bad xss filtering
        $dangerous_list = array( "script", "onerror", "onmouseover", "onkeypress", "onload", "onfocus");
        foreach($dangerous_list as $item){
            if (strpos($comment, $item)){
                $comment = str_replace($item, "", $comment);
            }
        }

	// insert record into database
	/*
	$success = False;
	if($stmt = $conn->prepare("INSERT INTO filter_comments (uname, comment) VALUES (?, ?)")) {
		$stmt->bind_param("ss", $uname, $comment);
		$stmt->execute();
		$success = True;
		// $stmt->close();
	} 
	else {
		echo"ruh roh";
	}
	 */
        $sql = "INSERT INTO filter_comments (uname, comment)
	VALUES ('$uname', '$comment')";

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PRC Archaeology</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
        <!-- Contact-->
        <section class="page-section bg-dark text-white" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Thank you for applying!</h2>
                        <hr class="divider my-4" />
                        <p class="text-white mb-5">
                            <?php
                                if(mysqli_query($conn, $sql)){
    				//if($success) {
				echo "
                                    <div class='container'>
                                        <p>Thank you, $uname ! Please review your submission:</p>
                                        <p>$comment</p>
                                    </div>
                                    ";
                                }
                                else{
                                    echo "Sorry, there was an error processing your comment. ";
				}
    				$stmt->close();
                            ?>
                        </p>
                    </div>
                </div>


        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container">
                <div class="small text-center text-muted">Copyright © 2021 - Start Bootstrap</div>
                <div class="small text-center text-muted">Made for the University of Calgary Infosec Club 2021</div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
