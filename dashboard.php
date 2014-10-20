<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
  require 'config.php';

//
  if(isset($_GET['page'])) {
    $pages=array("products","cart");
    if(in_array($_GET['page'], $pages)) { $_page=$_GET['page']; }
    else { $_page="products"; }
  }
  else { $_page="products"; }
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
<!-- PRODUCTS -->
<?php
  if(isset($_GET['action']) && $_GET['action']=="add") {
    $id=intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity']++;
    } else {
      $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
      $sql_s="SELECT * FROM products WHERE id={$id}";
      $query_s = mysqli_query($con,$sql_s) or die("Failed on query: ".mysqli_error());
      if(mysqli_num_rows($query_s)!=0) {
        $row_s=mysqli_fetch_array($query_s);
        $_SESSION['cart'][$row_s['id']]=array("quantity"=>1,"price"=>$row_s['price']);
      } else { $message="This product id it's invalid!"; }
    }
  }
?>
<!-- -->
    <div class="tabs">
<?php
  if(isset($message)) { echo "<h2>$message</h2>"; }
//  echo print_r($_SESSION['cart']);
?>
      <div id="drinks"><p>Drinks</p>

        <?php
//          //current URL of the Page. cartupdate.php redirects back to this URL
//	  $currenturl = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

/*	  $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
          $drinks = mysqli_query($con,"SELECT * FROM products WHERE category='drinks' ORDER BY id ASC") or die("Failed on query drinks: ".mysqli_error());
          if ($drinks) {
            //fetch drinks set as object and output HTML
            while ($row = mysqli_fetch_object($drinks)) {
                echo '<form method="post" action="cartupdate.php">';
<<<<<<< HEAD
//       	        echo '<a href="#" class="action-button shadow animate red">'.$row->productname.'</a>';
       	        echo '<button class="action-button shadow animate red">'.$row->productname.'</button>';
//                echo '<input type="hidden" name="productname" value="'.$row->productname.'" />';
//                echo '<input type="hidden" name="type" value="add" />';
//	        echo '<input type="hidden" name="return_url" value="'.$currenturl.'" />';
               echo '</form>'; }
=======
       	        echo '<a href="#" class="action-button shadow animate red">'.$row->productname.'</a>';
//       	        echo '<button class="action-button shadow animate red">'.$row->productname.'</button>';
                echo '</form>'; }
>>>>>>> a21de9b5bb87ecbbaf361b66ef29c1abab6d5566
	  mysqli_free_result($drinks); }
          mysqli_close($con);
*/



//<?php
  $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
  $sql="SELECT * FROM products WHERE category='drinks' ORDER BY productname";
  $query = mysqli_query($con,$sql) or die("Failed on query: ".mysqli_error());
  while ($row=mysqli_fetch_array($query)) {
?>
  <a href="dashboard.php?page=products&action=add&id=<?php echo $row['id']; echo "#drinks" ?>" class="action-button shadow animate red"><?php echo $row['productname'] ?></a>




<!--  <td><?php echo $row['price'] ?> €</td> -->
<!--  <td><a href="dashboard.php?page=products&action=add&id=<?php echo $row['id']; echo "#drinks" ?>">addtocart</a></td><br> -->

<?php } ?>






<!--            //fetch drinks set as object and output HTML
              while($row = $drinks->fetch_object()) {
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

        ?> -->
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
    <div id="shoppingcart">
      <h1>Shopping Cart</h1>
      <div id="lista">
          <?php
  	    if(isset($_SESSION['cart'])) {
  	      $sql="SELECT * FROM products WHERE id IN (";
	        foreach($_SESSION['cart'] as $id => $value) {
		  $sql.=$id.",";
		}
	        $sql=substr($sql, 0, -1).") ORDER BY productname";
//		echo $sql;
                $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
		$query = mysqli_query($con,$sql) or die("Failed on query: ".mysqli_error());
		while ($row=mysqli_fetch_array($query)) {
		?>
		<p><?php echo $row['productname'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity']?></p>
	  <?php } ?>
  <hr />
  <a href="dashboard.php?page=cart">Go to cart</a>
            <?php
 	    } else { echo "<p>Your Cart is empty.<br>Please add some products.</p>"; }
            ?>
      </div>
    </div>
  </div>

</body>
</html>

