<?php 
/**
 * 
 * 
 */

// Definir la ruta base de tu plugin para cargar los archivos JS
#$plugin_js_url = EXPANSION_MODULES_SRC . 'module.php'; 
$plugin_js_url = admin_url('admin-ajax.php');
?>
    <div class="include_head_css_scripts" style="display: none;">

<script>
var $expansion_modules_url = <?php echo json_encode($plugin_js_url); ?>;
</script>

<!-- Vue 2 CDN -->
<!--<script type="text/javascript" data-cfasync="false" src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js" id="bookingpress_vue_js-js"></script>-->
<link rel="stylesheet" id="bookingpress_tel_input-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_tel_input.css?ver=1.1.5'); ?>" media="all">
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_tel_input.js?ver=1.1.5'); ?>" id="bookingpress_tel_input_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_tel_utils.js?ver=1.1.5'); ?>" id="bookingpress_tel_utils_js-js"></script>

<?php /**
<!--
<link rel="stylesheet" id="blossom-coach-admin-css" href="/wp-content/themes/blossom-coach/inc/css/admin.css?ver=1.5.9" media="all">
<link rel="stylesheet" id="litespeed-cache-css" href="/wp-content/plugins/litespeed-cache/assets/css/litespeed.css?ver=7.8.0.1" media="all">
<link rel="stylesheet" id="litespeed-cache-dark-mode-css" href="/wp-content/plugins/litespeed-cache/assets/css/litespeed-dark-mode.css?ver=7.8.0.1" media="all">
-->
<link rel="stylesheet" id="thickbox-css" href="<?php echo home_url('/wp-includes/js/thickbox/thickbox.css?ver=6.9.4'); ?>" media="all">

<link rel="stylesheet" id="bookingpress_element_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_element_theme.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_fonts_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/fonts/fonts.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_root_variables_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_variables.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_components_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_admin_components.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_admin_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_admin.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_tel_input-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/css/bookingpress_tel_input.css?ver=1.1.5'); ?>" media="all">
<link rel="stylesheet" id="bookingpress_pro_admin_css-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking-pro/css/bookingpress_pro_admin.css?ver=3.5'); ?>" media="all">
<link rel="stylesheet" id="booking_expansion_admin_panel-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-whatsapp/core/classes/Ultimo_Historias/src/css/admin_panel.css?ver=1.01.001'); ?>" media="all">
<link rel="stylesheet" id="booking_expansion_expansion_footer-css" href="<?php echo home_url('/wp-content/plugins/bookingpress-whatsapp/core/classes/Ultimo_Historias/src/css/footer.css?ver=1.01.1781828230'); ?>" media="all">


<script type="text/javascript" src="<?php echo home_url('/wp-admin/load-scripts.php?c=1&amp;load%5Bchunk_0%5D=jquery-core,jquery-migrate,utils&amp;ver=6.9.4'); ?>"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-whatsapp/core/classes/Ultimo_Historias/src/js/booking-expansion-js-filter.js?ver=1.0'); ?>" id="booking_expansion_expansion_filter_func-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_admin_custom.js?ver=1.1.5'); ?>" id="bookingpress_admin_custom_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_vue.min.js?ver=1.1.5'); ?>" id="bookingpress_admin_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_axios.min.js?ver=1.1.5'); ?>" id="bookingpress_axios_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_wordpress_vue_qs_helper.js?ver=1.1.5'); ?>" id="bookingpress_wordpress_vue_helper_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_element.js?ver=1.1.5'); ?>" id="bookingpress_element_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_moment.min.js?ver=1.1.5'); ?>" id="bookingpress_moment_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/elements_locale/es.js?ver=1.1.5'); ?>" id="bookingpress_elements_locale-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_tel_input.js?ver=1.1.5'); ?>" id="bookingpress_tel_input_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/js/bookingpress_tel_utils.js?ver=1.1.5'); ?>" id="bookingpress_tel_utils_js-js"></script>
<script src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking-pro/js/bookingpress_pro_admin_custom.js?ver=3.5'); ?>" id="bookingpress_pro_admin_custom_js-js"></script>

*/ ?>

<meta name="viewport" content="width=device-width,initial-scale=1.0">


 <!-- stylos cesar -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style id="cesar-internados" scoped>
/* ============================================================
   TOKENS: Element UI defaults + UME brand colors
   ============================================================ */
:root {
  --el-bg-color:           #ffffff;
  --el-bg-color-page:      #f2f3f5;
  --el-fill-color-light:   #f5f7fa;
  --el-fill-color-blank:   #ffffff;
  --el-border-color:       #dcdfe6;
  --el-border-color-light: #e4e7ed;
  --el-text-color-primary: #303133;
  --el-text-color-regular: #606266;
  --el-text-color-secondary:#909399;
  --el-text-color-placeholder:#a8abb2;
  --el-border-radius-base: 4px;
  --el-font-size-base:     14px;

  --ume-primary:           #1AA6C9;
  --ume-primary-dark:      #128CAA;
  --ume-primary-light:     #d9f0f7;
  --ume-primary-lighter:   #eef8fb;
  --ume-green:             #5FAE2C;
  --ume-green-dark:        #4C8F23;
  --ume-green-light:       #e8f5dc;
  --ume-danger:            #e05f6e;
  --ume-header-bar:        #1c2b36;
}

*, *::before, *::after { box-sizing: border-box; }
html, body { margin: 0; padding: 0; }
body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: var(--el-font-size-base);
  color: var(--el-text-color-primary);
  background: var(--el-bg-color-page);
  -webkit-font-smoothing: antialiased;
  padding-bottom: 48px;
}

/* ============================================================ HEADER */
.ume-header {
  background: var(--ume-header-bar);
  border-bottom: 3px solid var(--ume-primary);
}
.ume-header-inner {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 12px 24px;
}
.ume-logo-wrap {
  display: flex;
  align-items: center;
  height: 44px;
}
.ume-logo-wrap img { height: 38px; display: block; }
.ume-header-info .org-name {
  font-weight: 700;
  font-size: 14px;
  color: #fff;
  letter-spacing: .03em;
}
.ume-header-info .org-meta {
  font-size: 11.5px;
  color: #9eb4be;
  margin-top: 1px;
}

/* page title */
.ume-page-header {
  background: var(--el-bg-color);
  border-bottom: 1px solid var(--el-border-color-light);
  padding: 18px 24px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.ume-page-header .ph-icon {
  width: 34px; height: 34px;
  border-radius: var(--el-border-radius-base);
  background: var(--ume-primary-lighter);
  color: var(--ume-primary);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.ume-page-header .ph-icon svg { width: 18px; height: 18px; }
.ume-page-header h1 {
  margin: 0;
  font-size: 20px;
  font-weight: 700;
  color: var(--el-text-color-primary);
}
.ume-page-header p {
  margin: 3px 0 0;
  font-size: 13px;
  color: var(--el-text-color-secondary);
}

/* ============================================================ LAYOUT */
.ume-wrap {
  /* max-width: 960px; */
  margin: 0 auto;
  /* padding: 24px 20px; */
}

/* ============================================================ CARD */
.el-card {
  background: var(--el-bg-color);
  border: 1px solid var(--el-border-color-light);
  border-radius: var(--el-border-radius-base);
  box-shadow: 0 1px 4px rgba(0,0,0,.06);
  overflow: hidden;
  margin-bottom: 16px;
  position: relative;
}
/*
.el-card::after {
  content: "";
  position: absolute;
  right: -20px; bottom: -20px;
  width: 160px; height: 160px;
  background-image:
    repeating-linear-gradient(0deg, transparent 0 20px, rgba(95,174,44,.12) 20px 23px, transparent 23px 43px),
    repeating-linear-gradient(90deg, transparent 0 20px, rgba(95,174,44,.12) 20px 23px, transparent 23px 43px);
  pointer-events: none;
  z-index: 0;
  opacity: 1;
}
*/
.el-card__header {
  padding: 12px 18px;
  border-bottom: 1px solid var(--el-border-color-light);
  display: flex;
  align-items: center;
  gap: 9px;
  background: var(--el-fill-color-light);
}
.el-card__header .sec-icon {
  width: 26px; height: 26px;
  border-radius: var(--el-border-radius-base);
  background: var(--ume-primary-lighter);
  color: var(--ume-primary);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.el-card__header .sec-icon svg { width: 14px; height: 14px; }
.el-card__header .sec-title {
  font-size: 13.5px;
  font-weight: 700;
  color: var(--el-text-color-primary);
  text-transform: uppercase;
  letter-spacing: .04em;
}
.el-card__body {
  padding: 16px 18px;
  position: relative;
  z-index: 1;
}

/* ============================================================ FORM ELEMENTS */
.bpa-form-group { margin-bottom: 14px; }

.bpa-form-label {
  display: block;
  font-size: 12.5px;
  font-weight: 600;
  color: var(--el-text-color-regular);
  margin-bottom: 4px;
}
.bpa-form-label .req { color: var(--ume-danger); margin-left: 2px; }

.bpa-form-control { position: relative; }

.bpa-form-input,
.bpa-form-select,
.bpa-form-textarea {
  width: 100%;
  font-family: inherit;
  font-size: 14px;
  color: var(--el-text-color-primary);
  background: var(--el-fill-color-light);
  border: 1px solid var(--el-border-color);
  border-radius: var(--el-border-radius-base);
  padding: 8px 11px;
  outline: none;
  line-height: 1.5;
  transition: border-color .18s, background .18s, box-shadow .18s;
  -webkit-appearance: none;
}
.bpa-form-textarea { resize: vertical; min-height: 62px; }
.bpa-form-input::placeholder,
.bpa-form-textarea::placeholder { color: var(--el-text-color-placeholder); }
.bpa-form-input:hover,
.bpa-form-select:hover,
.bpa-form-textarea:hover { border-color: var(--ume-primary); }
.bpa-form-input:focus,
.bpa-form-select:focus,
.bpa-form-textarea:focus {
  border-color: var(--ume-primary);
  background: var(--el-fill-color-blank);
  box-shadow: 0 0 0 2px rgba(26,166,201,.18);
}
.bpa-form-helper-text {
  margin-top: 3px;
  font-size: 11.5px;
  color: var(--el-text-color-secondary);
}

/* select arrow */
.bpa-form-select {
  background-image: url("data:image/svg+xml;utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='7' viewBox='0 0 12 7'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23909399' stroke-width='1.4' stroke-linecap='round' fill='none'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 10px center;
  padding-right: 28px;
  cursor: pointer;
}

/* ============================================================ GRID HELPERS */
.g2  { display: grid; grid-template-columns: 1fr 1fr;         gap: 12px; }
.g3  { display: grid; grid-template-columns: 1fr 1fr 1fr;     gap: 12px; }
.g4  { display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 12px; }
.g1-2{ display: grid; grid-template-columns: 1fr 2fr;         gap: 12px; }
.g2-1{ display: grid; grid-template-columns: 2fr 1fr;         gap: 12px; }
.g1-1-1-half { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 12px; }
@media (max-width: 640px) {
  .g2,.g3,.g4,.g1-2,.g2-1,.g1-1-1-half { grid-template-columns: 1fr; }
}

/* ============================================================ BUTTONS */
.bpa-btn {
  display: inline-flex; align-items: center; justify-content: center;
  font-family: inherit; font-size: 14px; font-weight: 500;
  border-radius: var(--el-border-radius-base);
  padding: 9px 20px;
  border: 1px solid transparent;
  cursor: pointer;
  transition: background .15s, border-color .15s;
  line-height: 1;
}
/*.bpa-btn--primary { background: var(--ume-primary); border-color: var(--ume-primary); color: #fff; }
.bpa-btn--primary:hover { background: var(--ume-primary-dark); border-color: var(--ume-primary-dark); }*/
.bpa-btn--ghost { background: var(--el-fill-color-blank); border-color: var(--el-border-color); color: var(--el-text-color-regular); }
.bpa-btn--ghost:hover { color: var(--ume-primary); border-color: var(--ume-primary-light); background: var(--ume-primary-lighter); }

/* footer */
.form-footer {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  padding: 14px 18px;
  background: var(--el-fill-color-light);
  border-top: 1px solid var(--el-border-color-light);
  border-radius: 0 0 var(--el-border-radius-base) var(--el-border-radius-base);
}

/* signature row */
.signature-row {
  display: flex;
  justify-content: flex-end;
  flex-direction: column;
  align-items: flex-end;
  margin-top: 8px;
  gap: 4px;
}
.signature-row .sig-line {
  width: 200px;
  border-bottom: 1.5px dashed var(--el-border-color);
  height: 30px;
}
.signature-row .sig-label {
  font-size: 12px;
  color: var(--el-text-color-secondary);
}

/* divider */
.el-divider { border: none; border-top: 1px solid var(--el-border-color-light); margin: 14px 0; }

/* checkbox */
.bpa-checkbox-option {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 13.5px;
  color: var(--el-text-color-primary);
  cursor: pointer;
  line-height: 1.45;
}
.bpa-checkbox-input {
  -webkit-appearance: none;
  appearance: none;
  width: 16px; height: 16px;
  min-width: 16px;
  border: 1px solid var(--el-border-color);
  border-radius: 2px;
  margin-top: 2px;
  background: var(--el-fill-color-light);
  cursor: pointer;
  position: relative;
  transition: background .15s, border-color .15s;
  flex-shrink: 0;
}
.bpa-checkbox-input:checked {
  background: var(--ume-green);
  border-color: var(--ume-green);
}
.bpa-checkbox-input:checked::after {
  content: "";
  position: absolute;
  left: 4px; top: 1px;
  width: 5px; height: 8px;
  border: 2px solid #fff;
  border-top: none; border-left: none;
  transform: rotate(45deg);
}

/* conformidad block — firma y sello */
.conformidad-block {
  border: 1px solid var(--el-border-color-light);
  border-radius: var(--el-border-radius-base);
  background: var(--el-fill-color-light);
  padding: 12px 14px;
  margin-bottom: 10px;
}
.conformidad-block .bpa-checkbox-option { margin-bottom: 9px; font-weight: 500; font-size: 13px; }
.conformidad-block .bpa-form-input {
  padding: 8px 11px;
  font-size: 13px;
  background: var(--el-fill-color-blank);
}

.ume-footer-note {
  text-align: center; font-size: 12px; color: var(--el-text-color-secondary); margin-top: 24px;
}

/* section spacing inside card */
.subsection { margin-bottom: 10px; }
.subsection-title {
  font-size: 12px;
  font-weight: 700;
  color: var(--ume-primary-dark);
  text-transform: uppercase;
  letter-spacing: .05em;
  margin-bottom: 8px;
  padding-bottom: 4px;
  border-bottom: 1px solid var(--ume-primary-light);
}
</style>



<style>
/*
.el-dialog__wrapper {
    display: flex;
    width: auto !important;
    z-index: 2046;
    justify-content: center;
    align-items: center;
    background: darkmagenta;
    left: anchor(--int-app-container left) !important;
    right: anchor(--int-app-container right) !important;
}*/
.exp-listado-internacion .el-dialog__wrapper {
    z-index: 2006;
    justify-content: center;
    position: fixed;
    align-self: center;
    align-self: flex-start;
    /* padding-top: 10vh; */
    min-width: min(400px, 100%);
    box-sizing: border-box;
    height: 100vh;
    flex: 0 0 100%;
    padding-bottom: 20px;
    background-color: #00000005;
    left: anchor(--int-app-container left);
    right: anchor(--int-app-container right);
}

.el-loading-mask.is-fullscreen {
    position: fixed;
    left: anchor(--int-app-container left);
    right: anchor(--int-app-container right);
}


.exp-listado-internacion .internacion-modal-view {
    min-width: min(650px, calc(100% - 30px));
}

body.__expansion-is-admin-turnos {
    --expansion-admin-menu-size: 200px;
}
body.__expansion-is-admin-turnos.folded {
    --expansion-admin-menu-size: 50px !important;
}

body.__expansion-is-admin-turnos div#adminmenuback, div#adminmenuwrap, ul#adminmenu {
    background: white;
    /* color: #535d71; */
    z-index: 2002;
}

body.__expansion-is-admin-turnos div#adminmenuback {
    width: var(--expansion-admin-menu-size);
}
body.__expansion-is-admin-turnos div#adminmenuwrap {
    width: var(--expansion-admin-menu-size);
    position: fixed;
}

body.__expansion-is-admin-turnos #wpcontent, body.__expansion-is-admin-turnos #wpfooter {
    margin-left: var(--expansion-admin-menu-size);
}
body.__expansion-is-admin-turnos ul#adminmenu {
    margin-top: 0;
    width: 100%;
}

