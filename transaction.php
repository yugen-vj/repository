<?php
session_start();
if(isset($_POST['credit']))
{
include 'dbconnection.php';

$email=$_POST['email'];
$amount=$_POST['amount'];
$uemail=$_SESSION['email'];
$sql="SELECT balance FROM sampletable WHERE email='$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $balance= $row["balance"];
    }
} else {

    echo"<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                No such user exists!!!
            </div>";
}


$sql1="SELECT balance FROM sampletable WHERE email='$uemail' ";
    $result = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $ubalance= $row["balance"];
        }
    }
    else {
        echo"<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                No such user exists!!!
            </div>";
    }


if(isset($balance)){
    if($ubalance>=$amount){
        $balance=$balance+$amount;
        //echo $balance;

        $update = "UPDATE sampletable SET balance='$balance' WHERE email='$email'";

        if (mysqli_query($conn, $update)) {
            //echo "Money added successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }



        $ubalance=$ubalance-$amount;
        $uupdate = "UPDATE sampletable SET balance='$ubalance' WHERE email='$uemail'";

        if (mysqli_query($conn, $uupdate)) {
            $success="1";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    else{
        $error="1";
    }

mysqli_close($conn);
}
}

?>
<html>
    <head>
        <title>Transaction</title>

       <link href="img/logo.ico" rel="icon">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
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
    		input[type=email],input[type=number]{
    			border: 1px solid #bdb8b8;
    			width: 430px;
    			height: 50px;
    			border-radius: 20px;
    			padding: 10px;
    			transition: all ease-in-out 0.1s;
    			padding-left: 20px;
    			font-size: 15px;
    			margin-bottom: 15px;
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
			margin-top:50px;
			margin-bottom: 20px;
			padding: 20px;
			font-family: 'Montserrat';
		}
		input[type=submit]:hover{
			cursor: pointer;
		}
    		.form{
    			width: 500px;
    			height: 350px;
    			background-color: #ededed;
    			margin: auto;
				box-sizing: border-box;
				padding: 10px;
				transition: all ease-in-out 0.4s;
				border-radius: 20px;
				margin-top: 50px;
    		}
		form{
			padding: 20px;
    	}
    	.alert{
    	    margin: auto;
    	    width: 900px;

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
    </head>
    <body>
        <h1 style="color: #c9d7ed">Transfer money to another account</h1>
        <div class="alert">
        <?php
        if(isset($error)){
            echo"<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                You don't have enough money to transfer !!!
            </div>";
        }
        else if(isset($success)){
            echo"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">";
            echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
            echo"<span aria-hidden=\"true\">&times;</span>
                </button>
                Money transferred successfully.
            </div>";
        }
        ?>
        </div>
        <div class="form">
        <form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="post">
            Enter the email <input type="email" name="email" placeholder="Email" autocomplete="off"><br>
            Enter the amount <input type="number" name="amount" placeholder="Amount" autocomplete="off"><br>
            <input type="submit" name="credit" value="Transfer">
        </form>
        </div>
        <br>
        <center>
        <a href="main.php"><button class="home">Go back home page</button></a>
        </center>
    </body>
</html>
