<?php
  session_start();
  if(!isset($_SESSION['id'])) { header("Location: index.php"); exit (0); }
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="styled.css" />
  <title>Dashboard</title>
</head>

<body>
  <div class="topbar">
    <h1>Dashboard</h1>
  </div>
  <div class="main">
    <?php if($_SESSION["username"]) { ?>
      Welcome <?php echo $_SESSION["username"]; ?> ! <a href="logout.php" title="Logout">(Logout)</a>
    <?php } ?>
  </div>

</body>
</html>

