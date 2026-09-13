<?php

   	global $bookingpress_ajaxurl, $bookingpress_common_date_format,$BookingPressPro;
	$bookingpress_common_datetime_format = $bookingpress_common_date_format . ' HH:mm:ss';

	$bookingpress_disable_bulk_action = 0;
    
	if ($BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
		$bookingpress_disable_bulk_action = 1;
	}
    
    
    add_action( 'admin_footer', function(){ 
        
          //@import url(https://fonts.googleapis.com/css2?family=Lato&display=swap)
            //@import url(https://fonts.googleapis.com/css2?family=Open+Sans&display=swap);                      
        
        ?>
        
<style>

*,
:after,
:before {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x: ;
  --tw-pan-y: ;
  --tw-pinch-zoom: ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position: ;
  --tw-gradient-via-position: ;
  --tw-gradient-to-position: ;
  --tw-ordinal: ;
  --tw-slashed-zero: ;
  --tw-numeric-figure: ;
  --tw-numeric-spacing: ;
  --tw-numeric-fraction: ;
  --tw-ring-inset: ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgba(59, 130, 246, 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur: ;
  --tw-brightness: ;
  --tw-contrast: ;
  --tw-grayscale: ;
  --tw-hue-rotate: ;
  --tw-invert: ;
  --tw-saturate: ;
  --tw-sepia: ;
  --tw-drop-shadow: ;
  --tw-backdrop-blur: ;
  --tw-backdrop-brightness: ;
  --tw-backdrop-contrast: ;
  --tw-backdrop-grayscale: ;
  --tw-backdrop-hue-rotate: ;
  --tw-backdrop-invert: ;
  --tw-backdrop-opacity: ;
  --tw-backdrop-saturate: ;
  --tw-backdrop-sepia: ;
  --tw-contain-size: ;
  --tw-contain-layout: ;
  --tw-contain-paint: ;
  --tw-contain-style: ;
}
::backdrop {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x: ;
  --tw-pan-y: ;
  --tw-pinch-zoom: ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position: ;
  --tw-gradient-via-position: ;
  --tw-gradient-to-position: ;
  --tw-ordinal: ;
  --tw-slashed-zero: ;
  --tw-numeric-figure: ;
  --tw-numeric-spacing: ;
  --tw-numeric-fraction: ;
  --tw-ring-inset: ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgba(59, 130, 246, 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur: ;
  --tw-brightness: ;
  --tw-contrast: ;
  --tw-grayscale: ;
  --tw-hue-rotate: ;
  --tw-invert: ;
  --tw-saturate: ;
  --tw-sepia: ;
  --tw-drop-shadow: ;
  --tw-backdrop-blur: ;
  --tw-backdrop-brightness: ;
  --tw-backdrop-contrast: ;
  --tw-backdrop-grayscale: ;
  --tw-backdrop-hue-rotate: ;
  --tw-backdrop-invert: ;
  --tw-backdrop-opacity: ;
  --tw-backdrop-saturate: ;
  --tw-backdrop-sepia: ;
  --tw-contain-size: ;
  --tw-contain-layout: ;
  --tw-contain-paint: ;
  --tw-contain-style: ;
} /*! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com*/
*,
:after,
:before {
  border: 0 solid #e5e7eb;
  box-sizing: border-box;
}
:after,
:before {
  --tw-content: "";
}
:host,
html {
  line-height: 1.5;
  -webkit-text-size-adjust: 100%;
  font-family:
    Open Sans,
    ui-sans-serif,
    system-ui,
    sans-serif,
    Apple Color Emoji,
    Segoe UI Emoji,
    Segoe UI Symbol,
    Noto Color Emoji;
  font-feature-settings: normal;
  font-variation-settings: normal;
  -moz-tab-size: 4;
  tab-size: 4;
  -webkit-tap-highlight-color: transparent;
}
body {
  line-height: inherit;
  margin: 0;
}
hr {
  border-top-width: 1px;
  color: inherit;
  height: 0;
}
abbr:where([title]) {
  text-decoration: underline dotted;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}
a {
  color: inherit;
  text-decoration: inherit;
}
b,
strong {
  font-weight: bolder;
}
code,
kbd,
pre,
samp {
  font-family:
    ui-monospace,
    SFMono-Regular,
    Menlo,
    Monaco,
    Consolas,
    Liberation Mono,
    Courier New,
    monospace;
  font-feature-settings: normal;
  font-size: 1em;
  font-variation-settings: normal;
}
small {
  font-size: 80%;
}
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}
sub {
  bottom: -0.25em;
}
sup {
  top: -0.5em;
}
table {
  border-collapse: collapse;
  border-color: inherit;
  text-indent: 0;
}
button,
input,
optgroup,
select,
textarea {
  color: inherit;
  font-family: inherit;
  font-feature-settings: inherit;
  font-size: 100%;
  font-variation-settings: inherit;
  font-weight: inherit;
  letter-spacing: inherit;
  line-height: inherit;
  margin: 0;
  padding: 0;
}
button,
select {
  text-transform: none;
}
button,
input:where([type="button"]),
input:where([type="reset"]),
input:where([type="submit"]) {
  -webkit-appearance: button;
  background-color: transparent;
  background-image: none;
}
:-moz-focusring {
  outline: auto;
}
:-moz-ui-invalid {
  box-shadow: none;
}
progress {
  vertical-align: baseline;
}
::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}
[type="search"] {
  -webkit-appearance: textfield;
  outline-offset: -2px;
}
::-webkit-search-decoration {
  -webkit-appearance: none;
}
::-webkit-file-upload-button {
  -webkit-appearance: button;
  font: inherit;
}
summary {
  display: list-item;
}
blockquote,
dd,
dl,
figure,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
p,
pre {
  margin: 0;
}
fieldset {
  margin: 0;
}
fieldset,
legend {
  padding: 0;
}
menu,
ol,
ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
dialog {
  padding: 0;
}
textarea {
  resize: vertical;
}
input::placeholder,
textarea::placeholder {
  color: #9ca3af;
  opacity: 1;
}
[role="button"],
button {
  cursor: pointer;
}
:disabled {
  cursor: default;
}
audio,
canvas,
embed,
iframe,
img,
object,
svg,
video {
  display: block;
  vertical-align: middle;
}
img,
video {
  height: auto;
  max-width: 100%;
}
[hidden]:where(:not([hidden="until-found"])) {
  display: none;
}
.tws  .col-span-1 {
  grid-column: span 1 / span 1;
}
.tws  .col-span-11 {
  grid-column: span 11 / span 11;
}
.tws  .col-span-4 {
  grid-column: span 4 / span 4;
}
.tws  .mb-3 {
  margin-bottom: 12px;
}
.tws  .mb-4 {
  margin-bottom: 16px;
}
.tws  .mb-6 {
  margin-bottom: 24px;
}
.tws  .ml-2 {
  margin-left: 8px;
}
.tws  .mr-2 {
  margin-right: 8px;
}
.tws  .mr-4 {
  margin-right: 16px;
}
.tws  .mt-2 {
  margin-top: 8px;
}
.tws  .mt-8 {
  margin-top: 32px;
}
.tws  .flex {
  display: flex;
}
.tws  .grid {
  display: grid;
}
.tws  .h-10 {
  height: 40px;
}
.tws  .h-20 {
  height: 80px;
}
.tws  .h-3 {
  height: 12px;
}
.tws  .h-4 {
  height: 16px;
}
.tws  .h-6 {
  height: 24px;
}
.tws  .h-8 {
  height: 32px;
}
.tws  .h-full {
  height: 100%;
}
.tws  .h-screen {
  height: 100vh;
}
.tws  .min-h-screen {
  min-height: 100vh;
}
.tws  .w-10 {
  width: 40px;
}
.tws  .w-20 {
  width: 80px;
}
.tws  .w-3 {
  width: 12px;
}
.tws  .w-4 {
  width: 16px;
}
.tws  .w-6 {
  width: 24px;
}
.tws  .w-8 {
  width: 32px;
}
.tws  .w-full {
  width: 100%;
}
.tws  .flex-1 {
  flex: 1 1 0%;
}
.tws  .grid-cols-12 {
  grid-template-columns: repeat(12, minmax(0, 1fr));
}
.tws  .flex-row {
  flex-direction: row;
}
.tws  .flex-col {
  flex-direction: column;
}
.tws  .items-center {
  align-items: center;
}
.tws  .justify-center {
  justify-content: center;
}
.tws  .justify-between {
  justify-content: space-between;
}
.tws  .gap-4 {
  gap: 16px;
}
.tws  :is(.space-x-2 > :not([hidden]) ~ :not([hidden])) {
  --tw-space-x-reverse: 0;
  margin-left: calc(8px * (1 - var(--tw-space-x-reverse)));
  margin-right: calc(8px * var(--tw-space-x-reverse));
}
.tws  :is(.space-y-2 > :not([hidden]) ~ :not([hidden])) {
  --tw-space-y-reverse: 0;
  margin-bottom: calc(8px * var(--tw-space-y-reverse));
  margin-top: calc(8px * (1 - var(--tw-space-y-reverse)));
}
.tws  :is(.space-y-4 > :not([hidden]) ~ :not([hidden])) {
  --tw-space-y-reverse: 0;
  margin-bottom: calc(16px * var(--tw-space-y-reverse));
  margin-top: calc(16px * (1 - var(--tw-space-y-reverse)));
}
.tws  :is(.space-y-8 > :not([hidden]) ~ :not([hidden])) {
  --tw-space-y-reverse: 0;
  margin-bottom: calc(32px * var(--tw-space-y-reverse));
  margin-top: calc(32px * (1 - var(--tw-space-y-reverse)));
}
.tws  .overflow-hidden {
  overflow: hidden;
}
.tws .rounded {
  border-radius: 12px;
}
.tws .rounded-full {
  border-radius: 9999px;
}
.rounded-md {
  border-radius: 18px;
}
.tws  .border {
  border-width: 1px;
}
.tws  .border-b {
  border-bottom-width: 1px;
}
.tws  .border-l-4 {
  border-left-width: 4px;
}
.border-dashed {
  border-style: dashed;
}
.border-gray-200 {
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity, 1));
}
.border-primary-200 {
  --tw-border-opacity: 1;
  border-color: rgb(213 207 255 / var(--tw-border-opacity, 1));
}
.border-primary-400 {
  --tw-border-opacity: 1;
  border-color: rgb(148 120 255 / var(--tw-border-opacity, 1));
}
.border-teal-400 {
  --tw-border-opacity: 1;
  border-color: rgb(45 212 191 / var(--tw-border-opacity, 1));
}
.bg-\[\#374b5c\] {
  --tw-bg-opacity: 1;
  background-color: rgb(55 75 92 / var(--tw-bg-opacity, 1));
}
.bg-\[\#78e9ea\] {
  --tw-bg-opacity: 1;
  background-color: rgb(120 233 234 / var(--tw-bg-opacity, 1));
}
 .bg-blue-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(219 234 254 / var(--tw-bg-opacity, 1));
}
 .bg-gray-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity, 1));
}
 .bg-gray-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity, 1));
}
 .bg-green-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(220 252 231 / var(--tw-bg-opacity, 1));
}
 .bg-green-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(74 222 128 / var(--tw-bg-opacity, 1));
}
 .bg-pink-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(252 231 243 / var(--tw-bg-opacity, 1));
}
 .bg-primary-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(233 229 255 / var(--tw-bg-opacity, 1));
}
 .bg-primary-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(148 120 255 / var(--tw-bg-opacity, 1));
}
 .bg-purple-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(243 232 255 / var(--tw-bg-opacity, 1));
}
 .bg-red-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(254 226 226 / var(--tw-bg-opacity, 1));
}
 .bg-red-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(248 113 113 / var(--tw-bg-opacity, 1));
}
 .bg-teal-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(204 251 241 / var(--tw-bg-opacity, 1));
}
 .bg-white {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
}
 .bg-yellow-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(254 249 195 / var(--tw-bg-opacity, 1));
}
 .bg-yellow-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(250 204 21 / var(--tw-bg-opacity, 1));
}
.tws  .object-cover {
  object-fit: cover;
}

 .p-2 {
  padding: 8px;
}
 .p-3 {
  padding: 12px;
}
 .p-4 {
  padding: 16px;
}
 .px-4 {
  padding-left: 16px;
  padding-right: 16px;
}
 .py-3 {
  padding-bottom: 12px;
  padding-top: 12px;
}
 .text-center {
  text-align: center;
}
 .text-lg {
  font-size: 18px;
  line-height: 27px;
}
 .text-sm {
  font-size: 14px;
  line-height: 21px;
}
 .text-xl {
  font-size: 20px;
  line-height: 28px;
}
 .text-xs {
  font-size: 12px;
  line-height: 19.200000000000003px;
}
 .font-bold {
  font-weight: 700;
}
 .font-medium {
  font-weight: 500;
}
 .uppercase {
  text-transform: uppercase;
}
 .text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity, 1));
}
 .text-gray-400 {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity, 1));
}
 .text-gray-500 {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity, 1));
}
 .text-gray-600 {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity, 1));
}
 .text-green-500 {
  --tw-text-opacity: 1;
  color: rgb(34 197 94 / var(--tw-text-opacity, 1));
}
 .text-pink-500 {
  --tw-text-opacity: 1;
  color: rgb(236 72 153 / var(--tw-text-opacity, 1));
}
 .text-primary-300 {
  --tw-text-opacity: 1;
  color: rgb(183 169 255 / var(--tw-text-opacity, 1));
}
 .text-primary-500 {
  --tw-text-opacity: 1;
  color: rgb(115 65 255 / var(--tw-text-opacity, 1));
}
 .text-purple-500 {
  --tw-text-opacity: 1;
  color: rgb(168 85 247 / var(--tw-text-opacity, 1));
}
 .text-red-500 {
  --tw-text-opacity: 1;
  color: rgb(239 68 68 / var(--tw-text-opacity, 1));
}
 .text-teal-500 {
  --tw-text-opacity: 1;
  color: rgb(20 184 166 / var(--tw-text-opacity, 1));
}
 .text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity, 1));
}
 .text-yellow-500 {
  --tw-text-opacity: 1;
  color: rgb(234 179 8 / var(--tw-text-opacity, 1));
}
 .shadow-md {
  --tw-shadow:
    0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
  --tw-shadow-colored:
    0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
}
 .shadow-md,
 .shadow-sm {
  box-shadow:
    var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000),
    var(--tw-shadow);
}
 .shadow-sm {
  --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
}


