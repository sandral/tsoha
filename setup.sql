/*drop table user;
drop table attr;
drop table manu;
drop table yarn;
drop table owns;
*/
create table user (
       user_id int not null unique auto_increment,
       username char(40) not null,
       password char(64) not null,
       primary key(user_id)
       );

/* Attribuutit */
create table attr (
       attr_id int not null unique auto_increment,
       attrname char(40),
       primary key(attr_id)
       );

/* Valmistajat */
create table manu (
       manu_id int not null unique auto_increment,
       manuname char(40),
       primary key(manu_id)
       );

/* Langat */
create table yarn (
       yarn_id int not null unique auto_increment,
       yarnname char(40),
       yarnmanu int,
       nsr int,
       description char(200),
       lpg int,
       location int,
       primary key(yarn_id),
       foreign key(yarnmanu) references manu(manu_id)
       );

/* Omistussuhteet */
create table owns (
       owns_id int not null unique auto_increment,
       owner int not null,
       yarn int not null,
       amount int,
       primary key(owns_id),
       foreign key(owner) references user(user_id) on delete cascade,
       foreign key(yarn) references yarn(yarn_id) on delete cascade
       );
