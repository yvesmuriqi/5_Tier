CREATE PROCEDURE show_workers_department (@department varchar(50))
BEGIN
    SELECT * FROM company WHERE department = @department;
END