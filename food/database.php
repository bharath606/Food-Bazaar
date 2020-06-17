<?php
session_start();
include 'config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Kolkata");
if ($_POST["action"]=="Sign in") {
    $email = $_POST["email"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["password"] == $_POST["password"]){
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["role"] = $row["role"];
            } else {
                $error = "Password wrong!!";
            }
        }
    } else {
        $error = "No user found!!";
    }
}
if ($_POST["action"]=="Register") {
    $email = $_POST["email"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $error = "User already exists!!";
    } else {
        $data["full_name"] = $_POST["full_name"];
        $data["phone"] = $_POST["phone"];
        $data["email"] = $email;
        $data["password"] = $_POST["password"];
        $data["role"] = $_POST["role"];
        $id = insert('users',$data);
        if($id){
            $_SESSION["user_id"] = $id;
            $_SESSION["role"] = $data["role"];
            $error = "Registration successfull.";
        } else {
            $error = "Error occured!!";
        }
    }
}
if($_GET["logout"]=="yes"){
    session_destroy();
    header("Location: "."login.php");
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $role = $_SESSION["role"];
}