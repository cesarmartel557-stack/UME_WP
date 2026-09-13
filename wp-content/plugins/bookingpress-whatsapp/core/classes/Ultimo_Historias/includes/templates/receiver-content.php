<?php

if(!defined("BPHC_PLUGIN_DIR") ) { exit; }

@ini_set('max_input_vars',0);
@ini_set('display_errors',1);

  if( !empty( $_REQUEST['booking_Expansion_action'] ) ){
    $received_data = $_REQUEST;
  }else{ $received_data = ( json_decode(file_get_contents("php://input"),true) ); }
  
  #var_dump( $_POST, $_SERVER["REQUEST_METHOD"], $_SERVER["DOCUMENT_ROOT"] );
  #if(!empty($_POST)) exit;
  if( !$this || !$this instanceof BookingPress_Expansion_Plugin ) return;
  if( $received_data == null ) $this->response_failure([ 'msg'=> 'Fallo al recibir los datos de la plantilla.' ]);
    
    if( $received_data['action'] != 'booking_Expansion_send_content') return;
        $subject = sanitize_text_field($received_data['email_subject']);
        $email_list = json_decode($received_data['email_list'], true);
        if( empty($email_list) ) $email_list = json_decode(stripslashes($received_data['email_list']), true);
        $email_list = (array) $email_list;
        
        $send_content = json_decode($received_data['content'], true);
        if( empty($send_content) ) $send_content = json_decode(stripslashes($received_data['content']), true);
        #echo $send_content;
        #echo '-------Fin received----------------';
        #exit;
        
        if( empty($send_content) ) $this->response_failure([ 'msg'=> 'Fallo, no se recibió el contenido del mensaje.' ]);
        #var_dump( $received_data );
        $send_result = 0;
        $addition_expire_time = 15;
        $prev_send_cookie = !empty($_COOKIE["booking_Expansion_send_content"])? $_COOKIE["booking_Expansion_send_content"] : 0;
        
        if( (absint($prev_send_cookie) + $addition_expire_time) > time() ) $this->response_failure([ 'msg'=> 'Espera un momento antes de realizar otra petición.' ]);
        $Booking_expansion_email = $this->email_notification_instance( );
                
        $send_global_result = 0;
        ob_start();
        foreach( $email_list as $email_to ){
            $email_to = sanitize_email($email_to);
            $send_result = $Booking_expansion_email->send_email_notification([
            'email_to' => /*'cv.msuarez@gmail.com'*/ $email_to,
                'email_subject' => ( !empty($subject)? $subject:'Hoja de Historia Clínica' ), 
                    'email_content' => $send_content,
            ]);
            $send_global_result = $send_result? ($send_global_result+1):($send_global_result-1);
            echo (!$send_result)?"Fallo: {$email_to}\n" : "Enviado: {$email_to}\n";           
        }
        $maxiELmejor = ob_get_clean();
        
        setcookie("booking_Expansion_send_content", time(), time() + 3600, "/");
        
                    /** ** **** Send REsponse  &  Exit **** ** **/
        $email_send_response = [ 'variant' => 'success', 'type' => 'success', 'title' => 'Enviado', 'msg' => $maxiELmejor ];        
        
        if( $send_global_result < 1 ){
            $email_send_response['variant'] = $email_send_response['type'] = 'error';
            if(empty($email_list)) $email_send_response['msg'] = 'Debes agregar almenos 1 destinatario.';
        }
                
        //$this->response_failure([ 'title' => $maxiELmejor, 'msg' => ' Finalizao ... ( ' . $send_result . ' ) '.json_encode($email_list) ]);
        $this->SendResponse__exit( $email_send_response );