body.__expansion-is-admin-turnos #expansion_menu_items .bpa-ssn__brand-logo {
    height: 100px;
}
body.__expansion-is-admin-turnos #expansion_menu_items .bpa-ssn__navbar-wrap {
    position: relative;
    z-index: 2;    
}
body.__expansion-is-admin-turnos #expansion_menu_items li a.__bpa-is-active {
    background-color: #096f95 !important;
    color: #fff;
}
/*
body:has( #listadoInternacion:target ) #expansion_menu_items li a[href="#listadoInternacion"] {
    background-color: #096f95 !important;
    color: #fff;
}

body a.link_listadoInternacion {
    background-color: #096f95 !important;
    color: #fff !important;
}
*/

@media (max-width: 1023px) {
    .el-dialog__headerbtn {
        top: 20px;
        right: 32px;
    }
}
@media (max-width: 996px) {
    .exp-listado-internacion .el-dialog__wrapper { top: 0;  }
    .exp-listado-internacion .el-dialog { top: 0; }
    
    body.__expansion-is-admin-turnos.auto-fold {
        --expansion-admin-menu-size: 50px !important;
    }
}

</style>
    </div>
    
    <div class="expansion-modules-page">
    <?php 
    /**
        <nav class="bpa-header-navbar">
            <div class="bpa-header-navbar-wrap">
                <div class="bpa-navbar-brand"><a href="/wp-admin/admin.php?page=bookingpress#" class="navbar-logo"><img src="/wp-content/uploads/2026/05/doc-logo-e1780279730592.png" alt=""></a></div> 
                
                <div id="bpa-navbar-nav" class="bpa-navbar-nav">
                    <div id="bpa-mobile-menu" class="bpa-menu-toggle"><span class="bpa-mm-bar"></span> <span class="bpa-mm-bar"></span> <span class="bpa-mm-bar"></span></div> 
                
                    <ul>
                        <li class="bpa-nav-item ">
                            <a href="/wp-admin/admin.php?page=bookingpress_calendar" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 3h-1V2c0-.55-.45-1-1-1s-1 .45-1 1v1H7V2c0-.55-.45-1-1-1s-1 .45-1 1v1H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 18H5c-.55 0-1-.45-1-1V8h16v12c0 .55-.45 1-1 1z"></path></svg></div>
						Calendario						</a>
                        </li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_appointments" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16 12h-3c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zm0-10v1H8V2c0-.55-.45-1-1-1s-1 .45-1 1v1H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm2 17H6c-.55 0-1-.45-1-1V8h14v10c0 .55-.45 1-1 1z"></path></svg></div>
							Turnos						</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_payments" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09v.58c0 .73-.6 1.33-1.33 1.33h-.01c-.73 0-1.33-.6-1.33-1.33v-.6c-1.33-.28-2.51-1.01-3.01-2.24-.23-.55.2-1.16.8-1.16h.24c.37 0 .67.25.81.6.29.75 1.05 1.27 2.51 1.27 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21v-.6c0-.73.6-1.33 1.33-1.33h.01c.73 0 1.33.6 1.33 1.33v.62c1.38.34 2.25 1.2 2.63 2.26.2.55-.22 1.13-.81 1.13h-.26c-.37 0-.67-.26-.77-.62-.23-.76-.86-1.25-2.12-1.25-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.02 1.83-1.39 2.83-3.13 3.16z"></path></svg></div>
							Pagos						</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_customers" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.5 12c1.38 0 2.49-1.12 2.49-2.5S17.88 7 16.5 7 14 8.12 14 9.5s1.12 2.5 2.5 2.5zM9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5 6 6.34 6 8s1.34 3 3 3zm7.5 3c-1.83 0-5.5.92-5.5 2.75V18c0 .55.45 1 1 1h9c.55 0 1-.45 1-1v-1.25c0-1.83-3.67-2.75-5.5-2.75zM9 13c-2.33 0-7 1.17-7 3.5V18c0 .55.45 1 1 1h6v-2.25c0-.85.33-2.34 2.37-3.47C10.5 13.1 9.66 13 9 13z"></path></svg></div>
							Pacientes						</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_historias" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4470_13557)"><path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"></path> <path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"></path></g> <defs><clipPath id="clip0_4470_13557"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg></div>
        					Historias Clinicas					
        				</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_services" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M14 9.5h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm0 7h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm5 4.5H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2zM7 11h3c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7V7zm0 11h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7v-3z"></path></svg></div>
							Servicios						</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_staff_members" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"></path></svg></div>
							Medicos						</a></li> <li class="bpa-nav-item "><a href="/wp-admin/admin.php?page=bookingpress_reports" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><path d="M15.59,3.59C15.21,3.21,14.7,3,14.17,3H5C3.9,3,3.01,3.9,3.01,5L3,19c0,1.1,0.89,2,1.99,2H19c1.1,0,2-0.9,2-2V9.83 c0-0.53-0.21-1.04-0.59-1.41L15.59,3.59z M8,17c-0.55,0-1-0.45-1-1s0.45-1,1-1s1,0.45,1,1S8.55,17,8,17z M8,13c-0.55,0-1-0.45-1-1 s0.45-1,1-1s1,0.45,1,1S8.55,13,8,13z M8,9C7.45,9,7,8.55,7,8s0.45-1,1-1s1,0.45,1,1S8.55,9,8,9z M14,9V4.5l5.5,5.5H15 C14.45,10,14,9.55,14,9z"></path></g></g></svg></div>
								Reportes							</a></li> <li class="bpa-nav-item "><div class="bpa-nav-item-dropdown el-dropdown"><a href="#" class="bpa-nav-link el-dropdown-selfdefine" aria-haspopup="list" aria-controls="dropdown-menu-2788" role="button" tabindex="0"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path></svg></div>
								Personalizar							</a> <ul class="el-dropdown-menu el-popper bpa-ni-dropdown-menu" id="dropdown-menu-2788" style="display: none;"><li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item __active"><!----><a href="/wp-admin/admin.php?page=bookingpress_customize&amp;action=forms" class="bpa-dm--item-link"><span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.6667 0.666992C15.1267 0.666992 15.5 1.04033 15.5 1.50033V4.63116L8.00083 12.1312L7.99583 15.6628L11.5342 15.6678L15.5 11.702V16.5003C15.5 16.9603 15.1267 17.3337 14.6667 17.3337H1.33333C0.873333 17.3337 0.5 16.9603 0.5 16.5003V1.50033C0.5 1.04033 0.873333 0.666992 1.33333 0.666992H14.6667ZM16.1483 6.34033L17.3267 7.51866L10.845 14.0003L9.665 13.9987L9.66667 12.822L16.1483 6.34033ZM8 9.00033H3.83333V10.667H8V9.00033ZM10.5 5.66699H3.83333V7.33366H10.5V5.66699Z"></path></svg></span>    
									Formas									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item  "><!----><a href="/wp-admin/admin.php?page=bookingpress_customize&amp;action=form_fields" class="bpa-dm--item-link"><span><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.3334 9.83366L18.1367 13.2187L15.6592 13.927L17.4301 16.9945L15.9867 17.8278L14.2159 14.7612L12.3634 16.5528L12.3334 9.83366ZM10.6667 4.00033H12.3334V5.66699H16.5001C16.7211 5.66699 16.9331 5.75479 17.0893 5.91107C17.2456 6.06735 17.3334 6.27931 17.3334 6.50033V9.83366H15.6667V7.33366H7.33342V15.667H10.6667V17.3337H6.50008C6.27907 17.3337 6.06711 17.2459 5.91083 17.0896C5.75455 16.9333 5.66675 16.7213 5.66675 16.5003V12.3337H4.00008V10.667H5.66675V6.50033C5.66675 6.27931 5.75455 6.06735 5.91083 5.91107C6.06711 5.75479 6.27907 5.66699 6.50008 5.66699H10.6667V4.00033ZM2.33341 10.667V12.3337H0.666748V10.667H2.33341ZM2.33341 7.33366V9.00033H0.666748V7.33366H2.33341ZM2.33341 4.00033V5.66699H0.666748V4.00033H2.33341ZM2.33341 0.666992V2.33366H0.666748V0.666992H2.33341ZM5.66675 0.666992V2.33366H4.00008V0.666992H5.66675ZM9.00008 0.666992V2.33366H7.33342V0.666992H9.00008ZM12.3334 0.666992V2.33366H10.6667V0.666992H12.3334Z"></path></svg></span>
										Campos Adicionales									</a></li></ul></div></li> 
                                        
                                        
                                        <li class="bpa-nav-item ">
                                            <div class="bpa-nav-item-dropdown el-dropdown"><a href="#" class="bpa-nav-item-dropdown__link el-dropdown-selfdefine" aria-haspopup="list" aria-controls="dropdown-menu-6419" role="button" tabindex="0"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></div>
    								            Mas							</a> 
                                    
                                    
                                                <ul class="el-dropdown-menu el-popper bpa-ni-dropdown-menu" id="dropdown-menu-6419" style="display: none;"><li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item "><!----><a href="/wp-admin/admin.php?page=bookingpress_settings" class="bpa-dm--item-link"><span><svg width="18px" height="18px" fill="none" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><rect fill="none" height="24" width="24"></rect><path d="M19.5,12c0-0.23-0.01-0.45-0.03-0.68l1.86-1.41c0.4-0.3,0.51-0.86,0.26-1.3l-1.87-3.23c-0.25-0.44-0.79-0.62-1.25-0.42 l-2.15,0.91c-0.37-0.26-0.76-0.49-1.17-0.68l-0.29-2.31C14.8,2.38,14.37,2,13.87,2h-3.73C9.63,2,9.2,2.38,9.14,2.88L8.85,5.19 c-0.41,0.19-0.8,0.42-1.17,0.68L5.53,4.96c-0.46-0.2-1-0.02-1.25,0.42L2.41,8.62c-0.25,0.44-0.14,0.99,0.26,1.3l1.86,1.41 C4.51,11.55,4.5,11.77,4.5,12s0.01,0.45,0.03,0.68l-1.86,1.41c-0.4,0.3-0.51,0.86-0.26,1.3l1.87,3.23c0.25,0.44,0.79,0.62,1.25,0.42 l2.15-0.91c0.37,0.26,0.76,0.49,1.17,0.68l0.29,2.31C9.2,21.62,9.63,22,10.13,22h3.73c0.5,0,0.93-0.38,0.99-0.88l0.29-2.31 c0.41-0.19,0.8-0.42,1.17-0.68l2.15,0.91c0.46,0.2,1,0.02,1.25-0.42l1.87-3.23c0.25-0.44,0.14-0.99-0.26-1.3l-1.86-1.41 C19.49,12.45,19.5,12.23,19.5,12z M12.04,15.5c-1.93,0-3.5-1.57-3.5-3.5s1.57-3.5,3.5-3.5s3.5,1.57,3.5,3.5S13.97,15.5,12.04,15.5z"></path></svg></span>
    										  Configuración									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item "><!----><a href="/wp-admin/admin.php?page=bookingpress_notifications" class="bpa-dm--item-link"><span><svg width="18px" height="18px" fill="none" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><rect fill="none" height="24" width="24" x="0"></rect><path d="M19,10c1.13,0,2.16-0.39,3-1.02V18c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h10.1C14.04,4.32,14,4.66,14,5 c0,1.48,0.65,2.79,1.67,3.71L12,11L5.3,6.81C4.73,6.46,4,6.86,4,7.53c0,0.29,0.15,0.56,0.4,0.72l7.07,4.42 c0.32,0.2,0.74,0.2,1.06,0l4.77-2.98C17.84,9.88,18.4,10,19,10z M16,5c0,1.66,1.34,3,3,3s3-1.34,3-3s-1.34-3-3-3S16,3.34,16,5z"></path></g></svg></span>
    										  Notificaciones									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item bpa-dm__addon-item "><!----><a href="/wp-admin/admin.php?page=bookingpress_addons" class="bpa-dm--item-link"><span><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="none"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20.5 11H19V7c0-1.1-.9-2-2-2h-4V3.5C13 2.12 11.88 1 10.5 1S8 2.12 8 3.5V5H4c-1.1 0-1.99.9-1.99 2v3.8H3.5c1.49 0 2.7 1.21 2.7 2.7s-1.21 2.7-2.7 2.7H2V20c0 1.1.9 2 2 2h3.8v-1.5c0-1.49 1.21-2.7 2.7-2.7s2.7 1.21 2.7 2.7V22H17c1.1 0 2-.9 2-2v-4h1.5c1.38 0 2.5-1.12 2.5-2.5S21.88 11 20.5 11z"></path></svg></span>
    										  Add-ons									</a></li></ul>
                                              </div>
                                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    */ 
    ?>
        
        <!-- Contenedor Principal -->
        <div id="exp_vue_app" style="margin: 0; anchor-name: --int-app-container;">
            <!-- Navegación por pestañas estilo WordPress -->
            <!--
            <h2 class="nav-tab-wrapper">
                <a href="#" class="nav-tab" :class="{'nav-tab-active': currentTab === 'home'}" @click.prevent="currentTab = 'home'">Inicio</a>
                <a href="#" class="nav-tab" :class="{'nav-tab-active': currentTab === 'settings'}" @click.prevent="currentTab = 'settings'">Ajustes</a>
            </h2>
            -->
            
            
            <nav class="bpa-header-navbar" style="">
                <div class="bpa-header-navbar-wrap">
                    <div class="bpa-navbar-brand-X" style="max-height: 100%;overflow: hidden;padding-left: 20px; display: none;">
                        <a href="#" class="navbar-logo" style="max-height: 100%;object-fit: contain;box-sizing: border-box;padding: 10px;">
                            <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod('custom_logo') ) );?>" alt="" style="max-height: 50px;object-fit: contain;">
                        </a>
                    </div>
                    <div id="bpa-navbar-nav" class="bpa-navbar-nav">
                        <ul>
                        
                            <li class="bpa-nav-item" v-for="(componentTitle, componentKey) in componentsTabList" :key="componentKey" :class="{'__active': currentTab === componentKey}" >
                                <a href="#" class="bpa-nav-link" @click.prevent="changeTab(componentKey)">
                                    <div class="nav-link-svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 3h-1V2c0-.55-.45-1-1-1s-1 .45-1 1v1H7V2c0-.55-.45-1-1-1s-1 .45-1 1v1H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 18H5c-.55 0-1-.45-1-1V8h16v12c0 .55-.45 1-1 1z"></path></svg>
                                    </div> 
                                    <strong>{{componentTitle}}</strong>
                                </a>
                            </li>
