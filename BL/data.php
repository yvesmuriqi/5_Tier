<?php
require_once("./include/function.inc.txt");
require_once("./include/db_connection.inc.txt");

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

include_once $_SERVER['DOCUMENT_ROOT'] = '../BL/include/db_connection.inc.txt';
if ($_SESSION['DBConnection']['Connected'] AND !is_null($first_name) AND !(strlen($first_name) == 0) ) {
    $insert = "INSERT into employee (first_name, last_name, birth_date, email, ahv, employee_id, phone, company, department, job_title, job_description)";
}


?>