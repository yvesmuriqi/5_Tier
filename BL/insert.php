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
$company = $_POST["company"];
$department = $_POST["department"];
$job_title = $_POST["job_title"];
$job_description = $_POST["job_description"];

include_once $_SERVER['DOCUMENT_ROOT'] = '../DIL/db_connection_mysql.inc';
try {
    $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO employee (employee_id, first_name, last_name, birth_date, email, ahv, phone) VALUES ('$employee_id', '$first_name','$last_name', '$birth_date', '$email','$ahv','$phone');";
    $sql .= "INSERT INTO company (company, department, job_title, job_description, id_employee) VALUES ('$company', '$department','$job_title','$job_description', '$employee_id');";
    // use exec() because no results are returned
    $dblink->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$dblink = null;

header("Location: ../PL/index.html");
?>