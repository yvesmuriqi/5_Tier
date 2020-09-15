create TABLE personaldata(
last_name varchar(255) not null,
first_name varchar(255) not null,
birthday date not null,
e-mail varchar(255),
ahv_number varchar(255) not null,
personal_number int not null unique,
telephone varchar(9),
primary key (personal_number)
);
    
create table company_data(
id_personal_number int, 
department varchar(50) not null,
job_title varchar(50) not null,
job_description varchar(255),
foreign key (id_personal_number) REFERENCES personaldata(personal_number) ON DELETE CASCADE ON UPDATE CASCADE
);