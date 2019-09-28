CREATE TABLE users
(
  user_id int (11) IDENTITY(1,1) PRIMARY KEY NOT NULL ,
  user_first VARCHAR (256) NOT null,
  user_last VARCHAR (256) NOT null,
  user_email VARCHAR (256) NOT null,
  user_password VARCHAR (256) NOT null,
  user_uid VARCHAR (256) NOT null,
  user_pwd VARCHAR (256) NOT NULL
);
INSERT INTO users
  (user_first, user_last,user_email,user_uid,user_pwd)
VALUES
  ('Daniel', 'Nielsen', 'utt@gmail.com', 'Admin', 'test123') ;