<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Billing Software</title>

	<link href="plugin/bootstrap4.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="plugin/bootstrap4.min.js"></script>
	<script src="plugin/jquery3.min.js"></script>
	 <!-- custome stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- custome stylesheet -->
    <!-- custme js -->
    <!-- <script type="text/javascript" src="js/custome.js"></script> -->
    <!-- custome js -->
 

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet"> -->

    <style type="text/css">
    	body{
				 /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
				 background-image: url("images/back.jpg");
				 background-attachment: fixed;
				  background-repeat: no-repeat;
				  background-size:cover;
				  overflow-y: none;
				  font-family: 'Ropa Sans', sans-serif;
    	}
    	.main{
    		height: auto;
			margin-top: 5em; 
			background-color:#3f5569;
			border:solid 0.5px #fff;
		}
		.main label{
			color:#ffffff;
		}
    	form{
    		margin: 0px;
    		padding: 0px;
    	}

    </style>


</head>
<body>
	<div class="container d-flex justify-content-center">
		<div class="col-md-3 form-control main">
			<div class="lobo text-center">
                <img class="m-4 img-fluid" id="myImage" src="images/fav.png" alt="Favorite Image" title="Favorite Image" width="130">
			</div>
			<form class="form" action="" method="post" autocomplete="off">
				<div class="m-2">
					<label for="username">Username</label>
					<input type="text" class="form-control form-control-sm" placeholder="Username" id="username" name="username" autocomplete="off" autofocus>
					<div class="msg"></div>
				</div>
				<div class="m-2">
					<label for="password">Password</label>
					<input type="password" class="form-control form-control-sm" placeholder="Password" id="password" name="pass">
					<div class="psg"></div>
				</div>
			
				<div class="m-2 text-center">
					<!-- <div class="psg"></div> -->
					<button type="button" name="login" class="btn btn-sm col-md-8 mt-2 btn-outline-warning" onclick="Diver()">LOG IN</button>
				</div><hr/>

				<!-- <div class="text-left" style="margin-top: -13px;">
					<a href="forget_pass.php?user=admin">Forget Password</a>
				</div> -->
			</form>
		</div>
	</div>

	<script>
		function Diver()
		{
			var username= $('#username').val();
			var password= $('#password').val();
			$.ajax({
				type:'POST',
				url:'login_check.php',
				data:{username:username,password:password},
				success: function(status) 
				{
					$('.psg').html(status)
				}
			})
		}
	</script>

</body>
<?php
include("connect.php");

// if(isset($_POST['login']))
//  {

//    $user=$_POST['username'];
//    $password=$_POST['pass'];
//    $sql="SELECT * FROM `login` WHERE `username`='$user' AND`password`='$password';";
//    $result=mysqli_query($conn,$sql);

//    if(mysqli_num_rows($result)<>0){
// 	session_start();
// 	$_SESSION['type']="admin";
//    echo "<script> window.location='purchase-product.php'; </script>";
//   }
//    else
//    {
// 	echo "<script >alert ('Incorrect password')</script>";
// 	echo "<script> window.location='index.php'; </script>";
// 	}
// }
?>