<!-- LINKS POR DEFECTO -->
                            <li class="bpa-nav-item ">
                                <a href="?page=bookingpress_appointments" class="bpa-nav-link">
                                    <div class="bpa-nav-link--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16 12h-3c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zm0-10v1H8V2c0-.55-.45-1-1-1s-1 .45-1 1v1H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm2 17H6c-.55 0-1-.45-1-1V8h14v10c0 .55-.45 1-1 1z"></path></svg>
                                    </div>
                                    Volver a Turnos						
                                </a>
                            </li>
                            <?php /**
                            <li class="bpa-nav-item ">
                            <a href="?page=bookingpress_calendar" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 3h-1V2c0-.55-.45-1-1-1s-1 .45-1 1v1H7V2c0-.55-.45-1-1-1s-1 .45-1 1v1H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 18H5c-.55 0-1-.45-1-1V8h16v12c0 .55-.45 1-1 1z"></path></svg></div>
						      Calendario						</a>
                            </li> <li class="bpa-nav-item "><a href="?page=bookingpress_appointments" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16 12h-3c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zm0-10v1H8V2c0-.55-.45-1-1-1s-1 .45-1 1v1H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm2 17H6c-.55 0-1-.45-1-1V8h14v10c0 .55-.45 1-1 1z"></path></svg></div>
							Turnos						</a></li> <li class="bpa-nav-item "><a href="?page=bookingpress_payments" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09v.58c0 .73-.6 1.33-1.33 1.33h-.01c-.73 0-1.33-.6-1.33-1.33v-.6c-1.33-.28-2.51-1.01-3.01-2.24-.23-.55.2-1.16.8-1.16h.24c.37 0 .67.25.81.6.29.75 1.05 1.27 2.51 1.27 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21v-.6c0-.73.6-1.33 1.33-1.33h.01c.73 0 1.33.6 1.33 1.33v.62c1.38.34 2.25 1.2 2.63 2.26.2.55-.22 1.13-.81 1.13h-.26c-.37 0-.67-.26-.77-.62-.23-.76-.86-1.25-2.12-1.25-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.02 1.83-1.39 2.83-3.13 3.16z"></path></svg></div>
							Pagos						</a></li> <li class="bpa-nav-item "><a href="?page=bookingpress_customers" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.5 12c1.38 0 2.49-1.12 2.49-2.5S17.88 7 16.5 7 14 8.12 14 9.5s1.12 2.5 2.5 2.5zM9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5 6 6.34 6 8s1.34 3 3 3zm7.5 3c-1.83 0-5.5.92-5.5 2.75V18c0 .55.45 1 1 1h9c.55 0 1-.45 1-1v-1.25c0-1.83-3.67-2.75-5.5-2.75zM9 13c-2.33 0-7 1.17-7 3.5V18c0 .55.45 1 1 1h6v-2.25c0-.85.33-2.34 2.37-3.47C10.5 13.1 9.66 13 9 13z"></path></svg></div>
							Pacientes						</a></li> <li class="bpa-nav-item "><a href="?page=bookingpress_historias" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4470_13557)"><path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"></path> <path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"></path></g> <defs><clipPath id="clip0_4470_13557"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg></div>
        					Historias Clinicas					
        				    </a></li> 
                            <li class="bpa-nav-item "><a href="?page=bookingpress_services" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M14 9.5h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm0 7h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm5 4.5H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2zM7 11h3c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7V7zm0 11h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7v-3z"></path></svg></div>
							Servicios						</a></li> <li class="bpa-nav-item "><a href="?page=bookingpress_staff_members" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"></path></svg></div>
							Medicos						</a>
                            </li> 
                            
                            /**
                            <li class="bpa-nav-item "><a href="?page=bookingpress_reports" class="bpa-nav-link"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><g><path d="M15.59,3.59C15.21,3.21,14.7,3,14.17,3H5C3.9,3,3.01,3.9,3.01,5L3,19c0,1.1,0.89,2,1.99,2H19c1.1,0,2-0.9,2-2V9.83 c0-0.53-0.21-1.04-0.59-1.41L15.59,3.59z M8,17c-0.55,0-1-0.45-1-1s0.45-1,1-1s1,0.45,1,1S8.55,17,8,17z M8,13c-0.55,0-1-0.45-1-1 s0.45-1,1-1s1,0.45,1,1S8.55,13,8,13z M8,9C7.45,9,7,8.55,7,8s0.45-1,1-1s1,0.45,1,1S8.55,9,8,9z M14,9V4.5l5.5,5.5H15 C14.45,10,14,9.55,14,9z"></path></g></g></svg></div>
								Reportes							</a></li> <li class="bpa-nav-item "><div class="bpa-nav-item-dropdown el-dropdown"><a href="#" class="bpa-nav-link el-dropdown-selfdefine" aria-haspopup="list" aria-controls="dropdown-menu-2788" role="button" tabindex="0"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path></svg></div>
								Personalizar							</a> <ul class="el-dropdown-menu el-popper bpa-ni-dropdown-menu" id="dropdown-menu-2788" style="display: none;"><li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item __active"><!----><a href="?page=bookingpress_customize&amp;action=forms" class="bpa-dm--item-link"><span><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.6667 0.666992C15.1267 0.666992 15.5 1.04033 15.5 1.50033V4.63116L8.00083 12.1312L7.99583 15.6628L11.5342 15.6678L15.5 11.702V16.5003C15.5 16.9603 15.1267 17.3337 14.6667 17.3337H1.33333C0.873333 17.3337 0.5 16.9603 0.5 16.5003V1.50033C0.5 1.04033 0.873333 0.666992 1.33333 0.666992H14.6667ZM16.1483 6.34033L17.3267 7.51866L10.845 14.0003L9.665 13.9987L9.66667 12.822L16.1483 6.34033ZM8 9.00033H3.83333V10.667H8V9.00033ZM10.5 5.66699H3.83333V7.33366H10.5V5.66699Z"></path></svg></span>    
									Formas									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item  "><!----><a href="?page=bookingpress_customize&amp;action=form_fields" class="bpa-dm--item-link"><span><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.3334 9.83366L18.1367 13.2187L15.6592 13.927L17.4301 16.9945L15.9867 17.8278L14.2159 14.7612L12.3634 16.5528L12.3334 9.83366ZM10.6667 4.00033H12.3334V5.66699H16.5001C16.7211 5.66699 16.9331 5.75479 17.0893 5.91107C17.2456 6.06735 17.3334 6.27931 17.3334 6.50033V9.83366H15.6667V7.33366H7.33342V15.667H10.6667V17.3337H6.50008C6.27907 17.3337 6.06711 17.2459 5.91083 17.0896C5.75455 16.9333 5.66675 16.7213 5.66675 16.5003V12.3337H4.00008V10.667H5.66675V6.50033C5.66675 6.27931 5.75455 6.06735 5.91083 5.91107C6.06711 5.75479 6.27907 5.66699 6.50008 5.66699H10.6667V4.00033ZM2.33341 10.667V12.3337H0.666748V10.667H2.33341ZM2.33341 7.33366V9.00033H0.666748V7.33366H2.33341ZM2.33341 4.00033V5.66699H0.666748V4.00033H2.33341ZM2.33341 0.666992V2.33366H0.666748V0.666992H2.33341ZM5.66675 0.666992V2.33366H4.00008V0.666992H5.66675ZM9.00008 0.666992V2.33366H7.33342V0.666992H9.00008ZM12.3334 0.666992V2.33366H10.6667V0.666992H12.3334Z"></path></svg></span>
										Campos Adicionales									</a></li></ul></div>
                            </li>
                                                        
                            <li class="bpa-nav-item ">
                                <div class="bpa-nav-item-dropdown el-dropdown"><a href="#" class="bpa-nav-item-dropdown__link el-dropdown-selfdefine" aria-haspopup="list" aria-controls="dropdown-menu-6419" role="button" tabindex="0"><div class="bpa-nav-link--icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></div>
						            Mas							</a> 
                        
                        
                                    <ul class="el-dropdown-menu el-popper bpa-ni-dropdown-menu" id="dropdown-menu-6419" style="display: none;"><li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item "><!----><a href="?page=bookingpress_settings" class="bpa-dm--item-link"><span><svg width="18px" height="18px" fill="none" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><rect fill="none" height="24" width="24"></rect><path d="M19.5,12c0-0.23-0.01-0.45-0.03-0.68l1.86-1.41c0.4-0.3,0.51-0.86,0.26-1.3l-1.87-3.23c-0.25-0.44-0.79-0.62-1.25-0.42 l-2.15,0.91c-0.37-0.26-0.76-0.49-1.17-0.68l-0.29-2.31C14.8,2.38,14.37,2,13.87,2h-3.73C9.63,2,9.2,2.38,9.14,2.88L8.85,5.19 c-0.41,0.19-0.8,0.42-1.17,0.68L5.53,4.96c-0.46-0.2-1-0.02-1.25,0.42L2.41,8.62c-0.25,0.44-0.14,0.99,0.26,1.3l1.86,1.41 C4.51,11.55,4.5,11.77,4.5,12s0.01,0.45,0.03,0.68l-1.86,1.41c-0.4,0.3-0.51,0.86-0.26,1.3l1.87,3.23c0.25,0.44,0.79,0.62,1.25,0.42 l2.15-0.91c0.37,0.26,0.76,0.49,1.17,0.68l0.29,2.31C9.2,21.62,9.63,22,10.13,22h3.73c0.5,0,0.93-0.38,0.99-0.88l0.29-2.31 c0.41-0.19,0.8-0.42,1.17-0.68l2.15,0.91c0.46,0.2,1,0.02,1.25-0.42l1.87-3.23c0.25-0.44,0.14-0.99-0.26-1.3l-1.86-1.41 C19.49,12.45,19.5,12.23,19.5,12z M12.04,15.5c-1.93,0-3.5-1.57-3.5-3.5s1.57-3.5,3.5-3.5s3.5,1.57,3.5,3.5S13.97,15.5,12.04,15.5z"></path></svg></span>
								  Configuración									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item "><!----><a href="?page=bookingpress_notifications" class="bpa-dm--item-link"><span><svg width="18px" height="18px" fill="none" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><rect fill="none" height="24" width="24" x="0"></rect><path d="M19,10c1.13,0,2.16-0.39,3-1.02V18c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h10.1C14.04,4.32,14,4.66,14,5 c0,1.48,0.65,2.79,1.67,3.71L12,11L5.3,6.81C4.73,6.46,4,6.86,4,7.53c0,0.29,0.15,0.56,0.4,0.72l7.07,4.42 c0.32,0.2,0.74,0.2,1.06,0l4.77-2.98C17.84,9.88,18.4,10,19,10z M16,5c0,1.66,1.34,3,3,3s3-1.34,3-3s-1.34-3-3-3S16,3.34,16,5z"></path></g></svg></span>
								  Notificaciones									</a></li> <li tabindex="-1" class="el-dropdown-menu__item bpa-ni-dropdown-menu--item bpa-dm__addon-item "><!----><a href="?page=bookingpress_addons" class="bpa-dm--item-link"><span><svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px" fill="none"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20.5 11H19V7c0-1.1-.9-2-2-2h-4V3.5C13 2.12 11.88 1 10.5 1S8 2.12 8 3.5V5H4c-1.1 0-1.99.9-1.99 2v3.8H3.5c1.49 0 2.7 1.21 2.7 2.7s-1.21 2.7-2.7 2.7H2V20c0 1.1.9 2 2 2h3.8v-1.5c0-1.49 1.21-2.7 2.7-2.7s2.7 1.21 2.7 2.7V22H17c1.1 0 2-.9 2-2v-4h1.5c1.38 0 2.5-1.12 2.5-2.5S21.88 11 20.5 11z"></path></svg></span>
								  Add-ons									</a></li></ul>
                                  </div>
                            </li>
                            */ ?>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- bpa-main-listing-card-container bpa-default-card bpa--is-page-non-scrollable-mob -->
            <el-main class="bpa-default-card bpa--is-page-non-scrollable-mob principal-main-card" id="all-page-main-container" ><!-- style="padding: 20px 0;" -->
                
                <el-row type="flex" class="bpa-mlc-head-wrap" ref="mainSectionTitle" v-if="mainSectionTitleShow">
            		<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12" class="bpa-mlc-left-heading">
            			<h1 class="bpa-page-heading">{{componentsTabList[currentTab] || 'SECCION OCULTA'}}</h1>
            		</el-col>
            		<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
            			<div class="bpa-hw-right-btn-group">
                            <?php /*
            				<el-button class="bpa-btn bpa-btn--primary" @click=""> 
            					<span class="material-icons-round">add</span> 
            					<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>
            				</el-button>
                            */ ?>
            			</div>
            		</el-col>
            	</el-row>
            	<div class="bpa-back-loader-container" id="bpa-page-loading-loader" v-if="showPageLoader">
            			<div class="bpa-back-loader"></div>
            	</div>
                <div id="bpa-main-container" :class="{show:_isMounted}" >
                <!--<keep-alive>-->
                    <!--<component :is="AsyncComponent" :tab="currentTab" ></component>-->
                <!--</keep-alive>-->
                <!--<AsyncComponent :tab="currentTab" ></AsyncComponent>-->
                <async-component ref="moduloComponente" :tab="currentTab" :key="currentTab" coco="loco"></async-component>
                </div>
            </el-main>
        </div>
    </div>
    
    <style scoped>
        .bpa-header-navbar {
            min-height: 100px;
            padding: 0 10px;
        }
        li.bpa-nav-item {
            width: 20%;
            max-width: 100px;
        }
        .bpa-header-navbar .bpa-navbar-nav ul .bpa-nav-item .bpa-nav-link {
            padding: 16px 12px;
            font-size: 13px;
            padding: 10px;
        }
        .nav-link-svg-icon {
            fill: currentColor;
            display: flex;
            height: 28px;
            width: 28px;
            padding: 2px;
            border-radius: 50%;
            margin-bottom: 5px;
        }
        .nav-link-svg-icon svg {            
            font-size: 16px;
            width: 16px;
            /* height: 24px; */
            align-self: center;
            justify-self: center;
            margin: auto;
        }
        .bpa-header-navbar-wrap .bpa-navbar-nav .bpa-nav-item.__active .nav-link-svg-icon {
            background-color: var(--bpa-pt-main-green);
        }
        .bpa-header-navbar-wrap .bpa-navbar-nav .bpa-nav-item.__active .nav-link-svg-icon svg {
            fill: var(--bpa-cl-white) !important;
            color: var(--bpa-cl-white);
        }
        
        #bpa-main-container.show { display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .bpa-main-listing-card-container, .bpa-main-listing-card-container.bpa-default-card {
            background: #fff !important;
            padding: 20px !important;
            color: var(--bp-text) !important;
        }
        .principal-main-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 8px;
            /*border: 0;*/
            min-height: 65vh;
            margin: 30px 20px 20px 0; /* 0 para el margen que agrega wordpress */
            box-shadow: 0 0 5px var(--bpa-gt-gray-300);
        }
        #wpcontent {
            padding-left: 0; /* ESPACIO DE MARGEN PADDING ASIGNADO POR WORDPRESS */
        }
        .principal-main-card {
            margin: 30px 20px 20px;
        }        
        .principal-modal-show {
            /* flex: 1 1 auto; */
            position: absolute;
            width: 100%;
            height: 100%;
            background: #ffffff10;
            left: 0;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .async-max-component-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .int-form-collapse .el-collapse-item {
            margin-bottom: 10px;
        }
        .int-form-collapse .el-collapse-item__header {
            font-size: 1rem;
            /* background: #f5f7fa;*/
        }
        
        .int-form-collapse .el-card.is-always-shadow, .int-form-collapse .el-card .bpa-dialog--customer-modal {
            box-shadow: none;
            border-width: 1px 0 0;
            /*border: 0;*/
        }
        .int-form-collapse .el-card.asignar-paciente-header {
            border: 0;
        }
        
        .sec-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--el-border-radius-base);
            background: var(--ume-primary-lighter);
            color: var(--ume-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            place-self: center;
            margin: 5px;
        }
        .sec-icon svg, .sec-icon span {
            width: 16px;
            height: 16px;
            font-size: 16px;
        }
        .sec-title {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--el-text-color-primary);
            text-transform: uppercase;
            letter-spacing: .04em;
        }
        .bpa-default-card {
            border-width: 0;
        }
        .home-modal-view {
            width: 100%;
        }
        
        .tag-with-select {
            height: unset;
        }
        .tag-with-select .el-input__inner {
            background: transparent;
            text-align: center;
            border: 0;
        }
        .el-time-panel.el-popper {
            width: auto;
        }
        #adminmenu {
            /* display: none; */
        }
    </style>
