<?php
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
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
	<a href="#" class="action-button shadow animate yellow">Beer 20cl</a>
	<a href="#" class="action-button shadow animate yellow">Beer 50cl</a><br><br>
	<a href="#" class="action-button shadow animate red">Coke</a>
	<a href="#" class="action-button shadow animate red">Coke Zero</a><br><br>
	<a href="#" class="action-button shadow animate green">Fanta</a>
	<a href="#" class="action-button shadow animate green">7Up</a><br><br>
	<a href="#" class="action-button shadow animate blue">Water 33cl</a>
	<a href="#" class="action-button shadow animate blue">Water 1l</a><br><br>
	<a href="#" class="action-button shadow animate wine">Red 7,5dl</a>
	<a href="#" class="action-button shadow animate wine">White 7,5dl</a>
	<a href="#" class="action-button shadow animate wine">Rose 7,5dl</a><br><br>
	<a href="#" class="action-button shadow animate wine">Red</a>
	<a href="#" class="action-button shadow animate wine">White</a>
	<a href="#" class="action-button shadow animate wine">Rose</a><br><br>
	<a href="#" class="action-button shadow animate wine">Sangria 1.5l</a>
	<a href="#" class="action-button shadow animate wine">Sangria 1l</a>
      </div>
      <div id="starters"><p>Starters</p>
        <a href="#" class="action-button shadow animate blue">Garlic Bread</a>
	<a href="#" class="action-button shadow animate red">Garlic Pizza</a>
	<a href="#" class="action-button shadow animate green">Soup</a>
	<a href="#" class="action-button shadow animate yellow">Bread</a>
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

