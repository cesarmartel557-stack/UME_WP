<?php

$module_template_file = __DIR__ . '/template.php';
if( !file_exists($module_template_file) ){
    $module_template_file = false;
}
$css_file = __DIR__ . '/style.css';
if( !file_exists($css_file) ){
    $css_file = false;
}
?>

export default {
        props: ['tab'],
        template: `<?php if($module_template_file) include_once $module_template_file; ?>`,
        data(){
            return {
                titulo: 'MAXI TEST MODULE',
                config: { siteName: 'Mi Sitio de WordPress'},
                ingreso: {},
                is_display_save_loader:0,
                is_disabled:0,
            }
        },
        computed: {
            
        },
        created(){
            
            <?php if($css_file){ ?>
               let scoped_styles = document.querySelector('#currentStyle');
               if(!scoped_styles){ scoped_styles = document.createElement('style'); scoped_styles.scoped = true; document.body.appendChild(scoped_styles); }
               scoped_styles.innerText = `<?php include_once $css_file; ?>`;
            <?php } ?>
        },
        methods: {
            guardarConfiguracion() {
                //localStorage.setItem('module_settings', this.config.siteName);
                //this.$notify('Configuración guardada localmente: ' + this.config.siteName);
            },
            obtenerConfiguracion(){
                //let module_settings = localStorage.getItem('module_settings');
                //if(module_settings) this.config.siteName = module_settings;
            },
            
            volverIngreso(){},
            guardarIngreso(){},
            
        },
        mounted(){
            
        }
};
<?php

