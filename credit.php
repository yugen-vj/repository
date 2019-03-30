<?php
session_start();
if(isset($_POST['credit']))
{
include 'dbconnection.php';
if(isset($_POST['amount'])){
$amount=$_POST['amount'];

$uemail=$_SESSION['email'];
$sql="SELECT balance FROM sampletable WHERE email='$uemail' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $balance= $row["balance"];
    }
} else {
    echo "No such user";
}


if(isset($balance)){

        $balance=$balance+$amount;

        $update = "UPDATE sampletable SET balance='$balance' WHERE email='$uemail'";

        if (mysqli_query($conn, $update)) {

       $success="1";


        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

    }
    else{
        echo "Can't find the user details";
    }
}
else{
        echo"<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                Please enter the amount to be credited.
            </div>";
    }
}
?>
<html>
    <head>
        <title>Credit money</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">


       <link href="img/logo.ico" rel="icon">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <link href="css/style.css" rel="stylesheet">
        <style>
    		*{
    			font-family: 'Open sans',sans-serif;
    			margin: 0;
    			padding: 0;
    		}
    		input[type=number]{
    			border: 1px solid #bdb8b8;
    			width: 430px;
    			height: 50px;
    			border-radius: 20px;
    			padding: 10px;
    			transition: all ease-in-out 0.1s;
    			padding-left: 20px;
    			font-size: 15px;
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
			margin: 50px 0 0 140px;

		}
		input[type=number]:focus{
			border: 1px solid #0250cf;
		}
		h1{
			text-align: center;
			margin-bottom: 50px;
			padding: 20px;
			font-family: 'Montserrat';
		}
		input[type=submit]:hover{
			cursor: pointer;
		}
    		.form{
    			width: 500px;
    			height: 250px;
    			background-color: #ededed;
    			margin: auto;
				box-sizing: border-box;
				padding: 10px;
				border-radius:20px;
    		}
    		form{
    			padding: 20px;

    		}
    		.alert{
    		    width: 900px;
    		    margin: auto;
    		}
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
    	</style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    </head>
    <body>
        <h1 style="color: #c9d7ed">Add money to your account</h1>
        <div class="alert">
            <?php
            if(isset($success)){
                 echo"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                Money added successfully to your account
            </div>";

            }
            ?>
        </div>
        <div class="form">
        <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="post">
            <strong>
                <label for="amount">Enter the amount</label>
            </strong>
            <input type="number" id="amount" name="amount" placeholder="Amount" autocomplete="off"><br>
            <input type="submit" name="credit" value="Add money">
        </form>
        </div>
        <br>
        <center>
            <a href="main.php"><button class="home">Go back home page</button></a>
        </center>
    </body>
</html>
