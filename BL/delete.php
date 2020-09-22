<?php
require_once("../DIL/function.inc");
require_once("../DIL/db_connection_mysql.inc");
//require_once("../DIL/db_connection_mariadb.inc");

include_once $_SERVER['DOCUMENT_ROOT'] = '../DIL/db_connection_mysql.inc';
try {
    $sql = "DELETE FROM employee WHERE employee_id='" . $_GET['employee_id'] . "'";

    $dblink->exec($sql);
    echo "Deleted record successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$dblink = null;

header("Location: ../BL/get_data.php");
?>