<?php
  if(isset($_POST['submit'])) {
    foreach($_POST['quantity'] as $key => $val) {
      if($val==0) {
        unset($_SESSION['cart'][$key]);
      } else {
        $_SESSION['cart'][$key]['quantity']=$val;
        }
    }
  }
  require 'config.php';
?>

<h1>View cart</h1>
-<a href="index.php?page=products">Go back to products page</a>
<br /><br />
<form method="post" action="index.php?page=cart">
  <table>
    <tr>
      <th>ProductName</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Items Price</th>
    </tr>
    <?php
      $sql="SELECT * FROM products WHERE id IN (";
	        foreach($_SESSION['cart'] as $id => $value) {
		  $sql.=$id.",";
		}
	        $sql=substr($sql, 0, -1).") ORDER BY productname";
//		echo $sql;
     		$con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());
		$query = mysqli_query($con,$sql) or die("Failed on query: ".mysqli_error());
		$totalprice=0;
		while ($row=mysqli_fetch_array($query)) {
		  $subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price'];
		  $totalprice+=$subtotal;
		?>
		  <tr>
		    <td><?php echo $row['productname'] ?></td>
		    <td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td>
<!--		    <td><?php echo $_SESSION['cart'][$row['id']]['quantity'] ?> x</td> -->
		    <td><?php echo $row['price'] ?> €</td>
		    <td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['price'] ?> €</td>
		  </tr>
	  <?php } ?>
<tr>
  <td>Total Price: <?php echo $totalprice ?></td>
</tr>

  </table>
  <br />
  <button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item set it's quantity to 0.</p>

