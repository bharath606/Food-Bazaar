<?php

include 'header.php';
if (isset($error)) {
    echo '<h2 style="color:red">'.$error.'</h2>';
} elseif (isset($user_id)) {
    ?>
    <h2>You are logged in...</h2>
    <?php
    if ($_POST["action"]) {
        redirect_to_same();
    }
} 
else {

?>
<html>
<style type="text/css">
	.login-box{
	border: 2px solid green;
	padding: 0px 15px 20px;
	border-radius: 20px;
	width: 340px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	color: #333;

	}

	.login-box h1{
		font-size: 40px;
		border-bottom: 6px solid green;
		margin-bottom: 50px;
		padding: 13px 0;
	}
	.textbox{
		width: 100%;
		overflow: hidden;
		font-size: 30px;
		padding: 8px 0;
		margin: 8px 0;
		border-bottom: 1px solid green;
	}

	.textbox input{
	     border: none;
	     outline: none;
	     background:none;
	     font-size: 18px;
	     color: #333;
	     width: 80%;
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
<div class="login-box" style="margin-top: 50px;">
    <form method="post" action=""> 
	<h1 style="color: #333;">Login</h1>

	<div class="textbox">
		<i class="fa fa-user" aria-hidden="true"></i>

		<input type="text" name="email" placeholder="Enter Email" value="">
	</div>

	<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>

		<input type="password" name="password" placeholder="Password" value="" style="color: #333;">
	</div>

	<input class="login" type="submit" name="action" value="Sign in">
   </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
<?php
}