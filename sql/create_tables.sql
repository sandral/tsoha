/*drop table user;
drop table attr;
drop table manu;
drop table yarn;
drop table owns;
*/
create table users (
       user_id serial not null unique,
       username char(40) not null,
       password char(64) not null,
       isadmin int not null,
       primary key(user_id)
       );

/* Attribuutit */
create table attr (
       attr_id serial not null unique,
       attrname char(40),
       primary key(attr_id)
       );

/* Valmistajat */
create table manu (
       manu_id serial not null unique,
       manuname char(40),
       primary key(manu_id)
       );

/* Langat */
create table yarn (
       yarn_id serial not null unique,
       yarnname char(40),
       yarnmanu int,
       nsrmin int,
       nsrmax int,
       description char(200),
       lpg int,
       primary key(yarn_id),
       foreign key(yarnmanu) references manu(manu_id)
       );

create table yarnattr (
       yarn int,
       attr int,
       foreign key(yarn) references yarn(yarn_id),
       foreign key(attr) references attr(attr_id)
       );


/* Omistussuhteet */
create table owns (
       owns_id serial not null unique,
       owner int not null,
       yarn int not null,
       amount int,
       primary key(owns_id),
       foreign key(owner) references users(user_id) on delete cascade,
       foreign key(yarn) references yarn(yarn_id) on delete cascade
       );