<style id="scopeIntStyles" scoped>

/*
.ingreso-modal-view {
    margin: 0;
    margin-top: 10vh;
    width: 100%;
    box-sizing: border-box;
}
*/

/*
.ingreso-modal-view {
    margin: 0;
    min-width: min(400px, 100%);
    width: 100%;
    box-sizing: border-box;
    max-height: 100%;
    overflow-y: auto;
    margin-top: 0px !important;
    border-radius: 8px;
}
*/
.ingreso-modal-view {
    /* margin: 20px; */
    /* margin-top: 10vh; */
    min-width: min(400px, 100%);
    width: calc(100% - 20px);
    box-sizing: border-box;
    max-height: 100%;
    /* overflow-y: auto; */
    /* margin-top: 0px !important; */
    justify-self: center;
    border-radius: 8px;
    /* padding: 20px; */
}


.ingreso-modal-view .el-dialog__body {
    padding-inline: 0;
}




.internacion-modal-view {
    /* width: 100%; */
    position: absolute;
    /*bottom: 5vh;*/
    margin: auto;
    /*display: block;*/
}
.internacion-modal-view .el-dialog__body {
    padding: 20px 20px 0px; 
}
.internacion-modal-view .el-dialog__body {
    padding: 0px; 
}

.internacion-edit-view {

    /* Estilos base de la tarjeta */
    .box-card {
      max-width: 800px;
      margin: 0 auto;
      border-radius: 8px;
    }
    .el-card__header {
        background: #395791;
        background: linear-gradient(47deg, #fafbfe, #d7e7f68c);
    }
    
    .el-card__header {
        /* background: #395791; */
        background: linear-gradient(47deg, #fafbfe, #d7e7f68c);
        background: var(--bpa-gt-gray-50);
        border: 0px solid #fff;
        margin: 4px;
        border-radius: 5px;
    }
    /* Cabecera alineada y limpia */
    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }
    .patient-title {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .patient-icon {
      font-size: 20px;
      color: #409EFF;
    }
    .patient-name {
      font-size: 18px;
      font-weight: bold;
      color: #303133;
    }
    .patient-subtitle {
      font-size: 13px;
      color: #909399;
    }
    
    /* Bloques de información */
    .info-row {
      margin-bottom: 5px;
    }
    .info-item {
      display: flex;
      flex-direction: column; /* Diseño apilado Etiqueta arriba / Valor abajo */
      margin-bottom: 12px;
    }
    .label {
      font-size: 12px;
      color: #909399;
      text-transform: uppercase;
      margin-bottom: 4px;
      letter-spacing: 0.5px;
    }
    .label i {
      margin-right: 4px;
    }
    .value {
      font-size: 15px;
      color: #303133;
      font-weight: 500;
    }
    .info-value-highlight {
        text-align: center;
        word-break: keep-all;
        min-height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 2px;
        border-radius: 5px;
        border: 1px solid var(--bpa-pt-royal-blue-alpha-08);
        color: #575e8e;
        font-weight: 400;
        border: 1px solid #39579133;
        /* border-width: 1px 3px; */
    }
    .info-value-highlight {
        text-align: center;
        word-break: keep-all;
        min-height: 40px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 2px 10px;
        border-radius: 5px;
        border: 1px solid var(--bpa-pt-royal-blue-alpha-08);
        color: #303451d1;
        font-weight: 400;
        /*font-style: italic;*/
        border: 1px dotted #39579133;
        /* border-width: 1px 3px; */
        /* font-size: 95%; */
        background: #bcccd121;
    }
    
    /* Clases utilitarias de color */
    .highlight {
      color: #409EFF;
      font-weight: bold;
    }
    .text-muted {
      color: #606266;
    }
    .text-empty {
      color: #c0c4cc;
      font-style: italic;
    }
    
    /* Ajuste de separadores nativos de Element */
    .el-divider--horizontal {
      margin: 12px 0;
      opacity: 0.6;
    }
}




/* *******CHANGE FIELDS BACKGROUND COLOR*************/

.internacion-modal-view .el-input, .internacion-modal-view .el-input__inner, .internacion-modal-view .el-select, .internacion-modal-view .el-textarea, .internacion-modal-view .info-value-highlight {
    /* background-color: #07193305; */
    /* border-radius: 5px; */
}


.bpa-table-container .el-table__body-wrapper table tbody tr:nth-child(even) {
    background-color: var(--bpa-gt-gray-100);
}
/*
.el-table--border .el-table__cell, .el-table__body-wrapper .el-table--border.is-scrolling-left~.el-table__fixed {
    border-right: 0px solid #ebeef5;
}
*/
.bpa-table-container {
    font-family: var(--bpa-primary-font);
        font-size: 16px;
}

.el-table--border .el-table__cell {
    border-right: 0px solid #ebeef5;
}
.el-tag.int-status-tag {
    width: 120px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.exp-listado-internacion .bpa-manage-appointment-items .bpa-table-actions-wrap {
    display: flex !important;
    min-height: 50px;
    padding: 5px;
}


.int-form-collapse.el-collapse {
    /*border-top: 1px solid #ebeef5;*/
    /*border-bottom: 1px solid #ebeef5;*/
    border: 0;
}
.int-form-collapse .el-collapse-item {
    margin-bottom: 10px;
    border-radius: 10px;
    overflow: hidden;
}
.continuar-row {
    display: none;
}
</style>

<?php 
    global $bookingpress_pro_staff_members;
    ob_start();
    $default_data_fields = [];
    $default_data_fields['search_staff_member_list'] = !empty($bookingpress_pro_staff_members)? $bookingpress_pro_staff_members->bookingpress_staffmember_search_list(): [];
    $tds_obras = get_all_obras();
    $tds_seguros = get_all_seguros();
     ob_get_clean();
?>
<script id="expansion_modules_default_helper_data">
var $exp_default_data_fields = <?php echo json_encode( $default_data_fields ); ?>;
var todos_los_seguros = <?php echo json_encode($tds_seguros); ?>;
var todas_las_obras = <?php echo json_encode($tds_obras); ?>;

$exp_default_data_fields.methods = {};
$exp_default_data_fields.methods.bookingpress_get_customer_list = function(query){
                const vm2 = this;
                if (query !== '') {
                    vm2.bookingpress_loading = true;                    
                    var customer_action = { action:'bookingpress_get_customer_list',search_user_str:query,customer_id:vm2.customer_id,_wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }                    
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                    .then(function(response){
                        //TEST 07-08 15HS vm2.ingreso_customers_list = [];
                        
                        let list = Array.isArray(response.data.appointment_customers_details)? response.data.appointment_customers_details.slice(0,30) : [];
                        /*
                        let vistos = new Set();                        
                        let new_list = list.filter(cus => {
                            if( vistos.has(cus.value) ){ return false }
                            vistos.add(cus.value);
                            return true;
                        });
                        */
                        //TEST 07-08 15HS 
                        vm2.ingreso_customers_list = list.slice(0,20);
                        vm2.search_customer_list = vm2.ingreso_customers_list;
                        vm2.bookingpress_loading = false;
                        /*
                        //TEST 07-08 15HS COMENTADO 
                        let vistos = list.filter(cus => cus.dni).map(visto => visto.value);                        
                        let new_list = list.filter(cus => {
                            if(!cus.dni && vistos.includes(cus.value) ){ return false }                            
                            return true;
                        });
                        vm2.$nextTick(()=>{
                            vm2.ingreso_customers_list = new_list.slice(0,20);
                            vm2.bookingpress_loading = false;
                        });
                        */
                        vm2.last_get_customer_list = Date.now();
                    }).catch(function(error){
                        console.log(error)
                    });
                } else {
                    //TEST 07-08 15HS DESCOMENTADO
                    vm2.ingreso_customers_list = [];
                }	
            };

var all_obras_y_seguros = [];
function init_merge_obras_seg(){
    console.log("merge obras");
    return [{"grupo":"ART y Seguros con Convenio","label":"ART y Seguros con Convenio", "value":"  ","limitado":false,"\$isDisabled":true,"isDisabled":true}].concat(todos_los_seguros).concat([{"grupo":"Obras Sociales","label":"Obras Sociales", "value":" ","limitado":false,"\$isDisabled":true,"isDisabled":true}]).concat(todas_las_obras);
}
all_obras_y_seguros = init_merge_obras_seg();
</script>

    <script>
        <?php 
        global $bookingpress_global_options;
        $bookingpress_options     = $bookingpress_global_options->bookingpress_global_options();
        $bookingpress_locale_lang = $bookingpress_options['locale'];
        ?>
        
        var lang = ELEMENT.lang.<?php echo esc_html($bookingpress_locale_lang); ?>;
        ELEMENT.locale(lang)
        const createSortable = (el, options, vnode) => {
            return Sortable.create(el, {
                ...options
            });
        };
        const sortable = {
            name: 'sortable',
            bind(el, binding, vnode) {
                const table = el;
                table._sortable = createSortable(table.querySelector("tbody"), binding.value, vnode);
            }
        };
        
        var app;
        var dashboardPanel;
        
        var $exp_bpa_wp_nonce = '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>';
        
        var $exp_default_iniPage = 'listadoInternacion';//'internacionIngreso';//home
        
        var $exp_img_logo_url = '<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/images/loader.gif'); ?>';
        
        var $exp_default_loader = `<div class="principal-modal-show"  >
            <div class="bpa-back-loader" ><img src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/images/loader.gif'); ?>" class="bpa-custom-loader-img" alt="Cargando..."></div>
        </div>`;
        
        const AsyncHome = () => ({
            component: new Promise((resolve) => {
                setTimeout(() => {
                    const resultModule = {
                        template: `
                            <div class="card2" style="padding: 15px; background: #fff; border: 1px solid #ccd0d4;width: 100%;">
                                <h3 style="text-align: center;">{{ titulo }}</h3>
                                <!--<p>Contador actual: <strong>{{ contador }}</strong></p>
                                <button class="button button-primary" @click="incrementar">
                                    Incrementar Contador
                                </button>-->
                                <div style="display: grid; grid-template-columns: 50%;">
                                <el-card shadow="hover">
                                
                                    <div style="display:flex; flex-wrap: wrap;">
                                        
                                        <strong>Ingreso #4</strong><strong>Numero Internacion #1304</strong>
                                        <div> <span>Paciente: TEST 03</span>   <span> Fecha ingreso: 2026/07/07 </span> </div>
                                        <div> <span>Medico encargado: ejemplo TEST</span> <span>Medico ingreso: ejemplo TEST</span>   </div>
                                        <div> <span> Area: Cliica medica </span> <span>Sala: A34</span>  <span> Cama: 2 </span> </div>
                                        <div> <span>estado: Activo</span> <span> egreso: sin def </span> <span> destino: sin def </span> </div>
                                        
                                    </div>
                                    
                                    <div class="footer-content" >
                                        <button @click="setView({ section: 'internacionIngreso', data: {int_form_number: 4, showModal:1},modeView:'modal' })" > Ver Ingreso </button>
                                    </div>
                                </el-card>
                                <el-card shadow="hover">
                                    <div>
                                        TEST
                                    </div>
                                    
                                    <div class="footer-content" >
                                        <button @click="setView({ section: 'test', data: {}})"> test </button>
                                    </div>
                                    
                                </el-card>
                                </div>
                                <!-- v-if="modeView == 'bottom'" -->
                                <div class="wrap-block" :class="[(modeView || 'bottom'), currentSection]" >
                                    <async-max ref="panelSection" :props-data="currentData" :tab="currentSection" :key="currentKey"  ></async-max>                                    
                                </div>
                                <?php /**
                                <el-dialog v-if="modeView == 'modal'" :visible.sync="currentData.showModal" :custom-class=" 'home-modal-view bpa-dialog bpa--is-page-non-scrollable-mob ' + currentSection " :fullscreen="false"  style="width:100%;position:absolute;" :close-on-press-escape="true"><!-- "bpa-dialog bpa-dialog--fullscreen  bpa--is-page-non-scrollable-mob" ":modal-append-to-body="false"" -->
                                    <async-max ref="panelSection" :props-data="currentData" :tab="currentSection" :key="currentKey"  ></async-max>                                    
                                </el-dialog>
                                */ ?>
                            </div>
                        `,
                        data() {
                            return {
                                titulo: 'Bienvenido al Panel de Internación',
                                contador: 0,
                                currentSection:'test',
                                currentKey: 0,
                                currentData: { showModal: 0 },
                                modeView: 'bottom',
                            }
                        },
                        created(){
                            dashboardPanel = this;
                        },
                        methods: {
                            incrementar() {
                                this.contador++;
                            },
                            setView( viewData = {}){
                                this.currentData = { ...viewData.data } || null;
                                this.currentSection = viewData.section?? 'test';
                                this.modeView = viewData.modeView?? this.modeView;
                                this.currentKey++;
                            },
                        },
                        mounted() {
                            console.log('Componente Inicio montado correctamente.');
                        }
                    };
                    resolve(resultModule);
                }, 300);
            }),
            loading: { 
                mounted(){
                    let maxloading = app.$loading({
                        lock: true,
                        text: '',
                        //spinner: 'el-icon-loading',
                        background: 'rgba(255, 255, 255, 0.7)'
                    });
                    setTimeout(()=>{ maxloading.close(); }, 8000)
                },
                template: '' /*$exp_default_loader*/ 
            },
            //loading: { template: `<transition name="el-fade-in"><div class="bpa-back-loader"><img src="/wp-content/uploads/preloader-docel.png" class="bpa-custom-loader-img" alt="Cargando..."></div></transition>` },
            error: { template: '<p>Error al cargar el módulo.</p>' },
            timeout: 5000
        });

        const AsyncSettings = () => ({
            component: new Promise((resolve) => {
                setTimeout(() => {
                    const resultModule = {
                        template: `
                            <div class="card" style="padding: 15px; background: #fff; border: 1px solid #ccd0d4;">
                                <h3>{{ titulo }}</h3>
                                <table class="form-table" role="presentation">
                                    <tr>
                                        <th scope="row"><label>Configuracion 1</label></th>
                                        <td>
                                            <input type="text" v-model="config.siteName" class="regular-text">
                                        </td>
                                    </tr>
                                </table>
                                <p style="margin-top: 15px;">
                                    <button class="button button-primary" @click="guardarConfiguracion">
                                        Guardar Cambios
                                    </button>
                                </p>
                            </div>
                        `,
                        data() {
                            return {
                                titulo: 'Configuracion de Foat',
                                config: {
                                    siteName: 'Mi Sitio de WordPress'
                                }
                            }
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
                        }
                    };
                    resolve(resultModule);
                    
                }, 300);
            }),
            loading: { template: $exp_default_loader },
            //loading: { template: `<transition name="el-fade-in"><div class="bpa-back-loader"><img src="/wp-content/uploads/preloader-docel.png" class="bpa-custom-loader-img" alt="Cargando..."></div></transition>` },
            error: { template: '<p>Error al cargar el módulo.</p>' },
            timeout: 15000
        });
        
        
        //var moduleComp;        
        var AsyncComponent = ( nombre = '' ) => {
            if(['','home'].includes(nombre)) return AsyncHome;
            if(['settings'].includes(nombre)) return AsyncSettings;
            //let $currentError = { message: 'fallo'};
            return ()=> ({
                currentError: { message: 'fallo'},
            component: new Promise((resolve, reject) => {
                let requestdata = {
                    action: 'expansion_get_module',
                    module_name: nombre,
                    t: Date.now(),
                    _wpnonce: ($exp_bpa_wp_nonce || '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce') ); ?>')
                };
                <?php /*
                requestdata.action = 'expansion_get_module';
                requestdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce') ); ?>';
                requestdata.t = Date.now();
                */ ?>
                let requestURL = new URL($expansion_modules_url);
                requestURL.search = new URLSearchParams(requestdata);
                var resultModule;
                let maxloading = app.$loading({
                        lock: true,
                        text: '',
                        //spinner: 'el-icon-loading',
                        background: 'rgba(255, 255, 255, 0.7)'
                    });
                //var currentError = { message: 'fallo'};
                import( requestURL )                
                .then(module => {
                    
                    resultModule = module.default;
                    resultModule.methods.getDefaultSafeData = function(path, fallback = []) {
                        // Apunta al objeto base de tus datos
                        const obj = $exp_default_data_fields; 
                        
                        if (!obj) return fallback;
                        
                        // Divide la ruta por puntos y navega de forma segura
                        const result = path.split('.').reduce((acc, key) => {
                          return (acc && acc[key] !== undefined) ? acc[key] : undefined;
                        }, obj);
                        
                        return result || fallback;
                    };
                    /*resultModule.watch = resultModule.watch || {};
                    resultModule.watch.tab = function(val, oldval){
                        console.log('mirando addddWHATCH tab', val, this);
                        //this.$root.$options.components['async-component'] = AsyncComponent( val );
                    };*/
                    setTimeout(()=>{
                        if( maxloading ) maxloading.close();
                        return resolve(resultModule);
                    }, 10);
                })
                .catch(error => {
                    this.currentError = error;                    
                    console.error("Fallo la carga del script", error);
                    if(this.$root) this.$root.isLoading = false;
                    return reject(error);
                });
            }),
            loading: { 
                mounted(){
                    
                    /*setTimeout(()=>{ maxloading.close(); }, 8000)*/
                },
                template: ''/*$exp_default_loader*/ 
            },
            /* loading: { template: `<transition name="el-fade-in"><div class="bpa-back-loader"><img src="/wp-content/uploads/preloader-docel.png" class="bpa-custom-loader-img" alt="Cargando..."></div></transition>`}, */
            error: { template: '<p>Error al cargar el módulo.</p>' },
            timeout: 10000
        });
        };
        
        var asyncMax = Vue.component('async-max',{
            props:['tab', 'propsData'],
            template: `
            <div class="async-max-component-container">
                <transition name="el-fade-in">
                    <component ref="componenteCargado" :is="compAsync"  v-if="compAsync" :props-data="propsData" :key="time_key" v-show="!isLoading"></component>
                </transition>
                <transition name="el-zoom-in-center">
                <el-cointainer class="principal-modal-show"  v-if="isLoading" v-loading="isLoading">
                <!--
                    <div class="bpa-back-loader" ><img src="<?php echo home_url('/wp-content/plugins/bookingpress-appointment-booking/images/loader.gif'); ?>" class="bpa-custom-loader-img" alt="Cargando..."></div>
                -->
                </el-cointainer>
                </transition>
            </div>`,
            data(){
                return {
                    isLoading: false,
                    compAsync: null,
                    currentTab: null,
                    propsData: {},
                    time_key: Date.now()
                }
            },
            errorCaptured(err, vm, info){
                if(err.message.includes("reading 'key'")){
                    console.warn("[async] error renderizado en select", err.message);
                    if(vm && vm.$options.name === 'ElSelect'){
                        //vm.options = [];
                        this.ingreso_customers_list = [];
                    }
                    return false;
                }
            },
            computed:{},
            methods:{
                async asyncCargar( nomb =''){
                    this.isLoading = true;
                    /*
                    let maxloading = app.$loading({
                        lock: true,
                        text: '',
                        //spinner: 'el-icon-loading',
                        background: 'rgba(255, 255, 255, 0.7)'
                    });                                        
                    */
                    
                    this.compAsync = await AsyncComponent( nomb );
                    setTimeout(()=>{this.isLoading = false; /*maxloading.close();*/ }, 300);
                    return this.compAsync;
                }
            },
            created(){
                window.currentModule = this;
                this.asyncCargar( this.tab );
                this.currentTab = this.tab;                
                console.log( 'created tab', this.tab )
                
            },
            mounted(){
                window.currentModule = this;
            }
                        
        });
        
        
        var $exp_module_components_list = {            
            'async-component' : asyncMax,
            'home': AsyncHome,
            //'settings': AsyncSettings,
            //'async-component' : AsyncComponent('max'),
        };
        var $exp_module_title_list = {
            'listadoInternacion' : 'Listado de Internacion',
            'internacionIngreso': 'Ingreso internación',
                        
            <?php if( current_user_can('editar_admin_roles1') && current_user_can('manage_options') ){ ?>
            //'test': 'TEST',
            //'home': 'Panel',
            //'home': 'Inicio',
            //'settings': 'Configuracion',
            <?php } ?>
        };
        
        //Instancia Raíz de la Aplicación Vue
        function expansionVueAppPage() {
        new Vue({
            el: '#exp_vue_app',            
            components: $exp_module_components_list,
            created(){
                app = this;
                window.addEventListener('hashchange', this.onHashChange);
            },
            data(){ 
                return {
                showPageLoader: 1,
                hash_parts: (window.location.hash.substring(1)?.split('/')),
                currentTab: (window.location.hash.substring(1)?.split('/')[0] || $exp_default_iniPage),
                componentsTabList: $exp_module_title_list,
                mainSectionTitleShow: 1,
                default_data_fields: $exp_default_data_fields,
                };
            },
            errorCaptured(err, vm, info){
                /*
                if(err.message.includes("reading 'key'")){
                    console.warn("[app] error renderizado en select", err.message);
                    if(vm && vm.$options.name === 'ElSelect'){
                        //vm.options = [];
                        this.ingreso_customers_list = [];
                    }
                    return false;
                }*/
            },
            methods: {
                changeTab( tabname, from, update_key = false ){
                    this.mainSectionTitleShow = 1;
                    this.currentTab = tabname;
                    if('hash_change' != from ) this.hash_parts[1] = '';
                    if( this.hash_parts[0] != this.currentTab && this.hash_parts.length == 1 ){
                        window.location.hash = tabname;
                    }else{
                        window.location.hash = tabname+(this.hash_parts[1]? '/'+this.hash_parts[1]:'');
                    }
                    window.history.pushState(null, null, window.location.href);
                    
                    if( update_key ){
                        currentModule.time_key= Date.now()
                    }
                    
                    
                    let prevCurrent = document.querySelector('.bpa-ssn__navbar li a.__bpa-is-active');
                    if( prevCurrent ) prevCurrent.classList.remove('__bpa-is-active');
                    
                    let currentHash = '#'+ this.currentTab;
                    let setCurrent = document.querySelector(`.bpa-ssn__navbar li a[href*="${currentHash}"]`);
                    if( setCurrent ) setCurrent.classList.add('__bpa-is-active');
                    
                    console.log('change tab',tabname, update_key, this.hash_parts )
                    //this.$options.components['async-component'] = AsyncComponent( tabname );
                },
                onHashChange(){
                                        
                    const hash = window.location.hash.substring(1)?.split('/')[0];
                    const hash_parts = (window.location.hash.substring(1)?.split('/'));
                    let updt_key = (hash_parts[1] && hash_parts[0] == hash && hash_parts[1] != this.hash_parts);
                    this.hash_parts = hash_parts;
                    if( hash ) this.changeTab( hash, 'hash_change', updt_key );
                },
            },
            mounted(){
                const vm = this;
                console.log('expansion modules mount');
                if( !window.location.hash ){
                    window.location.hash = vm.currentTab;
                }
                
                let currentHash = '#'+ vm.currentTab;
                let setCurrent = document.querySelector(`.bpa-ssn__navbar li a[href*="${currentHash}"]`);
                if( setCurrent ) setCurrent.classList.add('__bpa-is-active');
                
                this.showPageLoader = 0;
            }
            
        });
        
        }
        
        expansionVueAppPage();
    </script>
<style scoped>

/*
.subsection {
  margin-bottom: 25px;
}
.subsection-title {
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 15px;
  color: #303133;
  border-left: 4px solid #409EFF;
  padding-left: 10px;
}
.sub-label {
  font-size: 11px;
  font-weight: 500;
  color: #606266;
  margin-bottom: 5px;
}
*/
</style>



<style scoped>
/* Estilos personalizados para UI Médica limpia */
.medical-modal >>> .el-dialog__header {
  padding-bottom: 10px;
}

.patient-header-zone {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 5px;
}

.patient-info {
  display: flex;
  align-items: center;
  gap: 12px;
}

.avatar-blue {
  background-color: #ecf5ff;
  color: #409eff;
}

.name-box h3 {
  margin: 0;
  font-size: 16px;
  color: #303133;
}

.name-box .subtext {
  font-size: 12px;
  color: #909399;
}

.el-divider {
  margin: 15px 0 20px 0;
}

.section-title {
  font-size: 13px;
  font-weight: 600;
  color: #409eff;
  margin: 15px 0 10px 0;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.text-muted {
  color: #909399 !important;
}

.cama-input-container {
  display: flex;
  gap: 8px;
  align-items: center;
}

.map-btn {
  padding: 0;
  font-size: 12px;
}


/* Ajustes de Element UI Form Labels
>>> .el-form-item__label {
  padding-bottom: 4px !important;
  font-size: 12px !important;
  color: #606266;
  font-weight: 500;
}

>>> .el-form-item {
  margin-bottom: 14px;
}

 */
</style>


<?php if(false){ ?>
<script>

//export default {    
var impIngreso = Vue.component('ImpresionIngreso',{
  name: 'ImpresionIngreso',
  template: `
<div id="impresion-ingreso">
<template>
  <div class="print-container">
    <!-- Botón de impresión (visible en pantalla, oculto al imprimir) -->
    <div class="no-print acciones-header">
      <button @click="imprimir" class="btn-imprimir">
       Imprimir Ingreso
      </button>
    </div>

    <!-- Encabezado Institucional -->
    <header class="header-doc">
      <div class="institucion">
        <h2>CLÍNICA UME</h2>
        <p><strong>Hoja de Ingreso a Internación</strong></p>
      </div>
      <div class="meta-doc">
        <p><strong>Fecha y Hora:</strong> {{ ingreso_formdata.fecha_ingreso || '---' }}</p>
        <p><strong>Médico:</strong> {{ ingreso_formdata.medico || '---' }}</p>
      </div>
    </header>

    <hr class="divider" />

    <!-- 1. DATOS DE FILIACIÓN -->
    <section class="seccion">
      <h3>1. Datos de Filiación</h3>
      <div class="grid-3">
        <p><strong>Paciente:</strong> {{ apellidoNombre }}</p>
        <p><strong>DNI / Doc:</strong> {{ datosFiliacion.dni || '---' }}</p>
        <p><strong>Fecha Nac.:</strong> {{ datosFiliacion.fecha_nacimiento || '---' }}</p>
        <p><strong>Género:</strong> {{ datosFiliacion.genero || '---' }}</p>
        <p><strong>Teléfono:</strong> {{ datosFiliacion.telefono || '---' }}</p>
        <p><strong>Dirección:</strong> {{ datosFiliacion.direccion || '---' }}</p>
        <p><strong>Obra Social:</strong> {{ datosFiliacion.obra_social || '---' }}</p>
        <p><strong>Nº Afiliado:</strong> {{ datosFiliacion.nro_afiliado || '---' }}</p>
        <p><strong>Plan:</strong> {{ datosFiliacion.plan || '---' }}</p>
      </div>
      <div class="alerta-alergias" v-if="datosFiliacion.alergias">
        <strong>⚠️ ALERGIAS:</strong> {{ datosFiliacion.alergias }}
      </div>
    </section>

    <!-- 2. MOTIVO DE CONSULTA E INGRESO -->
    <section class="seccion">
      <h3>2. Motivo de Consulta / Ingreso</h3>
      <p class="texto-bloque">{{ ingreso_formdata.motivo_consulta || 'Sin registros.' }}</p>
    </section>

    <!-- 3. ANTECEDENTES DE ENFERMEDAD ACTUAL -->
    <section class="seccion">
      <h3>3. Antecedentes de Enfermedad Actual</h3>
      <p class="texto-bloque">{{ ingreso_formdata.enfermedad_actual || 'Sin registros.' }}</p>
    </section>

    <!-- 4. ANTECEDENTES PERSONALES -->
    <section class="seccion">
      <h3>4. Antecedentes Personales</h3>
      <div class="sub-seccion">
        <h4>Hábitos</h4>
        <div class="grid-2">
          <p><strong>Fisiológicos:</strong> {{ antecedentes.habitos_fisiologicos || '---' }}</p>
          <p><strong>Tabaco:</strong> {{ antecedentes.tabaco || 'No' }}</p>
          <p><strong>Alcohol:</strong> {{ antecedentes.alcohol || 'No' }}</p>
          <p><strong>Drogas:</strong> {{ antecedentes.drogas || 'No' }}</p>
          <p class="col-full"><strong>Otros hábitos:</strong> {{ antecedentes.otros_habitos || '---' }}</p>
        </div>
      </div>
      <div class="sub-seccion">
        <h4>Patológicos</h4>
        <div class="grid-2">
          <p><strong>Médicos:</strong> {{ antecedentes.medicos || '---' }}</p>
          <p><strong>Quirúrgicos:</strong> {{ antecedentes.quirurgicos || '---' }}</p>
          <p><strong>Traumáticos:</strong> {{ antecedentes.traumaticos || '---' }}</p>
          <p><strong>Alérgicos:</strong> {{ antecedentes.alergicos || '---' }}</p>
        </div>
      </div>
      <div class="sub-seccion">
        <h4>Medicación Reciente y Actual</h4>
        <p class="texto-bloque">{{ antecedentes.medicacion_actual || 'Ninguna registrada.' }}</p>
      </div>
    </section>

    <!-- 5. ANTECEDENTES HEREDOFAMILIARES -->
    <section class="seccion">
      <h3>5. Antecedentes Heredofamiliares</h3>
      <p class="texto-bloque">{{ ingreso_formdata.heredofamiliares || 'Sin registros.' }}</p>
    </section>

    <!-- 6. EXAMEN FÍSICO -->
    <section class="seccion">
      <h3>6. Examen Físico</h3>
      <div class="grid-2">
        <div>
          <h4>Cabeza y Cuello</h4>
          <p><strong>Cráneo/Cara:</strong> {{ examenFisico.cabeza_cuello || 'Normal' }}</p>
        </div>
        <div>
          <h4>Ap. Respiratorio</h4>
          <p><strong>Frecuencia / M.V.:</strong> {{ examenFisico.respiratorio || 'Normal' }}</p>
        </div>
        <div>
          <h4>Ap. Cardiovascular</h4>
          <p><strong>Pulso / Ruidos:</strong> {{ examenFisico.cardiovascular || 'Normal' }}</p>
        </div>
        <div>
          <h4>Abdomen</h4>
          <p><strong>Inspección / Palpación:</strong> {{ examenFisico.abdomen || 'Normal' }}</p>
        </div>
        <div>
          <h4>Génito - Urinario</h4>
          <p><strong>Puntos dolorosos:</strong> {{ examenFisico.genito_urinario || 'Normal' }}</p>
        </div>
        <div>
          <h4>Neurológico</h4>
          <p><strong>Glasgow:</strong> O: {{ examenFisico.glasgow_o || '-' }} | V: {{ examenFisico.glasgow_v || '-' }} | M: {{ examenFisico.glasgow_m || '-' }} (Total: {{ examenFisico.glasgow_total || '---' }})</p>
          <p><strong>Conciencia:</strong> {{ examenFisico.conciencia || '---' }}</p>
        </div>
      </div>
    </section>

    <!-- 7. DIAGNÓSTICO DE INGRESO -->
    <section class="seccion diagnostico-box">
      <h3>7. Diagnóstico de Ingreso</h3>
      <p class="texto-destacado">{{ ingreso_formdata.diagnostico || 'Pendiente de confirmación.' }}</p>
    </section>

    <!-- 8. TERAPÉUTICA -->
    <section class="seccion">
      <h3>8. Terapéutica e Indicaciones</h3>
      <div class="grid-2">
        <p><strong>Dieta:</strong> {{ terapeutica.dieta || '---' }}</p>
        <p><strong>Oxigenoterapia:</strong> {{ terapeutica.oxigenoterapia || 'No requerida' }}</p>
        <p><strong>Hidratación / HP:</strong> {{ terapeutica.hp || '---' }}</p>
        <p><strong>Profilaxis:</strong> {{ terapeutica.profilaxis || '---' }}</p>
      </div>
      <div class="sub-seccion">
        <h4>Fármacos e Indicaciones</h4>
        <p class="texto-bloque">{{ terapeutica.farmacos || 'Sin indicaciones farmacológicas registradas.' }}</p>
      </div>
      <div class="sub-seccion">
        <h4>Control de Signos Vitales y Otros</h4>
        <p><strong>Diuresis:</strong> {{ terapeutica.diuresis || '---' }} | <strong>Catarsis:</strong> {{ terapeutica.catarsis || '---' }} | <strong>T°:</strong> {{ terapeutica.temperatura || '---' }}</p>
        <p><strong>Información Paciente/Familiar:</strong> {{ terapeutica.info_familiar || '---' }}</p>
      </div>
    </section>

    <!-- Firma -->
    <footer class="footer-doc">
      <div class="caja-firma">
        <hr class="linea-firma" />
        <p>Firma y Sello del Médico</p>
      </div>
    </footer>
  </div>
</template>
</div>
`,
  props: {
    ingreso_formdata: {
      type: Object,
      required: true,
      default: () => ({})
    }
  },
  computed: {
    datosFiliacion() {
      return this.ingreso_formdata.filiacion || {};
    },
    apellidoNombre() {
      const { apellido = '', nombre = '' } = this.datosFiliacion;
      return `${apellido.toUpperCase()}, ${nombre}`.trim() || '---';
    },
    antecedentes() {
      return this.ingreso_formdata.antecedentes_personales || {};
    },
    examenFisico() {
      return this.ingreso_formdata.examen_fisico || {};
    },
    terapeutica() {
      return this.ingreso_formdata.terapeutica || {};
    }
  },
  methods: {
    imprimir() {
      window.print();
    }
  }
//}
});







</script>

<style scoped>
/* Estilos en Pantalla */
.print-container {
  max-width: 850px;
  margin: 0 auto;
  padding: 20px;
  font-family: Arial, sans-serif;
  color: #333;
  background: #fff;
}

.acciones-header {
  margin-bottom: 20px;
  text-align: right;
}

.btn-imprimir {
  background-color: #00897b;
  color: white;
  border: none;
  padding: 10px 18px;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

.btn-imprimir:hover {
  background-color: #00695c;
}

.header-doc {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 10px;
}

.institucion h2 {
  margin: 0;
  color: #2c3e50;
}

.meta-doc p {
  margin: 2px 0;
  font-size: 13px;
}

.divider {
  border: 0;
  border-top: 2px solid #2c3e50;
  margin-bottom: 15px;
}

.seccion {
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

.seccion h3 {
  font-size: 14px;
  text-transform: uppercase;
  background-color: #f4f6f8;
  padding: 6px 10px;
  margin: 0 0 10px 0;
  color: #2c3e50;
  border-left: 4px solid #00897b;
}

.sub-seccion h4 {
  font-size: 13px;
  margin: 8px 0 4px 0;
  color: #555;
  text-decoration: underline;
}

.grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
  font-size: 13px;
}

.grid-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 8px;
  font-size: 13px;
}

.col-full {
  grid-column: span 2;
}

.alerta-alergias {
  margin-top: 10px;
  padding: 8px;
  background-color: #ffebee;
  color: #c62828;
  border: 1px solid #ef9a9a;
  border-radius: 4px;
  font-size: 13px;
}

.texto-bloque {
  font-size: 13px;
  margin: 4px 0;
  white-space: pre-wrap;
  line-height: 1.4;
}

.diagnostico-box {
  background-color: #f9f9f9;
  padding: 10px;
  border: 1px solid #ddd;
}

.texto-destacado {
  font-size: 14px;
  font-weight: bold;
  color: #111;
  margin: 5px 0;
}

.footer-doc {
  margin-top: 50px;
  display: flex;
  justify-content: flex-end;
}

.caja-firma {
  width: 250px;
  text-align: center;
}

.linea-firma {
  border: 0;
  border-top: 1px solid #333;
  margin-bottom: 5px;
}

.caja-firma p {
  font-size: 12px;
  color: #666;
  margin: 0;
}

/* --- ESTILOS EXCLUSIVOS DE IMPRESIÓN --- */
@media print {
  .no-print {
    display: none !important;
  }

  .print-container {
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 0;
    font-size: 11pt;
  }

  .seccion {
    page-break-inside: avoid;
  }

  .footer-doc {
    page-break-inside: avoid;
    margin-top: 40px;
  }

  .seccion h3 {
    background-color: transparent !important;
    border-bottom: 1px solid #000;
    border-left: none;
    padding-left: 0;
  }

  .alerta-alergias {
    border: 1px solid #000;
    background-color: transparent !important;
    color: #000;
  }
}
</style>


<?php } ?>



<script>
//export default {
    //name: 'FormularioIngresoImpresion',
var impIngreso = Vue.component('ImpresionIngreso',{
  name: 'ImpresionIngreso',
  template: `
  <div class="print-form-container">
    <!-- ENCABEZADO -->
    <header class="form-header">
      <div class="header-titles">
      <div> 
      <img src="https://clinicaume.com.ar/turnos2/TEST_UME/wp-content/uploads/2025/04/LOGO-UME_3-scaled.png" style="width: 60px;">
      </div> <span class="subtitle"><span></span></span> <h1>INGRESO</h1></div>
      <div class="header-meta">
        <div class="field-inline">
          <strong>Fecha:</strong> <span>{{ formatFecha(form.fecha_ingreso) }}</span>
        </div>
        <div class="field-inline">
          <strong>Hora:</strong> <span>{{ formatHora(form.fecha_ingreso) }}</span>
        </div>
        <div class="field-inline">
          <strong>Médico:</strong> <span>{{ form.medico_name || '' }}</span>
        </div>
      </div>
    </header>

    <!-- 1. DATOS DE FILIACIÓN -->
    <section class="form-section">
      <h3 class="section-title">1. DATOS DE FILIACIÓN</h3>
      <div class="grid-filiacion">
        <div class="field col-span-2">
          <label>Apellidos y Nombres:</label>
          <div class="value">{{ paciente.nombre || '' }}</div>
        </div>
        <div class="field">
          <label>DNI:</label>
          <div class="value">{{ paciente.dni || '' }}</div>
        </div>
        <div class="field">
          <label>Edad:</label>
          <div class="value">{{ calcEdad(paciente.edad) || '' }}</div>
        </div>
        <div class="field">
          <label>Sexo:</label>
          <div class="value">{{ paciente.sexo || '' }}</div>
        </div>
        <div class="field">
          <label>Fecha de Nacimiento:</label>
          <div class="value">{{ formatFecha(paciente.fecha_nacimiento) || '' }}</div>
        </div>
        <div class="field col-span-2">
          <label>Domicilio:</label>
          <div class="value">{{ paciente.domicilio || '' }}</div>
        </div>
        <div class="field">
          <label>Teléfono:</label>
          <div class="value">{{ paciente.telefono || '' }}</div>
        </div>
        <div class="field">
          <label>Ocupación:</label>
          <div class="value">{{ paciente.ocupacion || '' }}</div>
        </div>
        <div class="field">
          <label>Estado Civil:</label>
          <div class="value">{{ paciente.estado_civil || '' }}</div>
        </div>
        <div class="field">
          <label>Nacionalidad:</label>
          <div class="value">{{ paciente.nacionalidad || '' }}</div>
        </div>
        <div class="field col-span-2">
          <label>Obra Social:</label>
          <div class="value">{{ paciente.obra_social || '' }}</div>
        </div>
        <div class="field">
          <label>N° Afiliado:</label>
          <div class="value">{{ paciente.n_afiliado || '' }}</div>
        </div>
      </div>
    </section>

    <!-- 2. MOTIVO DE CONSULTA / INGRESO -->
    <section class="form-section">
      <h3 class="section-title">2. MOTIVO DE CONSULTA / INGRESO</h3>
      <div class="text-box">
        {{ form.motivo_ingreso }}
      </div>
    </section>

    <!-- 3. ANTECEDENTES DE LA ENFERMEDAD ACTUAL -->
    <section class="form-section">
      <h3 class="section-title">3. ANTECEDENTES DE LA ENFERMEDAD ACTUAL</h3>
      <div class="text-box large">
        {{ form.ant_enf_actual }}
      </div>
    </section>

    <!-- 4. ANTECEDENTES PERSONALES -->
    <section class="form-section">
      <h3 class="section-title">4. ANTECEDENTES PERSONALES</h3>
      
      <div class="field-row">
        <label>Hábitos Fisiológicos:</label>
        <div class="value-line">{{ form.ant_personales.hab_fisiologicos }}</div>
      </div>

      <div class="sub-section">
        <h4 class="sub-title">HÁBITOS TÓXICOS</h4>
        <div class="grid-4">
          <div class="field">
            <label>Tabaco:</label>
            <div class="value-line">{{ form.ant_personales.hab_tox.tabaco }}</div>
          </div>
          <div class="field">
            <label>Alcohol:</label>
            <div class="value-line">{{ form.ant_personales.hab_tox.alcohol }}</div>
          </div>
          <div class="field">
            <label>Drogas:</label>
            <div class="value-line">{{ form.ant_personales.hab_tox.drogas }}</div>
          </div>
          <div class="field">
            <label>Otros:</label>
            <div class="value-line">{{ form.ant_personales.hab_tox.otros }}</div>
          </div>
        </div>
      </div>

      <div class="sub-section">
        <h4 class="sub-title">ANTECEDENTES PATOLÓGICOS</h4>
        <div class="grid-2">
          <div class="field">
            <label>A. Médicos:</label>
            <div class="value-line">{{ form.ant_personales.patologicos.m }}</div>
          </div>
          <div class="field">
            <label>A. Quirúrgicos:</label>
            <div class="value-line">{{ form.ant_personales.patologicos.q }}</div>
          </div>
          <div class="field">
            <label>A. Traumáticos:</label>
            <div class="value-line">{{ form.ant_personales.patologicos.t }}</div>
          </div>
          <div class="field">
            <label>A. Alérgicos:</label>
            <div class="value-line">{{ form.ant_personales.patologicos.a }}</div>
          </div>
        </div>
      </div>

      <div class="field-row mt-2">
        <label>Medicación Reciente / Actual:</label>
        <div class="value-line">{{ form.ant_personales.medicacion }}</div>
      </div>
    </section>

    <!-- 5. ANTECEDENTES HEREDOFAMILIARES -->
    <section class="form-section">
      <h3 class="section-title">5. ANTECEDENTES HEREDOFAMILIARES</h3>
      <div class="text-box">
        {{ form.ant_familiares }}
      </div>
    </section>

 
<!-- 6. EXAMEN FÍSICO GENERAL -->
    <section class="form-section">
      <h3 class="section-title">6. EXAMEN FÍSICO GENERAL</h3>
      
      <!-- Segmentario Cabeza y Cuello -->
      <div class="sub-section">
        <h4 class="sub-title">CABEZA / CRÁNEO Y CUELLO</h4>
        <div class="grid-3">
          <div class="field"><label>Cráneo:</label><div class="value-line">{{ ef.cabeza.craneo }}</div></div>
          <div class="field"><label>Cara:</label><div class="value-line">{{ ef.cabeza.cara }}</div></div>
          <div class="field"><label>Ojos:</label><div class="value-line">{{ ef.cabeza.ojos }}</div></div>
          <div class="field"><label>Narinas:</label><div class="value-line">{{ ef.cabeza.narinas }}</div></div>
          <div class="field"><label>Oídos:</label><div class="value-line">{{ ef.cabeza.oidos }}</div></div>
          <div class="field"><label>Parótidas:</label><div class="value-line">{{ ef.cabeza.parotidas }}</div></div>
          <div class="field"><label>Boca:</label><div class="value-line">{{ ef.cabeza.boca }}</div></div>
          <div class="field"><label>Cuello:</label><div class="value-line">{{ ef.cabeza.cuello }}</div></div>
          <div class="field"><label>Tiroides:</label><div class="value-line">{{ ef.cabeza.tiroides }}</div></div>
          <div class="field"><label>Ing. Yugular:</label><div class="value-line">{{ ef.cabeza.ing_yugular }}</div></div>
          <div class="field"><label>Latidos:</label><div class="value-line">{{ ef.cabeza.latidos }}</div></div>
          <div class="field"><label>Soplos:</label><div class="value-line">{{ ef.cabeza.soplos }}</div></div>
        </div>
      </div>

      <!-- Tórax y Mamas -->
      <div class="grid-2 mt-2">
        <div class="field"><label>Tórax:</label><div class="value-line">{{ ef.torax }}</div></div>
        <div class="field"><label>Mamas:</label><div class="value-line">{{ ef.mamas }}</div></div>
      </div>

      <!-- Aparato Respiratorio -->
      <div class="sub-section">
        <h4 class="sub-title">APARATO RESPIRATORIO</h4>
        <div class="grid-3">
          <div class="field"><label>Frec. Resp.:</label><div class="value-line">{{ ef.respiratorio.frecuencia }}</div></div>
          <div class="field"><label>Tipo Respiratorio:</label><div class="value-line">{{ ef.respiratorio.tipo }}</div></div>
          <div class="field"><label>Expansión de Bases:</label><div class="value-line">{{ ef.respiratorio.expansion_bases }}</div></div>
          <div class="field"><label>V. Vocales:</label><div class="value-line">{{ ef.respiratorio.v_vocales }}</div></div>
          <div class="field"><label>Percusión:</label><div class="value-line">{{ ef.respiratorio.percusion }}</div></div>
          <div class="field"><label>M. Vesicular:</label><div class="value-line">{{ ef.respiratorio.m_vesicular }}</div></div>
          <div class="field col-span-3"><label>Otros:</label><div class="value-line">{{ ef.respiratorio.otros }}</div></div>
        </div>
      </div>

      <!-- Aparato Cardiovascular -->
      <div class="sub-section">
        <h4 class="sub-title">APARATO CARDIOVASCULAR</h4>
        <div class="grid-4">
          <div class="field"><label>Pulso:</label><div class="value-line">{{ ef.cardiovascular.pulso }}</div></div>
          <div class="field"><label>Sistema Venoso:</label><div class="value-line">{{ ef.cardiovascular.sistema_venoso }}</div></div>
          <div class="field"><label>Ruidos (1er R):</label><div class="value-line">{{ ef.cardiovascular.ruidos_1r }}</div></div>
          <div class="field"><label>2do R:</label><div class="value-line">{{ ef.cardiovascular.ruidos_2r }}</div></div>
          <div class="field"><label>3er R:</label><div class="value-line">{{ ef.cardiovascular.ruidos_3r }}</div></div>
          <div class="field"><label>4to R:</label><div class="value-line">{{ ef.cardiovascular.ruidos_4r }}</div></div>
          <div class="field"><label>Frotes:</label><div class="value-line">{{ ef.cardiovascular.frotes }}</div></div>
          <div class="field"><label>Frémitos:</label><div class="value-line">{{ ef.cardiovascular.fremitos }}</div></div>
          <div class="field col-span-2"><label>Soplos Sistólicos:</label><div class="value-line">{{ ef.cardiovascular.soplos_sistolicos }}</div></div>
          <div class="field col-span-2"><label>Soplos Diastólicos:</label><div class="value-line">{{ ef.cardiovascular.soplos_diastolicos }}</div></div>
        </div>
      </div>

      <!-- Abdomen -->
      <div class="sub-section">
        <h4 class="sub-title">ABDOMEN</h4>
        <div class="grid-2">
          <div class="field"><label>Inspección:</label><div class="value-line">{{ ef.abdomen.inspeccion }}</div></div>
          <div class="field"><label>Palpación:</label><div class="value-line">{{ ef.abdomen.palpacion }}</div></div>
          <div class="field"><label>Percusión:</label><div class="value-line">{{ ef.abdomen.percusion }}</div></div>
          <div class="field"><label>Auscultación:</label><div class="value-line">{{ ef.abdomen.auscultacion }}</div></div>
        </div>
      </div>

      <!-- Génito-Urinario -->
      <div class="sub-section">
        <h4 class="sub-title">APARATO GÉNETO - URINARIO</h4>
        <div class="grid-3">
          <div class="field"><label>Puntos Dolorosos:</label><div class="value-line">{{ ef.genito_urinario.puntos_dolorosos }}</div></div>
          <div class="field"><label>Palpación Renal:</label><div class="value-line">{{ ef.genito_urinario.palpacion_renal }}</div></div>
          <div class="field"><label>Puño Percusión:</label><div class="value-line">{{ ef.genito_urinario.puno_percusion }}</div></div>
          <div class="field"><label>Genitales Ext.:</label><div class="value-line">{{ ef.genito_urinario.genit_ext }}</div></div>
          <div class="field"><label>Tacto Vaginal:</label><div class="value-line">{{ ef.genito_urinario.tacto_vaginal }}</div></div>
          <div class="field"><label>Tacto Rectal:</label><div class="value-line">{{ ef.genito_urinario.tacto_rectal }}</div></div>
        </div>
      </div>

      <!-- Neurológico y Osteomioarticular -->
      <div class="sub-section">
        <h4 class="sub-title">SISTEMA NEUROLÓGICO Y OSTEOMIOARTICULAR</h4>
        <div class="grid-4">
          <div class="field col-span-2"><label>Conciencia:</label><div class="value-line">{{ ef.neurologico.conciencia }}</div></div>
          <div class="field col-span-2">
            <label>Glasgow:</label>
            <div class="value-line">
              Total: {{ ef.neurologico.glasgow_total }} 
              (O: {{ ef.neurologico.glasgow_o || '-' }} / V: {{ ef.neurologico.glasgow_v || '-' }} / M: {{ ef.neurologico.glasgow_m || '-' }})
            </div>
          </div>
          <div class="field"><label>Motilidad:</label><div class="value-line">{{ ef.neurologico.motilidad }}</div></div>
          <div class="field"><label>Sensibilidad:</label><div class="value-line">{{ ef.neurologico.sensibilidad }}</div></div>
          <div class="field"><label>Reflejos:</label><div class="value-line">{{ ef.neurologico.reflejo }}</div></div>
          <div class="field"><label>Osteomioarticular:</label><div class="value-line">{{ ef.osteomioarticular }}</div></div>
        </div>
      </div>
    </section>

    <!-- 7. DIAGNÓSTICO DE INGRESO -->
    <section class="form-section">
      <h3 class="section-title">7. DIAGNÓSTICO DE INGRESO</h3>
      <div class="text-box medium">
        {{ form.diagnostico_ingreso }}
      </div>
    </section>

    <!-- 8. TERAPÉUTICA -->
    <section class="form-section">
      <h3 class="section-title">8. TERAPÉUTICA</h3>
      <div class="grid-3">
        <div class="field"><label>Dieta:</label><div class="value-line">{{ form.terapeutica.dieta }}</div></div>
        <div class="field"><label>Oxigenoterapia (FiO2):</label><div class="value-line">{{ form.terapeutica.oxi_terapia.fio2 }}</div></div>
        <div class="field"><label>Flujo / NBL:</label><div class="value-line">{{ form.terapeutica.oxi_terapia.flujo }} / {{ form.terapeutica.oxi_terapia.nbl }}</div></div>
        <div class="field"><label>HP:</label><div class="value-line">{{ form.terapeutica.hp }}</div></div>
        <div class="field col-span-2"><label>Profilaxis Antitrombótica:</label><div class="value-line">{{ form.terapeutica.profilaxis_ant }}</div></div>
      </div>

      <div class="field-row mt-2">
        <label>FÁRMACOS:</label>
        <div class="text-box medium">{{ form.terapeutica.farmacos }}</div>
      </div>

      <div class="sub-section">
        <h4 class="sub-title">Control de Signos Vitales</h4>
        <div class="grid-4">
          <div class="field"><label>Diuresis:</label><div class="value-line">{{ form.terapeutica.sig_v.diuresis }}</div></div>
          <div class="field"><label>Catarsis:</label><div class="value-line">{{ form.terapeutica.sig_v.catarsis }}</div></div>
          <div class="field"><label>T°:</label><div class="value-line">{{ form.terapeutica.sig_v.t }}</div></div>
          <div class="field"><label>Otros:</label><div class="value-line">{{ form.terapeutica.sig_v.otros }}</div></div>
        </div>
      </div>

      <div class="field-row mt-2">
        <label>Información Paciente/Familia / Solicitud Donantes de Sangre:</label>
        <div class="text-box small">{{ form.terapeutica.info_extra_paciente }}</div>
      </div>
    </section>

    <!-- FIRMAS -->
    <footer class="form-signatures">
      <div class="signature-box">
        <div class="line"></div>
        <span>FIRMA Y SELLO MÉDICO</span>
      </div>
    </footer>
  </div>
  `,  
  props: {
    ingreso_formdata: {
      type: Object,
      required: true,
      default: () => ({})
    }
  },
  computed: {
    // Objeto proxy seguro para evitar errores en template si faltan ramas en el JSON
    form() {
      return Object.assign({
        ant_personales: { hab_tox: {}, patologicos: {} },
        examen_fisico: { cabeza: {}, respiratorio: {}, cardiovascular: {}, abdomen: {}, genito_urinario: {}, neurologico: {} },
        terapeutica: { oxi_terapia: {}, sig_v: {} }
      }, this.ingreso_formdata);
    },
    paciente() {
        let c = this.form.selected_customer_data || {};
        let cmeta = c?.bpa_customer_field || {};
        return {};
        
        return {
            nombre: (c.first_name? c.first_name+' '+c.last_name : ''),
            dni: cmeta.tipo_doc && cmeta.text_C6kufq? (cmeta.tipo_doc+'-'+cmeta.text_C6kufq) : c.customer_dni || cmeta.text_C6kufq || '',
            edad: cmeta.persona_fecha || '',
            sexo: cmeta.persona_genero || '',
            fecha_nacimiento: cmeta.persona_fecha || '',
            domicilio: cmeta.persona_dir || '',
            telefono: c.phone|| '',
            ocupacion: cmeta.ocupacion || '',
            estado_civil: cmeta.estado_civil || '',
            nacionalidad: cmeta.pais || 'AR',
            obra_social: cmeta.obra_soc_seguros || '',
            n_afiliado: cmeta.obra_nro_afiliado || '',
            
        };
      
    },
    ef() {
      return this.form.examen_fisico || {
        cabeza: {}, respiratorio: {}, cardiovascular: {},
        abdomen: {}, genito_urinario: {}, neurologico: {}
      };
    }
  },
  methods: {
    calcEdad(fecha = ''){
       const hoy = new Date();
       let nac = new Date(fecha);
       if( isNaN(nac.getTime()) ) return '';
       let edad = hoy.getFullYear() - nac.getFullYear();
       const difmeses = hoy.getMonth() - nac.getMonth();
       if( difmeses < 0 || (difmeses === 0 && hoy.getDate() < nac.getDate())){
        edad--;
       }
       return edad;
    },
    formatFecha(fecha) {
      if (!fecha) return '';
      // Si usas moment o date-fns, puedes adaptarlo. Aquí formateo estándar ISO:
      const date = new Date(fecha);
      return isNaN(date.getTime()) ? fecha : date.toLocaleDateString('es-AR');
    },
    formatHora(fecha) {
      if (!fecha) return '';
      const date = new Date(fecha);
      return isNaN(date.getTime()) ? '' : date.toLocaleTimeString('es-AR', { hour: '2-digit', minute: '2-digit' });
    }
  }
//};
});
</script>
<?php 


if(false){ 
?>
<style scoped>
/* ESTILOS DE PANTALLA E IMPRESIÓN */
.print-form-container {
  font-family: 'Arial', sans-serif;
  color: #000;
  max-width: 210mm;
  margin: 0 auto;
  padding: 15mm;
  background: #fff;
  font-size: 11px;
  line-height: 1.3;
}

.form-header {
  border-bottom: 2px solid #002b49;
  padding-bottom: 10px;
  margin-bottom: 15px;
}

.header-titles h2 {
  margin: 0;
  font-size: 18px;
  color: #002b49;
}

.header-titles .subtitle {
  font-size: 12px;
  font-weight: normal;
  color: #555;
}

.header-titles h1 {
  margin: 5px 0 10px 0;
  font-size: 16px;
  letter-spacing: 0.5px;
}

.header-meta {
  display: flex;
  justify-content: space-between;
  font-size: 12px;
}

.form-section {
  margin-bottom: 12px;
  page-break-inside: avoid;
}

.section-title {
  background-color: #002b49;
  color: #fff;
  padding: 3px 8px;
  margin: 0 0 8px 0;
  font-size: 12px;
  text-transform: uppercase;
}

.sub-section {
  margin-top: 8px;
  border-left: 2px solid #002b49;
  padding-left: 6px;
}

.sub-title {
  margin: 0 0 6px 0;
  font-size: 11px;
  color: #002b49;
  text-transform: uppercase;
  border-bottom: 1px solid #ccc;
}

/* GRIDS Y ALINEACIONES */
.grid-filiacion {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 6px 10px;
}

.grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 6px 10px; }
.grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px 10px; }
.grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px 10px; }

