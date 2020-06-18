<?php
error_reporting(E_ERROR | E_PARSE);
include 'functions.php';
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php 
    $file = end(explode("/",$_SERVER["PHP_SELF"]));
    $file_name = substr($file, 0, -4);
    $file_name = ucwords(str_replace("_", " ", $file_name));
    echo $file_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://semantic-ui.com/javascript/library/tablesort.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.js"></script>
</head>
<body>
<header>

    <h1 id="title"><img src="images/food.jpg" height="60" width="100px" style="float: left;" class="logo">Food Bazaar </h1><img src="images/b.jpg" height="80" width="80" style="float: right;" class="profile"><br><br>

<ul class="topnav">
    <li><a href="index.php" class="active">Home</a></li>
    <li><a href="categories.php">Categories</a></li>
    <li><a href="orders.php">Orders</a></li>
    <?php
    if (!$user_id) {
        echo '
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
        ';
    } else {
        echo '
    <li><a href="?logout=yes">Logout</a></li>
        ';
    }
    ?>
    <li><a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    <li><a href="add.php">Items</a></li>
    </a></li>
</ul>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<style>
    .profile{
        border-radius: 20px;
    }
body {
    font-family: Arial, Helvetica, sans-serif;
}
.topnav {
    list-style-type: none;
    margin:0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(126, 163, 135);
    border: 2px solid rgb(126, 163, 135);
    border-radius: 40px;
    position: sticky;
    top: 0;


}
li{
    float: left;
}
li a {
    float: left;
    display: block;
    color: rgb(40, 62, 89);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 20px;
    border-right: 2px solid rgb(40, 62, 89);
}
li a:hover {
    background-color: #333;
    color: white;
}
li a.active {
    margin-left: 40px;
}
.topnav .icon {
    display: none;
}
@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
    float: right;
    display: block;
    }
}
@media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }
    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
</style>
</header>