<?php
$user = "root";
$toReturn = "";
$DBPassword = "";
$DBName = "employee";
$Connect = 'mysql:host=localhost;dbname=' . $DBName;

try {
    $dblink = new PDO($Connect, $user, $DBPassword);
    $_SESSION['DBConnection']['ServerName'] = $DBName;
    $_SESSION['DBConnection']['Connected'] = true;
} catch (PDOException $e) {
    $_SESSION['DBConnection']['Connected'] = false;
    print "Error!: " . $e->getMessage() . "<br/>";
}
?>