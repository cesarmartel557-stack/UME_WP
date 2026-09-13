<?php
/**
 * Expansion Email notification Class 
 *
 */
 if (! class_exists('bookingpress_expansion_email_notifications') ) {
    class bookingpress_expansion_email_notifications {
        public function send_email_notification( $email_args = [], $test = 0 )
        {
            global $bookingpress_email_notifications;
            
            $email_args = array_merge([ 
            'email_to' => '', 
            'email_subject' => '', 
            'email_content' => '', 
            'from_name' => '', 
            'from_email' => '', 
            'reply_to' => '', 
            'reply_to_name' => '' 
            ], $email_args );
            
            
            if( $test ) $email_args['email_content'] = '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Prueba</title></head><body style="padding:20px;"><div style="text-align:center;border:0px solid slateblue;border-radius:5px;margin-bottom:10px;background: linear-gradient(45deg, cornflowerblue, #a6c0ee);color: white;padding: 10px;"> Prueba de Envio de Notificación </div><div style="padding:20px;text-align:center;border:1px solid slateblue;border-radius:20px;"><h2>¡Esto es una Prueba!</h2></div></body></html>';
                        
            extract( $email_args );
            $bookingpress_email_notifications->bookingpress_init_emai_config();
            $from_email = !empty($from_email)? $from_email : $bookingpress_email_notifications->bookingpress_email_sender_email;
            $from_name  = !empty($from_name)? $from_name : 'Clínica UME';
            #var_dump( $email_to, $bookingpress_email_notifications, $email_args );
            $send = 0;
            try{
            $send = $bookingpress_email_notifications->bookingpress_send_custom_email_notifications( $email_to, $email_subject, $email_content, $from_name, $from_email, $reply_to, $reply_to_name);
            $send = 1;
            }catch (exception $e){
                throw new booking_Expansion_Exception( $e->getMessage() );
            }
            
            return $send;
        }
        
    }
 }