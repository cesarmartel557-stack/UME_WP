<?php
/**
 * @class Consulta_Anses_HTML
 * @author Maxi
 * @copyright 2026
 */
@ini_set('display_errors', 1);
/**
 * CONSULTA DE OBRA SOCIAL Y NOMBRE POR DNI A ANSES
 * EJEMPLO URL: "?consulta_anses&doc=28154971&nomb=MEZA" 

 */
class Consulta_Anses_HTML {
    
    public $table_data = [ 'error'=> [], 'msg'=> '', 'data' => [], 'busqueda_criterio' => ['doc' => '', 'nombre' => '', 'margen_error' => ''], 'status' => 200, 'response' => '' ];
    public $search_doc_cuil = '';
    public $search_name = '';
    public $coincidencia = [ 'result' => 0, 'persona' => [], 'parent_key'=> ''/*deprecated*/, 'indx' => 0/*deprecated*/];
    public $url = "https://servicioswww.anses.gob.ar/ooss2/";
    public $proxy;
    public $proxyAuth;
    public $timeOut = 30;
    public $cookieMax_file_name = 'cookieMAXCURL8.txt';//dir filename
    
        
    public $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36';
    public $userAgent_mobile = 'Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36';
    public $request_headers = [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        'Accept-Language: es-419,es;q=0.9,en;q=0.8', "sec-ch-ua: \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"144\", \"Google Chrome\";v=\"144\"",
        'Accept-Encoding: gzip, deflate, br'
    ];
    public $post_request_headers = [
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
        'Accept-Language: es-419,es;q=0.9,en;q=0.8', "sec-ch-ua: \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"144\", \"Google Chrome\";v=\"144\"",
        //'Accept-Encoding: gzip, deflate, br'
    ];
        
    public $viewstate = '';
    public $viewstategenerator = '';
    public $eventvalidation = '';
    
    public $need_input_values = [
        '__VIEWSTATE'=>'',
        '__VIEWSTATEGENERATOR'=>'',
        '__EVENTVALIDATION'=>'',
        
    ];
    
    public $response = '';
    public $search_by_cuil = 0;
    public $show_response = true;
    public $return_data = false;
    public $search_doc_is_ok = 0;
    public $expired_time = 7776000;//7776000=(60*60*24*3*30)=3meses aprox. //7200=2hrs.
    private $anses_log_secret = "2026_Maxi_foat_2026";
    /**
     * @param $documento (string) Nro DOC o CUIL espacios y guiones se ignoran
     * @param $search_name (string) Apellido Y Nombre
     * 
     * Se inicia una nueva instancia de la clase y luego se invoca el metodo get_results()
     *  log expired_time, return_data, show_response se pueden configurar antes de get_results()
     * 
     * @return Class instance / se requiere invocar get_results() Array $table_data | wp_json response with headers
     */
    public function __construct( $documento = '', $searh_name = '' )
    {
        $this->search_doc_cuil = $documento;
        $this->search_name = $searh_name;
        
    }
        
