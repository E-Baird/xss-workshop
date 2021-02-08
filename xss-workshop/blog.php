<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

setcookie("IsThisAFlag?", "none");

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archaeopteryx, king of birds</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>




<div class="bg"></div>

<div class="jumbotron text-center">
    <h1 class="display-1 font-weight-bold"><a class="text-light" href="blog.php">Archaeopteryx</a></h1>
    <p class="lead font-weight-bold">First bird, best bird</p>
</div>

<div class="article">
    <div class="content">
        <div class="py-4">
            <h2 class="display-4">Archaeopteryx</h3>
            <h5 class="text-muted"><i>Dr. Bartelous Pitt-Roundstone, archaeopteryx archaeologist - August 16 2020</i></h5>
        </div>
        <p>
        What are birds? We just don't know. What is archaeopteryx? Goodness! I have no idea. Maybe a bird.
        <p>

        <div class="blockquote">
            <p><i>
            Archaeopteryx (/ˌɑːrkiːˈɒptərɪks/ "old wing"), sometimes referred to by its German name, 
            Urvogel ("original bird" or "first bird"), is a genus of bird-like dinosaurs that is transitional 
            between non-avian feathered dinosaurs and modern birds. The name derives from the ancient Greek 
            ἀρχαῖος (archaīos), meaning "ancient", and πτέρυξ (ptéryx), meaning "feather" or "wing". Between 
            the late 19th century and the early 21st century, Archaeopteryx was generally accepted by palaeontologists 
            and popular reference books as the oldest known bird (member of the group Avialae). Older potential 
            avialans have since been identified, including Anchiornis, Xiaotingia, and Aurornis. 
            </i></p>
            <div class="small">- Wikipedia</div>
        </div>

        <p>
        Ah. Of course, that is what Archaeopteryx is! Thank you, Wikipedia! 
        
        Archaeopteryx was maybe not the first bird, and it was maybe not the last dinosaur. In fact, the last dinosaur 
        didn't exist, or rather, has not existed perhaps yet or even ever. This is because birds are dinosaurs, which begs 
        the question, is a chicken a dinosaur? If so, what does this say about the existence of dinosaur-shaped chicken 
        nuggets? This is a question that keeps me up late at night, but I am afraid that it is not what I must discuss 
        today with you, as today is a day to discuss Archaeopteryx, of which despite my research, I believe there are 
        no nuggets. However, only time will tell.
        </p>

        <p>
        The first Archaeopteryx ever discovered was found in Langenaltheim, Germany and is now in the Natural History Museum 
        of London, in London. The man who discovered it gave it to his doctor instead of paying him in money, and although
        we can see clearly that this is not the strangest healthcare system in the modern era, it is also considerably more 
        strange than many other healthcare systems, and is mayhaps a cause for worry, in that it restricts medical services to those 
        who are in possession of dead Archaeopteryx, both disturbing and rare. Is it moral to exchange the bodies of dead birds, 
        or rather the bodies of dead relatives of the ancestors of birds, for goods and services to which all should have access? 
        Is it moral, then, to pay income tax in chicken nuggets? I do not know.
        </p>

        <p>
        In March 2018, scientists reported that Archaeopteryx was likely capable of flight, but in a manner distinct 
        and substantially different from that of modern birds. What, then is the flight manner of the modern bird, and 
        how can it differ from the bird, perhaps, that is Archaeopteryx? As Archaeopteryx is, indeed, not a bird, but rather
        only, as they say, "bird-like," how then must it fly? Such questions must remain unknown, as Archaeopteryx is dead. 
        </p>

        <p>
        As you have seen, Archaeopteryx is perhaps the most important of the birds or maybe dinosaurs. It is capable of incredible
        things such as flight, or maybe would indeed be capable of such things if it were not dead. I am interested to hear 
        your opinions on Archaeopteryx, the greatest of birds and men.
        </p>
    </div>


    <div class="w-50 p-2 bg-light content">
        <h2>Comments</h3>

        <?php

        // Add new comment from comment form
        // set variables when post request received from form 
        if(isset($_POST["userName"]) && isset($_POST["userComment"])){
            $uname = htmlspecialchars($_POST["userName"]);
            $comment = addslashes($_POST["userComment"]);

	    // insert record into database
	    /* 
	    $success = False;
	    if($stmt = $conn->prepare("INSERT INTO cookie_comments (uname, comment) VALUES (?, ?)")) {
		    $stmt->bind_param('ss', $uname, $comment);
		    $stmt->execute();
		    $stmt->close();
		    $success = True;
	    }
	     */
	    $sql = "INSERT INTO cookie_comments (uname, comment)
            VALUES ('$uname', '$comment')";

	    if(mysqli_query($conn, $sql)) {
            // if($success){
                echo "<script>alert('Thank you for your opinion!')</script>";
            }
            else{
                echo "Sorry, there was an error processing your comment. <br>";
            }
        }

        ?>
        

        <hr>
        <h3>Get in Contact</h3>

        <form action="blog.php" method="post">
            <div class="form-group ">
                <label>Name</label>
                <input type="text" class="form-control" name="userName" id="userName" aria-describedby="emailHelp" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label>Comment</label><br>
                <textarea class="form-control" name="userComment" id="userComment" cols="30" placeholder="What do you think of archaeopteryx, world's greatest Archaeopteryx?" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
    <div style="min-height:50px;"></div>
</div>

    <footer class="this-footer font-small">
        <div class="container text-center">
            <span class="text-muted">Made for UCalgary's Information Security Club 2021</span>
        </div>
    </footer>



</body>
</html>
