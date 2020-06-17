<?php
include 'header.php';
?>

<html>
<style type="text/css">
	.login-box{
	border: 2px solid green;
	padding: 0px 15px 20px;
	border-radius: 20px;
	width: 500px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	color: #333;
    clear: both;
	}
    .textbox i{
    	float: left;
    }
	.login-box h1{
		font-size: 40px;
		border-bottom: 6px solid green;
		margin-bottom: 20px;
		padding: 13px 0;
	}
	.textbox{
		width: 100%;
		overflow: hidden;
		font-size: 30px;
		padding: 8px 0;
		margin: 6px 0;
		border-bottom: 1px solid green;
	}

	.textbox input{
	     border: none;
	     outline: none;
	     background:none;
	     font-size: 18px;
	     color: #333;
	     width: 60%;
	     margin: 0 10px;
	}

	.login{
		width: 100%;
		background-color: rgb(137, 148, 67);
		border: 2px solid green;
		color: green;
		padding: 5px;
		font-size: 20px;
		font-weight: bold;
		cursor: pointer;
		margin: 12px 0;
	}
	.skip{
		width: 100%;
		background-color: #333;
		border: 2px solid green;
		color: green;
		padding: 5px;
		font-size: 20px;
		font-weight: bold;
		cursor: pointer;
		margin: 12px 0;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<body style="background-color: white;">
<div class="login-box" style="margin-top: 80px;">
    <form method="post" action="database.php"> 
	<h1 style="color: #333;">Register</h1>

	<div class="textbox">
		<i>Full Name:</i><input type="text" name="fname" placeholder="Enter Full Name" value="">
	</div>

	<div class="textbox">
		<i>Email:</i><input type="text" name="email" placeholder="Enter Email" value="" style="color: #333;">
	</div>

	<div class="textbox">
		<i>Phone:</i><input type="number" name="phone" placeholder="Enter Number" value="" style="color: #333;">
	</div>

	<div class="textbox">
		<i>Password:</i><input type="password" name="password" placeholder="Enter Password" value="" style="color: #333;">
	</div>

	<input class="login" type="submit" name="action" value="Sign up">
   </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