    function get_results(){
        /*
        $doc_CUIL = $this->search_doc_cuil;
        if( empty($doc_CUIL) ) $doc_CUIL = (!empty($_GET['doc']) ? $_GET['doc'] : '');
        
        $doc_CUIL = preg_replace( '/\D/','', strval($doc_CUIL) );
        $doc_CUIL = strlen($doc_CUIL) == 7? '0'.$doc_CUIL : ''.$doc_CUIL;
        
        if( strlen($doc_CUIL) < 8 || strlen($doc_CUIL) > 12 ){
            //header("Content-Type: application/json; charset=UTF-8", 0, 400);
            //exit( json_encode(['error'=>'Error','msg'=>'DNI o CUIL no es valido.','status'=>400]) );
            $table_data = $this->table_data = ['error'=> ['doc_invalido'], 'msg'=> 'doc no es un documento o cuil valido', 'data'=> '', 'status'=> 400, 'response' => '' ];
            #return $this->enviar_respuesta(['error'=>'Error', 'msg'=>'DNI o CUIL no es valido.', 'status'=> 400], 400);
            return $this->enviar_respuesta($table_data, 400);
        }
        $this->search_doc_is_ok = 1;
        $this->search_doc_cuil = $doc_CUIL;
        */
        
        $table_data = $this->table_data = $this->format_doc_cuil();
        if( !empty($table_data['error']) ){
            return $this->enviar_respuesta( $table_data, 400);
        }
        $this->search_name = $this->simple_format_name( $this->search_name );
        #print_r( ['doc' => $this->search_doc_cuil, 'nombre' => $this->search_name] );
        $this->table_data['busqueda_criterio'] = array_merge( $this->table_data['busqueda_criterio'], ['doc' => $this->search_doc_cuil, 'nombre' => $this->search_name]);
        $table_data = $this->table_data;
        #print_r( $this->table_data['busqueda_criterio'] );
        $saved_anses_log_data = $this->get_anses_log( $this->search_doc_cuil );
        $saved_anses_log_data_arr = !empty( $saved_anses_log_data )? json_decode($saved_anses_log_data, true) : [];
        $log_time = $saved_anses_log_data_arr['log_time'] ?? 0;
        //print_r($saved_anses_log_data);//exit;
        unset($saved_anses_log_data);
        
        $extractedData = [];
        if( empty($saved_anses_log_data_arr['data']) || (time() > ($log_time + $this->expired_time) ) ){
        $this->table_data['peticion'] = 1;
        $table_data = $this->table_data = $this->first_request( $this->url, $this->request_headers, $this->timeOut, $this->proxy, $this->proxyAuth, $this->userAgent, $this->cookieMax_file_name );
        $response = $this->response = $table_data['response'];
        if( !empty($table_data['error']) ){
            return $this->enviar_respuesta( $table_data, 400);
        }        
        
        $anses_post_data = $this->need_input_values = $this->get_dom_input_values( $response );
        $this->res_anses_log('last_time_data', json_encode($this->need_input_values) );
        $this->table_data['peticion'] = 2;
        $table_data = $this->table_data = $this->post_request( $this->search_doc_cuil, $anses_post_data, $this->url, $this->post_request_headers, $this->timeOut, $this->proxy, $this->proxyAuth, $this->userAgent, $this->cookieMax_file_name );
        //$table_data['error'][] = $table_data['data']['error'];
        //$this->table_data = $table_data;
        $response = $this->response = $table_data['response'];
        if( !empty($table_data['error']) ){
            return $this->enviar_respuesta( $table_data, 400);
        }
        
        $extractedData = $this->extractTableData( $response );
        unset($response, $anses_post_data);
        
        }else{
            //if( !empty($saved_anses_log_data_arr['error']) ) return $this->enviar_respuesta( ($saved_anses_log_data_arr + ['kaka'=>'RETORNO FORZADO']) );
            if( !empty($saved_anses_log_data_arr['error']) ) return $this->enviar_respuesta( ($saved_anses_log_data_arr + ['from_log' => 1]) );
            
            $table_data['from_log'] = 1;
            $table_data['log_time'] = $log_time;
            $extractedData = $saved_anses_log_data_arr['data'];
            unset($saved_anses_log_data_arr);
        }
        
        $table_data['data'] = $this->table_data['data'] = array_merge( $table_data['data'], $extractedData );
                        
        //NOMBRE REQUERIDO PARA VERIFICAR DOCUMENTO Y/O BUSQUEDA POR CUIL
        
        $search_name = !empty($this->search_name)? $this->search_name : '';
        //$search_name = $this->simple_format_name( $search_name );
        //if( empty($search_name) ) $search_name = !empty($_GET['nomb'])? $_GET['nomb'] : '';
        
        //$search_name = preg_replace('/\W/',' ', $search_name );
        
        if( empty( $search_name ) ){
            $table_data['msg'] = 'sin nombre para buscar';
            $table_data['error'][] = 'search_name_no_valido';
            return $this->enviar_respuesta( $table_data );
        }
        
        $this->search_name = $search_name;
        $coincidencia = $this->coincidencia;
        //BUSCAR COINCIDENCIA DE NOMBRE        
        $search_result = '';
        if( empty($extractedData['personas_encontradas']) ){
            
            if( str_contains($this->response, "La consulta no arrojó resultados.") ){
                $table_data['error'][] = 'no_result';
                $table_data['msg'] = 'sin resultados';
                if( !$this->show_response ) unset( $table_data['response'] );
                $this->res_anses_log( $this->search_doc_cuil /*. '_' . time()*/, json_encode(array_diff_key($table_data + ['log_time' => time()],['response'=>''])) );
            }else{
                $table_data['error'][] = 'Error';
                $table_data['msg'] = 'algo salio mal';
            }
            
            return $this->enviar_respuesta( $table_data );
        }
        
        
        $nombres_lista_orig = array_column( ((array) $extractedData['personas_encontradas'] ), null,'Apellido y Nombre');
        $search_result = $this->buscar_nombre( $search_name, $extractedData );
        $table_data['busqueda_criterio']['search_result'] = $search_result;
        $table_data['busqueda_criterio']['margen_error'] = $this->table_data['busqueda_criterio']['margen_error'];
        //echo "<br>SEARCH RESULT = $search_result <br> ";
        if( !empty($search_result) && !empty( $nombres_lista_orig[$search_result] ) ){
            $coincidencia = $this->coincidencia = [
            'result' => 1,
            'persona' => array_merge(
                [
                    'Cuil' => '',
                    'Apellido y Nombre' => '',
                    'Tipo Doc.' => '',
                    'Nro. Doc.' => '',
                ], 
                $nombres_lista_orig[$search_result]
            ),
            'parent_key'=> '',//deprecated
            'indx' => null,//deprecated
            ];
        }
                        
        $table_data['data']['coincidencia'] = $coincidencia;
        $this->table_data = $table_data = array_merge( $this->table_data, $table_data );
        
        unset( $extractedData, $coincidencia, $search_result, $nombres_lista_orig);
        
        if( !empty($this->coincidencia['result']) && ( !empty($this->table_data['data']['require_cuil']) || empty($this->table_data['data']['obras_sociales']) || count( (array) $this->table_data['data']['personas_encontradas'], COUNT_NORMAL )>1 ) ){
            
            $this->search_by_cuil = empty( $this->search_by_cuil )? $this->coincidencia['persona']['Cuil'] : $this->search_by_cuil;
            $table_data = $this->table_data = $this->format_doc_cuil( true );
            if( !empty($table_data['error']) ){
                if( !$this->show_response ) unset( $table_data['response'] );
                return $this->enviar_respuesta( $table_data, 200);
            }
            
            $saved_anses_log_data = $this->get_anses_log( $this->search_by_cuil );
            $saved_anses_log_data_arr = !empty( $saved_anses_log_data )? json_decode($saved_anses_log_data, true) : [];
            $log_time = $saved_anses_log_data_arr['log_time'] ?? 0;
            //print_r($saved_anses_log_data);//exit;
            unset($saved_anses_log_data);
            
            if( empty($saved_anses_log_data_arr['data']) || (time() > ($log_time + $this->expired_time) ) ){
                
                //CAMPOS POST REQUERIDOS de lo contrario ERROR
                if( !empty($this->table_data['from_log']) || empty($this->table_data['peticion']) ) $this->need_input_values = array_merge( $this->need_input_values, (array) json_decode($this->get_anses_log('last_time_data')) );
                $this->table_data['peticion'] = 3;
                $table_data = $this->table_data = $this->post_request( $this->search_by_cuil, $this->need_input_values, $this->url, $this->post_request_headers, $this->timeOut, $this->proxy, $this->proxyAuth, $this->userAgent, $this->cookieMax_file_name );
                $response = $this->response = $table_data['response'];
                            
                if( !empty($table_data['error']) ){
                    return $this->enviar_respuesta( $table_data, 200);
                }
                
                $extractedData = $this->extractTableData( $response );
                unset($response);
            }else{
                $table_data['from_log'] = 1;
                $table_data['log_time'] = $log_time;
                $extractedData = $saved_anses_log_data_arr['data'];
                $numero_cuil = $this->search_by_cuil;
                $extractedData['obras_sociales'] = array_map(function($val)use($numero_cuil){ return array_merge( (array) $val, ['rel_cuil' => $numero_cuil] );},$extractedData['obras_sociales']);
                unset($saved_anses_log_data_arr);
            }
            $table_data['data'] = $this->table_data['data'] = array_merge( $table_data['data'], array_diff_key($extractedData, ['personas_encontradas'=>[]]) );
#echo "<br> SEARCH CUIL ";print_r($this->search_by_cuil);
            if( !empty( $this->search_by_cuil ) ) $this->res_anses_log( $this->search_by_cuil /*. '_' . time()*/, json_encode(array_diff_key($table_data + ['log_time' => time()],['response'=>''])) );
                
            unset($extractedData);
            
        }
        
        if( !empty( $this->search_by_cuil ) /*&& count( (array) $this->table_data['data']['personas_encontradas'], COUNT_NORMAL ) > 1*/ ) $table_data['data']['require_cuil'] = 1;
        $this->res_anses_log( $this->search_doc_cuil /*. '_' . time()*/, json_encode(array_diff_key($table_data + ['log_time' => time()],['response'=>''])) );
        
        if( !$this->show_response ) unset( $table_data['response'] );
        return $this->enviar_respuesta( $table_data );
    }
    
