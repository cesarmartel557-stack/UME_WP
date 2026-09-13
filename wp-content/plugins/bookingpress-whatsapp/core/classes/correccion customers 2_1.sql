

UPDATE `a_bookings` ab join wp_bookingpress_appointment_meta am on ab.bookingpress_entry_id=am.bookingpress_entry_id 
join wp_bookingpress_appointment_bookings abb on ab.bookingpress_entry_id=abb.bookingpress_entry_id and ab.bookingpress_appointment_booking_id = abb.bookingpress_appointment_booking_id
SET ab.ap_dni = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.text_C6kufq')),
ab.ap_email = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.customer_email')  ),
ab.ap_phone = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.customer_phone')  )
where am.bookingpress_appointment_meta_key='appointment_form_fields_data' and  ab.ap_dni=0


select * from `a_bookings` ab join wp_bookingpress_customers c on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') = REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') and c.customer_dni = ab.ap_dni join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id 
and cm.bookingpress_customersmeta_key='persona_dir';


select * from `a_bookings` ab join wp_bookingpress_customers c on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') = REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') and c.customer_dni = ab.ap_dni join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id 
and cm.bookingpress_customersmeta_key='text_C6kufq';

FECHA 2025-09-15

select * from `a_bookings` ab left join wp_bookingpress_customers c on  c.customer_dni = ab.ap_dni WHERE ab.bookingpress_customer_id = 2401 and ab.bookingpress_created_at > '2025-09-01' and c.customer_dni is NULL
ORDER BY `c`.`bookingpress_customer_id` ASC;





SELECT * FROM a_cus2 c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id 
WHERE cm.bookingpress_customersmeta_key='text_C6kufq' and cm.bookingpress_customersmeta_value is not null and cm.bookingpress_customersmeta_value!='' and c.customer_dni is null
ORDER BY c.bookingpress_user_created DESC;

update a_cus2 c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id and cm.bookingpress_customersmeta_key='text_C6kufq'
set c.customer_dni = cm.bookingpress_customersmeta_value
WHERE cm.bookingpress_customersmeta_key='text_C6kufq' and cm.bookingpress_customersmeta_value is not null and cm.bookingpress_customersmeta_value!='' and c.customer_dni is null
ORDER BY c.bookingpress_user_created DESC;


---customer data --- 
update a_cus2 c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id and cm.bookingpress_customersmeta_key='persona_fecha'
set c.persona_fecha = cm.bookingpress_customersmeta_value
WHERE cm.bookingpress_customersmeta_key='persona_fecha' and cm.bookingpress_customersmeta_value is not null and cm.bookingpress_customersmeta_value!='' and c.customer_dni is not null
ORDER BY c.bookingpress_user_created DESC;

update a_cus2 c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id and cm.bookingpress_customersmeta_key='persona_genero'
set c.persona_genero = cm.bookingpress_customersmeta_value
WHERE cm.bookingpress_customersmeta_key='persona_genero' and cm.bookingpress_customersmeta_value is not null and cm.bookingpress_customersmeta_value!='' and c.customer_dni is not null
ORDER BY c.bookingpress_user_created DESC;

update a_cus2 c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id and cm.bookingpress_customersmeta_key='persona_dir'
set c.persona_dir = cm.bookingpress_customersmeta_value
WHERE cm.bookingpress_customersmeta_key='persona_dir' and cm.bookingpress_customersmeta_value is not null and cm.bookingpress_customersmeta_value!='' and c.customer_dni is not null
ORDER BY c.bookingpress_user_created DESC;
---fin customer data --- 
id:4994 y 4995
Maria Arminda
Farias
0364 413-4278
1398590
1938-04-16T04:00:00.000Z
Femenino
Bº Lamadrid
------SELECT Y UPDATE ------
SELECT * from a_cus2 c join a_cus2 c2 on c.customer_dni = c2.customer_dni AND c.bookingpress_user_firstname = c2.bookingpress_user_firstname AND c.bookingpress_user_lastname = c2.bookingpress_user_lastname 
WHERE c2.persona_dir is not null and c.customer_dni = c2.customer_dni 
ORDER BY `c2`.`customer_dni` ASC


UPDATE a_cus2 c join a_cus2 c2 on c.customer_dni = c2.customer_dni AND c.bookingpress_user_firstname = c2.bookingpress_user_firstname AND c.bookingpress_user_lastname = c2.bookingpress_user_lastname 
SET c.persona_dir = c2.persona_dir
WHERE c2.persona_dir is not null and c.customer_dni = c2.customer_dni and c.bookingpress_user_firstname = 'Maria Arminda' 
ORDER BY `c2`.`customer_dni` ASC;


UPDATE a_cus2 c join a_cus2 c2 on c.customer_dni = c2.customer_dni AND c.bookingpress_user_firstname = c2.bookingpress_user_firstname AND c.bookingpress_user_lastname = c2.bookingpress_user_lastname 
SET c.persona_dir = c2.persona_dir
WHERE c2.persona_dir is not null and c.customer_dni = c2.customer_dni and c.bookingpress_user_firstname = c2.bookingpress_user_firstname
ORDER BY `c2`.`customer_dni` ASC;






