<?php

$servername = "localhost";
$username = "root";
$password = "friendlikeworriedawkward";
$dbname = "xss_workshop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

session_start();

?>

<html>

	<head>
		<title>Ex4 Top Comment></title>
	</head>

	<body>
		<form action="ex4checker.php" method="post">
			<input type="password" id="password" name="password"><br>
			<button type="submit" id="submit" name="submit">Login</button>
		</form>

		<?php
		if(isset($_POST["password"]) && ($_POST["password"] == "QSKx_dwK8Ufk4pKZ3N4Fb6r9mDm0_FbPfg")){
			# select oldest comment from filter_comments table and immediately view and delete it
			$sql = "SELECT * FROM filter_comments ORDER BY uid LIMIT 1";
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				# delete oldest comment from table
				$sql = "DELETE FROM filter_comments ORDER BY uid LIMIT 1";
				$del = $conn->query($sql);
				
				# echo the comment associated with that record
				while($row = $result->fetch_assoc())
					echo $row["comment"] . "<br>";
			}
			else{
				echo "Error";
			}
		}
		else{
			echo "Wrong password";
		}
		?>
	</body>
</html>
