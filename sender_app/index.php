<?php
session_start();
?>
<html>
<head>
  <title></title>
</head>
<body>
  <p>Send your email address for system access.</p>
  <form action="request.php" method="POST">
    <label for="email">E-Mail:</label>
    <input id="email" name="email" type="text">
    <input type="submit" value="Send">
  </form>
</body>
</html>