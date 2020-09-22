<?php
require_once("../DIL/db_connection_mysql.inc");
include_once $_SERVER['DOCUMENT_ROOT'] = '../DIL/db_connection_mysql.inc';

// Erfolgreiche DB Verbindung pruefen  
if ($_SESSION['DBConnection']['Connected']) {
// SQL Query definieren  	
    $sql = "SELECT e.employee_id, e.first_name, e.last_name, e.birth_date, e.email, e.ahv, e.phone, c.company, c.department, c.job_title, c.job_description FROM employee e JOIN company c ON e.employee_id = c.id_employee;";
// Query ausfuehren
//    $result = $dbh->query($sql);
    $html_Output_InnerTable = "<table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>`
      <th scope=\"col\">First Name</th>
      <th scope=\"col\">Last Name</th>
      <th scope=\"col\">Birth Date</th>
      <th scope=\"col\">Email</th>
      <th scope=\"col\">AHV - Number</th>
      <th scope=\"col\">Phone</th>
            <th scope=\"col\">Company</th>
      <th scope=\"col\">Department</th>
<th scope=\"col\">Job Title</th>
<th scope=\"col\">Job Description</th>
<th scope=\"col\"></th>
<th scope=\"col\"></th>
    </tr>
  </thead>";
// Recorset zuweisen
// echo $sql;

        foreach ($dblink->query($sql) as $row) {
        $html_Output_InnerTable .= "<tbody>";
        $html_Output_InnerTable .= "<tr><th scope=\"row\"> " . $row['employee_id'] . "</th>";
        $html_Output_InnerTable .= "<td>" . $row['first_name'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['last_name'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['birth_date'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['email'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['ahv'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['phone'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['company'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['department'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['job_title'] . "</td>";
        $html_Output_InnerTable .= "<td>" . $row['job_description'] . "</td>";
        $html_Output_InnerTable .= "<td> <a href=\"updater.php?employee_id=".$row["employee_id"]."\"><button class=\"btn btn-primary\">Edit</button></a></td>";
            $html_Output_InnerTable .= "<td><a href=\"delete.php?employee_id=".$row["employee_id"]."\"><button class=\"btn btn-primary\">Delete</button></a></td></tr>";
            $html_Output_InnerTable .= "</tbody>";

    }
// Daten fuer Praesentation Layer vorbereiten
//    $html_Output_InnerTable .= "</tbody></table>";
    $html_Output = "<html><head><title>Hobbies</title><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'></head>";
    $html_Output .= "<nav class=\"navbar navbar-dark bg-primary\"><a class=\"navbar-brand\" href=\"../PL/index.html\">Employee</a></nav>";
    $html_Output .= "<body>";
    $html_Output .= $html_Output_InnerTable;
    $html_Output .= "</body></html>";

// HTML an Praesentation Layer senden
    echo $html_Output;
}
// Disconnect Database link
$dblink = null;
?>
