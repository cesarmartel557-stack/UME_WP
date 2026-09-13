<?php
/**
 * Modulo Componente
 *@author Maxi S - foatconcept
 *@copyright 2026 
 * 
 */
//header('Content-Type: application/json');
header("Content-Type: application/javascript");
$requestdata = $_REQUEST;
$requested_module = !empty($requestdata['module_name'])? $requestdata['module_name'] : '';

if( file_exists( __DIR__ . '/components/' . $requested_module .'/vue.php' ) ){
    ob_start();
    include_once __DIR__ . '/components/' . $requested_module .'/vue.php';
    $result = ob_get_clean();
    echo $result;
    exit;
}

ob_start();
?>
export default {
        props: ['tab'],
        template: `
            <div class="card" style="padding: 15px; background: #fff; border: 1px solid #ccd0d4;">
                <h3>{{ titulo }}</h3>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label>PACIENTE LOCO</label></th>
                        <td>
                            <input type="text" v-model="config.siteName" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <!--<td colspan="2"><?php echo __DIR__ ?></td>-->
                    </tr>
                </table>
                <p style="margin-top: 15px;">
                    <button class="button button-primary" @click="guardarConfiguracion">
                        Guardar Cambios
                    </button>
                </p>
            </div>
        `,
        data(){
            return {
                titulo: 'MAXI TEST MODULE',
                config: {
                    siteName: 'Mi Sitio de WordPress'
                }
            }
        },
        computed: {
            
        },
        created(){
            this.obtenerConfiguracion();
            
        },
        methods: {
            guardarConfiguracion() {
                localStorage.setItem('module_settings', this.config.siteName);
                this.$notify('Configuración guardada localmente: ' + this.config.siteName);
            },
            obtenerConfiguracion(){
                let module_settings = localStorage.getItem('module_settings');
                if(module_settings) this.config.siteName = module_settings;
            },
            
        },
        mounted(){
            
        }
};
<?php

$result = ob_get_clean();
echo $result;
/*
echo json_encode([
"variant"=> "success",
"result"=> $result
]);
*/
exit;
