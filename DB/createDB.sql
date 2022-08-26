DROP table if exists bot_qa;



create table bot_qa(
  id int AUTO_INCREMENT,
  q TEXT,
  a TEXT,
  PRIMARY KEY (id)
);



insert into bot_qa (q, a) values ('How are you','not so well');
