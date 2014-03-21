<?php
session_start();
header('X-XSS-Protection: 0');

// Sqlite check

$db = new PDO('sqlite:greetings.db');
$db->exec("CREATE TABLE IF NOT EXISTS greetings (message varchar(10))");
if (isset($_POST['greeting'])) {
  $db->exec("INSERT INTO greetings VALUES ('" . $_POST['greeting'] . "')");
}
$result = $db->query("SELECT message FROM greetings");
$db = null;

?>
<html>
<head>
  <title>Welcome to our secure system</title>
  <style type="text/css">
    .praetorian {
      font-family: sans-serif;
      position: absolute;
      bottom: 0;
      right: 1%;
    }
  </style>
</head>
<body>
  <form action="index.php" method="POST">
    <label for="greeting">Say Hello:</label>
    <input id="greeting" name="greeting" type="text">
    <input type="submit" value="Send">
  </form>
  <p>
<?php
foreach ($result as $row) {
  echo $row['message'] . "<br/>";
}
?>
  </p>
  <p class="praetorian"><a href="flush.php">&#960</a></p>
</body>
</html>