.col-span-2 { grid-column: span 2; }
.col-span-3 { grid-column: span 3; }
.mt-2 { margin-top: 8px; }

.field {
  display: flex;
  flex-direction: column;
}

.field label, .field-row label {
  font-weight: bold;
  font-size: 10px;
  color: #333;
}

.value, .value-line {
  min-height: 16px;
  border-bottom: 1px dotted #888;
  padding: 2px 0;
  font-size: 11px;
}

.field-inline {
  display: inline-flex;
  gap: 5px;
}

.text-box {
  border: 1px solid #ccc;
  min-height: 35px;
  padding: 4px;
  border-radius: 2px;
  background: #fafafa;
  white-space: pre-wrap;
}
.text-box.small { min-height: 25px; }
.text-box.medium { min-height: 50px; }
.text-box.large { min-height: 70px; }

/* FIRMAS */
.form-signatures {
  margin-top: 40px;
  display: flex;
  justify-content: flex-end;
  page-break-inside: avoid;
}

.signature-box {
  width: 200px;
  text-align: center;
}

.signature-box .line {
  border-bottom: 1px solid #000;
  margin-bottom: 5px;
}

/* REGLAS ESPECÍFICAS PARA IMPRESIÓN */
@media print {
body *:not(.print-form-container) {
    display: none;
}
body .print-form-container {
    display: block;
}
  .print-form-container {
    width: 100%;
    max-width: none;
    margin: 0;
    padding: 0;
  }
  
  body {
    background: #fff;
  }

  .text-box {
    background: transparent;
    border: 1px solid #000;
  }
  
  .section-title {
    background-color: #000 !important;
    color: #fff !important;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }

  .sub-title {
    color: #000;
    border-color: #000;
  }

  .sub-section {
    border-left-color: #000;
  }

  /* Evitar saltos de página en medio de secciones importantes */
  .form-section, .sub-section, .form-signatures {
    page-break-inside: avoid;
  }
}
</style>
<?php } 

 if(false){ 

?>
<style>
        /* Configuración de página e impresión */
        @page {
            size: A4;
            margin: 12mm 15mm 15mm 15mm;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            font-size: 10.5px;
            color: #1a202c;
            line-height: 1.3;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* CABECERA MODERNA */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .header-left {
            padding: 12px 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .institution-logo {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            line-height: 1;
        }
        .institution-sub {
            font-size: 9px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 600;
            margin-top: 2px;
            letter-spacing: 0.5px;
        }
        .header-right {
            background-color: #1e3a8a; /* Azul institucional */
            color: #ffffff;
            padding: 0 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-width: 180px;
        }
        .main-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 0;
        }
        .subtitle {
            font-size: 9px;
            font-weight: 500;
            color: #93c5fd;
            text-transform: uppercase;
            margin-top: 3px;
            letter-spacing: 1px;
        }

        /* METADATOS DE RECEPCIÓN */
        .reception-bar {
            display: grid;
            grid-template-columns: 1fr 1fr 2fr;
            gap: 15px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 15px;
        }

        /* SECCIONES Y BLOQUES */
        .section {
            margin-bottom: 16px;
            page-break-inside: avoid;
        }
        .section-header {
            font-size: 11px;
            font-weight: 700;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 4px;
            margin-bottom: 10px;
        }

        /* ESTRUCTURAS DE FORMULARIO (GRID) */
        .grid-collapse { display: grid; gap: 8px 12px; }
        .cols-4 { grid-template-columns: repeat(4, 1fr); }
        .cols-3 { grid-template-columns: repeat(3, 1fr); }
        .cols-2 { grid-template-columns: repeat(2, 1fr); }
        .span-2 { grid-column: span 2; }
        .span-3 { grid-column: span 3; }

        /* CAMPOS DE ENTRADA MODERNOS */
        .field {
            display: flex;
            align-items: flex-end;
        }
        .field label {
            font-weight: 600;
            color: #475569;
            margin-right: 6px;
            white-space: nowrap;
        }
        .field .input-line {
            flex-grow: 1;
            border-bottom: 1px solid #cbd5e1;
            height: 15px;
        }

        /* TEXTOS SUBRAYADOS / SUBGRUPO */
        .sub-group-title {
            font-size: 9.5px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            margin-top: 6px;
            margin-bottom: 2px;
            grid-column: 1 / -1;
        }

        /* BLOQUES DE TEXTO / CUADROS DE ANOTACIÓN */
        .text-box {
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            margin-top: 5px;
            padding: 4px 0;
            background-color: #fff;
        }
        .text-box-line {
            border-bottom: 1px solid #f1f5f9;
            height: 20px;
        }
        .text-box-line:last-child {
            border-bottom: none;
        }

        /* CONTENEDORES DE OPCIONES BINARIAS */
        .options-flex {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 500;
            color: #334155;
        }
        .square {
            width: 11px;
            height: 11px;
            border: 1px solid #94a3b8;
            border-radius: 2px;
            background-color: #fff;
        }

/* SEGUNDA HOJA */



/* Estilos específicos complementarios para la Página 2 */
.header-container-p2 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #1e3a8a;
    padding-bottom: 6px;
    margin-bottom: 15px;
}

.page-indicator {
    font-size: 10px;
    font-weight: 700;
    color: #1e3a8a;
    text-transform: uppercase;
    letter-spacing: 1px;
}
/*
.sub-group-title {
    font-size: 10px;
    font-weight: 700;
    color: #1e3a8a;
    text-transform: uppercase;
    margin-top: 8px;
    margin-bottom: 2px;
    grid-column: 1 / -1;
    border-left: 3px solid #cbd5e1;
    padding-left: 6px;
}
*/
.footer-signatures {
    margin-top: 50px;
    display: flex;
    justify-content: flex-end;
    page-break-inside: avoid;
}

.signature-box {
    width: 220px;
    border-top: 1px dashed #475569;
    text-align: center;
    padding-top: 6px;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 10px;
}

/* Ajustes de impresión para elementos cromáticos de la página 2 */

/*
@media print {
    .sub-group-title {
        color: #1e3a8a !important;
        border-left-color: #cbd5e1 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
*/






/* FIN SEGUNDA HOJA */


        /* Optimizaciones estrictas para impresión */
        @media print {
            body { font-size: 10px; }
            .header-right {
                background-color: #1e3a8a !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .main-title { color: #ffffff !important; }
            .subtitle { color: #93c5fd !important; }
            .reception-bar {
                background-color: #f8fafc !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .section-header {
                color: #1e3a8a !important;
                border-bottom-color: #1e3a8a !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .input-line { border-bottom-color: #94a3b8 !important; }
            .text-box { border-color: #cbd5e1 !important; }
            .text-box-line { border-bottom-color: #e2e8f0 !important; }
        }
    </style>
<?php } ?>
    

<?php if(true){ ?>
    
<style scoped>
/* ==========================================
   1. VARIABLES Y CONTENEDOR PRINCIPAL
   ========================================== */
.print-form-container {
  font-family: 'Arial', 'Helvetica Neue', sans-serif;
  color: #2c3e50;
  background-color: #ffffff;
  max-width: 210mm; /* Ancho estándar A4 */
  margin: 20px auto;
  padding: 15mm;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  font-size: 11px;
  line-height: 1.4;
  box-sizing: border-box;
}

/* ==========================================
   2. ENCABEZADO INSTITUCIONAL
   ========================================== */
.form-header {
  /**border-bottom: 3px solid #003366;*/
  padding-bottom: 12px;
  margin-bottom: 20px;
}

.header-titles h2 {
  margin: 0;
  font-size: 20px;
  color: #003366;
  font-weight: 700;
}

.header-titles .subtitle {
  font-size: 12px;
  font-weight: 600;
  color: #555555;
  margin-left: 8px;
}

.header-titles h1 {
  margin: 6px 0 12px 0;
  font-size: 15px;
  color: #333333;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}

.header-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f8f9fa;
  padding: 6px 10px;
  border: 1px solid #e9ecef;
  border-radius: 4px;
  font-size: 12px;
}

.field-inline {
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

/* ==========================================
   3. SECCIONES Y SUBTÍTULOS
   ========================================== */
.form-section {
  margin-bottom: 14px;
  page-break-inside: avoid;
}

.section-title {
  /*background-color: #003366;*/
  /*color: #ffffff;*/*
  padding: 4px 10px;
  margin: 0 0 10px 0;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  border-radius: 2px;
}

.sub-section {
  margin-top: 10px;
  margin-bottom: 8px;
  /*border-left: 3px solid #003366;*/
  padding-left: 8px;
}

.sub-title {
  margin: 0 0 8px 0;
  font-size: 11px;
  font-weight: 700;
  color: #003366;
  text-transform: uppercase;
  border-bottom: 1px solid #dee2e6;
  padding-bottom: 2px;
}

/* ==========================================
   4. SISTEMA DE GRILLAS (FLEX / GRID)
   ========================================== */
.grid-filiacion {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 8px 12px;
}

.grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px 12px; }
.grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px 12px; }
.grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px 12px; }

.col-span-2 { grid-column: span 2; }
.col-span-3 { grid-column: span 3; }
.col-span-4 { grid-column: span 4; }

.mt-2 { margin-top: 10px; }

/* ==========================================
   5. CAMPOS DE DATOS Y ETIQUETAS
   ========================================== */
.field {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.field label, .field-row label {
  font-weight: 700;
  font-size: 10px;
  color: #495057;
  text-transform: uppercase;
  margin-bottom: 2px;
}

.value, .value-line {
  min-height: 18px;
  border-bottom: 1px dotted #888888;
  padding: 2px 4px;
  font-size: 11px;
  color: #000000;
  background-color: #fff;
}

.field-row {
  display: flex;
  flex-direction: column;
  margin-bottom: 8px;
}

/* ==========================================
   6. CAJAS DE TEXTO (TEXTAREAS / MOTIVOS)
   ========================================== */
.text-box {
  border: 1px solid #ced4da;
  min-height: 35px;
  padding: 6px 8px;
  border-radius: 3px;
  background-color: #fdfdfd;
  font-size: 11px;
  color: #212529;
  white-space: pre-wrap;
  word-break: break-word;
  line-height: 1.5;
}

.text-box.small { min-height: 28px; }
.text-box.medium { min-height: 55px; }
.text-box.large { min-height: 80px; }

/* ==========================================
   7. FIRMAS Y PIE DE PÁGINA
   ========================================== */
.form-signatures {
  margin-top: 50px;
  display: flex;
  justify-content: flex-end;
  page-break-inside: avoid;
}

.signature-box {
  width: 220px;
  text-align: center;
}

.signature-box .line {
  border-bottom: 1px solid #000000;
  margin-bottom: 6px;
}

.signature-box span {
  font-size: 10px;
  font-weight: 700;
  color: #495057;
}

/* ==========================================
   8. REGLAS ESTRICTAS DE IMPRESIÓN (A4)
   ========================================== */
@media print {
  @page {
    size: A4 portrait;
    margin: 10mm 10mm 10mm 10mm;
  }

  body {
    background-color: transparent !important;
    margin: 0;
    padding: 0;
  }

  .print-form-container {
    width: 100% !important;
    max-width: none !important;
    margin: 0 !important;
    padding: 0 !important;
    box-shadow: none !important;
    border: none !important;
  }

  /* Forzar impresión de fondos oscuros y colores exactos */
  .section-title {
    background-color: #003366 !important;
    color: #ffffff !important;
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
  }

  .header-meta {
    background-color: #f0f0f0 !important;
    border: 1px solid #cccccc !important;
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
  }

  .text-box {
    background-color: transparent !important;
    border: 1px solid #000000 !important;
  }

  .value, .value-line {
    border-bottom: 1px dotted #000000 !important;
  }

  /* Evitar cortes de página en medio de secciones clínicas */
  .form-header,
  .form-section,
  .sub-section,
  .field-row,
  .grid-filiacion,
  .form-signatures {
    page-break-inside: avoid !important;
  }

  /* Ocultar elementos de UI si existieran en el wrapper */
  .no-print, 
  button, 
  .btn {
    display: none !important;
  }
}
</style>
    
<?php } 

if(false){
?>

<style scoped>
/* ==========================================
   CONFIGURACIÓN DE PÁGINA Y CONTENEDOR
   ========================================== */
.form-container {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    font-size: 10.5px;
    color: #1a202c;
    line-height: 1.3;
    max-width: 800px;
    margin: 0 auto;
    background-color: #ffffff;
    box-sizing: border-box;
}

/* ==========================================
   CABECERA MODERNA
   ========================================== */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 20px;
}

.header-left {
    padding: 12px 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.institution-logo {
    font-size: 20px;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.5px;
    line-height: 1;
}

.institution-sub {
    font-size: 9px;
    color: #64748b;
    text-transform: uppercase;
    font-weight: 600;
    margin-top: 2px;
    letter-spacing: 0.5px;
}

.header-right {
    background-color: #1e3a8a; /* Azul institucional */
    color: #ffffff;
    padding: 0 35px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    min-width: 180px;
}

.main-title {
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 1.5px;
    margin: 0;
}

.subtitle {
    font-size: 9px;
    font-weight: 500;
    color: #93c5fd;
    text-transform: uppercase;
    margin-top: 3px;
    letter-spacing: 1px;
}

/* ==========================================
   BARRA DE RECEPCIÓN Y CONTROLES VITALES
   ========================================== */
.reception-bar {
    display: grid;
    grid-template-columns: 1fr 1fr 2fr;
    gap: 15px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 10px 15px;
    margin-bottom: 15px;
}

/* ==========================================
   SECCIONES Y BLOQUES
   ========================================== */
.section {
    margin-bottom: 16px;
    page-break-inside: avoid;
}

.section-header {
    font-size: 11px;
    font-weight: 700;
    color: #1e3a8a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #1e3a8a;
    padding-bottom: 4px;
    margin-bottom: 10px;
}

.section-title {
    border-bottom: 2px solid #003366;
    color: #496590;
    padding: 4px 0px;
    margin: 0 0 10px 0;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 2px;
}

.sub-group-title {
    font-size: 9.5px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    margin-top: 6px;
    margin-bottom: 2px;
    grid-column: 1 / -1;
}

/* ==========================================
   ESTRUCTURAS DE FORMULARIO (GRID)
   ========================================== */
.grid-collapse { 
    display: grid; 
    gap: 8px 12px; 
}

.cols-4 { grid-template-columns: repeat(4, 1fr); }
.cols-3 { grid-template-columns: repeat(3, 1fr); }
.cols-2 { grid-template-columns: repeat(2, 1fr); }

.span-2 { grid-column: span 2; }
.span-3 { grid-column: span 3; }
.span-4 { grid-column: span 4; }

/* ==========================================
   CAMPOS DE ENTRADA MODERNOS Y LÍNEAS
   ========================================== */
.field {
    display: flex;
    /*align-items: flex-end;*/
}

.field label {
    font-weight: 600;
    color: #475569;
    margin-right: 6px;
    white-space: nowrap;
}

/* Soporta la línea vacía original y el contenido dinámico del JSON */
.field .input-line {
    flex-grow: 1;
    border-bottom: 1px solid #cbd5e1;
    min-height: 15px;
    padding-bottom: 1px;
    color: #0f172a;
    font-weight: 500;
    word-break: break-word;
}

/* ==========================================
   BLOQUES DE TEXTO / CUADROS DE ANOTACIÓN
   ========================================== */
.text-box {
    border: 1px solid #e2e8f0;
    border-radius: 4px;
    margin-top: 5px;
    padding: 6px 8px;
    background-color: #fff;
    min-height: 35px;
    white-space: pre-wrap;
    word-break: break-word;
    color: #0f172a;
}

.text-box-line {
    border-bottom: 1px solid #f1f5f9;
    height: 20px;
}

.text-box-line:last-child {
    border-bottom: none;
}

/* ==========================================
   CONTENEDORES DE OPCIONES Y CHECKBOXES
   ========================================== */
.options-flex {
    display: flex;
    align-items: center;
    gap: 12px;
}

.checkbox-container {
    display: flex;
    align-items: center;
    gap: 4px;
    font-weight: 500;
    color: #334155;
}

.square {
    width: 11px;
    height: 11px;
    border: 1px solid #94a3b8;
    border-radius: 2px;
    background-color: #fff;
    display: inline-block;
}

/* ==========================================
   PIE DE PÁGINA / FIRMA
   ========================================== */
.footer-signatures {
    margin-top: 40px;
    display: flex;
    justify-content: flex-end;
    page-break-inside: avoid;
}

.signature-box {
    width: 200px;
    border-top: 1px dashed #475569;
    text-align: center;
    padding-top: 5px;
    font-weight: 700;
    color: #334155;
    text-transform: uppercase;
    font-size: 10px;
}

/* ==========================================
   OPTIMIZACIONES ESTRICTAS DE IMPRESIÓN
   ========================================== */
@media print {
    @page {
        size: A4;
        margin: 12mm 15mm 15mm 15mm;
    }

    body {
        background-color: transparent !important;
        font-size: 10px;
    }

    .form-container {
        max-width: none !important;
        width: 100% !important;
        margin: 0 !important;
    }

    /* Forzar impresión de azules de cabecera e institucionales */
    .header-right {
        background-color: #1e3a8a !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .main-title { color: #ffffff !important; }
    .subtitle { color: #93c5fd !important; }
    
    .reception-bar {
        background-color: #f8fafc !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .section-header {
        color: #1e3a8a !important;
        border-bottom-color: #1e3a8a !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .sub-group-title {
        color: #64748b !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .input-line { 
        border-bottom-color: #94a3b8 !important; 
    }

    .text-box { 
        border-color: #cbd5e1 !important; 
    }

    .text-box-line { 
        border-bottom-color: #e2e8f0 !important; 
    }

    /* Evitar saltos de página que rompan bloques clí­nicos */
    .section,
    .reception-bar,
    .footer-signatures {
        page-break-inside: avoid !important;
    }
}






</style>
<?php } ?>

<style>

.form-header {
    /* border-bottom: 3px solid #003366; */
    padding-bottom: 12px;
    margin-bottom: 15px;
}



.field {
    display: flex;
    /*align-items: flex-end;*/
}

.section-title {
    border-bottom: 2px solid #1e3a8a;
    background: transparent;
    color: #1e3a8a;
    padding: 4px 0px;
    margin: 0 0 10px 0;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 2px;
}

.sub-section {
    margin-top: 10px;
    margin-bottom: 8px;
    /* border-left: 3px solid #003366; */
    padding-left: 8px;
}


.header-titles {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}




.header-meta, .reception-bar {
    display: grid;
    grid-template-columns: 1fr 1fr 2fr;
    gap: 15px;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 10px 15px;
    margin-bottom: 15px;
}


</style>











<style>

/* INGRESO 2 CESAR */


.ingreso2 {
  --ume-primary:           #1AA6C9;
  --ume-primary-dark:      #128CAA;
  --ume-primary-light:     #d9f0f7;
  --ume-primary-lighter:   #eef8fb;
  --ume-green:             #5FAE2C;
  --ume-header-bar:        #1c2b36;
  --el-border-color-light: #e4e7ed;
  --el-text-color-primary: #303133;
  --el-text-color-secondary:#909399;
  --el-border-radius-base: 4px;
}
.ingreso2 {
/* ============================================================
   TOKENS: marca UME (colores). El resto de la UI (inputs, botones,
   grillas) usa las clases nativas de BookingPress/Element-UI.
   ============================================================ */


/* ============================================================ HEADER (marca, estático) */
.ume-header {
  background: var(--ume-header-bar);
  border-bottom: 3px solid var(--ume-primary);
}
.ume-header-inner {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 12px 24px;
}
.ume-logo-wrap {
  display: flex;
  align-items: center;
  height: 44px;
}
.ume-logo-wrap img { height: 38px; display: block; }
.ume-header-info .org-name {
  font-weight: 700;
  font-size: 14px;
  color: #fff;
  letter-spacing: .03em;
}
.ume-header-info .org-meta {
  font-size: 11.5px;
  color: #9eb4be;
  margin-top: 1px;
}

/* título de página, en línea con el patrón bpa-db-sec-heading de BookingPress */
.bpa-db-page-title .db-sec-left {
  display: flex;
  align-items: center;
  gap: 12px;
}
.bpa-db-page-title .ph-icon {
  width: 34px; height: 34px;
  border-radius: var(--el-border-radius-base);
  background: var(--ume-primary-lighter);
  color: var(--ume-primary);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.bpa-db-page-title .ph-icon svg { width: 18px; height: 18px; }
.bpa-db-page-title .bpa-page-subheading {
  margin: 3px 0 0;
  font-size: 13px;
  color: var(--el-text-color-secondary);
}

.ume-wrap {
  max-width: 960px;
  margin: 0 auto;
  padding: 24px 20px;
}

/* encabezado de cada card (icono + título), sobre bpa-db-sec-heading */
.bpa-db-sec-heading .db-sec-left {
  display: flex;
  align-items: center;
  gap: 9px;
}
.bpa-db-sec-heading .sec-icon {
  width: 26px; height: 26px;
  border-radius: var(--el-border-radius-base);
  background: var(--ume-primary-lighter);
  color: var(--ume-primary);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.bpa-db-sec-heading .sec-icon svg { width: 14px; height: 14px; }

/* subtítulos internos de una card (agrupan campos relacionados) */
.subsection { margin-bottom: 10px; }
.subsection-title {
  font-size: 12px;
  font-weight: 700;
  color: var(--ume-primary-dark);
  text-transform: uppercase;
  letter-spacing: .05em;
  margin-bottom: 8px;
  padding-bottom: 4px;
  border-bottom: 1px solid var(--ume-primary-light);
}
.bpa-form-label--sm { font-size: 11px; font-weight: 500; }

/* bloque "Firma y Sello" */
.conformidad-block {
  border: 1px solid var(--el-border-color-light);
  border-radius: var(--el-border-radius-base);
  background: #f5f7fa;
  padding: 12px 14px;
  margin-bottom: 10px;
}
.section-label {
  font-size: 12.5px;
  font-weight: 700;
  color: var(--el-text-color-regular);
  margin: 4px 0 10px;
}


}
</style>


<?php 


