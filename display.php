<?php
session_start();
if(isset($_POST['out'])){
    session_destroy();
    header('Location: index.php');
}
include 'dbconnection.php';
$email=$_SESSION['email'];


$sql="SELECT * FROM sampletable WHERE email='$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $name= $row['firstname'];
        $email =$row['email'];
        $balance= $row["balance"];
    }
}
else {
    echo $email;
    echo "No such user";
}
mysqli_close($conn);
 ?>
 <html>
    <head>
      <title>Display</title>
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <style>
            	.home{

			width: 330px;
			height: 65px;
			background: #2ECC71;
			transition: all linear 0.4s;
			color: white;
			font-size: 20px;
			border: transparent;
			border-radius: 10px;


		}
		.home:hover{
		    cursor: pointer;
		}
		 .out{
            margin-top:15px;
			width: 200px;
			height: 65px;
			background: #ED5E68;
			transition: all linear 0.4s;
			color: white;
			font-size: 20px;
			border: transparent;
			border-radius: 10px;


		}
		.out:hover{
		    cursor: pointer;
		}
        </style>
        <link rel="stylesheet" href="css/profile.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <center><h2 style="font-family: 'Roboto', sans-serif;">PROFILE</h2></center>
        <div class="profile-card" style="font-family: 'Open sans',sans-seriff;">
            <div class="procard">
            <strong>Name: </strong><span><?php echo"$name"; ?></span><br>
            <strong>Email: </strong><span><?php echo"$email"; ?></span><br>
            <strong>Bank balance: </strong><span><?php echo"$balance"; ?></span><br>
            </div>
        </div>
        <center>
            <a href="main.php"><button class="home">Go back to Homepage</button></a><br>
            <form action="" method="post">
            <button class="out" name="out" type="submit">Logout</button></a>
            </form>
        </center>
    </body>
    </html>
