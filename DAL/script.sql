# Create database
CREATE DATABASE IF NOT EXISTS employee;

USE employee;

# Create tables
CREATE TABLE IF NOT EXISTS employee(
    employee_id int NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birth_date date NOT NULL,
    email VARCHAR(50),
    ahv VARCHAR(50) NOT NULL,
    phone VARCHAR(50),
    PRIMARY KEY (employee_id)
);

CREATE TABLE company(
    company_id int NOT NULL AUTO_INCREMENT,
    company VARCHAR(50) NOT NULL,
    department VARCHAR(50) NOT NULL,
    job_title VARCHAR(50) NOT NULL,
    job_description VARCHAR(50),
    id_employee int,
    PRIMARY KEY (company_id),
    FOREIGN KEY (id_employee) REFERENCES employee(employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);

# Create triggers
CREATE TABLE IF NOT EXISTS employee_audit (
	employee_audit_id INT NOT NULL UNIQUE AUTO_INCREMENT,
    employee_data_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    PRIMARY KEY(employee_audit_id));

CREATE TRIGGER employee_insert
	AFTER INSERT ON employee
	FOR EACH ROW
	INSERT INTO employee_audit
	SET
        employee_data_id = New.employee_id,
		action = 'INSERT';

CREATE TRIGGER employee_udpate
	BEFORE UPDATE ON employee
    FOR EACH ROW
    INSERT INTO employee_audit
    SET
        employee_data_id = OLD.employee_id,
		action = 'UPDATE';

CREATE TRIGGER personaldata_delete
	BEFORE DELETE ON employee
    FOR EACH ROW
    INSERT INTO employee_audit
    SET
        employee_data_id = OLD.employee_id,
        action = 'DELETE';
