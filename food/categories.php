<?php

include 'header.php';

?>
<style type="text/css">
  .types h1{
    display: inline-block;
    padding: 10px;
    margin: 0px 20px 40px 200px;
    text-align: center;
  }
  h1 a{
    color: orange;
    border-bottom: 2px solid #333;
  }
  h1 a:hover{
    text-decoration: none;
    color: green;
  }
  .headings{
      display: block;
      margin-top: 20px;
      text-align: center;
      color: green;
      text-decoration: underline;
      text-decoration-color: #333;
    }
    .footer{
        text-align: center;
        position: relative;
        bottom: 0;
        color: orange;
        background-color: #333;
    }
</style>

<h1 class="headings">Order Items:</h1><br>

<div class="types">
  <h1 class="first"><a href="veg.php">Veg</a></h1>
  <h1><a href="non-veg.php">Non-Veg</a></h1>
  <h1><a href="fast-food.php">Fast-Food</a></h1>
</div><br><br><br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>

<div class="footer">
    <h1>&copy 2020:Food Bazaar</h1>
</div>

