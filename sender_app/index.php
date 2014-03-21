<?php
session_start();
$names = Array('Cristián', 'Alejandro', 'María', 'Denisse', 'Carlos', 'Carmen', 'Emmanuel', 'Winston');
$surnames = Array('Ibañez', 'Perez', 'Goldstein', 'Smith', 'Gonzalez');
if (!isset($_SESSION['full_name'])) {
  $_SESSION['full_name'] = $names[array_rand($names)] . ' ' . $surnames[array_rand($surnames)];
}

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
  <title>Secure system</title>
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
  <p>Welcome to our secure system, <?php echo $_SESSION['full_name'] ?></p>
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
