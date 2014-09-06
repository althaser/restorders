<?php session_start(); ?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="styled.css" />
  <title>Dashboard</title>
</head>

<body>

<div class="dashboard">
  <h1>Dashboard</h1>
  <?php if($_SESSION["username"]) { ?>
  Welcome <?php echo $_SESSION["username"]; ?>.<br><br>
  <a href="logout.php" title="Logout">Logout</a>
  <?php } ?>
</div>

</body>
</html>

