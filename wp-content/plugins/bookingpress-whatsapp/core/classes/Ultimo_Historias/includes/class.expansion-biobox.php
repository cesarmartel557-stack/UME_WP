<?php
/**
 * @class Expansion_Biobox
 * Consultas Biobox
 **/

if( ! class_exists("Expansion_Biobox") ){
        
    class Expansion_Biobox{
        var $secret = 'wZj0OsRIFl83IzQBI7EBupnI8HilrYl8sqMfTGzHgQZVWMA';//'mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf';//TEST SECRET
        var $domain_url = 'https://unca.cli.biobox.com.ar';//'https://testing.biobox.com.ar';
        var $last_request = [];
        var $last_response = null;
        
        public function __construct( ){
            global $historiasClinicas_module_name;
            add_action('bookingpress_' . $historiasClinicas_module_name . '_add_dynamic_vue_methods', [$this, 'add_biobox_vue_methods'], 10);
            
            add_action('wp_ajax_expansion_biobox_dni', array( $this, 'ajax_expansion_biobox_dni' ), 10);
            add_action('wp_ajax_expansion_biobox_turno', array( $this, 'ajax_expansion_biobox_turno' ), 10);
            //ajax_expansion_biobox_turno
            
            add_action('bphc_customer_edit_details', [$this, 'historias_add_biobox_request'], 10);
            
            add_action('expansion_historias_add_target_container', [$this, 'historias_add_biobox_lista_estudios_template'], 10);
        }
        function set_domain( $domain_url = '' ){
            if( empty($domain_url)) return false;
            $this->domain_url = $domain_url;
            return true;
        }
        
        function add_domain($path =''){
            $base_url = rtrim($this->domain_url, '/');
            $path = ltrim($path, '/');
            
            $full_url = $base_url . '/' . $path;
            return $full_url;
        }
        
        function expansion_biobox_turno( $nro_turno = '', $metodo = 'estudio' ){
            //https://testing.biobox.com.ar/externo/estudio?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZFR1cm4iOiI2MDAwMSJ9.e44NANEd7E7zfU5Q4WbInmybzate1ZGk3FZDkvsRapE
            $result = ['variant'=>'error','type'=>'error','msg'=>'','result'=> false];
            if( empty($nro_turno) ) return $result;
            $method_url = "externo/" . $metodo;
            $method_url = $this->add_domain( $method_url );
            
            $secret = $this->secret;
            $payload = [ "nro_turno" => $nro_turno, "idTurn" => $nro_turno ];
            
            $token = $this->create_RequestToken( $payload );
            
            $method_url .= "?token={$token}";
            
            $this->last_request = compact("method_url","secret","token","payload");
            
            
            $response = wp_remote_request($method_url, array(
                'headers' => array(
                    'Content-Type'  => 'application/json;charset=UTF-8',
                    'method'    => 'GET'
                ),
                'body'  =>  $payload //json_encode( $payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
            ));
            $this->last_response = $response;
            #var_dump( $this );exit;
            
            if ( is_array( $response ) && ! is_wp_error( $response ) ) {
                $headers = $response['headers']; // array of http header lines
                $body    = $response['body']; // use the content
                
                //$body = is_array($body)? $body : json_decode($body, true);
                //$body = !empty($body)? $body : json_decode(stripcslashes($response['body']), true);
                
                $result['result']['body'] = $body;
                $result['result']['base_url'] = $this->domain_url;
                $result['result']['request_url'] = $method_url;
                $result['result']['payload'] = $payload;
                $result['variant'] = $result['type'] = 'success';
            }
            
            return $result;
        }
        
        function expansion_biobox_dni( $dni = ''){
            $result = ['variant'=>'error','type'=>'error','msg'=>'','result'=> false];
            if( empty($dni) ) return $result;
            $method_url = "api-v4/study-list";
            $method_url = $this->add_domain( $method_url );
            
            $secret = $this->secret;
            $payload = [ "pat_id" => $dni, /*'doc' => $dni*/ ];
            #print_r( [$payload, $secret] );exit;
            $token = $this->create_RequestToken( $payload );
            
            $method_url .= "?token={$token}";
            $result['result']['method_url'] = $method_url;
            
            $this->last_request = compact("method_url","secret","token","payload");
            
            
            $response = wp_remote_request($method_url, array(
                'headers' => array(
                    'Content-Type'  => 'application/json;charset=UTF-8',
                    'method'    => 'GET'
                ),
                'body'  =>  $payload //json_encode( $payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
            ));
            $this->last_response = $response;
            #var_dump( $this );exit;
            
            if ( is_array( $response ) && ! is_wp_error( $response ) ) {
                $headers = $response['headers']; // array of http header lines
                $body    = $response['body']; // use the content
                
                $body = is_array($body)? $body : json_decode($body, true);
                $body = !empty($body)? $body : json_decode(stripcslashes($response['body']), true);
                
                $result['result'] = $body;
                $result['result']['base_url'] = $this->domain_url;
                $result['result']['method_url'] = $method_url;
                $result['variant'] = $result['type'] = 'success';
            }
            
            return $result;
        }
        function ajax_expansion_biobox_dni(){
            $result = ['variant'=>'error','type'=>'error','msg'=>'','result'=>false];
            $postdata = $_REQUEST;
            $dni = !empty($postdata['dni'])? sanitize_text_field($postdata['dni'] ): '';
            $tipo_doc = !empty($postdata['tipo_doc'])? sanitize_text_field($postdata['tipo_doc'] ): '';
            
            if( !empty($dni) ){
                $result = $this->expansion_biobox_dni( $dni );
                if( !empty($result['result']) && !empty($result['result']['total'])  ){
                    foreach( (array) $result['result']['lista'] as $k => $estudio  ){
                        $result['result']['lista'][$k]['UrlImagen'] = !empty($estudio['UrlImagen'])? $this->add_domain($estudio['UrlImagen']) : false;
                        $result['result']['lista'][$k]['UrlInforme'] = !empty($estudio['UrlInforme'])? $this->add_domain($estudio['UrlInforme']) : false;
                    }
                }
                
            }
            
            wp_send_json( $result );
            exit;
        }
        
        function ajax_expansion_biobox_turno(){
            $result = ['variant'=>'error','type'=>'error','msg'=>'','result'=>false];
            $postdata = $_REQUEST;
            $nro_turno = !empty($postdata['nro_turno'])? sanitize_text_field($postdata['nro_turno'] ): '';
            $tipo_info = !empty($postdata['tipo_info'])? sanitize_text_field($postdata['tipo_info'] ): 'informe';
            
            if( !empty($nro_turno) ){
                $result = $this->expansion_biobox_turno( $nro_turno, $metodo = $tipo_info );
                /*if( !empty($result['result']) && !empty($result['result']['total'])  ){
                    foreach( (array) $result['result']['lista'] as $k => $estudio  ){
                        $result['result']['lista'][$k]['UrlImagen'] = !empty($estudio['UrlImagen'])? $this->add_domain($estudio['UrlImagen']) : false;
                        $result['result']['lista'][$k]['UrlInforme'] = !empty($estudio['UrlInforme'])? $this->add_domain($estudio['UrlInforme']) : false;
                    }
                }*/
                
            }
            
            wp_send_json( $result );
            exit;
        }
        
        function create_RequestToken( $payload = [] ){
            $secret = $this->secret;
            #var_dump( [$payload, $secret] );exit;
            $token = $this->jwt_encode( $payload, $secret );
            #print_r( [$payload, $token] );exit;
            return $token;
        }
        
        function jwt_encode($payload='', $secret='', $header =''){
            if( in_array('',[$payload, $secret]) ) return false;
            function base64url_encode($data) {
                return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
            }            
            function base64url_decode($data) {
                return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (strlen($data) % 4)));
            }
            
            $header = !empty($header)? $header : json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
            $header = is_scalar( $header )? $header : json_encode($header);
            $payload = is_scalar( $payload )? $payload : json_encode($payload);
                        
            //$token = JWT::encode($o,$secret);
                
            //$payload = json_encode( (array) $o);
            /*
            $payload = '{
            "nro_turno": "3283013108",
            "descripcion": "Ecografía de Hombro",
            "modalidad": "US",
            "destino": "ECO2",
            "pac_id": "12345678",
            "pac_apellido": "Saavedra",
            "pac_nombre": "Angel",
            "pac_sexo": "M",
            "pac_email": "nombre@gmail.com",
            "pac_telefono": "1112345678",
            "pac_fecha_nacimiento": "2000-12-31",
            "obra_social_id": "AB123",
            "obra_social_nombre": "OSEP",
            "sol_id": "AB123",
            "sol_nombre": "Carolina Sanchez",
            "sol_matricula": "23123",
            "med_id": "AB123",
            "med_nombre": "Carolina Sanchez",
            "med_matricula": "423123",
            "prioridad": "3",
            "alertas_medicas": "",
            "alergia_contraste": "",
            "necesidades_especiales": "",
            "especialidad_nombre": "",
            "tipoAtencion": "ambulatorio",
            "empresa": "AB123", 
            "practicas":[
            {
            "fecha_inicio": "20170113",
            "dias_validez": "15",
            "modalidad": "US",
            "codigo_practica": "AB123",
            "descripcion": "Ecografía de Hombro"
            }
            ]
            }';
            */
            
            $base64UrlHeader = base64url_encode($header);
            $base64UrlPayload = base64url_encode($payload);
            $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
            $base64UrlSignature = base64url_encode($signature);
            
            $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
            
            return $jwt;
        }
        
        
        function historias_add_biobox_request(){
            ?>
                        vm2.biobox_estudios.is_loading = 1;
                        var biobox_request_data = { action: 'expansion_biobox_dni', dni: vmx.dni, tipo_doc: vmx.tipo_doc,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( biobox_request_data ) )
                        .then(function(response){
                            if(response.data.variant == 'success')
                            {
                                //TEST vm2.biobox_estudios.lista_full = Array.from({length:15}, (_,i) => ({ ...response.data.result.lista[0], id: i+1, descripcion: 'test item '+(i+1) }));
                                vm2.biobox_estudios.lista_full = response.data.result.lista || [];
                                vm2.biobox_estudios.total = Number(response.data.result.total) || vm2.biobox_estudios.lista_full.length;
                                vm2.biobox_estudios.base_url = response.data.result.base_url;
                                vm2.biobox_estudios.currentPage = 1;
                                vm2.biobox_split_size_list( );
                                console.log(response.data);
                            }else
                            {
                                vm2.biobox_estudios.lista = [];
                                vm2.biobox_estudios.total = 0;
                                vm2.biobox_estudios.currentPage = 1;
                                console.log(response.data);
                            }
                            vm2.biobox_estudios.is_loading = 0;
                            
                        }).catch(function(error){
                            console.log(error);
                            vm2.biobox_estudios.lista = [];
                            vm2.biobox_estudios.total = 0;
                            vm2.biobox_estudios.is_loading = 0;
                        });
            <?php
        }
        
        
        function historias_add_biobox_lista_estudios_template(){
            global $bookingPress_Expansion;
            $template_file = $bookingPress_Expansion->get_template_file( 'lista-estudios-biobox.php' );
            if( file_exists($template_file) ) include_once $template_file;
            
        }
        
        function add_biobox_vue_methods(){
            ?>
            
            async handle_biobox_list_btn( event, metodo = 'informe', url = '', nro_estudio = 0 ) {
                const vm = this;
                console.log(event, metodo , url , nro_estudio );
                
                
                return new Promise( (resolve,reject)=> {
                    if( !url ){
                        vm.$notify.success({
                            title:'Aquí no hay nada ',
                            message:'El '+metodo+' no existe o aun no se realiza ',
                        });
                        resolve( false );
                        return false;
                    }
                    
                    if(!vm.biobox_alwais_open_window && nro_estudio ){
                    //if estudio
                        // ADICIONALMENTE UTILIZAMOS LA MISMA URL DEL POPUP YA QUE "NO ESTA CONFIGURADO EL VISUALIZADOR EXTERNO" DE UME
                        vm.biobox_estudios.current_title = vm.biobox_make_title( metodo, nro_estudio );
                        vm.biobox_estudios.is_loading = 1;
                        vm.$refs.biobox_container.innerHTML=` 
                        <iframe onload="setTimeout(()=>{app.biobox_estudios.is_loading = 0},10);" src="${url}" allow="cross-origin-isolated; camera; microphone; fullscreen;" 
                        sandbox="allow-same-origin allow-scripts" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" sandbox_backup="allow-scripts allow-same-origin" frameborder="0" scrolling="no">
                        </iframe>`;
                        /*var biobox_request_data = { action: 'expansion_biobox_turno', nro_turno: nro_estudio, tipo_info: metodo,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( biobox_request_data ) )
                        .then(function(response){
                            if(response.data && response.data.variant == 'success'){
                                let result = response.data.result;
                                if(!result.request_url || !result.body ){
                                    return resolve(vm.biobox_in_open_window( url, metodo, nro_estudio ))
                                }                                
                                console.log('resolved',result.request_url, result.body )
                                vm.biobox_estudios.current_title = vm.biobox_make_title( metodo, nro_estudio );//metodo + ' - biobox ' + (nro_estudio?'#'+nro_estudio:'');
                                vm.biobox_estudios.is_loading = 1;
                                vm.$refs.biobox_container.innerHTML=` 
                                <iframe onload="setTimeout(()=>{app.biobox_estudios.is_loading = 0},10);" src="${result.request_url}" allow="cross-origin-isolated; camera; microphone; fullscreen;" 
                                sandbox="allow-same-origin allow-scripts" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" sandbox_backup="allow-scripts allow-same-origin" frameborder="0" scrolling="no">
                                </iframe>`;
                                return resolve( result );
                            }else{
                                console.log(response.data);
                                return resolve(vm.biobox_in_open_window( url, metodo, nro_estudio ))
                            }
                        }).catch(function(error){
                            console.log(error);
                            return resolve(vm.biobox_in_open_window( url, metodo, nro_estudio ))
                        });*/
                    //fin if estudio    
                    }else{
                        return resolve(vm.biobox_in_open_window( url, metodo, nro_estudio ))
                    }
                });
                return;
            },
            biobox_in_open_window( url, metodo = 'informe', nro_estudio ){
                
                const vm2 = this;
                title = vm.biobox_make_title( metodo, nro_estudio );//metodo+' - biobox';
                el = vm2.$refs.lista_estudios_container.getBoundingClientRect();
                w = el.width;
                h = el.height;
                w = Number(w) - 80;
                console.log(el,w,h,title); 
                features = 'width='+(w?w:400)+',height='+(h?h:400)+',left='+(el.left?el.left:100)+',top='+(el.top?el.top:100)+',resizable=yes,scrollbars=yes,toolbar=no,menubar=no,status=no'; 
                
                console.log(features);
                let popup = window.open( url , title, features );
                return popup;
            },
            biobox_split_size_list( ){
                vm = this;
                vm.biobox_estudios.is_loading = 1;
                let full_list = vm.biobox_estudios.lista_full;
                let currpage = vm.biobox_estudios.currentPage;
                let perpage = Number(vm.biobox_estudios.pagination_length)?Number(vm.biobox_estudios.pagination_length):Number(vm.biobox_estudios.perPage);
                vm.biobox_estudios.perPage = perpage;
                let inicio = (currpage - 1) * perpage;
                let list = full_list.slice( (inicio>0?inicio:0), (inicio + perpage) );
                
                vm.biobox_estudios.lista = list;
                setTimeout(()=>{vm.biobox_estudios.is_loading = 0;},300)
            },
            biobox_handleSizeChange(){
                this.biobox_estudios.currentPage = 1;
                this.biobox_split_size_list( );
                //console.log( 'biobox_handleSizeChange', this.biobox_estudios );
            },
            biobox_handleCurrentChange(){
                this.biobox_split_size_list( );
                //console.log( 'biobox_handleCurrentChange', this.biobox_estudios );
            },
            biobox_changePaginationSize(ev, val){
                let perpage = Number(this.biobox_estudios.pagination_length)?Number(this.biobox_estudios.pagination_length):Number(this.biobox_estudios.perPage);
                this.biobox_estudios.currentPage = 1;
                this.biobox_split_size_list( );
                //console.log( 'biobox_changePaginationSize', this.biobox_estudios, ev, val );
            },
            biobox_make_title( metodo = 'informe', nro_estudio = 0 ){
                return String(metodo + ' - biobox ' + (nro_estudio?'#'+nro_estudio:''));
            },
            <?php
        }
        
    }//Fin class
    
    
    global $expansion_biobox_alwais_open_window;
    $expansion_biobox_alwais_open_window = false;
    
    global $expansion_biobox;
    $expansion_biobox = new Expansion_Biobox();
    
    
    //URL-> https://unca.cli.biobox.com.ar 
    //HASH -> wZj0OsRIFl83IzQBI7EBupnI8HilrYl8sqMfTGzHgQZVWMA
    
    //$expansion_biobox->secret = "mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf";//TEST SECRET
    $expansion_biobox->secret = "mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf";
    $expansion_biobox->set_domain('https://testing.biobox.com.ar');
        
    
    $expansion_biobox->set_domain( "https://unca.cli.biobox.com.ar" );
    $expansion_biobox->secret =  "wZj0OsRIFl83IzQBI7EBupnI8HilrYl8sqMfTGzHgQZVW";
    
    }




// biobox Testing Secrets
#$secret = "f9TLSrlKtlC4hTa99eLzxTMuTKepwYB0HstWncH1IuAKs";
#$secret = "1GlAMdWWJTfRFbAmVULfduraerJnfUzXTvwaq3VPHecbk";
#$secret = "mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf";
            