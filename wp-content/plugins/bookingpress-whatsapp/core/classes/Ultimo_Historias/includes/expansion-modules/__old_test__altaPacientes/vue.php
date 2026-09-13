<?php

$module_template_file = __DIR__ . '/template.php';
if( !file_exists($module_template_file) ){
    $module_template_file = false;
}

?>
export default {
        props: ['tab'],
        template: `<?php if($module_template_file) include_once $module_template_file; ?>`,
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