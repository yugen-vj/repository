<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <div class="materialContainer">


   <div class="box">

      <div class="title">LOGIN</div>
<form action="checkuser.php" method="post">
      <div class="input">
         <label for="name">Email</label>
         <input type="text" name="email" id="name" autocomplete="off">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass">Password</label>
         <input type="password" name="pass" id="pass" autocomplete="off">
         <span class="spin"></span>
      </div>

      <div class="button login">
         <button type="submit" name="submit"><span>GO</span> <i class="fa fa-check"></i></button>
      </div>
</form>
   </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span></div>

      <div class="title">REGISTER</div>
<form action="accountcreated.php" method="post">
      <div class="input">
         <label for="regname">Username</label>
         <input type="text" name="regname" id="regname" autocomplete="off">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="regpass">Email</label>
         <input type="text" name="regmail" id="regpass" autocomplete="off">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="reregpass">Password</label>
         <input type="password" name="regpass" id="regpass">
         <span class="spin"></span>
      </div>

      <div class="button">
         <button type="submit" name="submit"><span>NEXT</span></button>
      </div>
</form>

   </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
