

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



