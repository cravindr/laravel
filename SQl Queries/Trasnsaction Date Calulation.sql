SELECT
    t.id,
    t.date,
    @days:=TIMESTAMPDIFF(day ,
                  (SELECT MAX(date) FROM transaction WHERE date < t.date ),
                  date
        ) AS days
FROM transaction as t;


SELECT
    t.id,
    t.date,
    t.total_amount,
    @days:=TIMESTAMPDIFF(day ,
                         date,
                         (SELECT min(date) FROM transaction WHERE date > t.date )
        ) AS days,
       t.amount,
       (t.total_amount*@days*2*12)/(365*100) as intersec
FROM transaction as t;



SELECT
    t.id,
    t.date,
    @days:=TIMESTAMPDIFF(day ,
                         (SELECT MAX(date) FROM transaction WHERE date < t.date ),
                         date
        ) AS days
FROM transaction as t;
