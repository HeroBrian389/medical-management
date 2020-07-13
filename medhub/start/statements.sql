create table BRIAN_KELLEHER_STATIC_INFO (id INT AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(255),
  lastName VARCHAR(255),
  dob VARCHAR(20),
  email VARCHAR(255),
  phone VARCHAR(40),
  address1 VARCHAR(255);
  address2 VARCHAR(255);
  county VARCHAR(100);
  basic_access VARCHAR(1000);
  address_access VARCHAR(1000);
  GP VARCHAR(255);
  refer VARCHAR(255);
  doctor_access VARCHAR(255);
  ndi VARCHAR(20);
  odi VARCHAR(20);
  molbpdq VARCHAR(20);
  rmdq VARCHAR(20);
  srs VARCHAR(20);
  red varchar(20);
  white varchar(20);
  HAEMOGLOBIN VARCHAR(20);
  neutrophils VARCHAR(20);
  lymphocytes VARCHAR(20);
  platelets VARCHAR(20);
  );


CREATE TABLE physicians (id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
speciality VARCHAR(255),
practice VARCHAR(255),
email VARCHAR(255));
