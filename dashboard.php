<?php
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
?>

<html>
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="styled.css" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
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
  </div>

</body>
</html>

