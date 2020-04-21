create table if not exists b_user_bonus (
   ID int(11) not null auto_increment,
   DATE_CREATE datetime,
   USER_ID int(11),
   USER_NAME varchar(255),
   BONUS int(11),
   primary key (ID));