.tws  :is(.bg-primary-100) {
  color: rgba(0, 0, 0, 0.9) !important;
}
.tws  :is(.bg-primary-400) {
  color: hsla(0, 0%, 100%, 0.9) !important;
  font-weight: 600;
}

/*
.tws  {
  font-family: Open Sans !important;
  font-size: 16px !important;
}*/
</style>
        
        <style id="Historias_extra_footer_css">
.bp_hc_is_expand .bpa-ssn__navbar li a {
    font-size: 0;
    padding: 10px 0;
    justify-content: center;
}
.bp_hc_is_expand .bpa-ssn__brand-logoo a.bpa-ssn-logo>img {
    width: 70px !important;
}
.bp_hc_is_expand .bpa-staff-sidebar-navigation {
    width: 96px;
}        
.bp_hc_is_expand .bpa-header-navbar__staff {
    width: calc(100% - 96px);
    margin-left: 96px;
    display: none;
}
.bp_hc_is_expand .bpa-main-list-card__is-staff-custom-view {
    margin-left: 112px;
    margin-left: 106px;
    margin-top: 2px;
}

        .bp_hc_expand_control {
            margin: 4px;
        }
        .bp_hc_expand_control a {
            user-select: none;
            cursor: pointer;
            color: slategrey;
        }
        .bp_hc_expand_control a:hover {
            color: dodgerblue;
        }
        @media (max-width: 1024px){
           .bp_hc_expand_control {
            display: none;
           } 
        }
        
        .justify-end {
            justify-content: flex-end;
        }
        
        
        
        .bphc-patient-col {
            flex: 1 1 300px;
            
            align-content: stretch;
        }
        .bphc-patient-col .bphc_customer_card {
            /*box-shadow: fuchsia 0px 0px 3px;*/
            /*box-shadow: 0 0 3px #203089;*/
            /*border-radius: 0px 0px 25px 25px;*/
        }
        .bphc-patient-col .bphc_customer_card {
            border: 1px solid #607d8b4f;
        }
        
        .bphc_customer_card .el-collapse-item.deft_down_arrow .el-icon-arrow-right{ transform: rotate(90deg); -webkit-transform: rotate(90deg); }
                
        .bphc_customer_card {
            display: flex;
            align-items: flex-start;
            flex-wrap: nowrap;
            flex-direction: row;
        }
        .avatar_row {
            width: 80px;
            padding: 15px;
        }
        .bphc_card {
            display: flex;
            flex-direction: column;
            padding: 25px 10px 5px 15px;
        }
        .bphc_customer_card .bphc_card {
            position: relative;
            width: calc(100% - 120px);
            width: 100%;
        }
        .bphc_customer_card .bphc_card .header {
            font-size: 1.3rem;
            padding: 0;
        }
        .bphc_card .header {
            font-size: 0.9rem;
            padding: 10px;
            display: flex;
            flex-direction: row;
            gap: 30px;
            justify-content: flex-start;
            align-items: center;
        }
        .bphc_card .body {
            position: relative;
            display: flex;
            flex-direction: column;
            font-family: 'Inter', serif;
        }
        .bphc_customer_card .bphc_card .header {
            min-height: 50px;
        }
        .bphc-customer-hcount {
            outline: rgb(153, 180, 206) solid 1px;
            padding: 2px;
            min-width: 2.8rem;
            min-height: 1.2rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            text-align: left;
            font-size: 1rem;
            border-radius: 4px;
        }
        .bphc-abs-10 {
            position: absolute;
            right: 10px;
            top: 10px;
        }
        /*.bphc-customer-item-column {
            width: calc(100% - 35px);
            grid-gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 2rem;
            max-height: 40px;
            font-size: 0.8rem;
            color: dimgray;
            font-family: unset;
            font-weight: bold;
            display: grid;
            
        }*/
        .bphc-customer-item-column {
            width: calc(100% - 35px);
            grid-gap: 1rem;
            grid-template-columns: repeat(2, 50%);
            /* max-height: 40px; */
            font-size: 0.8rem;
            color: dimgray;
            /* font-family: unset; */
            /* font-weight: 400; */
            display: grid;
            line-height: 0.8rem;
            justify-items: start;
            word-break: break-word;
            align-items: self-start;
            margin-bottom: 10px;
            /*color: grey;*/
        }
        .bphc-customer-item-column strong {
            font-weight: 300;
        }
        
        .el-collapse-item__header .bphc-customer-item-column {
            margin-bottom: 0;
        }
        .bphc_card .el-collapse {
            border-top: 1px solid #add8e691;
        }
        
        
        .bphc_customer_background .space-y-2>div>div {
            box-shadow: -2px 0 2px mediumslateblue;
            border-radius: 2px;
            padding: 4px;
        }
        .bphc_customer_background .space-y-2>div>div>span:first-of-type {
            color: blue;
            width: 30%;
        }
        
        
        .item_medicamento {
            margin-bottom: 10px;
            width: 100%;
            flex-grow: 2;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            line-height: 0.9;
            align-items: center;
            padding: 4px 0;
            
            /*color: #424060;*/
            /*font-size: 14px;*/
            /*font-weight: 700;*/
            /*font-family: monospace;*/
        }
        .item_medicamento>* {
            box-shadow: -2px 0 2px #228b2278;
        }
        
        .bphc-alergs .el-row>div {
            margin: 2px 0;
        }
        
        
        </style>
        
        <?php },10); ?>

<?php
/**
    
    <!--
        <el-row class="bp_hc_expand_control" v-if="bookingpress_staff_customize_view == 1" >
            <span>
                <a v-if="!bp_hc_is_expand" @click="bp_hc_expand_toggle"> Cambiar a vista expandida </a>
                <a v-else @click="bp_hc_expand_toggle"> Cambiar a vista normal </a>
            </span>
        </el-row>
    -->
    
    
    <!--
    <div>
        bp_hc_bookingpress_staffmember_id {{bp_hc_bookingpress_staffmember_id}} <br />
        bp_hc_bookingpress_staffmember_name {{bp_hc_bookingpress_staffmember_name}} <br />
        
        bp_hc_selected_service_id {{ bp_hc_selected_service_id }} <br />
        bp_hc_selected_service_name {{ bp_hc_selected_service_name }} <br />
    </div>
    -->
    
    <!-- MOMENT FORMAT {{moment().format("YYYY-MM-DD")}} -->
    

*/
?>

<el-main class="bpa-main-listing-card-container bpa-default-card bpa--is-page-non-scrollable-mob main-historias-super " :class="(bookingpress_staff_customize_view == 1 ) ? 'bpa-main-list-card__is-staff-custom-view':''" id="all-page-main-container">

 
	<el-row id="contenido-superior" type="flex" class="historias-title-filter-header variapaddding-bpa-mlc-head-wrap" style="border-bottom: 1px solid var(--bpa-gt-gray-300);padding:20px 24px 20px 30px;" >
		<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-mlc-left-heading" style="align-self: flex-start;padding-top: 20px;" >
            <div style="display: flex;flex-direction: column;align-items:start;gap:20px;">
    			<h1 class="bpa-page-heading" style="margin-bottom:12px"><?php esc_html_e( 'Historias Clínicas Ambulatorias', 'bookingpress-appointment-booking' ); ?></h1>
            
            </div>
		</el-col>
		<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
			<div class="quitada-bpa-hw-right-btn-group">
