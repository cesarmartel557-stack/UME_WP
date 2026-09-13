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
          internacionEditLoad: 0,
          internacionSaveBtnLoad: 0,
          
          
          external_section_data : {
            section: '',
            int_form_number: 4,
         },
         open_external_section: false,
          
          loading: false,
          // Datos de ejemplo (Mock Data)
          tableData: [],
          tableTotal: 0,
          //this.perPage this.currentPage
          //"perPage":"50","totalItems":0,"pagination_selected_length":10,"pagination_length":"[10,20,50,100,200,300,400,500]","currentPage":1,
          currentPage: 1,
          perPage: 10,
          pagination_selected_length: 10,
          pagination_length_val: 10,
          pagination_length: [10,20,50,100,200,300,400,500],
          pagination_val: [ {text:5, value: 5}, {text:10, value: 10}, {text:20, value: 20} ],          
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
        
        handleSelectionChange(val) {
            this.multipleSelection = [];
            /*
            const customer_items_obj = val
            Object.values(customer_items_obj).forEach(val => {
                this.multipleSelection.push({customer_id : val.customer_id})
                this.bulk_action = 'bulk_action';
            });*/
        },
        handleSizeChange(val) {
            this.perPage = val
            this.loadInternacionList()
        },
        handleCurrentChange(val) {
            this.currentPage = val;
            this.loadInternacionList()
        },        
        changeCurrentPage(perPage) {
            var total_item = this.tableTotal;
            var recored_perpage = perPage;
            var select_page =  this.currentPage;                
            var current_page = Math.ceil(total_item/recored_perpage);
            if(total_item <= recored_perpage ) {
                current_page = 1;
            } else if(select_page >= current_page ) {
                
            } else {
                current_page = select_page;
            }
            return current_page;
        },
        changePaginationSize(selectedPage) {     
            var total_recored_perpage = selectedPage;
            var current_page = this.changeCurrentPage(total_recored_perpage);                                        
            this.perPage = selectedPage;                    
            this.currentPage = current_page;    
            this.loadInternacionList()
        },
                
        
        openExternalSection(seccion, id ){
            this.open_external_section = false;
            this.external_section_data.section = seccion;
            this.external_section_data.int_form_number = id;
            this.open_external_section = true;
          },
          
        
        save_edit_internacionData( ){
            let ingresoId = this.currentEditData?.ingreso_id?? 0;
            if(!ingresoId) {
                this.$message('Error - Falta ID de ingreso'); 
                return false;
            }
                const vm2 = this;
                this.loading = 1;
                vm2.internacionSaveBtnLoad = 1;
                
                let med_encargado_data = (($exp_default_data_fields||{}).search_staff_member_list || []).find(opt=> opt.value == vm2.currentEditData.medico_encargado);
                vm2.currentEditData.medico_name = med_encargado_data? med_encargado_data.taxt: '';
                vm2.currentEditData.area_desc = vm2.currentEditData.movimientos[0].area;
                vm2.currentEditData.raw_int = vm2.currentEditData.movimientos[0];
                //Nada pa cargar Ahora
                console.log('inicio guardado', this.currentEditData );
                
                let postdata = { action: 'expansion_save_internacion_edit_id', internacion_data: vm2.currentEditData, int_ingreso_id: ingresoId, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success' ){
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        //vm2.ingreso_formdata.id = response.data.ingreso_id;
                        
                        console.log('success', response.data );
                        
                        
                        
                        <?php do_action('expansion_on_internacionEdit_save') ?>
                        
                        //Puede ser FIND id actualizar sin recargar vm2.currentEditData = {...row_data};
                        
                        vm2.open_internacionEdit = false;
                                                
                    }
                    vm2.$notify({
                        title: response.data.title?? 'Guardado',
                        message: response.data.msg?? '',
                        type: response.data.variant,
                        customClass: response.data.variant+'_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    vm2.loading = 0;
                    vm2.internacionSaveBtnLoad = 0;
                    return response.data.variant;
                    
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    vm2.loading = 0;
                    vm2.internacionSaveBtnLoad = 0;
                    return 'error';
                });
                
                
                
                
            
        },
        <?php /*
        async saveInternacionFormX(){
                //expansion_save_internacionIngreso_id
                const vm2 = this;
                let int_ingreso_id = Number(vm2.ingreso_formdata.id)?? this.int_form_number?? 0;
                //if(!internacion_id ) return null;
                
                var postdata = { action: 'expansion_save_internacionIngreso', int_ingreso_formdata: vm2.ingreso_formdata, int_ingreso_id: int_ingreso_id, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success' && Number(response.data.ingreso_id) ){
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        vm2.ingreso_formdata.id = response.data.ingreso_id;
                        
                        console.log('success', response.data );
                        
                        
                        
                        <?php do_action('expansion_on_internacionIngreso_save') ?>
                                                
                    }
                    vm2.$notify({
                        title: response.data.title?? 'Guardado',
                        message: response.data.msg?? (response.data.ingreso_id? 'ingreso #'+response.data.ingreso_id+' generado' : 'No se genero id'),
                        type: response.data.variant,
                        customClass: response.data.variant+'_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    
                    return response.data.variant;
                    
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    return 'error';
                });
            },
        */ ?>
        edit_internacionData( row_data ){
            let ingresoId = row_data?.ingreso_id?? 0;
            if(!ingresoId) {
                this.$message('Error - Falta ID de ingreso'); 
                return false;
            }
                
                const vm2 = this;
                //this.loading = 1;
                
                //Nada pa cargar Ahora
                
                vm2.currentEditData = {...row_data};
                                
                console.log( vm2.currentEditData );
                if(!vm2.currentEditData.movimientos){
                    vm2.currentEditData.movimientos = [{
                        area: row_data.area_desc?? '',
                        sala: '',
                        cama: ''
                    }];
                }
                                
                if(typeof vm2.currentEditData.movimientos == 'string' ){
                    vm2.currentEditData.movimientos = [JSON.parse(vm2.currentEditData.movimientos)];
                }
                
                vm2.search_area_list = Array.isArray(this.search_area_list)? this.search_area_list : [];
                
                if( !vm2.search_area_list.includes( vm2.currentEditData.movimientos[0].area ) ){
                    vm2.search_area_list.push( vm2.currentEditData.movimientos[0].area );
                }
                console.log( vm2.currentEditData );
                //vm2.loading = 0;
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
            //console.log( 'load', this.intListFilter );            
                const vm2 = this;
                //let internacion_id = Number(loadIntNumber)? loadIntNumber : this.int_form_number;
                //if(!internacion_id ) return null;
                this.loading = 1;
                
                var postdata = { action: 'expansion_get_internacionList', listFilter: this.intListFilter, perpage:this.perPage, currentpage:this.currentPage,  _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success'){
                        let result = response.data.result;
                        console.log('success', response.data );
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        
                        vm2.tableData = result.items?? [];
                        vm2.tableTotal = Number( result.total?? 0 );                            
                        
                        
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
        window.appIntList = this;
    },
    beforeDestroy(){
        window.appIntList = null;
    },
};

<?php
