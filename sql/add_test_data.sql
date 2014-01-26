INSERT INTO users (username, password, isadmin) values ('Pentti', 'merinovillahousut', 1);

INSERT INTO manu (manuname) values ('Drops'),('TeeTee'),('Linie');

/*INSERT INTO yarn (yarnname, yarnmanu, nsrmin, nsrmax, lpg)
values ('Alpaca', 30, 35, 420),('Alpakka', 50, 60, 240),('Cora', 40, 50, 170);
*/

INSERT INTO yarn (yarnname, yarnmanu, nsrmin, nsrmax, lpg)
select 'Alpaca', manu_id, 30, 35, 420 from manu where manuname='Drops'
select 'Alpaca2', manu_id, 30, 35, 420 from manu where manuname='Drops';

/*
INSERT INTO yarn (yarnname, yarnmanu, nsrmin, nsrmax, lpg)
select 'Alpaca
*/

INSERT INTO attr (attrname) values ('merinovilla'),('akryyli'),('alpakka'),('valkoinen'),('punainen'),('lila');
 
INSERT INTO yarnattr (yarn, attr)
select yarn_id, attr_id from yarn, attr;