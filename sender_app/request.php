<?php
session_start();
header('X-XSS-Protection: 0');
?>
<html>
<head>
  <title></title>
</head>
<body>
  <p>Your request for <?php echo $_POST['email']; ?> has been sent.</p>
</body>
</html>