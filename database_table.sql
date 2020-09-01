create TABLE personaldata(
last_name varchar not null,
first_name varchar not null,
birthday date not null,
e-mail varchar,
ahv_number varchar not null,
personal_number int not null unique,
telephone varchar,
primary key (personal_number)
);
    bn 
create table company_data(
id_personal_number int, 
department varchar not null,
job_title varchar not null,
job_description varchar,
foreign key (id_personal_number) REFERENCES personaldata(personal_number)
);