------EXTENDIENDO REPLACE PHONE ----------
select * from `a_cus2`c join a_bookings ab on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND cast(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
where c.customer_dni is null and c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND CAST(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
ORDER BY c.`customer_dni` ASC;

update `a_cus2`c join a_bookings ab on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND cast(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
set c.customer_dni = ab.ap_dni
where c.customer_dni is null AND ab.ap_dni and c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND CAST(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
ORDER BY c.`customer_dni` ASC;


select * from `a_cus2`c join a_bookings ab on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND cast(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
where c.customer_dni is null and c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND CAST(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
ORDER BY c.`customer_dni` ASC;

---FULL AP USSERID UPDATE ---

update a_bookings ab join `a_cus2`c on c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND cast(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED)
set ab.ap_userid = c.bookingpress_customer_id 
where c.customer_dni is not null and c.bookingpress_user_firstname = ab.bookingpress_customer_firstname and c.bookingpress_user_lastname = ab.bookingpress_customer_lastname AND CAST(REGEXP_REPLACE(c.bookingpress_user_phone, '[^0-9]', '') AS SIGNED) = CAST(REGEXP_REPLACE(ab.bookingpress_customer_phone, '[^0-9]', '') AS SIGNED) and ab.bookingpress_created_at > '2025-09-15' and c.bookingpress_user_created > '2025-09-15'
ORDER BY c.`customer_dni` ASC;



SELECT DISTINCT concat(bookingpress_customer_firstname, bookingpress_customer_lastname, cast(REGEXP_REPLACE(bookingpress_customer_phone,'[^0-9]','') as signed)) FROM `a_bookings` where ap_userid !=0;


update `a_bookings` ab join a_cus2 c on ab.ap_userid = c.bookingpress_customer_id and ab.bookingpress_customer_firstname = c.bookingpress_user_firstname and ab.ap_dni=c.customer_dni
set ab.bookingpress_customer_id = ap_userid
WHERE ap_userid != 0 and ab.bookingpress_customer_firstname = c.bookingpress_user_firstname and ab.ap_dni=c.customer_dni;



update wp_bookingpress_appointment_bookings a join `a_bookings` ab on a.bookingpress_entry_id = ab.bookingpress_entry_id 
set a.bookingpress_customer_id = ab.bookingpress_customer_id
where a.bookingpress_entry_id = ab.bookingpress_entry_id;




--- CUSTOMER JOIN CUSTOMERS ---
SELECT * from `wp_bookingpress_customers` x join (select c.bookingpress_customer_id as userid,bookingpress_user_firstname,bookingpress_user_lastname,bookingpress_user_phone, cm.bookingpress_customersmeta_value, c.customer_dni from `wp_bookingpress_customers` c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id WHERE cm.bookingpress_customersmeta_key='text_C6kufq' and c.customer_dni is not NULL) z ON x.bookingpress_user_firstname = z.bookingpress_user_firstname and x.bookingpress_user_lastname = z.bookingpress_user_lastname and CAST(REGEXP_REPLACE(x.bookingpress_user_phone,'[^0-9]','') AS SIGNED) = CAST(REGEXP_REPLACE(z.bookingpress_user_phone,'[^0-9]','') AS SIGNED) 
where x.customer_dni is NULL
ORDER by x.bookingpress_user_firstname;

UPDATE `wp_bookingpress_customers` x join (select c.bookingpress_customer_id as userid,bookingpress_user_firstname,bookingpress_user_lastname,bookingpress_user_phone, cm.bookingpress_customersmeta_value, c.customer_dni from `wp_bookingpress_customers` c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id WHERE cm.bookingpress_customersmeta_key='text_C6kufq' and c.customer_dni is not NULL) z ON x.bookingpress_user_firstname = z.bookingpress_user_firstname and x.bookingpress_user_lastname = z.bookingpress_user_lastname and CAST(REGEXP_REPLACE(x.bookingpress_user_phone,'[^0-9]','') AS SIGNED) = CAST(REGEXP_REPLACE(z.bookingpress_user_phone,'[^0-9]','') AS SIGNED) 
SET x.customer_dni = z.customer_dni
where x.customer_dni is NULL
ORDER by x.bookingpress_user_firstname;






select * from `wp_bookingpress_customers` x join (select c.bookingpress_customer_id as userid,bookingpress_user_firstname,bookingpress_user_lastname,bookingpress_user_phone, cm.bookingpress_customersmeta_value, c.customer_dni from `wp_bookingpress_customers` c join wp_bookingpress_customers_meta cm on c.bookingpress_customer_id = cm.bookingpress_customer_id WHERE cm.bookingpress_customersmeta_key='text_C6kufq' and c.customer_dni is not NULL and cm.bookingpress_customersmeta_value is null) z ON x.bookingpress_user_firstname = z.bookingpress_user_firstname and x.bookingpress_user_lastname = z.bookingpress_user_lastname and CAST(REGEXP_REPLACE(x.bookingpress_user_phone,'[^0-9]','') AS SIGNED) = CAST(REGEXP_REPLACE(z.bookingpress_user_phone,'[^0-9]','') AS SIGNED) 
ORDER by x.bookingpress_user_firstname;






UPDATE `a_bookings` ab join wp_bookingpress_appointment_meta am on ab.bookingpress_entry_id=am.bookingpress_entry_id 
join wp_bookingpress_appointment_bookings abb on ab.bookingpress_entry_id=abb.bookingpress_entry_id and ab.bookingpress_appointment_booking_id = abb.bookingpress_appointment_booking_id
SET ab.ap_dni = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.text_C6kufq')),
ab.ap_email = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.customer_email')  ),
ab.ap_phone = JSON_UNQUOTE( JSON_EXTRACT(am.bookingpress_appointment_meta_value, '$.form_fields.customer_phone')  )
where am.bookingpress_appointment_meta_key='appointment_form_fields_data' and  ab.ap_dni=0