    /** FIN INIT PROCESS */
    
    /**
     * format_doc_cuil
     * @param $use_search_by_cuil (bool)
     * @return Array table_data
     */
    function format_doc_cuil( $use_search_by_cuil = false )
    {
        $table_data = $this->table_data;
        
        $doc_CUIL = !$use_search_by_cuil? $this->search_doc_cuil : $this->search_by_cuil;
        if( empty($doc_CUIL) ) $doc_CUIL = (!empty($_GET['doc']) ? $_GET['doc'] : '');
        
        $doc_CUIL = preg_replace( '/\D/','', strval($doc_CUIL) );
        $doc_CUIL = strlen($doc_CUIL) == 7? '0'.$doc_CUIL : ''.$doc_CUIL;
        
        if( strlen($doc_CUIL) < 8 || strlen($doc_CUIL) > 12 ){
            //header("Content-Type: application/json; charset=UTF-8", 0, 400);
            //exit( json_encode(['error'=>'Error','msg'=>'DNI o CUIL no es valido.','status'=>400]) );
            $table_data = $this->table_data = array_merge( $table_data, ['error' => ['doc_invalido'], 'msg'=> 'doc no es un documento o cuil valido']);
            #return $this->enviar_respuesta(['error'=>'Error', 'msg'=>'DNI o CUIL no es valido.', 'status'=> 400], 400);
            //return $this->enviar_respuesta($table_data, 400);
        }
        $this->search_doc_is_ok = 1;
        
        if( !$use_search_by_cuil || empty($this->search_doc_cuil) ){
            $this->search_doc_cuil = $doc_CUIL;
        }
        
        if( $use_search_by_cuil ){
            $this->search_by_cuil = $doc_CUIL;
        }
        
        return $table_data;
    }
    
    function simple_format_name( $search_name = '' )
    {
        $search_name = !empty($search_name)? $search_name : $this->search_name;
        if( empty($search_name) ) $search_name = !empty($_GET['nomb'])? $_GET['nomb'] : '';
        
        $search_name = preg_replace('/\W/',' ', $search_name );
        return $search_name;
    }
    
    /** 
     * GET HTML DOM VALUES
     */
    function get_dom_input_values( $htmlContent = '' ){
        //$htmlContent = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', $htmlContent);
                
        $input_val = '';
        $input_id = '';
        
        $dom = new DOMDocument('1.0', 'UTF-8');
        // Suppress warnings for malformed HTML
        libxml_use_internal_errors(true);
        @$dom->loadHTML($htmlContent);
        libxml_clear_errors();
        
        $need_input_values = [
            '__VIEWSTATE'=>'',
            '__VIEWSTATEGENERATOR'=>'',
            '__EVENTVALIDATION'=>'',
            
        ];
        $need_input_values = !empty( $this->need_input_values )? $this->need_input_values : $need_input_values;
        
        foreach( $need_input_values as $input_id => $value ){
            $input_item = $dom->getElementById( $input_id );
            $input_val = !empty($input_item)? $input_item->getAttribute('value') : '';
            $need_input_values[ $input_id ] = $input_val;
        }
        return $need_input_values;
    }
    
