<?php
require_once("../DIL/db_connection_mysql.inc");

include_once $_SERVER['DOCUMENT_ROOT'] = '../DIL/db_connection_mysql.inc';

$sql = "SELECT * FROM employee WHERE employee_id='" . $_GET['employee_id'] . "'";
foreach ($dblink->query($sql) as $row) {
    $html_Output_Form = "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-sm-3\"></div>
        <div class=\"col-sm-6\"> <form action=\"../BL/update.php\" method=\"POST\">
                <div class=\"form-group\">
                <input type=\"hidden\" name=\"employee_id\" class=\"txtField\" value=\"" . $row['employee_id'] . "\" required>
<input type=\"hidden\" name=\"employee_id\"  value=\"" . $row['employee_id'] . "\" required>
                    <label for=\"first_name\">First name</label>
                    <input type=\"text\" class=\"form-control\" id=\"first_name\" name=\"first_name\"
                           placeholder=\"Enter first name\" value=\"" . $row['first_name'] . "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"last_name\">Last name</label>
                    <input type=\"text\" class=\"form-control\" id=\"last_name\" name=\"last_name\"
                           placeholder=\"Enter last name\" value=\"" . $row['last_name'] . "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"birth_date\">Birth date</label>
                    <input type=\"date\" class=\"form-control\" id=\"birth_date\" name=\"birth_date\"
                           aria-describedby=\"emailHelp\"
                           placeholder=\"Choose birth date\" value=\"" . $row['birth_date'] . "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"email\">Email address</label>
                    <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Enter email\" value=\"" . $row['email'] . "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"ahv\">AHV-Number</label>
                    <input type=\"text\" class=\"form-control\" id=\"ahv\" name=\"ahv\" laceholder=\"Enter ahv-number\" 
                           title=\"Must match pattern 'www.xxxx.yyyy.zz'\" value=\"" . $row['ahv'] . "\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"phone\">Phone number</label>
                    <input type=\"tel\" class=\"form-control\" id=\"phone\" name=\"phone\" placeholder=\"Enter phone number\" value=\"" . $row['phone'] . "\"
                           required>
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
            </form>";

    $html_Output = "<html><head><title>Employee</title><link rel='stylesheet' href='../PL/style.css'><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'></head><div class=\"col-sm-3\"></div></div>";
    $html_Output .= "<nav class=\"navbar navbar-dark bg-primary\"><a class=\"navbar-brand\" href=\"../PL/index.html\">Employee</a></nav>";
    $html_Output .= "<body>";
    $html_Output .= $html_Output_Form;
    $html_Output .= "</body></html>";

    echo $html_Output;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE employee SET employee_id='" . $_POST['employee_id'] . "', first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', birth_date='" . $_POST['birth_date'] . "' ,email='" . $_POST['email'] .  "', ahv='" . $_POST['ahv'] . "', phone='" . $_POST['phone'] . "' WHERE employee_id='" . $_POST['employee_id'] .  "'";
    $dblink->query($sql);
    $message = "Record Modified Successfully";
}
$dblink = null;

?>
