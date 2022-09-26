DROP table if exists bot_qa;
DROP table if exists bot_login;


create table bot_qa(
  id int AUTO_INCREMENT,
  q TEXT,
  a TEXT,
  PRIMARY KEY (id)
);


create table bot_login(
  id int AUTO_INCREMENT,
  first_name TEXT,
  name TEXT,
  email TEXT,
  password TEXT,
  hint TEXT,
  login_status TEXT,
  PRIMARY KEY (id)
);

insert into bot_qa (q, a) values ('How are you','not so well');
insert into bot_qa (q, a) values ('wassup','not much');
insert into bot_qa (q, a) values ('How are you doing','doing well');
insert into bot_qa (q, a) values ('How are you today','today I am very happy');
-- insert into bot_login (first_name, name, email, password, hint) values ('Peter','Lustig','123@gmail.com','123', 'OneTwoThree');

