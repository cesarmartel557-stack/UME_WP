<?php
/**
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

*/

ob_start();

?>
<template>
  <el-dialog
    title="Detalle de Internación"
    :visible.sync="dialogVisible"
    width="650px"
    custom-class="medical-modal"
  >
    <!-- Encabezado con Info Principal del Paciente -->
    <div class="patient-header-zone">
      <div class="patient-info">
        <el-avatar icon="el-icon-user-solid" size="medium" class="avatar-blue"></el-avatar>
        <div class="name-box">
          <h3>Paciente Loco</h3>
          <span class="subtext">ID Interno: <strong>#12345</strong></span>
        </div>
      </div>
      <el-tag type="success" effect="dark" size="medium">Internado</el-tag>
    </div>

    <el-divider></el-divider>

    <!-- Formulario Principal -->
    <el-form :model="form" label-position="top" size="medium">
      
      <!-- SECCIÓN 1: UBICACIÓN Y TIEMPO -->
      <h4 class="section-title"><i class="el-icon-location-outline"></i> Ubicación e Ingreso</h4>
      <el-row :gutter="20">
        <el-col :span="12">
          <el-form-item label="Fecha y Hora de Ingreso">
            <el-date-picker
              v-model="form.fechaIngreso"
              type="datetime"
              placeholder="Seleccione fecha y hora"
              style="width: 100%"
            ></el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="12">
          <el-form-item label="Área de Hospitalización">
            <el-select v-model="form.area" placeholder="Seleccione Área / Sector" style="width: 100%">
              <el-option label="Piso 1 - Sala General" value="piso1"></el-option>
              <el-option label="UTI" value="uti"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :span="12">
          <el-form-item label="Habitación">
            <el-select v-model="form.habitacion" placeholder="Habitación" style="width: 100%">
              <el-option label="A21" value="A21"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="12">
          <el-form-item label="Cama">
            <div class="cama-input-container">
              <el-select v-model="form.cama" placeholder="Cama" style="width: 100%">
                <el-option label="2" value="2"></el-option>
              </el-select>
              <el-button type="text" icon="el-icon-map-location" class="map-btn">Ver Mapa</el-button>
            </div>
          </el-form-item>
        </el-col>
      </el-row>

      <!-- SECCIÓN 2: PERSONAL MÉDICO -->
      <h4 class="section-title"><i class="el-icon-first-aid-kit"></i> Equipo Médico</h4>
      <el-row :gutter="20">
        <el-col :span="12">
          <el-form-item label="Médico de Ingreso">
            <el-select v-model="form.medicoIngreso" placeholder="Buscar médico" style="width: 100%" filterable>
              <el-option label="Doc de Ingreso" value="doc1"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="12">
          <el-form-item label="Médico Encargado / Tratante">
            <el-select v-model="form.medicoEncargado" placeholder="Asignar médico encargado" style="width: 100%" filterable>
              <el-option label="Dr. Guillermo House" value="doc2"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
      </el-row>

      <!-- SECCIÓN 3: ALTA / EGRESO (Opcional o Deshabilitado según estado) -->
      <h4 class="section-title text-muted"><i class="el-icon-document-checked"></i> Datos de Egreso</h4>
      <el-row :gutter="20">
        <el-col :span="12">
          <el-form-item label="Fecha y Hora de Egreso">
            <el-date-picker
              v-model="form.fechaEgreso"
              type="datetime"
              placeholder="Pendiente de alta"
              style="width: 100%"
              disabled
            ></el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="12">
          <el-form-item label="Destino de Alta">
            <el-input 
              v-model="form.destino" 
              placeholder="Domicilio / Hospital de derivación"
              disabled
            ></el-input>
          </el-form-item>
        </el-col>
      </el-row>

    </el-form>

    <!-- Botones de Acción Inferiores -->
    <span slot="footer" class="dialog-footer">
      <el-button @click="dialogVisible = false" size="medium">Cancelar</el-button>
      <el-button type="primary" @click="saveInternacion" size="medium" icon="el-icon-check">Guardar Cambios</el-button>
    </span>
  </el-dialog>
</template>
<?php
$vue_template = ob_get_clean();
?>

export default {
    template: `<?php echo $vue_template; ?>`,
  data() {
    return {
      dialogVisible: true,
      form: {
        fechaIngreso: '2026-07-13T01:02:00',
        area: '',
        habitacion: 'A21',
        cama: '2',
        medicoIngreso: 'doc1',
        medicoEncargado: '',
        fechaEgreso: '',
        destino: ''
      }
    };
  },
  methods: {
    saveInternacion() {
      this.$message({
        message: 'Datos guardados correctamente',
        type: 'success'
      });
      this.dialogVisible = false;
    }
  }
};


