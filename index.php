<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require 'data.php';

session_start();
$message = "";
if(count($_POST) > 0) {
  $con = mysqli_connect("$host", "$dbusername", "$dbpassword", "$dbname") or die ("Failed to connect mysql: ".mysqli_connect_error());

  // Username and Password sent from form 
  $myusername = $_POST['myusername'];
  $mypassword = $_POST['mypassword'];

  // To protect MySQL injection
  $myusername = mysqli_real_escape_string($con, $myusername);
  $mypassword = mysqli_real_escape_string($con, $mypassword);
  $sql = "SELECT * FROM $tbname WHERE username='$myusername' and password='$mypassword'";
  $result = mysqli_query($con,$sql) or die("Failed on query: ".mysqli_error());
/* alternative:
    if($result->num_rows == 1) { header("Location: dashboard.php"); }
    else { $message = "Invalid Username or Password!"; }
*/
  $row = mysqli_fetch_row($result);
  if(is_array($row)) {
    $_SESSION["id"] = $row[0];
    $_SESSION["username"] = $row[1];
  } else { $message = "Invalid Username or Password!"; }
}
if(isset($_SESSION["id"])) { header("Location: dashboard.php"); }
?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="styled.css" />
  <title>Restorders</title>
</head>

<body id="content">
<h1 class="title">Restorders</h1>
<p class="subtitle">doing some orders.</p>

<div class="login-wrap">
  <h2>Login</h2>
  <form name="frmuser" method="post" action="">
    <div class="form">
      <fieldset id="inputs">
        <input id="myusername" name="myusername" type="text" placeholder="Username" autofocus required />
        <input id="mypassword" name="mypassword" type="password" placeholder="Password" required />
        <button>Sign In</button>
      </fieldset>
    </div>
    <div class="message"><?php if($message != "") { echo $message; } ?></div>
  </form>
</div>

</body>
</html>

