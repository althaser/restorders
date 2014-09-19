<?php
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
  require 'data.php';
?>

<html>
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="styled.css" />
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" href="css/products.css">
  <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/switcher.js"></script>
  <title>Dashboard</title>
</head>

<body>
  <div class="topbar">
    <p>Dashboard</p>
  </div>
  <div class="main">
    <?php if($_SESSION["username"]) { ?>
      <div class="welcome">Welcome <?php echo $_SESSION["username"]; ?><a href="logout.php" title="Logout"> (Logout)</a></div>
    <?php include "menu.php"; } ?>
    <div class="tabs">
      <div id="drinks"><p>Drinks</p>
        <?php
          //current URL of the Page. cart_update.php redirects back to this URL
	  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	  $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
          $drinks = mysqli_query($con,"SELECT * FROM products WHERE category='drinks' ORDER BY id ASC") or die("Failed on query drinks: ".mysqli_error());
          if ($drinks) {
            //fetch drinks set as object and output HTML
            while ($row = mysqli_fetch_object($drinks)) {
                echo '<form method="post" action="cartupdate.php">';
       	        echo '<a href="#" class="action-button shadow animate red">'.$row->productname.'</a>';
//       	        echo '<button class="action-button shadow animate red">'.$row->productname.'</button>';
                echo '</form>'; }
	  mysqli_free_result($drinks); }
          mysqli_close($con);


            //fetch drinks set as object and output HTML
/*            while($row = $drinks->fetch_object()) {
	      echo '<div class="product">'; 
              echo '<form method="post" action="cart_update.php">';
	      echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
              echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
              echo '<div class="product-desc">'.$obj->product_desc.'</div>';
              echo '<div class="product-info">';
	      echo 'Price '.$currency.$obj->price.' | ';
              echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
	      echo '<button class="add_to_cart">Add To Cart</button>';
	      echo '</div></div>';
              echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
              echo '<input type="hidden" name="type" value="add" />';
	      echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
              echo '</form>';
              echo '</div>'; } }
*/
        ?>
<!--	<a href="#" class="action-button shadow animate yellow">Beer 20cl</a>
	<a href="#" class="action-button shadow animate yellow">Beer 50cl</a><br><br>
	<a href="#" class="action-button shadow animate red">Coke</a>
	<a href="#" class="action-button shadow animate red">Coke Zero</a><br><br>
	<a href="#" class="action-button shadow animate green">Fanta</a>
	<a href="#" class="action-button shadow animate green">7Up</a><br><br>
	<a href="#" class="action-button shadow animate blue">Water 33cl</a>
	<a href="#" class="action-button shadow animate blue">Water 1l</a><br><br>
	<a href="#" class="action-button shadow animate wine">Red 7.5dl</a>
	<a href="#" class="action-button shadow animate wine">White 7.5dl</a>
	<a href="#" class="action-button shadow animate wine">Rose 7.5dl</a><br><br>
	<a href="#" class="action-button shadow animate wine">Red</a>
	<a href="#" class="action-button shadow animate wine">White</a>
	<a href="#" class="action-button shadow animate wine">Rose</a><br><br>
	<a href="#" class="action-button shadow animate wine">Sangria 1.5l</a>
	<a href="#" class="action-button shadow animate wine">Sangria 1l</a>-->
      </div>
      <div id="starters"><p>Starters</p>
	<?php
          //current URL of the Page. cart_update.php redirects back to this URL
	  //$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	  $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
          $starters = mysqli_query($con,"SELECT * FROM products WHERE category='starters' ORDER BY id ASC") or die("Failed on query starters: ".mysqli_error());
          if ($starters) {
            while ($row = mysqli_fetch_object($starters)) { 
		//printf ("%s ", $row->productname);
       	        echo '<a href="#" class="action-button shadow animate blue">'.$row->productname.'</a>'; }
	  mysqli_free_result($starters); }
          mysqli_close($con);
	?>

<!--    <a href="#" class="action-button shadow animate blue">Garlic Bread</a>
	<a href="#" class="action-button shadow animate red">Garlic Pizza</a>
	<a href="#" class="action-button shadow animate green">Soup</a>
	<a href="#" class="action-button shadow animate yellow">Bread</a>-->
      </div>
      <div id="pizzas"><p>Pizzas</p>
        <a href="#" class="action-button shadow animate blue">Margarita</a>
	<a href="#" class="action-button shadow animate red">Pepperoni</a>
	<a href="#" class="action-button shadow animate green">Rustic</a>
	<a href="#" class="action-button shadow animate yellow">Roman</a>
      </div>
      <div id="fourth">FOURTH</div>
    </div>
    <div id="shopcart"><p>Shopping Cart</p></div>
  </div>

</body>
</html>