    function first_request( $url = '', $request_headers = [], $timeOut = 30, $proxy = '', $proxyAuth = '', $userAgent = '', $cookieMax_file_name = '' )
    {
        $response = '';
        $table_data = array_merge( [ 'error'=> [], 'msg'=> '', 'data' => [], 'response' => '' ], $this->table_data );
        $request_headers = !empty($request_headers)? $request_headers : $this->request_headers;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, !empty($timeOut) ? $timeOut : 30);
        if (!empty($proxy)) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
            if (!empty($proxyAuth))
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
        }
        // Set the User-Agent
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        // Follow redirects, as a browser would
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // Handle cookies, which many sites use for session management
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieMax_file_name);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieMax_file_name);
        // Set other browser-like headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        
        $response = curl_exec($ch);
        $response = (string) $response;
        //$chekhtml = strstr($response,'<head');
        $chekhtml = 0;
        $response = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', $response, $chekhtml);
        $table_data['response'] = !empty( $chekhtml ) ? $response : '';
                
        if (curl_errno($ch)) {
            $table_data['error'][] = curl_error($ch);
        }
        curl_close($ch);
        
        if( empty($chekhtml) ){
            $table_data['error'][] = 'sin_respuesta'; 
            $table_data['msg'] = 'No se obtuvo la respuesta.';
        }
        if( str_contains($response, 'El servicio no está disponible') ){
            $table_data['error'][] = 'no_disponible'; 
            $table_data['msg'] = 'El servicio no esta disponible.';
        }        
        
        //log primer respuesta
        if( !empty($table_data['error']) ) $this->res_anses_log('respuesta_'.date('Y-m-d_Hi'), $response );
        
                
        return $table_data;
    }
    
    function post_request( $doc_CUIL = '', $anses_post_data = [], $url = '', $post_request_headers = [], $timeOut = 30, $proxy = '', $proxyAuth = '', $userAgent = '', $cookieMax_file_name = '' )
    {
        $response2 = '';
        $table_data = array_merge( [ 'error'=> [], 'msg'=> '', 'data' => [], 'response' => '' ], $this->table_data );
        
        if( !$this->search_doc_is_ok ){
            if( empty($doc_CUIL) ) $doc_CUIL = $this->search_doc_cuil;
            if( empty($doc_CUIL) ) $doc_CUIL = (!empty($_GET['doc']) ? $_GET['doc'] : '');
            
            $doc_CUIL = preg_replace( '/\D/','', strval($doc_CUIL) );
            $doc_CUIL = strlen($doc_CUIL) == 7? '0'.$doc_CUIL : ''.$doc_CUIL;
            
            if( strlen($doc_CUIL) < 8 || strlen($doc_CUIL) > 12 ){
                //return $this->enviar_respuesta(['error'=>'Error', 'msg'=>'DNI o CUIL no es valido.', 'status'=> 400], 400);
                $table_data = $this->table_data = array_merge( $this->table_data, ['error'=> ($table_data['error'] + ['doc_invalido']), 'msg'=> 'doc no es un documento o cuil valido' ]);
                return $this->enviar_respuesta($table_data, 400);
            }
            $this->search_doc_is_ok = 1;
            $this->search_doc_cuil = $doc_CUIL;            
        
        }
        
        if( in_array('', $this->need_input_values) ){
            $table_data = $this->table_data = array_merge( $this->table_data, ['error'=> ($table_data['error'] + ['campos_requeridos']), 'msg'=> 'campos requeridos incompletos' ]);
            return $this->enviar_respuesta($table_data, 400);
        }
        
        if( !empty($doc_CUIL) ){}
        
            $userAgent = !empty( $userAgent )? $userAgent : $this->userAgent;
            $url = !empty( $url )? $url : $this->$url;
            $cookieMax_file_name = !empty( $cookieMax_file_name )? $cookieMax_file_name : $this->cookieMax_file_name;
            
            $post_request_headers = !empty( $post_request_headers )? $post_request_headers : $this->post_request_headers;
                        
            // Datos post de la solicitud __EVENTTARGET __EVENTARGUMENT g-recaptcha-response suelen estar vacíos, parece ignorar la comprobacion de captcha
            $anses_data = [
                '__EVENTTARGET' => '',
                '__EVENTARGUMENT' => '',
                '__VIEWSTATE' => '',
                '__VIEWSTATEGENERATOR' => '',
                '__EVENTVALIDATION' => '',
                'ctl00$ContentPlaceHolder1$txtDoc' => $doc_CUIL,
                'ctl00$ContentPlaceHolder1$Button1' => 'Continuar',
                'g-recaptcha-response' => '',
                'action' => 'login'
            ];
            $anses_data = array_merge( $anses_data, $anses_post_data );
            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, !empty($timeOut) ? $timeOut : 30);
            if (!empty($proxy)) {
                curl_setopt($ch, CURLOPT_PROXY, $proxy);
                //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                if (!empty($proxyAuth))
                    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
            }
            // Set the User-Agent
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            // Follow redirects, as a browser would
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            // Handle cookies, which many sites use for session management
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieMax_file_name);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieMax_file_name);
            // Set other browser-like headers
            curl_setopt($ch, CURLOPT_HTTPHEADER, $post_request_headers);
    
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Use CURLOPT_CUSTOMREQUEST for clarity, or rely on CURLOPT_POSTFIELDS setting the method
            curl_setopt($ch, CURLOPT_POSTFIELDS, $anses_data);
            
            //curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
            
            $response2 = curl_exec($ch);
            $response2 = (string) $response2;
            //$chekhtml = strstr($response,'<head');
            $chekhtml = 0;
            $response2 = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', $response2, $chekhtml);
            $table_data['response'] = !empty( $chekhtml ) ? (string) $response2 : '';
                    
            if (curl_errno($ch)) {
                $table_data['error'][] = curl_error($ch);
            }
            curl_close($ch);
            if( empty($chekhtml) ){
                $table_data['error'][] = 'sin_respuesta'; 
                $table_data['msg'] = 'No se obtuvo la respuesta.';
            }
            if( str_contains($response2, 'El servicio no está disponible') ){
                $table_data['error'][] = 'no_disponible'; 
                $table_data['msg'] = 'El servicio no esta disponible.';
            }        
            
            //log post respuesta
            if( !empty($table_data['error']) ) $this->res_anses_log('respuesta_'.date('Y-m-d_Hi'), ( print_r( ( $anses_data + ['doc'=>$doc_CUIL] ) , true) . "\n\n" . $response2 ) );
        
        
        $table_data = array_merge( [ 'error'=> [], 'msg'=> '', 'data' => [], 'response' => '' ], $table_data );
        //$table_data['fallo'] = !empty($table_data['fallo'])? $table_data['fallo'] : [  ];
        return $table_data;
    }//fin func consulta
    
    /**
     * extractTableData
     * @param htmlContent contenido html
     * Obtiene los detalles de las tablas HTML si estan presentes
     */
    function extractTableData( $htmlContent = '' )
    {
        @$htmlContent = (string) $htmlContent;
        if( empty($htmlContent) ){
            return $data = [ 'error' => 'HTML vacio' ];
        }
        $data = [];
        
        $htmlContent = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', $htmlContent);
                    
        
        $dom = new DOMDocument('1.0', 'UTF-8');
        // Suppress warnings for malformed HTML
        libxml_use_internal_errors(true);
        @$dom->loadHTML($htmlContent);
        libxml_clear_errors();
        
                    
        #$meta = $dom->createElement('meta');
        
        #$meta->setAttribute('http-equiv', 'Content-Type');
        #$meta->setAttribute('content', 'text/html; charset=UTF-8');
        
        #$head = $dom->getElementsByTagName('head')->item(0);
        
        #if (!$head) {
        #    $head = $dom->createElement('head');
        #    @$dom->documentElement->insertBefore($head, $dom->documentElement->firstChild);
        #}
        
        #@$head->appendChild($meta);
        
        #echo htmlentities( $dom->saveHTML() );
        
        
        $xpath = new DOMXPath($dom);
        
        // --- Extract data from the "ContentPlaceHolder1_DGTraeTodos" table (List of individuals) ---
        $individuals = [];
        
        //$tableId = 'ContentPlaceHolder1_DGTraeTodos';
        //$rows = $xpath->query("//table[@id='$tableId']/tbody/tr[position() > 1]"); // Skip header row
        
        $tableId = '_DGTraeTodos'; //$table = $xpath->query("//table[contains(@id, '$tableId')]")->item(0);
        $rows = $xpath->query("//table[contains(@id, '$tableId')]/tbody/tr[position() > 1]");
        $rows = !empty($rows->length)? $rows : $xpath->query("//table[contains(@id, '$tableId')]/tr[position() > 1]");
        
        foreach ($rows as $row) {
            $cols = $xpath->query("./td", $row);
            if ($cols->length >= 5) { // Ensure there are enough columns
                $cuil = trim($cols->item(1)->textContent);
                $apellidoNombre = trim($cols->item(2)->textContent);
                $tipoDoc = trim($cols->item(3)->textContent);
                $nroDoc = trim($cols->item(4)->textContent);
        
                $individuals[] = [
                    'Cuil' => $cuil,
                    'Apellido y Nombre' => $apellidoNombre,
                    'Tipo Doc.' => $tipoDoc,
                    'Nro. Doc.' => $nroDoc,
                ];
            }
        }
        $data['personas_encontradas'] = $individuals;
        
        // --- Extract data from the detailed personal information table (tblCabecera / ContentPlaceHolder1_PanDetalle) ---
        $personalDetails = [];
        
        //$detailTableRows = $xpath->query("//div[@id='ContentPlaceHolder1_PanDetalle']//table/tbody/tr");
        $detailId = "_PanDetalle";
        $detailTableRows = $xpath->query("//div[contains(@id, 'ContentPlaceHolder1_PanDetalle')]//table/tbody/tr");
        #print_r(['detalle', $detailTableRows]);
        #echo "\n<br>";
        $detailTableRows = !empty($detailTableRows->length)? $detailTableRows : $xpath->query("//div[contains(@id, '_PanDetalle')]//table/tr");
        
        //$detailTableRows = $xpath->query("//div[contains(@id, '_PanDetalle')]/tbody/tr");
        #echo "\n<br>";
        #print_r(['detalle222', $detailTableRows]);
        foreach ($detailTableRows as $row) {
            $cells = $xpath->query("./td", $row);
            if ($cells->length === 2) {
                $keyNode = $cells->item(0)->getElementsByTagName('strong')->item(0) ?? $cells->item(0);
                $valueNode = $cells->item(1)->getElementsByTagName('strong')->item(0) ?? $cells->item(1);
        
                $key = trim(str_replace(':', '', $keyNode->textContent));
                $value = trim($valueNode->textContent);
        
                if (!empty($key)) {
                    $personalDetails[$key] = $value;
                }
            }
        }
        
        //AGREGAR LA ESTRUCTURA POR DEFECTO SI EL DETALLE NO ES VACIO
        //array('CUIL N°' => '20 - 06607781 - 1','Apellido y Nombre' => 'ROSSO JUAN CARLOS','Tipo y Número de Documento' => 'LE - 6607781' );
        $data['detalle_persona'] = !empty($personalDetails)? array_merge( array(
            'CUIL N°' => '',
            'Apellido y Nombre' => '',
            'Tipo y Número de Documento' => '' 
        ), $personalDetails ) : [];
        
        
        // --- Extract data from the "ContentPlaceHolder1_DGOOSS" table (Obra Social details) ---
        $obrasSociales = [];
        //$oossTableId = 'ContentPlaceHolder1_DGOOSS';
        //$oossRows = $xpath->query("//table[@id='$oossTableId']/tbody/tr[position() > 1]"); // Skip header row
        
        //contains(@id, 'PanDetalle')
        $oossTableId = '_DGOOSS';
        $oossRows = $xpath->query("//table[contains(@id, '$oossTableId')]/tbody/tr[position() > 1]"); // Skip header row
        #print_r(['obras', $oossRows]);
        $oossRows = !empty($oossRows->length)? $oossRows : $xpath->query("//table[contains(@id, '$oossTableId')]/tr[position() > 1]");
        
        $oossHeaders = [];
        
        // Get headers for OOSS table dynamically
        //$headerRow = $xpath->query("//table[@id='$oossTableId']/tbody/tr[1]/td");
        $headerRow = $xpath->query("//table[contains(@id, '$oossTableId')]/tbody/tr[1]/td");
        #print_r([ 'header_obras', $headerRow] );
        $headerRow = !empty($headerRow->length)? $headerRow : $xpath->query("//table[contains(@id, '$oossTableId')]/tr[1]/td");
        
        foreach ($headerRow as $headerCell) {
            $oossHeaders[] = trim($headerCell->textContent);
        }
        
        foreach ($oossRows as $row) {
            $cols = $xpath->query("./td", $row);
            $oossEntry = [];
            foreach ($oossHeaders as $index => $header) {
                if ( !empty( @$cols->item($index) ) ) {
                    $oossEntry[$header] = trim($cols->item($index)->textContent);
                }
            }
            if (!empty($oossEntry)) {
                $obrasSociales[] = $oossEntry;
            }
        }
        
        $related_cuil = !empty($personalDetails['CUIL N°']) && ( count((array) $individuals, COUNT_NORMAL) <= 1 ) ? $personalDetails['CUIL N°'] : '';
        //$related_cuil = 'blablabla';
        
        $obrasSociales = array_map( function( $val ) use( $related_cuil ) {
            return array_merge( array (
                'Código' => '',
                'Descripción' => '',
                'Condición' => '',
                'Situación' => '',
                ), ( !empty($related_cuil)? ['rel_cuil' => $related_cuil] : [] ), $val );
        }, $obrasSociales );
        
        ###$obrasSociales = array_values( array_column((array) $obrasSociales, null, 'Código') );
        
        $data['obras_sociales'] = $obrasSociales;
        
        //echo " --- conteo obras ".count( (array) $obrasSociales, COUNT_NORMAL) ." ---- ";
        if( !empty($data['detalle_persona']) && empty($data['personas_encontradas']) ){
             //array('CUIL N°' => '20 - 06607781 - 1','Apellido y Nombre' => 'ROSSO JUAN CARLOS','Tipo y Número de Documento' => 'LE - 6607781' );
             $tipo_y_doc = explode('-', $data['detalle_persona']['Tipo y Número de Documento']);
             $tipo_y_doc = array_map('trim',$tipo_y_doc);
             $n_doc_key = !empty($tipo_y_doc[1]) && preg_match('/^(\d+)$/', $tipo_y_doc[1])? 1 : 0;
             //echo " -----dooocccc key $n_doc_key ----------- ";
             $data['personas_encontradas'] = [array(
                 'Cuil' => $data['detalle_persona']['CUIL N°'],
                 'Apellido y Nombre' => $data['detalle_persona']['Apellido y Nombre'],
                 'Tipo Doc.' => $tipo_y_doc[($n_doc_key? 0: (!empty($tipo_y_doc[1])?1:0))],
                 'Nro. Doc.' => $tipo_y_doc[$n_doc_key]
             )];
             
        }
        
        
        // Output the array as JSON for readability, or you can use print_r($data)
        //echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        //print_r( $data );
        return $data;
    }
    
    
    
    
    function normalizarParaComparar($texto)
    {
        // Pasamos a minúsculas
        $texto = mb_strtolower($texto, 'UTF-8');
        // Dividimos por espacios
        $palabras = explode(' ', $texto);
        // Eliminamos espacios vacíos y reordenamos alfabéticamente
        $palabras = array_filter($palabras);
        sort($palabras);
        // Volvemos a unir
        return implode(' ', $palabras);
    }
    
    function obtenerCombinaciones($array, $min, $max) {
        $resultados = [];
        $n = count($array);
    
        // Función interna recursiva
        $generar = function($inicio, $combinacionActual) use (&$generar, &$resultados, $array, $n, $max) {
            // Si la combinación tiene el tamaño deseado, la guardamos
            if (count($combinacionActual) > 0) {
                $resultados[] = $combinacionActual;
            }
    
            // Si ya alcanzamos el máximo, no seguimos profundizando
            if (count($combinacionActual) == $max) {
                return;
            }
    
            for ($i = $inicio; $i < $n; $i++) {
                $generar($i + 1, array_merge($combinacionActual, [$array[$i]]));
            }
        };
    
        $generar(0, []);
    
        // Filtramos para devolver solo las que están entre el min y el max
        return array_filter($resultados, function($c) use ($min, $max) {
            $tamano = count($c);
            return $tamano >= $min && $tamano <= $max;
        });
    }
    
    function buscarPersona($entrada, $lista, $maxError = 3, $limit_words = true, $compare_words = false )
    {
        $maxError = !empty($maxError)? $maxError : 2;
        $this->table_data['busqueda_criterio']['margen_error'] = $maxError;
        $mejorCoincidencia = null;
        $menorDistancia = -1;
    
        // Preparamos la entrada por orden
        $entradaNormalizada = $this->normalizarParaComparar($entrada);
        $entradaNorm_arr = explode(' ', $entradaNormalizada );
        $nwords_nEntrada = count( $entradaNorm_arr, COUNT_NORMAL );
    
        foreach ($lista as $nombreOriginal) {
            // Preparamos el nombre de la lista por orden
            $nombreFilaNormalizado = $this->normalizarParaComparar($nombreOriginal);
            
            $distancia = levenshtein($entradaNormalizada, $nombreFilaNormalizado);
    
            if ($distancia == 0) return $nombreOriginal;
            
            if( $limit_words || $compare_words ) {
                $filaNorm_arr = explode(' ', $nombreFilaNormalizado);
                $nwords_nFila = count( $filaNorm_arr, COUNT_NORMAL );
                $max_words = min( [2, $nwords_nEntrada, $nwords_nFila] );
                $max_words = $max_words > 2 ? $max_words : 2;
            }
            if( $limit_words ){
                $testNombre = implode(' ', array_slice($entradaNorm_arr,0,$max_words));
                
                if($nwords_nFila == $max_words){
                    $distancia = levenshtein($testNombre, $nombreFilaNormalizado);
                    if ($distancia == 0) return $nombreOriginal;
                    if ($distancia <= $maxError) {
                            if ($distancia < $menorDistancia || $menorDistancia < 0) {
                                $menorDistancia = $distancia;
                                $mejorCoincidencia = $nombreOriginal;
                            }
                        }
                }
                if($nwords_nFila > $max_words){
                    $comb_fila = $this->obtenerCombinaciones( $filaNorm_arr, $max_words, $max_words );
                    //print_r($comb_fila);
                    foreach( $comb_fila as $testFila_arr ){
                        if( empty($testFila_arr) || !is_array($testFila_arr)) continue;
                        //print_r(['<br>',$testFila_arr]);
                        sort($testFila_arr);
                        $testFilaNombre = implode(' ', array_slice($testFila_arr,0,$max_words));
                        $distancia = levenshtein($testNombre, $testFilaNombre);
                        if ($distancia == 0) return $nombreOriginal;
                        if ($distancia <= $maxError) {
                            if ($distancia < $menorDistancia || $menorDistancia < 0) {
                                $menorDistancia = $distancia;
                                $mejorCoincidencia = $nombreOriginal;
                            }
                        }
                    }
                    
                }
            }
            
            if( $compare_words ){
                $coincide = 0;
                ###$min_words = min( [2, $nwords_nEntrada, $nwords_nFila] );
                //$min_words = $min_words>2?$min_words:2; 
                foreach($entradaNorm_arr as $b_nomb ){
                    if( str_contains( $nombreFilaNormalizado, $b_nomb) ) $coincide++;
                    if( $coincide >= 1/*$min_words*/ ) return $nombreOriginal;
                }
                
            }
    
            //echo " <br> dist $distancia ";
            if ($distancia <= $maxError) {
                if ($distancia < $menorDistancia || $menorDistancia < 0) {
                    $menorDistancia = $distancia;
                    $mejorCoincidencia = $nombreOriginal;
                }
            }
        }
        
        //echo " mejor coinci  "; var_dump($mejorCoincidencia);
    
        return $mejorCoincidencia;
    }
        
    /**
     * buscar_nombre
     * Buscar coincidencia de nombre y apellido en data extraida
     * @param buscar1 el search_name, apellido y nombre
     * @param extractedData array con la data extraida
     * @return string resultante de la lista o vacio
     */
    function buscar_nombre( $search_name = '', $extractedData = [] )
    {
        $busqueda_full = '';
        $buscar1 = trim( $search_name );
        if( empty($buscar1) ){
            //echo "<BR>Resultado 1::: NO BUSCO NOMBRE VACIO <BR>";
            return $busqueda_full;
        }
            $nombres_lista = [];
            /**
            if( !empty($extractedData['detalle_persona']) && empty($extractedData['personas_encontradas']) ){
                 //array('CUIL N°' => '20 - 06607781 - 1','Apellido y Nombre' => 'ROSSO JUAN CARLOS','Tipo y Número de Documento' => 'LE - 6607781' );
                 $tipo_y_doc = explode('-', $extractedData['detalle_persona']['Tipo y Número de Documento']);
                 $tipo_y_doc = array_filter($tipo_y_doc);
                 $extractedData['personas_encontradas'] = [array(
                     'Cuil' => $extractedData['detalle_persona']['CUIL N°'],
                     'Apellido y Nombre' => $extractedData['detalle_persona']['Apellido y Nombre'],
                     'Tipo Doc.' => $tipo_y_doc[0],
                     'Nro. Doc.' => $tipo_y_doc[1]
                 )];
                 
            }*/
            $nombres_lista_orig = array_column( ((array) $extractedData['personas_encontradas'] ), 'Apellido y Nombre');
            //echo "<br><br>obtiene nombres? <br>";print_r( $nombres_lista_orig );
            
            setlocale(LC_ALL, 'es_ES.UTF-8', 'es_ES', 'esp');
            $buscar_w_count = str_word_count($buscar1);
            $this->table_data['busqueda_confianza'] = ($buscar_w_count>4)? 'riesgo' : 'normal';
            
            $maxError = (int) $this->table_data['busqueda_criterio']['margen_error'];
            $maxError = strlen($buscar1)<5?1 : (!empty($maxError)?$maxError:3);
            
            $busqueda_full = $this->buscarPersona($buscar1, $nombres_lista_orig, $maxError, ( $buscar_w_count >1? true:false) );
            
            //echo " ---- $buscar_w_count ya encontRO? $busqueda_full <br> ";
            //var_dump($busqueda_full);
            //exit("forzamooooo");
            if( empty($busqueda_full) ){
                $this->table_data['busqueda_confianza'] = ($buscar_w_count>4)? 'riesgo_alto' : 'baja';
                $nombres_lista = array_map(function($nombre) {
                    return preg_split('/\s+/', $nombre);
                }, $nombres_lista_orig);
                $nombres_lista = array_merge( ...$nombres_lista);
                
                //echo nl2br( "listaa:". print_r( $nombres_lista, true) );
                
                $busqueda_arr = explode(' ', $this->normalizarParaComparar($buscar1) );
                $join_busqueda = '';
                foreach( $busqueda_arr as $k => $busqueda ){
                    $join_busqueda .= $this->buscarPersona($busqueda, $nombres_lista, 1, false) .' ';
                    //echo "<BR>Resultado $k buscando $busqueda::: " . ($join_busqueda) . "\n<br>";
                }
                $join_busqueda = trim( $join_busqueda );
                if( !empty($join_busqueda) ) $busqueda_full = $this->buscarPersona($join_busqueda, $nombres_lista_orig, 3, true, true);
                
            }
            //echo "<br><br>";
            //print_r([trim($join_busqueda), 'busqueda_full::',$busqueda_full]);
            //echo "<br>";
        
        return $busqueda_full;
    }
    
    
    /**
     * @deprecated OLD_extractTableData
     * Extracts data from an HTML table by its ID and returns it as an array of associative arrays.
     *
     * @param string $html The HTML content as a string.
     * @param string $tableId The ID of the table to extract.
     * @return array An array where each element is an associative array representing a table row,
     *               with column headers as keys. Returns an empty array if the table or data is not found.
     */
    function OLD_extractTableData(string $html, string $tableId)//: array
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        // Suppress warnings for malformed HTML
        libxml_use_internal_errors(true);
        @$dom->loadHTML($html);
        libxml_clear_errors();
    
        $xpath = new DOMXPath($dom);
    
        // Find the table by its ID
        //$table = $xpath->query("//table[@id='$tableId']")->item(0);
        $table = $xpath->query("//table[contains(@id, '$tableId')]")->item(0);
    
        if (!$table) {
            return [];
        }
    
        $headers = [];
        $data = [];
    
        // Extract headers from the first <tr> within the table
        // Assuming headers are in the first <tr> that is not hidden and contains <td> elements
        $headerRow = $xpath->query(".//tr[1]/td[position() > 1]", $table); // Skip the first <td> which often contains an icon/action button
    
        foreach ($headerRow as $headerCell) {
            $headers[] = trim($headerCell->textContent);
        }
    
        // Extract data rows (all <tr> elements after the first one)
        $dataRows = $xpath->query(".//tr[position() > 1]", $table);
    
        foreach ($dataRows as $row) {
            $rowData = [];
            $cells = $xpath->query("./td[position() > 1]", $row); // Skip the first <td> (action icon)
    
            foreach ($cells as $index => $cell) {
                if (isset($headers[$index])) {
                    $rowData[$headers[$index]] = trim($cell->textContent);
                }
            }
            if (!empty($rowData)) {
                $data[] = $rowData;
            }
        }
    
        return $data;
    }
    
    
    
    /**
     * @deprecated captar_Value
     * cadena HTML
     * $prev_text y $end_text limitantes de busqueda de valor
     * ejemplo $prev_text 'name="el input name " value="' 
     * ejemplo end_text='""' (comillas dobles) 
     * La funcion encontrara el valor encapsulado por estas subcadenas.
     */
    function captar_Value($cadena = '', $prev_text = '', $end_text = '"')
    {
        $valor = '';

        $tempval = explode($prev_text, $cadena, 2);

        if (!empty($tempval) && count($tempval)) {
            $tempval = explode($end_text, $tempval[1], 2);
            //print_r(['tempval: ', reset($tempval) ]);
            $valor = !empty($tempval) ? reset($tempval) : '';
        }

        return $valor;
    }
    
    function update_cookie_file_name($cookiename = '')
    {
        $cookiename = !empty($cookiename)? $cookiename : $this->cookieMax_file_name;
        //$cookiename = preg_replace('/D') 'cookieMAXCURL7.txt';
        if (preg_match('/(\d+)\D*$/', $cookiename, $coincidencias)) {
            if( !empty( $coincidencias[1] ) ) {
                $cookiename = str_replace($coincidencias[1], '', $cookiename);
                $cookiename = $cookiename . (intval($coincidencias[1])+1);
            }
        }
        $this->cookieMax_file_name = $cookiename;
        return $cookiename;
    }
    
    /**
     *procesar_secreto
     * @param $accion 'encriptar' | 'desencriptar'
     * @param $datos
     * @param $clave
     *  Encripta y desencripta cadenas largas usando AES-256-GCM.
     */
    function procesar_secreto($accion, $datos, $clave_secreta) {
        $metodo = "aes-256-gcm";
        
        // Generar una clave de 32 bytes a partir de tu secret key
        $key = hash('sha256', $clave_secreta, true);
    
        if ($accion == 'encriptar') {
            $iv_longitud = openssl_cipher_iv_length($metodo);
            $iv = openssl_random_pseudo_bytes($iv_longitud); // El IV debe ser aleatorio
            
            // Encriptar
            $encriptado = openssl_encrypt($datos, $metodo, $key, $options=0, $iv, $tag);
            
            // Retornar IV + Tag + Datos encriptados (necesarios para desencriptar)
            return base64_encode($iv . $tag . $encriptado);
        } 
        
        if ($accion == 'desencriptar') {
            $datos_binarios = base64_decode($datos);
            $iv_longitud = openssl_cipher_iv_length($metodo);
            
            // Extraer los componentes
            $iv = substr($datos_binarios, 0, $iv_longitud);
            $tag = substr($datos_binarios, $iv_longitud, 16); // GCM usa tags de 16 bytes
            $ciphertext = substr($datos_binarios, $iv_longitud + 16);
            
            return openssl_decrypt($ciphertext, $metodo, $key, $options=0, $iv, $tag);
        }
    }    
       
    
    function res_anses_log( $f_name = '', $str_log = '', $modo = 'w' ){
        if( empty($f_name) || empty($this->table_data['peticion']) ) return 0;
        $f = fopen( __DIR__ . '/anses-res/' . $f_name . '.txt', $modo );
        if ($f) {
            $save_str = $this->procesar_secreto('encriptar', $str_log, $this->anses_log_secret);
            //print_r( $save_str );exit;
            fwrite($f, $save_str );
            fclose($f);
            return 1;
        }
        return 0;
    }
    
    function get_anses_log( $f_name = '' ){
        if( empty($f_name) ) return false;
        @$str_log = file_get_contents( __DIR__ . '/anses-res/' . $f_name . '.txt' );
        if ( !empty($str_log) ) {
            return $this->procesar_secreto('desencriptar', $str_log, $this->anses_log_secret);
        }
        return false;
    }
    
    /**
     * set_margen_error
     * @param (int) $maxError
     * setea el margen de error por defecto de busquedas por nombre en busqueda_criterio - default (maxError) 
     * Si el nombre a buscar es muy corto dismuye automaticamente. 
     */
    function set_margen_error( $maxError = 3 ){
        @$this->table_data['busqueda_criterio']['margen_error'] = (int) $maxError;
    }
    
    function enviar_respuesta( $respuesta = [], $statuscode = 200 ){
        $respuesta['data']['status'] = $statuscode;
        if( $this->return_data ) return $respuesta;
        if( !headers_sent() ) header("Content-Type: application/json; charset=UTF-8", 0, $statuscode);
        exit( json_encode($respuesta) );
    }    
}//FIN CLASS ANSES_HTML