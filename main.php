<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter|Permanent+Marker" rel="stylesheet">
    <style>
		.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

        .jumbotron{
                width: 100%;
                height:20px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                text-align:center;

                background-color: #4286f4;
        }
        .jumbotron h1{
                color:white;
                padding-top:100px;
								font-family: 'Roboto', sans-serif;
                font-size: 110px;
        }
        .vsn{
            padding:30px 0px;
        }
        .vsn img{
        	opacity:0.9;
        }
        .vsn img:hover{
            background-color:#538ce8;
            border-radius:50%;
            overflow:hidden;
            transition:0.09s;

}        .view{
            padding-top:50px;
        }
        .view img:hover{
            transform:scale(1.1);
            transition: all 0.4s;
            box-shadow:0px 15px 25px #000000;
        }

    </style>
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="jumbotron h1">
			WELCOME TO THE BANK
		</div>
	</div>

<div class="container view">
            <div class="row">
                <div class="col-md-6">
                    <div class="thumbnail">
                      <abbr title="Add money here">
                      <a href="credit.php">
                    <img style="height:300px; width: 600px;" class="img-fluid" src="images/credit.png" >
                    </a>
                    </abbr>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="thumbnail">
                      <abbr title="Check your account details">
                      <a href="display.php">
                    <img style="height:300px; width: 600px;" class="img-fluid" src="images/account.png">
                    </a>
                    </abbr>
                    </div>
            </div>
        </div>

        <div class="row">
					
				</div>
                <div class="col-md-6">
                    <div class="thumbnail">
                      <abbr title="Transfer money here">
                    <a href="transaction.php">
											<img style="height:300px; width: 600px;" class="img-fluid" src="images/transfer.jpg" style="padding-top:30px;">
										</a>
                    </abbr>
										</div>
                </div>

                <div class="col-md-6">
                    <div class="thumbnail">
                      <abbr title="Click to logout">
												<a href="logout.php">
                    <img style="height:300px; width: 600px;" class="img-fluid" src="images/sign-out.png" name="out" style="padding-top:30px;">
										</a>
										</abbr>
                    </div>
            </div>
        </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
