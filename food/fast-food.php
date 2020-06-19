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
  <h1><a href="non-Veg.php">Non-Veg</a></h1>
  <h1><a href="fast-food.php">Fast-Food</a></h1>
</div>
<div class="card-deck" style="padding:0px 380px;">
<?php
$fast_food = get_results("SELECT * FROM items where type='fast food' ORDER BY id");
foreach ($fast_food as $item)
 {
    ?>

          <div class="card">
             <img class="card-img-top" src="<?php echo $item->photo; ?>" alt="Card image cap" height="300" width="100">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $item->name; ?></h5>
                  <p class="card-text">Price : Rs.<?php echo $item->price; ?>/-</p>
                  <a href="#" class="btn btn-primary btn-lg">Order-Now</a>

               </div>
          </div>
       <?php
}

?>
