INSERT INTO users (username, password, isadmin) values ('Pentti', 'merinovillahousut', 1), ('Anneli', 'asdf', 0);

INSERT INTO manu (manuname) values ('Drops'),('TeeTee'),('Linie');

INSERT INTO yarn (yarn_id, yarnname, yarnmanu, nsrmin, nsrmax, lpg)
(select 5, 'Alpaca', manu_id, 30, 35, 420 from manu where manuname='Drops')
union (select 3, 'Alpakka', manu_id, 50, 60, 240 from manu where manuname='TeeTee')
union (select 2, 'Cora', manu_id, 40, 50, 170 from manu where manuname='Linie');

INSERT INTO attr (attrname) values ('merinovilla'),('akryyli'),('alpakka'),('valkoinen'),('punainen'),('lila');

INSERT INTO yarnattr (yarn, attr)
select yarn_id, attr_id from yarn, attr where
(yarnname='Alpaca' and attrname in ('alpakka', 'valkoinen')) or
(yarnname='Alpakka' and attrname in ('alpakka', 'punainen')) or
(yarnname='Cora' and attrname in ('merinovilla', 'akryyli', 'lila'));

INSERT INTO owns (owner, yarn, amount)
(select user_id, yarn_id, 300 from users, yarn where username='Pentti' and yarnname='Alpakka')
union (select user_id, yarn_id, 350 from users, yarn where username='Pentti' and yarnname='Cora')
union (select user_id, yarn_id, 200 from users, yarn where username='Anneli' and yarnname='Alpakka');