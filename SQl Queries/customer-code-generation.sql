
select code, mid(code, 4, length(code)) from customer  where place=1;
select code, convert(mid(code, 4,length(code)),UNSIGNED) from customer  where place=1;

select code,
       concat(p.short_code,
       LPAD(
           if(
               Max(
                        convert(
                                 mid(code, 4, length(code))
                                , UNSIGNED
                                )
                  ) is null,0,Max(convert(mid(code, 4, length(code)), UNSIGNED))+1
               ),
           6,0))
 as Code from customer
join place p on customer.place = p.id
where place=1;

select code,
       concat(p.short_code,
              LPAD(
                      if(
                              Max(
                                      convert(
                                              mid(code, 4, length(code))
                                          , UNSIGNED
                                          )
                                  ) is null, 0, Max(convert(mid(code, 4, length(code)), UNSIGNED)) + 1
                          ),
                      6, 0)
                )
           as Code
from customer
         join place p on customer.place = p.id
where place = 1;



