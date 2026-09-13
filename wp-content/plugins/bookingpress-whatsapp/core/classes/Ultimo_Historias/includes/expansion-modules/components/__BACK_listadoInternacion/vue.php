<?php

$module_template_file = __DIR__ . '/template.php';
if( !file_exists($module_template_file) ){
    $module_template_file = false;
}

?>
export default {
    name: 'HospitalizationList',
    props: ['tab'],
    template: `<?php if($module_template_file) include_once $module_template_file; ?>`,
    data() {
        return {
          // Variable para el buscador
          searchQuery: '',
          intListFilter:{
            id:'',
            estado: '',
            date_range: [],
            medico_name: '',
            customer_id: '',
            area: '',
            searchQuery: '',
          },
          filter_pickerOptions: {
            "firstDayOfWeek": 1
          },
          search_status_list: [],
          search_staff_member_list:[],
          search_customer_list: [],
          search_area_list: [],
          internacion_status_list: [
            {text: 'Internado', value: '1', show:1 },
            {text: 'Crítico', value: '2', show:1 },
            {text: 'Alta',value: '3', show:1 },
            {text: 'Observación', value: '4', show:1 },
            {text: 'Derivado',value: '5', show:1 },
            {text: 'Fallecido',value: '6', show:1 },
          ],
          bookingpress_loading: false,
          
          
          open_internacionEdit: 0,
          currentEditData: {},            
          
          loading: false,
          // Datos de ejemplo (Mock Data)
          tableData: [],
          tableTotal: 0,
        };
    },
    computed: {
        // Filtro de búsqueda en tiempo real
        filteredHospitalizations() {
            return this.tableData
          /*return this.tableData.filter(item => {
            const search = this.searchQuery.toLowerCase();
            return (
              item.patientName.toLowerCase().includes(search) ||
              item.room.toLowerCase().includes(search) ||
              item.diagnosis.toLowerCase().includes(search)
            );
          });*/
        }
    },
    methods: {
        bookingpress_get_search_customer_list(){},
        
        save_edit_internacionData( ){
            let ingresoId = this.currentEditData?.ingreso_id?? 0;
            if(!ingresoId) {
                this.$message('Error - Falta ID de ingreso'); 
                return false;
            }
                
                const vm2 = this;
                this.loading = 1;
                
                //Nada pa cargar Ahora
                
                //Puede ser FIND id actualizar sin recargar vm2.currentEditData = {...row_data};
                vm2.loading = 0;
                vm2.open_internacionEdit = false;
            
        },
        
        edit_internacionData( row_data ){
            let ingresoId = row_data?.ingreso_id?? 0;
            if(!ingresoId) {
                this.$message('Error - Falta ID de ingreso'); 
                return false;
            }
                
                const vm2 = this;
                this.loading = 1;
                
                //Nada pa cargar Ahora
                
                vm2.currentEditData = {...row_data};
                vm2.loading = 0;
                vm2.open_internacionEdit = true;
                
                return 'success';
                /*
                var postdata = { action: 'expansion_get_more_internacion_edit_id', ingreso_id: ingresoId, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success'){
                        let result = response.data.result;
                        console.log('success', response.data );
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        
                        
                        <?php #do_action('expansion_on_more_internacion_edit_id_result') ?>
                        
                        vm2.loading = 0;
                        return 'success';
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration: 1500,
                        });
                        vm2.loading = 0;
                        return 'error';
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: 'error',
                        message: 'error ',
                        type: 'error',
                        customClass: 'error_notification',
                        duration: 1500,
                    });
                    vm2.loading = 0;
                    return 'error';
                });
                */
                
        },        
        
        reset_intListFilter(){
            this.intListFilter = {
                id:'',
                estado: '',
                date_range: [],
                medico_name: '',
                customer_name:'',
                area: '',
                searchQuery: '',
              };            
        },
        async loadInternacionList(){
            this.loading = 1;
            console.log( 'load', this.intListFilter );
            
            setTimeout(()=>{
                this.tableData = [
                {
                  id: 101,
                  patientName: 'Juan Pérez',
                  room: '305-A',
                  admissionDate: '2023-10-25',
                  diagnosis: 'Apendicitis Aguda',
                  doctor: 'Dr. House',
                  status: 'Internado'
                },
                {
                  id: 102,
                  patientName: 'María López',
                  room: '102-B',
                  admissionDate: '2023-10-24',
                  diagnosis: 'Parto Natural',
                  doctor: 'Dra. Grey',
                  status: 'Alta'
                },
                {
                  id: 103,
                  patientName: 'Carlos Gómez',
                  room: 'UCI-01',
                  admissionDate: '2023-10-26',
                  diagnosis: 'Infarto Agudo de Miocardio',
                  doctor: 'Dr. Strange',
                  status: 'Crítico'
                },
                {
                  id: 104,
                  customer_name: 'Ana Martínez',
                  movimientos: [{sala:'305-A'}],
                  fecha_ingreso: '2023-10-26',
                  diagnosis: 'Observación Postoperatoria',
                  medico_name: 'Dr. House',
                  estado: 'Internado'
                }
              ];
              this.tableTotal= this.tableData.length;
              this.loading = 0;
              //return 'success';
          },10);
                const vm2 = this;
                //let internacion_id = Number(loadIntNumber)? loadIntNumber : this.int_form_number;
                //if(!internacion_id ) return null;
                this.loading = 1;
                
                var postdata = { action: 'expansion_get_internacionList', listFilter: this.intListFilter, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success'){
                        let result = response.data.result;
                        console.log('success', response.data );
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        
                        if( result.items ){
                            
                            vm2.tableData = result.items?? [];
                            vm2.tableTotal = result.total?? 0;
                            
                        }
                        
                        
                        <?php do_action('expansion_on_internacionList_result') ?>
                        
                        vm2.loading = 0;
                        return 'success';
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration: 1500,
                        });
                        vm2.loading = 0;
                        return 'error';
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration: 1500,
                    });
                    vm2.loading = 0;
                    return 'error';
                });
        },
        
        extractDateTime(fechaTime, extraer = 'fecha'){
            if(!fechaTime) return '';
            
            if( extraer == 'fecha hora' ) return moment(fechaTime).format("YYYY/MM/DD HH:mm");
            if( extraer == 'time' ) return moment(fechaTime).format("HH:mm:ss");
            return moment(fechaTime).format("YYYY/MM/DD");
        },
        
        // Método para determinar el color de la etiqueta según el estado
        getStatusType(status, retorno = 'type') {
            let statusText = this.internacion_status_list.find(val=> val.value == status)?.text || '';
            if(retorno == 'text') return statusText;
          switch (statusText) {
            case 'Alta': return 'success';
            case 'Internado': return 'primary';
            case 'Crítico': return 'danger';
            case 'Observación': return 'warning';
            default: return 'info';
          }
        },
        handleView(row) {
          this.$message.info(`Ver detalles del paciente: ${row.customer_name}`);
          // Aquí abrirías un Dialog o navegarías a otra ruta
          this.edit_internacionData(row);
        },
        handleNewAdmission() {
          this.$message.success('Abrir formulario de nueva internación');
        },
        handleDischarge(row) {
          this.$confirm(`¿Segur@ que desea dar el alta al paciente ${row.customer_name}?`, 'Confirmar Alta', {
            confirmButtonText: 'Sí, Dar Alta',
            cancelButtonText: 'Cancelar',
            type: 'warning'
          }).then(() => {
            // Simulación de lógica
            const index = this.tableData.findIndex(t => t.id === row.id);
            this.tableData[index].status = 'Alta';
            this.$message({
              type: 'success',
              message: 'Alta médica otorgada correctamente'
            });
          }).catch(() => {});
        },
        handleDelete(row) {
          this.$confirm('¿Eliminar este registro de forma permanente?', /*'Aviso''*/'ACCION NO DISPONIBLE!', {
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            type: 'error'
          }).then(() => {
            //this.tableData = this.tableData.filter(t => t.id !== row.id);
            this.$message({
              type: 'success',
              message: ' Accion No disponible '//'Registro eliminado'
            });
          }).catch(() => {});
        }
    },
    mounted(){        
        this.$root.mainSectionTitleShow = 0;
        console.log(this.$root.mainSectionTitleShow );
        
        this.loadInternacionList();
        
    },
    created(){
        //var scopeStyle = document.body.createElement('style');
        window.appInt = this;
    },
};

<?php
