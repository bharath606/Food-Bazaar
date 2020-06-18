<?php

include 'header.php';

?>
<style type="text/css">
  .types h1{
    display: inline-block;
    padding: 10px;
    margin: 0px 20px 40px 120px;
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
  <h1 class="first"><a href="">Veg</a></h1>
  <h1><a href="">Non-Veg</a></h1>
  <h1><a href="">Fast-Food</a></h1>
  <h1><a href="">Chinese-Items</a></h1>
</div>

 <div class="card-deck" style="padding: 40px;">
  <div class="card">
    <img class="card-img-top" src="images/grilled-chicken.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Grilled Chicken </h5>
      <p class="card-text">Price : Rs.65/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/gobi rice.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Gobi Rice</h5>
      <p class="card-text">Price : Rs.54/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/noodles.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Noodles</h5>
      <p class="card-text">Price : Rs.70/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>
</div><br><br>




<div class="card-deck" style="padding: 40px;">
  <div class="card">
    <img class="card-img-top" src="images/masala fries.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Masala Fries </h5>
      <p class="card-text">Price : Rs.87/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/pizza.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Pizza</h5>
      <p class="card-text">Price : Rs.215/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/samosa.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Samosa</h5>
      <p class="card-text">Price : Rs.50/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>
</div>

<div class="card-deck" style="padding: 40px;">
  <div class="card">
    <img class="card-img-top" src="images/dosa.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Dosa </h5>
      <p class="card-text">Price : Rs40/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/idli.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Idli</h5>
      <p class="card-text">Price : Rs.45/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="images/puri.jpg" alt="Card image cap" height="300" width="100">
    <div class="card-body">
      <h5 class="card-title">Puri</h5>
      <p class="card-text">Price : Rs.40/-</p>
      <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

    </div>
  </div>
</div>


<div class="footer">
    <h1>&copy 2020:Food Bazaar</h1>
</div>

