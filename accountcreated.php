<?php
session_start();

include 'dbconnection.php';

$name=$_POST['regname'];
$email=$_POST['regmail'];
$pass=$_POST['regpass'];

$hashed_password= hash('sha256', $pass);


$sql = "INSERT INTO sampletable(firstname, email, pass,balance) VALUES ('$name','$email','$hashed_password',1000)";
if (mysqli_query($conn, $sql)) {
  echo"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">";
echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
echo"<span aria-hidden=\"true\">&times;</span>
 </button>
 Account created successfully!!!
</div>";
echo "<br>";
echo"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">";
echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
echo"<span aria-hidden=\"true\">&times;</span>
</button>
We've credited 1000 rupees.!!
</div>";
    //echo "<br><br>Account created successfully!!!";
    //echo "<br>We've credited 1000 rupees.!!<br>";
    session_destroy();
} else {
    echo "Error in creating account";
}
 ?>
 <html>
     <head>
       <style>
       .fo{
text-align:center;
background-color:#4286f4;
color:#e5edf9;
width: 150px;
height: 50px;
margin: 0 auto;
border-radius:15px;
}
       </style>
       <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

     </head>
     <body>
         <form action="index.php" method="post">
             <center><input class="fo" type="submit" name="gotologin" value="Proceed"></center>
         </form>
     </body>
 </html>