<!--  --FILTRO-- Buscador por DNI -->
            		<div class="bpa-table-filter is-align-right bp-hc-filter" style="border-bottom: 0;padding-right: 0;">
            			<el-row type="flex" :gutter="16" align="right" class="justify-end">
            				<el-col :xs="24" :sm="12" :md="8" :lg="6" :xl="6" style="min-width: 250px;">
            					<el-input ref="bphc_dni_filter" class="bpa-form-control" v-model="dni_query" @keydown.enter.native="dni_query==''? clearSearch() : searchByDni()" placeholder="Ingrese Documento minimo 3 digitos "></el-input>
            				</el-col>
            				<el-col :xs="24" :sm="12" :md="8" :lg="6" :xl="6" align="right" style="min-width: 240px;display: flex;flex-wrap:nowrap;justify-content:flex-end;">
                                <el-button class="bpa-btn bpa-btn__medium" @click="clearSearch" style="min-width:80px;">Limpiar</el-button>
            					<el-button class="bpa-btn bpa-btn__medium bpa-btn--primary" :loading="patient_searching" @click="searchByDni" style="min-width:120px;">Buscar</el-button>
            					
            				</el-col>
            
            			</el-row>
            		</div>
<!-- probando filtro aqui -->	
			</div>
		</el-col>
	</el-row>
    
	<div class="bpa-back-loader-container" id="bpa-page-loading-loader">
        <div class="bpa-back-loader"></div>
	</div>
    
	<div id="bpa-main-container">

        <h3 class="bpa-form-label" style="margin-bottom: 6px;">
            <span class="" style="color: #096f95; font-weight:500">Seleccione el paciente:</span>
        </h3>
    
        <!-- FIN LISTA PACIENTES (oculto por flujo DNI primero) -->
		<div class="historias_y_pacientes" style="width: 100%;">
            <!-- Vista sin resultados -->
			<el-row type="flex" v-if="items.length == 0" class="lista-pacientes" :class="(current_screen_size == 'desktop')?'w25min':''" >
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-data-empty-view" style="flex-direction: column;">
						<div class="bpa-ev-left-vector">
							<picture>
								<source srcset="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.webp' ); ?>" type="image/webp">
								<img src="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.png' ); ?>">
							</picture>
						</div>
						<div class="to_column-bpa-ev-right-content">
							<h3><?php esc_html_e( 'No se encontro Paciente(s)', 'bookingpress-appointment-booking' ); ?></h3>
						</div>
					</div>
				</el-col>
			</el-row>
            <!-- Fin Vista sin resultados -->
            
			<el-row v-if="items.length > 0" class="lista-pacientes" :class="(current_screen_size == 'desktop')?'w25min':''" >
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<el-container class="bpa-table-container" >
						<div class="bpa-back-loader-container" v-if="is_display_loader == '1'">
							<div class="bpa-back-loader"></div>
						</div>
						<!-- Tabla pacientes PC v-if="current_screen_size == 'desktop'" -->
						<div class="bpa-tc__wrapper">
                           
							<el-table ref="multipleTable" :data="items" @selection-change="handleSelectionChange" @row-click="selectPatient" >
								<!--<el-table-column  type="selection"></el-table-column>-->															
								<el-table-column  prop="customer_fullname" label="<?php esc_html_e( 'Nombre', 'bookingpress-appointment-booking' ); ?>" sortable sort-by="customer_username">
									
									<template slot-scope="scope">
									<!-- @click="editCustomerDetails(scope.row.customer_id)" ----@click="selectPatient(scope.row)"----- -->
									<a class="link-paciente" :class="{activo: selectedRow.customer_id==scope.row.customer_id}"  >
										<el-image class="bpa-table-column-avatar" :src="scope.row.customer_avatar"></el-image>
										<label v-if="scope.row!=null && scope.row.customer_firstname != '' && scope.row.customer_lastname != ''">{{ scope.row.customer_firstname }} {{ scope.row.customer_lastname }}</label>
										<label v-else-if="scope.row.customer_fullname != ''">{{ scope.row.customer_fullname }}</label>
										<label v-else>{{ scope.row.customer_email }}</label>
									
									</a>
									</template>
									
								</el-table-column>
		  						<el-table-column  prop="dni" label="<?php esc_html_e( 'Documento', 'bookingpress-appointment-booking' ); ?>" sortable sort-by="dni"></el-table-column>
		  						
                            </el-table>
                        </div>
                    
                    </el-container>
                </el-col>
            </el-row>
            <!-- FIN LISTA PACIENTES-->
   
            <div id="bphc_main_historias_el"  class="el-row main-historias"> 
            
                <?php do_action('view_historias_impresion'); ?>
                <div class="flex w-full histories-listing-header" style="" v-show="selected_patient">

                     <div id="contenido-principal" style="z-index:-1;height: 0;width: 0;position: absolute;"></div>

                     <h2 v-if="selected_patient" class="bpa-form-label" style="margin-right: 0px;" >
                        <span class="bpa-form-label" style="color: lightslategrey;text-transform: uppercase;display: flex;flex-wrap:wrap;"> <!-- font-family: 'Inter';font-weight: 300;font-size: 13px; -->
                            <div class="historias-del-p-msg" style="width: 100%;">
                            <span class="" style="font-weight:700">Paciente:</span>
                            </div>
                            <div>
                                <span style="color: #096f95; font-weight:400;" class="" >{{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}&nbsp;</span>
                            </div>
                            <div>
                            <span v-if="selected_patient.dni">&nbsp;Documento: <span style="color: #096f95; font-weight:400;" >{{(selected_patient.tipo_doc? selected_patient.tipo_doc+' - ':'')}} {{ selected_patient.dni }}</span></span>
                            </div>
                        </span>
                    </h2>
                    
                    <div class="flex" style="display:none !important; align-self: flex-end;justify-self: end;padding-right: 10px;min-width: 380px;justify-content: end;">
                        <!--
                        <el-button class="bpa-btn " @click="bp_hc_openSummaryModal()"> 
            					<?php esc_html_e( 'Resumen', 'bookingpress-appointment-booking' ); ?>
                                <span class="material-icons-round" style="">visibility</span> 
            			</el-button> :content="(!bphc_appointment_history.update_id?'Crear ':'Editar ') + 'Historia del turno' + (bphc_appointment_history.booking_id?'#'+bphc_appointment_history.booking_id:'')" open-delay="200"
                        -->

                        <div style="margin: 0 10px;display: flex;height: 45px;align-self: flex-end;">
                            <el-date-picker @change="bphc_date_range_change" class="bpa-form-control bpa-form-control--date-range-picker" format="<?php echo esc_html($bookingpress_common_date_format); ?>" v-model="bp_hc_selected_date_range" type="daterange" start-placeholder="<?php esc_html_e('Start date', 'bookingpress-appointment-booking'); ?>" end-placeholder="<?php esc_html_e('End date', 'bookingpress-appointment-booking'); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar bpa-date-range-picker-widget-wrapper" range-separator=" - " value-format="yyyy-MM-dd" :picker-options="filter_pickerOptions"> </el-date-picker>
                        </div>

                        
                        <?php $bphc_appointment_id = !empty($_GET['appointment'])? absint($_GET['appointment']) : 0; $bphc_history_popdisplay = !empty($_GET['popup-display'])? absint($_GET['popup-display']) : 0;
                        if( $bphc_appointment_id || $bphc_history_popdisplay){ ?>
                        <el-tooltip v-if="bphc_appointment_history" effect="dark" open-delay="300" placement="left" :content="(!bphc_appointment_history.update_id?'Crear ':'Editar ') + 'Historia del turno' + (bphc_appointment_history.booking_id?'#'+bphc_appointment_history.booking_id:'')" >
                             <span class="" style="margin-right: 10px;display: flex;">
                             <el-button v-if="bphc_appointment_history && selected_patient && (selected_patient.customer_id == bphc_appointment_history.customer_id)" class="bpa-btn bpa-btn--secondary add-appointment-history-btn" @click="bphc_edit_HystoryRecord(0, bphc_appointment_history, <?php echo $bphc_appointment_id; ?>, 1)"> 
                					<span v-if="!bphc_appointment_history.update_id" class="material-icons-round">add</span>
                                    <span v-else class="material-icons-round">mode_edit</span> 
                					<?php esc_html_e( 'Historia del turno', 'bookingpress-appointment-booking' ); ?>
                                    {{ (bphc_appointment_history.booking_id? ' #'+bphc_appointment_history.booking_id:'') }}
                			</el-button>
                            </span>
                            <!--
                            <template slot="content">
                                {{(!bphc_appointment_history.update_id?'Crear ':'Editar ') + 'Historia del turno' + (bphc_appointment_history.booking_id?'#'+bphc_appointment_history.booking_id:'')}
                            </template>
                            -->
                        </el-tooltip>
                        <?php } ?>
                        
                    </div>

                    <div class="nombreYbtns">
                    
                        <div v-if="expansion_impresion_is_show" class="view-impresion-btns" :class="impresion_btn_anim_end?'animate_end':''">
                            
                            <div class="impresion-buttons__inner" >
                                <el-tooltip effect="dark" open-delay="150" placement="top" content="Zoom (click derecho para disminuir)" >
                                <button @click="impresionZoomInOut(event,'+')" @contextmenu="impresionZoomInOut(event,'-')" class="zoom-in-out hoja-btn-zoom">
                                    
                                    <span style="display: inline-flex;font-size: 60%;position: absolute;top: 1px;right: -2px;/*bottom: 0;*/">{{zoom_impresion}}%</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Zm-40-60v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z"/></svg>
                                    </div>                                    
                                </button>
                                </el-tooltip>
                                <el-tooltip effect="dark" open-delay="800" placement="top" content="Generar PDF (en versiones nuevas de chrome puedes visualizar, firmar a mano alzada y guardar PDF)" >
                                <button @click="impresion_toPDF( event )" class="hoja-btn-pdf">
                                    
                                    <span style="display: inline-flex;color: rgb(186 13 94 / 98%);font-size: 8px;position: absolute;top: 1px;right: -2px;font-weight: bold;z-index: 4;">PDF</span>
                                    <div>                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m720-120 160-160-56-56-64 64v-167h-80v167l-64-64-56 56 160 160ZM560 0v-80h320V0H560ZM240-160q-33 0-56.5-23.5T160-240v-560q0-33 23.5-56.5T240-880h280l240 240v121h-80v-81H480v-200H240v560h240v80H240Zm0-80v-560 560Z"/></svg>
                                        <!--<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>-->
                                        <!--<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M360-460h40v-80h40q17 0 28.5-11.5T480-580v-40q0-17-11.5-28.5T440-660h-80v200Zm40-120v-40h40v40h-40Zm120 120h80q17 0 28.5-11.5T640-500v-120q0-17-11.5-28.5T600-660h-80v200Zm40-40v-120h40v120h-40Zm120 40h40v-80h40v-40h-40v-40h40v-40h-80v200ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>-->                                        
                                    </div>                                    
                                </button>
                                </el-tooltip>
                                <el-tooltip effect="dark" open-delay="150" placement="top" content="imprimir" >
                                <button onclick="impresionButton()" class="confirmar confirm hoja-btn-impresion">
                                    
                                    <span>Imprimir</span>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M720-120v-120H600v-80h120v-120h80v120h120v80H800v120h-80ZM160-560h640-640Zm80 440v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v32q-18-10-38-17.5T800-516q0-17-11.5-30.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h342q-16 17-28 37t-20 43H320v160h214q7 22 20 42t28 38H240Zm400-520v-120H320v120h-80v-200h480v200h-80Z"/></svg></div>                                    
                                </button>
                                </el-tooltip>
                                <el-tooltip effect="dark" open-delay="150" placement="top" content="" style="display: none;">
                                <button onclick="verificarButton()" class="verificar" style="display: none;">
                                    <svg class="edit_on" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm0-240q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm0-240q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640ZM480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm40 240v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
                                    <svg class="edit_off" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m622-453-56-56 82-82-57-57-82 82-56-56 195-195q12-12 26.5-17.5T705-840q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L622-453ZM200-200h57l195-195-28-29-29-28-195 195v57ZM792-56 509-338 290-120H120v-169l219-219L56-792l57-57 736 736-57 57Zm-32-648-56-56 56 56Zm-169 56 57 57-57-57ZM424-424l-29-28 57 57-28-29Z"/></svg>
                                    <span>Trabajar</span>
                                </button>
                                </el-tooltip>
                                <el-tooltip effect="dark" open-delay="800" placement="top" content="Enviar por email (el email es enviado como contenido HTML - puedes probar enviarte un email primero para visualizarlo, tras enviar espera unos segundos para enviar otro, siempre puedes asignar varios destinatarios)." >
                                <button onclick="bookingExpansion_enviar( this, 'email' )" class="hoja-btn-email">
                                    
                                    <span>Enviar</span>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg></div>
                                </button>
                                </el-tooltip>
                                <el-tooltip effect="dark" open-delay="50" placement="top" content="Volver" >
                                <button onclick="closeButton()" class="close btn-close hoja-btn-close">
                                    
                                    <span>Cerrar</span>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></div>
                                </button>
                                </el-tooltip>
                            </div>
                        </div>
                        <div v-else class="view-mode-btns" style="margin: 0 14px 0 0;">

                            <el-tooltip content="modo vista a pantalla completa" class="" style="cursor: pointer; z-index: 2;">
                                <span @click="()=>{bp_hc_view_mode.dual_view= 0; bp_hc_view_mode.full_form = 1;}" class="material-icons-round bphc-view-mode-btn" :class="bp_hc_view_mode.full_form?( 'activo' ):''"  style="">fit_screen</span>
                            </el-tooltip>
                            <el-tooltip content="modo vista paisaje" class="" style="cursor: pointer; z-index: 2;">
                                <span @click="()=>{bp_hc_view_mode.dual_view= 'landscape'; bp_hc_view_mode.full_form = 0;}" class="material-icons-round bphc-view-mode-btn" :class="!bp_hc_view_mode.full_form?( bp_hc_view_mode.dual_view=='landscape'?'activo':''):''" style="">horizontal_split</span>
                            </el-tooltip>
                            <el-tooltip content="modo vista portaretrato" class="" style="cursor: pointer; z-index: 2;">
                                <span @click="()=>{bp_hc_view_mode.dual_view= 'portrait'; bp_hc_view_mode.full_form = 0;}" class="material-icons-round bphc-view-mode-btn" :class="!bp_hc_view_mode.full_form?( bp_hc_view_mode.dual_view!='landscape'?'activo':''):''" style="">vertical_split</span>
                            </el-tooltip>
                            
                            <!--
                                <span @click="" class="material-icons-round" style="">all_out splitscreen fit_screen horizontal_split view_column</span>
                                <span class="material-icons-round" style="transform: scale(1.1, 1.3);font-weight: 200;color: dimgray;">splitscreen</span>
                                <span class="material-icons-round" style="transform: rotate(90deg) scale(1.3, 1.1);font-weight: 200;color: dimgray;">splitscreen</span>
                            -->
                        </div>

                        <el-button class="bpa-btn bpa-btn--primary add-history-btn" @click="bphc_edit_HystoryRecord()"> 
                            <span class="material-icons-round">add</span> 
                            <span class="add-history-btn-text"><?php esc_html_e( 'Agregar Historia', 'bookingpress-appointment-booking' ); ?></span>
                        </el-button>
                     </div>

                </div>
                
<!-- Dual view container  START //2025-10-24 updates -->
            <div class="bp_hc_dual_view_container" :class="bp_hc_view_mode.dual_view?( bp_hc_view_mode.dual_view ):'full_form'" > <!-- style="min-height: 380px; display: grid;grid-template-columns: 50% calc(50% - 10px);gap: 10px;" -->
                <!-- Form Implementation in Dual view -->
                <div @scroll="onScrollToTopBtnChange(event, this)" class="bp_hc_dual_col_form" v-if="bp_hc_view_mode.dual_view" ><!-- style="display: flex;min-width: 450px;max-width: 100%;"  -->
                    
                    <?php do_action( 'booking_Expansion_history_form_template', 'dual_view_mode' );//includes_templates_dual_form; ?>
                </div><!-- Fin Form Implementation in Dual view -->
                
<!-- pestaña historias -->
                <div v-if="bphc_target=='historias'" class="lista-historias-container bphc_listing_conf-1" style="min-height: 380px;">

                    <div v-if="selected_patient" style="padding: 0 20px;width: 100%;"> <!--  v-if="histories.length > 0"  -->
                        <h2 class="bpa-page-heading bp_hc_dualview_heading" style="font-size: large;display: inline-flex;align-items: start;width: 100%;">
                            <span style="flex: 1; text-align: center;">L&iacute;nea de tiempo de historias cl&iacute;nicas</span>
                            <el-button @click="bphc_target='estudios'" class="bpa-btn__small" style="position: relative;float: right;">ver estudios</el-button>
                        </h2>
                    </div>
                                    
                    <div class="lista-historias" style="padding-right: 10px;">
                        <div v-if="histories_loading" class="bphc_cargando_historias" style="display: flex;">
                            <h2>Cargando historias...</h2>
                            	<div class="bpa-back-loader-container" id="bpa-page-loading-loader">
        			                 <div class="bpa-back-loader"></div>
        	                   </div>
                        </div>

                        <div v-else-if="!selected_patient" class="bphc_selecciona_paciente">
                            <div style="position: relative;">
                            
                                <h2 style=""> 
                                <span style="" type="warning">Selecciona un Paciente.</span>
                                </h2>
                                <svg style=""   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4470_13557)"><path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"></path> <path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"></path></g> <defs><clipPath id="clip0_4470_13557"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
                                
                            </div>
                        </div>

                        <div v-else-if="histories.length === 0" class="bphc_no_historias" style="display: flex;text-align: center;position:relative;">
                       
                                <h2 >No se encontraron Historias.</h2>
                                <div class="bpa-ev-left-vector" style="float: none;">
        							<picture>
        								<source srcset="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.webp' ); ?>" type="image/webp">
        								<img src="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.png' ); ?>">
        							</picture>
        						</div>
                              <!-- :data-historia="h.date_label"  v-if="(h.consultation_data.general.motivoConsulta.length) < 200 " -->  
                        </div>
                        
<!-- :key="h.id" -->    <div v-else v-for="(h, i) in histories" :key="h.id" class="flex history-Slot" >

                            <div class="bphc_historia-item-before">
                                <div class="bphc_item-before-line"></div>
                                <div class="bphc_item-before-round" :class="{show: h.yearShow }">
                                    <div></div>
                                    <span class="uppercase">{{ moment(h.date).format('YYYY')||'' }}</span>
                                </div>
                            </div>

                            <div class="historia-item" @click="bphc_edit_HystoryRecord(h.id, h)" >
                            
                                <div class="medical-card">
                                    <!-- Header con gradiente -->
                                    <div class="card-header-gradient">
                                        <div class="header-content">
                                            <div class="header-left">
                                                <h5 class="header-title">{{ moment(h.date).format('DD [de] MMMM, YYYY') || '' }}</h5>
                                                <div class="header-subtitle">{{ moment(h.time || '', 'HH:mm').format('hh:mm A') !== 'Invalid date' ? moment(h.time || '', 'HH:mm').format('hh:mm A') : '' }}</div>
                                            </div>
                                            <div class="header-right">
                                            <?php if( TRUE || isset($_GET['test']) ){ ?>
                                                <el-popover placement="top-start" title=""  trigger="hover" :open-delay="window.localStorage._is_share_read? 2500: 50" content="">
                                                <el-button slot="reference"  @click.stop="bphc_history_print( h );location.hash = '#contenido-principal';set_impresionZoom( 100 );" class="hist-share-btn">                                                    
                                                    <span class="material-icons-round span_share" >share</span>
                                                </el-button>
                                                <div class="expansion-popover-info">
                                                    <div> <strong>Compartir Planilla - Hoja Clinica</strong> </div>
                                                    <h4>Planilla de Hoja Clínica (El contenido es editable )</h4> <br>
                                                    <span>
                                                        <br>*Asigne o limpie siempre su Matricula debajo de la sección de firma. 
                                                        <br>*Si los datos del paciente no están completos previo a seleccionarlo se deben rellenar manualmente. 
                                                        <br>*Datos como edad se calcula automáticamente a partir de la fecha de nacimiento. 
                                                        <br>*De preferencia solicitar a recepción que asignen datos del paciente como fecha y genero 
                                                        <br>previo a la consulta.
                                                    </span>
                                                    <div style="text-align: center;"> <el-button @click="()=>{ window.localStorage.setItem('_is_share_read', 1); console.log('leido');}"><span>Entiendo <br> <small>retrasar este mensaje</small></span></el-button> </div>
                                                </div>
                                                
                                                </el-popover>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <!-- Tabs/Botones -->
                                        <div class="tags-container">
                                            <el-tooltip effect="dark" content="Identificador de historia" placement="top">
                                                <button class="tag-item">#{{ h.id }}</button>
                                            </el-tooltip>
                                            
                                            <el-tooltip effect="dark" content="Turno relacionado" placement="top">
                                                <button class="tag-item" v-if="h.raw.booking_id">
                                                    Turno #{{ h.raw.booking_id }}
                                                </button>
                                                <button class="tag-item" v-else>
                                                    No vinculado
                                                </button>
                                            </el-tooltip>
                                            
                                            <el-tooltip 
                                                effect="dark" 
                                                :content="h.service_name || 'no especificó especialidad'" 
                                                placement="bottom" 
                                                :open-delay="300"
                                            >
                                                <button class="tag-item">{{ h.service_name || '' }}</button>
                                            </el-tooltip>
                                            
                                            <button class="tag-item">
                                                {{ h.consultorio || 'consulta' }}
                                            </button>
                                        </div>
                                        
                                        <!-- Información de médicos -->
                                        <div class="info-section">
                                            <div class="info-grid">
                                                <div class="info-col">
                                                    <div class="info-label">Paciente</div>
                                                    <div class="info-value">
                                                        {{ (selected_patient.customer_firstname || '') + ' ' + (selected_patient.customer_lastname || '') }}
                                                    </div>
                                                </div>
                                                <div class="info-col">
                                                    <div class="info-label">Médico</div>
                                                    <div class="info-value">{{ h.staff_member_name || '' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Diagnósticos -->
                                        <div class="diagnostics-section">
                                            <div class="diagnostic-item" v-if="h.general.motivoConsulta">
                                                <strong>Motivo:</strong> {{ h.general.motivoConsulta }}
                                            </div>
                                            <div class="diagnostic-item" v-if="h.general.diagnostico">
                                                <strong>Diagnóstico:</strong> {{ h.general.diagnostico }}
                                            </div>
                                            <div class="diagnostic-item" v-if="h.general.tratamiento">
                                                <strong>Tratamiento:</strong> {{ h.general.tratamiento }}
                                            </div>
                                        </div>
                                        
                                        <!-- Botones inferiores -->
                                        <div class="action-buttons">
                                            <button 
                                                @click="bphc_view_full_HystoryRecord(h.id, h)"
                                                class="btn-primary-action2"
                                            >
                                                <span class="material-icons-round">description</span>
                                                <span>Ver detalle</span>
                                            </button>
                                            <button 
                                                v-if="h.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id"
                                                @click="bphc_edit_HystoryRecord(h.id, h)"
                                                class="btn-secondary-action2"
                                            >
                                                <span class="material-icons-round">edit</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin medical-card -->
                                
                                
                                                             
                            </div><!--fin new historia-item -->
                            
                        </div>
                                                
                    </div> <!--Fin lista historias-->
                    
                    
                    <!-- PAGINACION  -->
            		<el-row class="bpa-pagination" type="flex" v-if="histories.length > 0" style="width: 100%;padding: 0 20px;"> 
            			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" >
            				<div class="bpa-pagination-left">
            					<p><?php esc_html_e('Showing', 'bookingpress-appointment-booking'); ?> <strong><u>{{ histories.length }}</u></strong>&nbsp;<?php esc_html_e('out of', 'bookingpress-appointment-booking'); ?>&nbsp;<strong>{{ historiesTotal }}</strong></p>
            					<div class="bpa-pagination-per-page">
                                    <p><?php esc_html_e('Per Page', 'bookingpress-appointment-booking'); ?></p>
            						<el-select v-model="pagination_length_val" placeholder="Select" @change="changePaginationSize($event)" class="bpa-form-control" popper-class="bpa-pagination-dropdown">
            							<el-option v-for="item in pagination_val" :key="item.text" :label="item.text" :value="item.value"></el-option>
            						</el-select>
            					</div>
            				</div>
            			</el-col>
            			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-pagination-nav">
            				<el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page.sync="currentPage" layout="prev, pager, next" :total="historiesTotal" :page-sizes="pagination_length" :page-size="perPage"></el-pagination>
            			</el-col>
            			<?php if(false && $bookingpress_disable_bulk_action){ ?>
            				<el-container v-if="multipleSelection.length > 0" class="bpa-default-card bpa-bulk-actions-card">
            					<el-button class="bpa-btn bpa-btn--icon-without-box bpa-bac__close-icon" @click="closeBulkAction">
            						<span class="material-icons-round">close</span>
            					</el-button>
            					<el-row type="flex" class="bpa-bac__wrapper">
            						<el-col class="bpa-bac__left-area" :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
            							<span class="material-icons-round">check_circle</span>
            							<p>{{ multipleSelection.length }}<?php esc_html_e( ' Items Selected', 'bookingpress-appointment-booking' ); ?></p>
            						</el-col>
            						<el-col class="bpa-bac__right-area" :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
            							<el-select class="bpa-form-control" v-model="bulk_action" placeholder="<?php esc_html_e( 'Select', 'bookingpress-appointment-booking' ); ?>"
            							popper-class="bpa-dropdown--bulk-actions">
            								<el-option v-for="item in bulk_options" :key="item.value" :label="item.label" :value="item.value"></el-option>
            							</el-select>
            							<el-button @click="bulk_actions" class="bpa-btn bpa-btn--primary bpa-btn__medium">
            								<?php esc_html_e( 'Go', 'bookingpress-appointment-booking' ); ?>
            							</el-button>
            						</el-col>
            					</el-row>
            				</el-container>
            			<?php } ?>
            		</el-row>
                 
                </div>
<!-- Fin pestaña historias -->

                <?php do_action('expansion_historias_add_target_container'); ?>
                <!-- Fin listahistoriasContainer -->
                
            </div> <!-- Fin Dual view container -->
            </div>
            <!-- Fin main historias -->
            
        </div>
        <!--Fin historias_y_pacientes-->
        
        <!-- SOBRANTE  POR AHI <div v-html=" "></div> -->
        
        
	</div>
</el-main>


<?php do_action('BPHC_bookingpress_expansion_histories_before_summary_modal') ?>

<el-dialog id="bphc_history_summary_modal" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob" modal-append-to-body=false :visible.sync="bp_hc_SummaryModal" :before-close="closeCustomerModal" fullscreen=true :close-on-press-escape="close_modal_on_esc">
    <!-- HEADER FROM CUSTOMER MODAL -->
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
                
                <h1 class="bpa-page-heading" style=""><?php esc_html_e( 'Resumen', 'bookingpress-appointment-booking' ); ?></h1>
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col">
				<!-- NO SAVE EN ESTE MODAL 
                <el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveCustomerDetails" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Save', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button>
                 -->
				<el-button class="bpa-btn" @click="bp_hc_openSummaryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    <!-- PREVIO ADD FROM CUSTOMER MODAL -->
    

<div class="bpa-dialog-body">
<div v-if="selected_patient" class="tws bpa-default-card bphc-summary-dialog-card bpa-db-card"  style="" >
        
        
    			<el-col class="bphc-patient-col"  :xs="24" :sm="24" :md="12" :lg="8" :xl="8" style="">
                    <div class="bphc_customer_card" style="margin-bottom:10px;">
                        <div class="avatar_row">
                            <el-avatar class="bphc-customer-avatar" :size="75" :src="selected_patient.customer_avatar"></el-avatar>
                        </div>
                        <div class="bphc_card">
                            <div class="header" style=""> <!--style="position: relative;"-->
                                
                                <strong class="customer_title text-gray-400" style="">{{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}</strong>
                                <div class="bphc-abs-10">
                                    
                                    <small class="bphc-customer-hcount" style="">
                                        156
                                        <svg style="width: 15px;align-self: flex-start;fill: slategrey;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16 12h-3c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1zm0-10v1H8V2c0-.55-.45-1-1-1s-1 .45-1 1v1H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm2 17H6c-.55 0-1-.45-1-1V8h14v10c0 .55-.45 1-1 1z"></path></svg>
                                    </small>
                                     
                                </div>
                            </div>
                            <div class="body">
                            
                                <el-collapse style="width: 100%;" v-model="bphc_layout.customerHeaderCard.activeNames">
                                    
                                    <el-collapse-item class="deft_down_arrow" name="1"  >
                                        <template #title>
                                        <div class="bphc-customer-item-column">
                                        <strong> {{ (moment((h.time||''), 'HH').format('hh:mm A'))!='invalid_date'? (moment((h.time||''), 'HH').format('hh:mm A')) :''}}</strong>
                                           <!--
                                           <strong>{{ ((new Date(selected_patient.customer_metadata.persona_fecha)).toLocaleDateString('es-ES',{ year:'numeric',month:'short',day:'2-digit'})||'') }}</strong>
                                           -->
                                           <strong>{{ (selected_patient.customer_metadata.persona_genero||'')}}</strong>
                                        </div>
                                        </template>
                                        <div class="bphc-customer-item-column">
                                            <strong>{{ (selected_patient.customer_email||'') }}</strong>
                                            <strong>{{ ('+' + selected_patient.customer_country_dial_code + ' ' + selected_patient.customer_phone||'') }}</strong>
                                            
                                        </div>
                                        <div class="bphc-customer-item-column" >
                                            <strong ></strong>
                                            <strong >{{ (selected_patient.dni||'') }}</strong>
                                        </div>
                                        <div class="bphc-customer-item-column">
                                            <strong>{{ (selected_patient.customer_metadata.obra_soc_seguros||'Sin especificar') }}</strong>
                                            <strong>{{ (selected_patient.customer_metadata[ obra_plan_meta_key ]||'') }}</strong>
                                        </div>
                                        
                                        <div class="bphc-customer-item-column">
                                            <strong>{{ (selected_patient.customer_metadata.persona_provincia||'') }}</strong>
                                            <strong>{{ (selected_patient.customer_metadata.persona_city||'') }}</strong>
                                        </div>
                                        <div class="bphc-customer-item-column">
                                            <strong style="grid-column: span 2;" >{{ (selected_patient.customer_metadata.persona_dir||'') }}</strong>
                                        </div>
                                        
                                    </el-collapse-item>
                                </el-collapse>
                            
    						  <span></span>
                            </div>
    				    </div>
                        
                        
                    </div><!-- Fin bphc Customer card-->
                    
                    <div class="bphc_customer_vitals  border rounded-md" style="box-shadow: 0 0 1px lightseagreen;margin-bottom: 10px;pading-right:10px;">
                        <div class="bphc_card" >
                        
                            <div class="header">
                                <strong>ULTIMOS SIGNOS VITALES</strong>
                            </div>
                            <div class="body">
                            <!--card body-->
        <div class="space-y-4"> 
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-ruler-vertical text-purple-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Altura</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">1.78</span> 
                    <span class="text-gray-400 text-sm">Mts</span> 
                </div> 
            </div>
             
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-weight text-blue-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Peso</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">74</span> 
                    <span class="text-gray-400 text-sm">Kg</span> 
                </div> 
                
            </div> 
            
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-yellow-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-calculator text-yellow-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">IMI</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">23.4</span> 
                    <span class="text-gray-400 text-sm">BMI</span> 
                </div> 
            </div> 
            
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-thermometer-half text-green-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Temperatura</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">36.5</span> 
                    <span class="text-gray-400 text-sm">°C</span> 
                </div>   
            </div> 

            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-lungs text-teal-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Frec. Respiratoria</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">17</span> 
                    <span class="text-gray-400 text-sm">r/m</span> 
                </div> 
            </div> 
            
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center mr-2"> 
                    <i class="fas fa-heartbeat text-red-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Presion Arterial</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">120/80</span> 
                    <span class="text-gray-400 text-sm">mmHg </span> 
                </div> 
            </div> 
            
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-pink-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-heart text-pink-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Frec. Cardiaca</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">62</span> 
                    <span class="text-gray-400 text-sm">Fc</span> 
                </div> 
            </div> 
        </div>
                            <!--fin card body-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="bphc_customer_files  border rounded-md" style="box-shadow: 0 0 3px lightseagreen;margin-bottom: 10px;pading-right:10px;">
                        <div class="bphc_card" >
                        
                            <div class="header">
                                <strong>ARCHIVOS</strong>
                            </div>
                            <div class="body">
                            <!--card body-->
        <div class="space-y-2"> <div class="flex items-center justify-between"> <div class="flex items-center"> <div class="w-6 h-6 rounded bg-red-100 flex items-center justify-center mr-2"> <i class="far fa-file-pdf text-red-500 text-xs"></i> </div> <span class="text-sm">EstudioSangre.pdf</span> </div> <div class="flex items-center space-x-2 text-xs text-gray-400"> <span>250KB</span> <span>|</span> <span>Feb 20, 2016</span> </div> </div> <div class="flex items-center justify-between"> <div class="flex items-center"> <div class="w-6 h-6 rounded bg-blue-100 flex items-center justify-center mr-2"> <i class="far fa-file-image text-blue-500 text-xs"></i> </div> <span class="text-sm">RadiografÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­a-01.jpeg</span> </div> <div class="flex items-center space-x-2 text-xs text-gray-400"> <span>6MB</span> <span>|</span> <span>Dic 10, 2015</span> </div> </div> </div>
                            <!--fin card body-->
                            </div>
                        </div>
                    </div>
				</el-col>
                
                <el-col class="bphc-patient-col"  :xs="24" :sm="24" :md="12" :lg="8" :xl="8" style="">
                    
                    <div class="bphc_customer_background  border rounded-md" style="
                        border-radius: 5px;
                        box-shadow: lightseagreen 0px 0px 1px;
                        margin-bottom: 15px;
                        padding: 6px 10px 40px 0;
                        min-height: 470px;">
                        <div class="bphc_card" >
                        
                            <div class="header">
                                <strong>ANTECEDENTES</strong>
                            </div>
                            <div class="body">
                            <!--card body-->

                                <div class="space-y-2">
                                    <sub>PERSONALES</sub>
                                    <div class="personales">
                                        <div class="mb-3"> <div class="flex justify-between"> <span class="text-sm">Colicos</span> <div class="flex items-center"> <div class="w-4 h-4 rounded-full bg-primary-100 flex items-center justify-center mr-2"> <i class="fas fa-check text-primary-500 text-xs"></i> </div> <span class="text-sm">Fuertes dolores con nÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡useas y vÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³mitos.</span> </div> </div> </div>
                                    </div>
                                    <sub>FAMILIARES</sub>
                                    <div class="familiares">
                                        <div class="flex justify-between"> <span class="text-sm">Diabetes</span> <div class="flex items-center"> <div class="w-4 h-4 rounded-full bg-primary-100 flex items-center justify-center mr-2"> <i class="fas fa-check text-primary-500 text-xs"></i> </div> <span class="text-sm">Abuelo del lado paterno, Abuelo del lado materno.</span> </div> </div>
                                    </div> 
                                </div>
                            <!--fin card body-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="bphc_customer_medications  border rounded-md" style="box-shadow: 0 0 3px lightseagreen;margin-bottom: 10px;pading-right:10px;">
                        <div class="bphc_card" >
                        
                            <div class="header">
                                <strong>MEDICAMENTOS</strong>
                            </div>
                            <div class="body">
                            <!--card body-->

                                <div class="space-y-2 text-gray-500 uppercase text-xs">
                                    <div class="medications">
                         
                                        <div v-if="selected_patient.historySummary && selected_patient.historySummary.consultation_data.medicamentos.length" class="mb-3"> 
                                            <div v-for="(item, index) in selected_patient.historySummary.consultation_data.medicamentos" :key="index" class="item_medicamento" style="margin-bottom:10px;"> 
                                                
                                                <span class="">{{ ( Intl.DateTimeFormat("es-ES",{year: "2-digit",month: "2-digit",day: "2-digit"}).format(new Date(item.fecha)) ) }}</span>
                                                
                                                    <span class="">{{item.nombre}}</span>
                                                    <span class="">{{item.dosis}}</span>
                                                    <span class="">{{item.frecuencia}}</span>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            <!--fin card body-->
                            </div>
                        </div>
                    </div>
                    
                </el-col>
                
                <el-col class="bphc-patient-col"  :xs="24" :sm="24" :md="12" :lg="8" :xl="8" style="">
                    
                    <div class="bphc_customer_background  border rounded-md" style="box-shadow: 0 0 3px lightseagreen;margin-bottom: 10px;pading-right:10px;">
                        <div class="bphc_card" >
                            <div class="header">
                                <strong>CONSULTAS DEL PACIENTE</strong>
                            </div>
                            <div class="body">
                            <!--card body-->
                                <div class="space-y-2">
                                    <sub>AGENDADAS</sub>
                                    <div class="agendadas">
                                        <div class="border-l-4 border-primary-400 bg-white rounded shadow-sm p-3 flex"> <div class="text-center mr-4"> <div class="text-lg font-bold">12</div> <div class="text-xs uppercase text-gray-500">Jul</div> </div> <div class="flex-1"> <div class="text-sm">Dolor de panza</div> </div> <div class="text-xs text-gray-500">4:35PM</div> </div>
                                    </div>
                                    <sub>PREVIAS</sub>
                                    <div class="previas">
                                                                                
                                        <div class="border-l-4 border-teal-400 bg-white rounded shadow-sm p-3 flex"> <div class="text-center mr-4"> <div class="text-lg font-bold">12</div> <div class="text-xs uppercase text-gray-500">Jul</div> </div> <div class="flex-1"> <div class="text-sm">Dolor de panza</div> <div class="text-xs text-gray-500"> <div>K20 - Gastritis Aguda</div> <div>Retapan Sobre 20ML</div> </div> </div> <div class="text-xs text-gray-500">4:35PM</div> </div>
                                    </div>
                                    
                                </div>
                            <!--fin card body-->
                            </div>
                        </div>
                    </div>
                    
                </el-col>
                
</div>

</div>
</el-dialog>
<!-- HistoriesSummary FIN -->





<!--Original FULL View REGISTRO DE NUEVA HISTORIA custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" -->
<!-- v-if="bp_hc_view_mode.full_form" -->
<el-dialog v-if="bp_hc_view_mode.full_form" id="bphc_history_add_modal" fullscreen=true modal-append-to-body="false" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" :visible.sync="bp_hc_ConsultationModal" :before-close="closeCustomerModal"  :close-on-press-escape="close_modal_on_esc">
<div v-if="bp_hc_bookingpress_staffmember_id && newRecord.bookingpress_customer_id" >

    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		<h1 class="bpa-page-heading" v-if="newRecord.update_id == 0"><?php esc_html_e( 'Nuevo Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> </h1>
		<h1 class="bpa-page-heading" v-else>
            {{ ( newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id? '<?php esc_html_e( 'Editar ', 'bookingpress-appointment-booking' ); ?>':'' ) }}
            <?php esc_html_e( 'Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> {{ (Number(newRecord.update_id)?('#'+Number(newRecord.update_id)):'') }}
        </h1>
			</el-col>
			<el-col v-if="newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id" :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				<el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="bphc_save_historyRecord" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Guardar Registro', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button> 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
            <el-col v-else :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
	
	<div class="bpa-dialog-body">
    
		<div class="bpa-back-loader-container" v-if="is_display_loader == '1'">
			<div class="bpa-back-loader"></div>
		</div>
        
		<div class="bpa-form-row">
			<el-row>
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-db-sec-heading">
						<el-row type="flex" align="middle">
							<!--
                            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
								<div class="db-sec-left">
									<h2 class="bpa-page-heading"><?php esc_html_e( 'Información General', 'bookingpress-appointment-booking' ); ?></h2>
								</div>
							</el-col>
                            -->
						</el-row>
					</div>
                    <!-- formulario registro body card -->			
					<div class="bpa-default-card bpa-db-card">
                    
                    
<!-- VISTA 2: FORMULARIO DE REGISTRO @back="goBack" -->
                <div  >
                    <el-form ref="recordForm" :model="newRecord"  style="margin-top:20px;">
                    <el-page-header @back="bp_hc_CloseHistoryModal()" :content="'Paciente '+selected_patient.customer_firstname+' - '+newRecord.staff_member_name " ></el-page-header>
                    <div class="first-desc-form" style="display: flex;justify-content:space-between;">
                        <div class="fdform_left" style="text-align: start;overflow: clip;min-width: 50px;max-height: 40px;text-overflow: ellipsis;justify-self: center;">
                            <span class="bpa-form-label">{{newRecord.staff_member_name }}</span>
                        </div>
                        <div class="fdform_left" style="text-align: start;">
                            <span class="bpa-form-label text-gray-300">Paciente {{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}</span>
                        </div>
                        <div class="fdform_right" style="display: flex;justify-content:end;align-self:end;max-width:180px;">
                            <div v-if="!newRecord.is_block_service && (!newRecord.id || newRecord.id == 'add_new') || (!newRecord.service_name && !newRecord.bookingpress_appointment_id)">
                                <el-form-item ref="bphcFormService" prop="service_id"  :rules="{required:true, message:'especialidad requerida', trigger: 'blur', validator: validateService}" >
                                <el-select  class="bpa-form-control bpa-from-select-tab" v-model="bp_hc_selected_service_id" 
                                
                                @change="bphc_changeCurrentService"
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                   <el-option value="0" label=" " v-show="false" disabled="true"></el-option>
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_id" ></el-option> 
            						</el-option-group>
            					</el-select>
                                </el-form-item>
                                <!--
            					<el-select class="bpa-form-control bpa-from-select-tab" v-model="newRecord.service_name"
                                required 
                                @change=""
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_name" ></el-option> 
            						</el-option-group>
            					</el-select>
                                -->
                                 <!-- :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`" -->
                            </div>
                            <div v-else>
                                <el-tag class="bpa-form-label" style="padding: 10px;width: 100%;" type="info">{{ newRecord.service_name }}</el-tag>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!--agui form-->
                    <div class="bphc-form-grid" style="margin-top:20px;">
                        
                         <!-- en la misma columna del grid -->
                        <!-- Seccion Signos Vitales -->
                        <el-card class="bphc-vitales " shadow="never" header="Signos Vitales" style="" >
                            <el-row :gutter="20" :style="{ marginLeft: '', marginRight: '' }" style="padding: 10px;" >
                            
                            <!-- cambiar prop y model a altura -->
                                <el-row :gutter="20" style="" >
                                    <el-form-item inline-message="true" label="Altura" prop="vitales.altura"  > <!-- :rules="{ required: true, message: 'requerido', trigger: 'blur' }" -->
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-ruler-vertical text-purple-500"></i></div>
                                                <span class="bpa-form-label">Altura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.altura" v-model="newRecord.vitales.altura" class="bphc_item_input" placeholder=" 1.78 (Mts) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                            <!-- cambiar prop y model a peso -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Peso" prop="vitales.peso"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-weight text-blue-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Peso</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.peso" v-model="newRecord.vitales.peso" class="bphc_item_input" placeholder="74 (Kg) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- temperatura -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Temperatura" prop="vitales.temperatura"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-thermometer-half text-green-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Temperatura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.temperatura" v-model="newRecord.vitales.temperatura" class="bphc_item_input" placeholder="36.5 (°C) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- frecuenciaRespiratoria -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Frec. Respiratoria" prop="vitales.frecuenciaRespiratoria"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-lungs text-teal-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Respiratoria</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.frecuenciaRespiratoria" v-model="newRecord.vitales.frecuenciaRespiratoria" class="bphc_item_input" placeholder="17 (r/m)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- presionArterial -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" style="display:flex;align-items:end;justify-content:space-between;" label="Presión Arterial" prop="vitales.presionArterial"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heartbeat text-red-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Presión Arterial</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.presionArterial" v-model="newRecord.vitales.presionArterial" class="bphc_item_input" placeholder="120/80 (mmHg)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                                <!-- saturacionOxigeno -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Sat. O2" prop="vitales.saturacionOxigeno"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><span style="width: 18px; display: inline-block;"><img src="<?php echo bookingpress_mod_icon_helper( 'satO2' ); ?>" style="margin-left: -2px;" /></span></div>
                                                <span class="bpa-form-label">Sat. O2</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.saturacionOxigeno" v-model="newRecord.vitales.saturacionOxigeno" class="bphc_item_input" placeholder="95% (SpO2)" ></el-input>
                                    </el-form-item>
                                </el-row>
                           
                           <!-- frecuenciaCardiaca -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Frec. Cardíaca" prop="vitales.frecuenciaCardiaca"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heart text-pink-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Cardíaca</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.frecuenciaCardiaca" v-model="newRecord.vitales.frecuenciaCardiaca" class="bphc_item_input" placeholder="62 (Fc)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           
                                
                                
                                
                            </el-row>
                        </el-card>
                        <!-- Fin Seccion Signos Vitales -->
                        
                        
                        
                        
                        <!-- Seccion General -->
                        <el-card class="bphc-info " shadow="never" header="Información General" style="grid-row: span 2;" >
                        
                           <el-form-item label="Motivo de Consulta" prop="general.motivoConsulta" >
                               <el-input id="general.motivoConsulta" type="textarea" v-model="newRecord.general.motivoConsulta"></el-input>
                           </el-form-item>
                           <!--
                           <el-form-item label="Enfermedad Actual" prop="general.enfermedadActual">
                               <el-input id="general.enfermedadActual" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           -->
                           <el-form-item label="Diagnostico" prop="general.diagnostico">
                               <el-input id="general.diagnostico" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="Tratamiento" prop="general.tratamiento">
                               <el-input id="general.tratamiento" type="textarea" :rows="4" v-model="newRecord.general.tratamiento"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="nota" prop="general.notas">
                               <el-input id="general.notas" type="textarea" :rows="4" v-model="newRecord.general.notas"></el-input>
                           </el-form-item>
                           
                        </el-card>
                        <!-- Fin Seccion General -->
                        
                        <!-- Agrupacion medicamentos Y archivos -->
                        <div class="bphc-group-meds-files">
                            <!-- Seccion Medicamentos  -->
                             <el-card class="bphc-meds" shadow="never" header="Medicamentos" >
                                <div v-for="(item, index) in newRecord.medicamentos" :key="index" style="margin-bottom:10px;">
                                    <el-row :gutter="10" class="med-item">
                                        <el-col :span="8"><el-input placeholder="Nombre del medicamento" v-model="item.nombre"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Dosis" v-model="item.dosis"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Frecuencia" v-model="item.frecuencia"></el-input></el-col>
                                        <el-col :span="4" align="right"><el-button @click.prevent="removeMedicamento(item)" type="danger" icon="el-icon-delete" circle></el-button></el-col>
                                    </el-row>
                                </div>
                                <el-button @click="addMedicamento" size="small">+ Añadir Medicamento</el-button>
                            </el-card>
                            <!-- Fin Seccion Medicamentos  -->
                            <!-- Seccion Subida de Archivos :before-upload="checkUploadedFile"  -->
                            <el-card shadow="never" header="Archivos Adjuntos" v-if=" typeof newRecord.archivos !='undefined' " >
                                <el-upload v-if=" typeof newRecord.archivos !='undefined' "
                                    class="upload-demo" action="<?php echo wp_nonce_url(admin_url('admin-ajax.php') . '?action=bookingpress_upload_record_file', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>"
                                    :file-list="newRecord.archivos"
                                    
                                    :on-success="bphc_upload_record_file"
                                    
                                    :on-remove="bphc_handleRemove_record_file"
                                    :on-error="bphc_upload_record_file_err"
                                    multiple="false"
                                    :limit="10"
                                    :on-preview="bphc_handlePreview_record_file"
                                    :on-exceed="bphc_handleExceed_limit_files"
                                    >
                                    <el-button size="small" type="primary">Agregar archivo</el-button>
                                    <div slot="tip" class="el-upload__tip">Archivos de imagen o doc. con un tamaño menor de 2MB</div>
                                </el-upload>
                            </el-card>
                            <!-- Fin Archivos -->
                        </div>
                        <!-- Fin Agrupacion medicamentos Y archivos -->
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Alergias v-if="newRecord.alergias" -->
                         <el-card class="bphc-alergs" shadow="never" header="Alergias"  >
                            <div v-for="(item, index) in newRecord.alergias" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item alerg-item">
                                    <input type="hidden" name="alerg_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center">
                                                <el-col :span="20" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAlergia(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Alergia:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="Alergia" v-model="item.alergia"></el-input>
                                                </el-col>
                                                <el-col :span="6">
                                                <span>&nbsp;</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input type="textarea" :rows="2" placeholder="reaccion o motivo" v-model="item.reaccion_o_motivo"></el-input>
                                                </el-col>
                                            </el-row>
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAlergia" size="small">+ Añadir Alergia</el-button>
                        </el-card>
                        <!-- Fin Seccion Alergias  -->
                        <?php } ?>
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Antecedentes  v-if="newRecord.antecedentes" -->
                         <el-card class="bphc-antc" shadow="never" header="Antecedentes"  >
                            <div v-for="(item, index) in newRecord.antecedentes" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item antc-item">
                                    <input type="hidden" name="antc_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center"> <!-- style="padding: 2px 0;align-items: center;display: flex;flex-direction: row;" -->
                                                <el-col :span="6" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                
                                                </el-col>
                                                <el-col :span="14" >
                                                <el-select placeholder="tipo" v-model="item.tipo" style="width: 100%;transform: scaleY(0.9);">
                                                    <el-option label="Personal" value="personal"></el-option>
                                                    <el-option label="Familiar" value="familiar"></el-option>
                                                </el-select>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAntecedente(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Antecedente:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="titulo - descripcion corta" v-model="item.descripcion" size="255"></el-input>
                                                
                                                </el-col>
                                            </el-row>
                                            <el-row >
                                                <el-col :span="24">
                                                    <el-col :span="6">
                                                    <span>&nbsp;</span>
                                                    </el-col>
                                                    <el-col :span="18">
                                                    <el-input type="textarea" :rows="2" placeholder="detalle - descripcion" v-model="item.detalle"></el-input>
                                                    </el-col>
                                                </el-col>
                                            </el-row>
                                            
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAntecedente" size="small">+ Añadir Antecedente</el-button>
                        </el-card>
                        <!-- Fin Seccion Antecedentes  -->
                        <?php } ?>

                        
                        <!--
                        <el-form-item style="margin-top: 30px;">
                            <el-button type="primary" @click="saveRecord">Guardar Historia Clinica</el-button>
                            <el-button @click="bp_hc_CloseHistoryModal" >Cancelar</el-button>
                        </el-form-item>
                        -->
                    </div>
                    </el-form>
                </div>
                    
                    
                    
                    
                    
                    
					</div>
                    <!-- Fin formulario registro body card -->
                    
                    <!--
                    <div style="margin: 40px;background: whitesmoke;text-align: right;">
                        <button onclick="HistoryImp()" class="bpa-btn button-primary">Imprimir Hoja</button>
                        
                        
                    </div>
                    -->
				</el-col>
			</el-row>
		</div>
	</div>
    

</div> 	
<div v-else  style="">

    
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    <!--
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    -->
    <div class="bpa-dialog-body" style="display: flex;align-items: center;justify-content: center;min-height: 60vh;width: 100%;">
        <div class="bpa-default-card bpa-db-card" style="padding-bottom: 40px;">
            <div class="bpa-form-row" >
                <h1 class="bpa-page-heading" style="display: flex; flex-wrap:wrap;">
                    <div class="no_sel_paciente_1">NO SE SELECCIONO PACIENTE</div>
                    <div class="no_sel_paciente_2">&nbsp;O NO SE HA SELECCIONADO UN TURNO</div>
                </h1>
            </div>
        </div>
    </div>
    <!-- 
    <div v-if="!newRecord.bookingpress_customer_id" class="bpa-form-label" style="display: flex;align-self:center;width: 100%;height:100%;font-size: larger;">
    <h1><span class="">NO SE SELECCIONO PACIENTE o NO SE HA SELECCIONADO UN TURNO VINCULADO A UNO</span></h1>
    </div>
    -->

</div>   
</el-dialog>


<!-- FIN Original VIEW view_mode.full_form -->

<?php


/**
 * 
 * 
 * 


<!--Dual View MODE - REGISTRO DE NUEVA HISTORIA custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" -->

<el-dialog id="bphc_history_add_modal" modal="false" modal-append-to-body="true" append-to-body="true" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" :visible.sync="bp_hc_ConsultationModal" :before-close="closeCustomerModal"  :close-on-press-escape="close_modal_on_esc">
<div v-if="bp_hc_bookingpress_staffmember_id && newRecord.bookingpress_customer_id" >

    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		<h1 class="bpa-page-heading" v-if="newRecord.update_id == 0"><?php esc_html_e( 'Nuevo Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> </h1>
		<h1 class="bpa-page-heading" v-else>
            {{ ( newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id? '<?php esc_html_e( 'Editar ', 'bookingpress-appointment-booking' ); ?>':'' ) }}
            <?php esc_html_e( 'Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> {{ (Number(newRecord.update_id)?('#'+Number(newRecord.update_id)):'') }}
        </h1>
			</el-col>
			<el-col v-if="newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id" :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				<el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="bphc_save_historyRecord" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Guardar Registro', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button> 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
            <el-col v-else :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
	
	<div class="bpa-dialog-body">
    
		<div class="bpa-back-loader-container" v-if="is_display_loader == '1'">
			<div class="bpa-back-loader"></div>
		</div>
        
		<div class="bpa-form-row">
			<el-row>
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-db-sec-heading">
						<el-row type="flex" align="middle">
							<!--
                            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
								<div class="db-sec-left">
									<h2 class="bpa-page-heading"><?php esc_html_e( 'Información General', 'bookingpress-appointment-booking' ); ?></h2>
								</div>
							</el-col>
                            -->
						</el-row>
					</div>
                    <!-- formulario registro body card -->			
					<div class="bpa-default-card bpa-db-card">
                    
                    
<!-- VISTA 2: FORMULARIO DE REGISTRO @back="goBack" -->
                <div  >
                    <el-form ref="recordForm" :model="newRecord"  style="margin-top:20px;">
                    <el-page-header @back="bp_hc_CloseHistoryModal()" :content="'Paciente '+selected_patient.customer_firstname+' - '+newRecord.staff_member_name " ></el-page-header>
                    <div class="first-desc-form" style="display: flex;justify-content:space-between;">
                        <div class="fdform_left" style="text-align: start;overflow: clip;min-width: 50px;max-height: 40px;text-overflow: ellipsis;justify-self: center;">
                            <span class="bpa-form-label">{{newRecord.staff_member_name }}</span>
                        </div>
                        <div class="fdform_left" style="text-align: start;">
                            <span class="bpa-form-label text-gray-300">Paciente {{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}</span>
                        </div>
                        <div class="fdform_right" style="display: flex;justify-content:end;align-self:end;max-width:180px;">
                            <div v-if="!newRecord.is_block_service && (!newRecord.id || newRecord.id == 'add_new') || (!newRecord.service_name && !newRecord.bookingpress_appointment_id)">
                                <el-form-item ref="bphcFormService" prop="service_id"  :rules="{required:true, message:'especialidad requerida', trigger: 'blur', validator: validateService}" >
                                <el-select  class="bpa-form-control bpa-from-select-tab" v-model="bp_hc_selected_service_id" 
                                
                                @change="bphc_changeCurrentService"
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                   <el-option value="0" label=" " v-show="false" disabled="true"></el-option>
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_id" ></el-option> 
            						</el-option-group>
            					</el-select>
                                </el-form-item>
                                <!--
            					<el-select class="bpa-form-control bpa-from-select-tab" v-model="newRecord.service_name"
                                required 
                                @change=""
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_name" ></el-option> 
            						</el-option-group>
            					</el-select>
                                -->
                                 <!-- :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`" -->
                            </div>
                            <div v-else>
                                <el-tag class="bpa-form-label" style="padding: 10px;width: 100%;" type="info">{{ newRecord.service_name }}</el-tag>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!--agui form-->
                    <div class="bphc-form-grid" style="margin-top:20px;">
                        
                         <!-- en la misma columna del grid -->
                        <!-- Seccion Signos Vitales -->
                        <el-card class="bphc-vitales " shadow="never" header="Signos Vitales" style="" >
                            <el-row :gutter="20" :style="{ marginLeft: '', marginRight: '' }" style="padding: 10px;" >
                            
                            <!-- cambiar prop y model a altura -->
                                <el-row :gutter="20" style="" >
                                    <el-form-item inline-message="true" label="Altura" prop="vitales.altura"  > <!-- :rules="{ required: true, message: 'requerido', trigger: 'blur' }" -->
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-ruler-vertical text-purple-500"></i></div>
                                                <span class="bpa-form-label">Altura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.altura" v-model="newRecord.vitales.altura" class="bphc_item_input" placeholder=" 1.78 (Mts) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                            <!-- cambiar prop y model a peso -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Peso" prop="vitales.peso"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-weight text-blue-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Peso</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.peso" v-model="newRecord.vitales.peso" class="bphc_item_input" placeholder="74 (Kg) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- temperatura -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Temperatura" prop="vitales.temperatura"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-thermometer-half text-green-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Temperatura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.temperatura" v-model="newRecord.vitales.temperatura" class="bphc_item_input" placeholder="36.5 (°C) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- frecuenciaRespiratoria -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Frec. Respiratoria" prop="vitales.frecuenciaRespiratoria"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-lungs text-teal-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Respiratoria</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.frecuenciaRespiratoria" v-model="newRecord.vitales.frecuenciaRespiratoria" class="bphc_item_input" placeholder="17 (r/m)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- presionArterial -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" style="display:flex;align-items:end;justify-content:space-between;" label="Presión Arterial" prop="vitales.presionArterial"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heartbeat text-red-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Presión Arterial</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.presionArterial" v-model="newRecord.vitales.presionArterial" class="bphc_item_input" placeholder="120/80 (mmHg)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                                <!-- saturacionOxigeno -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Sat. O2" prop="vitales.saturacionOxigeno"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><span style="width: 18px; display: inline-block;"><img src="<?php echo bookingpress_mod_icon_helper( 'satO2' ); ?>" style="margin-left: -2px;" /></span></div>
                                                <span class="bpa-form-label">Sat. O2</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.saturacionOxigeno" v-model="newRecord.vitales.saturacionOxigeno" class="bphc_item_input" placeholder="95% (SpO2)" ></el-input>
                                    </el-form-item>
                                </el-row>
                           
                           <!-- frecuenciaCardiaca -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Frec. Cardíaca" prop="vitales.frecuenciaCardiaca"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heart text-pink-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Cardíaca</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.frecuenciaCardiaca" v-model="newRecord.vitales.frecuenciaCardiaca" class="bphc_item_input" placeholder="62 (Fc)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           
                                
                                
                                
                            </el-row>
                        </el-card>
                        <!-- Fin Seccion Signos Vitales -->
                        
                        
                        
                        
                        <!-- Seccion General -->
                        <el-card class="bphc-info " shadow="never" header="Información General" style="grid-row: span 2;" >
                        
                           <el-form-item label="Motivo de Consulta" prop="general.motivoConsulta" >
                               <el-input id="general.motivoConsulta" type="textarea" v-model="newRecord.general.motivoConsulta"></el-input>
                           </el-form-item>
                           <!--
                           <el-form-item label="Enfermedad Actual" prop="general.enfermedadActual">
                               <el-input id="general.enfermedadActual" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           -->
                           <el-form-item label="Diagnostico" prop="general.diagnostico">
                               <el-input id="general.diagnostico" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="Tratamiento" prop="general.tratamiento">
                               <el-input id="general.tratamiento" type="textarea" :rows="4" v-model="newRecord.general.tratamiento"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="nota" prop="general.notas">
                               <el-input id="general.notas" type="textarea" :rows="4" v-model="newRecord.general.notas"></el-input>
                           </el-form-item>
                           
                        </el-card>
                        <!-- Fin Seccion General -->
                        
                        <!-- Agrupacion medicamentos Y archivos -->
                        <div class="bphc-group-meds-files">
                            <!-- Seccion Medicamentos  -->
                             <el-card class="bphc-meds" shadow="never" header="Medicamentos" >
                                <div v-for="(item, index) in newRecord.medicamentos" :key="index" style="margin-bottom:10px;">
                                    <el-row :gutter="10" class="med-item">
                                        <el-col :span="8"><el-input placeholder="Nombre del medicamento" v-model="item.nombre"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Dosis" v-model="item.dosis"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Frecuencia" v-model="item.frecuencia"></el-input></el-col>
                                        <el-col :span="4" align="right"><el-button @click.prevent="removeMedicamento(item)" type="danger" icon="el-icon-delete" circle></el-button></el-col>
                                    </el-row>
                                </div>
                                <el-button @click="addMedicamento" size="small">+ Añadir Medicamento</el-button>
                            </el-card>
                            <!-- Fin Seccion Medicamentos  -->
                            <!-- Seccion Subida de Archivos :before-upload="checkUploadedFile"  -->
                            <el-card shadow="never" header="Archivos Adjuntos" v-if=" typeof newRecord.archivos !='undefined' " >
                                <el-upload v-if=" typeof newRecord.archivos !='undefined' "
                                    class="upload-demo" action="<?php echo wp_nonce_url(admin_url('admin-ajax.php') . '?action=bookingpress_upload_record_file', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>"
                                    :file-list="newRecord.archivos"
                                    
                                    :on-success="bphc_upload_record_file"
                                    
                                    :on-remove="bphc_handleRemove_record_file"
                                    :on-error="bphc_upload_record_file_err"
                                    multiple="false"
                                    :limit="10"
                                    :on-preview="bphc_handlePreview_record_file"
                                    :on-exceed="bphc_handleExceed_limit_files"
                                    >
                                    <el-button size="small" type="primary">Agregar archivo</el-button>
                                    <div slot="tip" class="el-upload__tip">Archivos de imagen o doc. con un tamaño menor de 2MB</div>
                                </el-upload>
                            </el-card>
                            <!-- Fin Archivos -->
                        </div>
                        <!-- Fin Agrupacion medicamentos Y archivos -->
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Alergias v-if="newRecord.alergias" -->
                         <el-card class="bphc-alergs" shadow="never" header="Alergias"  >
                            <div v-for="(item, index) in newRecord.alergias" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item alerg-item">
                                    <input type="hidden" name="alerg_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center">
                                                <el-col :span="20" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAlergia(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Alergia:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="Alergia" v-model="item.alergia"></el-input>
                                                </el-col>
                                                <el-col :span="6">
                                                <span>&nbsp;</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input type="textarea" :rows="2" placeholder="reaccion o motivo" v-model="item.reaccion_o_motivo"></el-input>
                                                </el-col>
                                            </el-row>
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAlergia" size="small">+ Añadir Alergia</el-button>
                        </el-card>
                        <!-- Fin Seccion Alergias  -->
                        <?php } ?>
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Antecedentes  v-if="newRecord.antecedentes" -->
                         <el-card class="bphc-antc" shadow="never" header="Antecedentes"  >
                            <div v-for="(item, index) in newRecord.antecedentes" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item antc-item">
                                    <input type="hidden" name="antc_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center"> <!-- style="padding: 2px 0;align-items: center;display: flex;flex-direction: row;" -->
                                                <el-col :span="6" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                
                                                </el-col>
                                                <el-col :span="14" >
                                                <el-select placeholder="tipo" v-model="item.tipo" style="width: 100%;transform: scaleY(0.9);">
                                                    <el-option label="Personal" value="personal"></el-option>
                                                    <el-option label="Familiar" value="familiar"></el-option>
                                                </el-select>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAntecedente(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Antecedente:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="titulo - descripcion corta" v-model="item.descripcion" size="255"></el-input>
                                                
                                                </el-col>
                                            </el-row>
                                            <el-row >
                                                <el-col :span="24">
                                                    <el-col :span="6">
                                                    <span>&nbsp;</span>
                                                    </el-col>
                                                    <el-col :span="18">
                                                    <el-input type="textarea" :rows="2" placeholder="detalle - descripcion" v-model="item.detalle"></el-input>
                                                    </el-col>
                                                </el-col>
                                            </el-row>
                                            
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAntecedente" size="small">+ Añadir Antecedente</el-button>
                        </el-card>
                        <!-- Fin Seccion Antecedentes  -->
                        <?php } ?>

                        
                        <!--
                        <el-form-item style="margin-top: 30px;">
                            <el-button type="primary" @click="saveRecord">Guardar Historia Clinica</el-button>
                            <el-button @click="bp_hc_CloseHistoryModal" >Cancelar</el-button>
                        </el-form-item>
                        -->
                    </div>
                    </el-form>
                </div>
                    
                    
                    
                    
                    
                    
					</div>
                    <!-- Fin formulario registro body card -->
                    
                    <!--
                    <div style="margin: 40px;background: whitesmoke;text-align: right;">
                        <button onclick="HistoryImp()" class="bpa-btn button-primary">Imprimir Hoja</button>
                        
                        
                    </div>
                    -->
				</el-col>
			</el-row>
		</div>
	</div>
    

</div> 	
<div v-else  style="">

    
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    <!--
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    -->
    <div class="bpa-dialog-body" style="display: flex;align-items: center;justify-content: center;min-height: 60vh;width: 100%;">
        <div class="bpa-default-card bpa-db-card" style="padding-bottom: 40px;">
            <div class="bpa-form-row" >
                <h1 class="bpa-page-heading" style="display: flex; flex-wrap:wrap;">
                    <div class="no_sel_paciente_1">NO SE SELECCIONO PACIENTE</div>
                    <div class="no_sel_paciente_2">&nbsp;O NO SE HA SELECCIONADO UN TURNO</div>
                </h1>
            </div>
        </div>
    </div>
    <!-- 
    <div v-if="!newRecord.bookingpress_customer_id" class="bpa-form-label" style="display: flex;align-self:center;width: 100%;height:100%;font-size: larger;">
    <h1><span class="">NO SE SELECCIONO PACIENTE o NO SE HA SELECCIONADO UN TURNO VINCULADO A UNO</span></h1>
    </div>
    -->

</div>   
</el-dialog>



*/



