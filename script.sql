create TABLE personaldata(
first_name varchar(255) not null,
last_name varchar(255) not null,
birth_date not null,
e-mail varchar(255),
ahv varchar(255) not null,
id_employee int not null unique,
telephone varchar(9),
primary key (employee_id)
);
    
create table company_data(
employee_id int, 
department varchar(50) not null,
job_title varchar(50) not null,
job_description varchar(255),
foreign key (employee_id) REFERENCES personaldata(id_employee) ON DELETE CASCADE ON UPDATE CASCADE
);
