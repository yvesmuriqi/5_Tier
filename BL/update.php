<?php
require_once("../DIL/function.inc");
require_once("../DIL/db_connection_mysql.inc");
//require_once("../DIL/db_connection_mariadb.inc");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$birth_date = $_POST["birth_date"];
$email = $_POST["email"];
$ahv = $_POST["ahv"];
$employee_id = $_POST["employee_id"];
$phone = $_POST["phone"];

include_once $_SERVER['DOCUMENT_ROOT'] = '../DIL/db_connection_mysql.inc';
try {
    $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE employee SET employee_id='" . $_POST['employee_id'] . "', first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', birth_date='" . $_POST['birth_date'] . "' ,email='" . $_POST['email'] .  "', ahv='" . $_POST['ahv'] . "', phone='" . $_POST['phone'] . "' WHERE employee_id='" . $_POST['employee_id'] .  "'";
    // use exec() because no results are returned
    $dblink->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$dblink = null;

header("Location: ../PL/index.html");
?>