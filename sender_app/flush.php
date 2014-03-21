<?php

$db = new PDO('sqlite:greetings.db');
$db->exec("CREATE TABLE IF NOT EXISTS greetings (message varchar(10))");
$db->exec("DELETE FROM greetings");

echo('Database flushed<br/>');
echo('<a href="index.php">Go back</a>');
?>
