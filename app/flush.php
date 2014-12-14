<?php

$db = new PDO('sqlite:/tmp/greetings.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("CREATE TABLE IF NOT EXISTS greetings (message varchar(10))");
$db->exec("DELETE FROM greetings");

session_start();
unset($_SESSION['full_name']);
session_destroy();
echo('Database flushed.<br/>');
echo('Session destroyed.<br/>');

echo('<a href="index.php">Go back</a>');
?>
