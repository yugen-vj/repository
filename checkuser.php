<?php session_start();?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Checkuser</title>
	<link href="img/logo.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
	<style>
		*{
			font-family: 'Open Sans', sans-serif;

		}
		.body{
		    margin-top: 200px;
		}
		strong{
		    color: #0250cf;
		}
		input[type=submit]{
			width: 150px;
			height: 65px;
			background: #0250cf;
			transition: all linear 0.4s;
			color: white;
			font-size: 20px;
			border: transparent;
			border-radius: 10px;
		}
		input[type=submit]:hover{
			cursor: pointer;
		}
		p{
		    font-size: 30px;
		}
	</style>
</head>
<body>
<div class="body">
<?php

$email=$_POST['email'];
$pass=$_POST['pass'];
$google=hash('sha256',$pass);

include 'dbconnection.php';

$sql="SELECT * FROM sampletable WHERE email='$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $uname=$row["firstname"];
        $uemail=$row["email"];
        $balance=$row['balance'];
				$checkpass= $row["pass"];

    }
} else {
    echo "0 results";
}

if($google==$checkpass){
   $_SESSION['balance']=$balance;
   $_SESSION['firstname']=$uname;
   $_SESSION['email']=$email;
   echo "<center><p>Now you are logged in as <strong>".$uname ."</strong></p>";
   echo "<form action=\"main.php\" method=\"post\"> <input type=\"submit\" value=\"Proceed\"></center>";
}
else{
	echo "<script> window.alert(\"Wrong password!!!Try again...\") </script>";
	session_destroy();
	echo "<script> window.location=\"index.php\"; </script>";

}
?>
</div>
</body>
</html>
