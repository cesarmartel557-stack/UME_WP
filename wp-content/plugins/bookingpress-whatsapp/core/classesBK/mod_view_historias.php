<?php

   	global $bookingpress_ajaxurl, $bookingpress_common_date_format,$BookingPressPro;
	$bookingpress_common_datetime_format = $bookingpress_common_date_format . ' HH:mm:ss';

	$bookingpress_disable_bulk_action = 0;
    
	if ($BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
		$bookingpress_disable_bulk_action = 1;
	}
    
    
    add_action( 'admin_footer', function(){ 
        
                                /* <div class="flex-col">
                                <el-tag effect="light">Consultorio ...</el-tag>
                                </div>*/
        
        ?> 
        
<style>

@import url(https://fonts.googleapis.com/css2?family=Lato&display=swap);
@import url(https://fonts.googleapis.com/css2?family=Open+Sans&display=swap);

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
        
        </style>
        
        <style>
    /*
    .el-icon-arrow-right:before {
        content: "";
    }
    .el-icon-arrow-right:before {
        content: "";
        content: "\e6e0";
    }
        
        #all-page-main-container .historias_y_pacientes{
            display:flex;
            gap: 16px;
            align-items:flex-start;
        }
        #all-page-main-container .historias_y_pacientes .w25min{
            flex: 0 0 28rem;
            max-width: 100%;
            min-width: 0;
        }
        #all-page-main-container .historias_y_pacientes .main-historias{
            flex: 1 1 auto;
            min-width: 0;
        }

        //Table container: better scroll and sticky header
        #all-page-main-container .bpa-table-container{
            overflow: hidden;
            border-radius: 6px;
            background: #fff;
        }
        #all-page-main-container .bpa-table-container .el-table__header-wrapper{
            position: sticky;
            top: 0;
            z-index: 2;
            background: #fff;
        }
        #all-page-main-container .bpa-table-container .el-table__body-wrapper{
            max-height: 60vh;
            overflow: auto;
        }
        // Horizontal scroll safety for very small screens
        #all-page-main-container .bpa-tc__wrapper{ overflow-x:auto; }
        #all-page-main-container .bpa-tc__wrapper .el-table{ min-width: 420px; }

        // Smaller avatar and tighter row spacing
        #all-page-main-container .bpa-table-column-avatar{
            width: 28px; height: 28px; margin-right: 8px; border-radius: 50%; overflow: hidden;
        }
        #all-page-main-container .el-table .cell{ align-items:center; display:flex; gap:8px; }
        #all-page-main-container .link-paciente{ display:flex; align-items:center; gap:8px; cursor:pointer; }

        // Historias list styling
        #all-page-main-container .subt-historias h2{ margin: 4px 0 12px; font-size: 18px; }
        #all-page-main-container .lista-historias{ display:flex; flex-direction:column; gap:12px; }
        #all-page-main-container .historia-item{
            background:#fff; border:1px solid #e6e6e6; border-radius:6px; padding:12px;
        }
        #all-page-main-container .linea-tiempo{ width:2px; background:#eee; min-height:10px; display:none; }

        // Spacing for the DNI search row
        #all-page-main-container .bpa-table-filter{ margin-bottom: 12px; }

        // Responsive: stack columns, show histories first on small screens
        @media (max-width: 992px){
            #all-page-main-container .historias_y_pacientes{ flex-direction: column; }
            #all-page-main-container .historias_y_pacientes .main-historias{ order: 1; }
            #all-page-main-container .historias_y_pacientes .w25min{ order: 2; width:100%; }
            #all-page-main-container .bpa-tc__wrapper .el-table{ min-width: 360px; }
            #all-page-main-container .bpa-table-container .el-table__body-wrapper{ max-height: 40vh; }
        }

        @media (max-width: 576px){
            #all-page-main-container .bpa-tc__wrapper .el-table{ min-width: 320px; }
            #all-page-main-container .bpa-table-column-avatar{ width: 24px; height:24px; }
            #all-page-main-container .subt-historias h2{ font-size: 16px; }
        }
        
        */      
     </style>        
        <script>
        /**
        <div style="border: 2px solid green;">
        <button class="button" onclick="locuraUpdate()" id="updateeMax" style="min-width: 100px;min-height: 50px;">updateee</button>
        <div class="locura"></div>
        </div>
         function locuraUpdate(){
            jQuery('#wpwrap').load( location.href+" #wpwrap");
            
        }
        */
        </script>
        <?php },10); ?>

    


<el-main class="bpa-main-listing-card-container bpa-default-card bpa--is-page-non-scrollable-mob " :class="(bookingpress_staff_customize_view == 1 ) ? 'bpa-main-list-card__is-staff-custom-view':''" id="all-page-main-container">
    

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
    
    <div>

       
                    <span class="bpa-form-label"><?php esc_html_e( 'Service', 'bookingpress-appointment-booking' ); ?></span>
					<el-select class="bpa-form-control bpa-from-select-tab" v-model="bp_hc_selected_service_id" filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_id" :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`"></el-option>
						</el-option-group>
					</el-select>
    
    
    <el-select class="bpa-form-control bpa-from-select-tab" v-model="search_staff_member_name" multiple filterable collapse-tags 
	placeholder=""
	:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
		<el-option v-for="item in search_staff_member_list" :key="item.value" :label="item.text" :value="item.value">	
		</el-option>
	</el-select>
    
    
    </div>

</div>
-->
 
	<el-row type="flex" class="variapaddding-bpa-mlc-head-wrap" style="border-bottom: 1px solid var(--bpa-gt-gray-300);padding:20px 24px 20px 30px;" >
		<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-mlc-left-heading" style="align-self: flex-start;padding-top: 20px;" >
            <div style="display: flex;flex-direction: column;align-items:start;gap:20px;">
			<h1 class="bpa-page-heading"><?php esc_html_e( 'Historias Clinicas', 'bookingpress-appointment-booking' ); ?></h1>
            
            
            <div v-if=""  style="display: flex;align-items: center;min-width: 150px;">
                <h2 v-if="selected_patient" class="bpa-form-label" style="margin-bottom: 0;" >
    				<span  style="font-family: 'Inter';font-weight: 300;font-size: 13px;color: lightslategrey;text-transform: uppercase;display: flex;flex-wrap:wrap;">
                        <div class="historias-del-p-msg" style="width: 100%;">
                        <span class="">Paciente:</span>
                        </div>
                        <div>
                            <span  class="" >{{ (selected_patient.customer_lastname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}&nbsp;</span>
                            <!--<span>&nbsp;</span>-->
                        </div>
                        <div>
    					   <span v-if="selected_patient.dni" class="" >DNI&nbsp;{{ selected_patient.dni }}</span>
                        </div>
    				</span>
    			</h2>
            </div>
            
            </div>
		</el-col>
		<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
			<div class="quitada-bpa-hw-right-btn-group">
            <!--<a class="button-primary" @click="toggle_sepia" >Sepia</a>-->
<!--  --FILTRO-- Buscador por DNI -->
            		<div class="bpa-table-filter is-align-right bp-hc-filter" style="border-bottom: 0;padding-right: 0;">
            			<el-row type="flex" :gutter="16" align="right" class="justify-end">
            				<el-col :xs="24" :sm="12" :md="8" :lg="6" :xl="6" style="min-width: 250px;">
            					<el-input class="bpa-form-control" v-model="dni_query" placeholder="Ingrese DNI minimo 3 digitos "></el-input>
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
                
                <!-- MOMENT FORMAT {{moment().format("YYYY-MM-DD")}} -->
<!--  --aqui estaba el FILTRO-- Buscador por DNI -->




<!-- FIN LISTA PACIENTES (oculto por flujo DNI primero) -->
		<div class="historias_y_pacientes" style="width: 100%;" >
        
		<!-- Vista sin resultados -->
			<el-row type="flex" v-if="items.length == 0" class="lista-pacientes" :class="(current_screen_size == 'desktop')?'w25min':''" >
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-data-empty-view">
						<div class="bpa-ev-left-vector">
							<picture>
								<source srcset="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.webp' ); ?>" type="image/webp">
								<img src="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.png' ); ?>">
							</picture>
						</div>
						<div class="xxxbpa-ev-right-content">
							<h4><?php esc_html_e( 'No se encontraron Paciente(s)!', 'bookingpress-appointment-booking' ); ?></h4>
							
                            <?php
							if ( false && $BookingPressPro->bookingpress_check_capability( 'bookingpress_staff_members' ) ) {
								?>
                            <!--<el-button class="bpa-btn bpa-btn--primary bpa-btn__medium" @click="open_add_customer_modal()"><span class="material-icons-round">add</span>Agregar Nuevo</el-button> -->
						<?php } ?>
                        
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
						<div class="bpa-tc__wrapper"  >
							<el-table ref="multipleTable" :data="items" @selection-change="handleSelectionChange" @row-click="selectPatient" >
								<!--<el-table-column  type="selection"></el-table-column>-->															
								<el-table-column  prop="customer_fullname" label="<?php esc_html_e( 'Nombre', 'bookingpress-appointment-booking' ); ?>" sortable sort-by="customer_username">
									
									<template slot-scope="scope">
									<!-- @click="editCustomerDetails(scope.row.customer_id)" -->
									<a class="link-paciente" :class="{activo: selectedRow==scope.row}" @click="selectPatient(scope.row)" >
										<el-image class="bpa-table-column-avatar" :src="scope.row.customer_avatar"></el-image>
										<label v-if="scope.row!=null && scope.row.customer_firstname != '' && scope.row.customer_lastname != ''">{{ scope.row.customer_firstname }} {{ scope.row.customer_lastname }}</label>
										<label v-else-if="scope.row.customer_fullname != ''">{{ scope.row.customer_fullname }}</label>
										<label v-else>{{ scope.row.customer_email }}</label>
									
									</a>
									</template>
									
								</el-table-column>
								<el-table-column  prop="dni" label="<?php esc_html_e( 'Documento', 'bookingpress-appointment-booking' ); ?>" sortable sort-by="dni"></el-table-column>
							<!--	
								<el-table-column align="center" prop="" label="<?php esc_html_e( 'Historias', 'bookingpress-appointment-booking' ); ?>">
									<template slot-scope="scope">
										
										<div class="bpa-table-actions-wrap">
											<?php
											if ( ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) || $BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
												?>
											<div class="bpa-table-actions">												
												<?php
												if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) {
													?>
												<el-tooltip effect="dark" content="" placement="top" open-delay="300">
													
													<div slot="content">
														<span><?php esc_html_e( 'Historia', 'bookingpress-appointment-booking' ); ?></span>
													</div>
													
                                                    
													<el-button class="bpa-btn bpa-btn--icon-without-box" @click.native.prevent="selectPatient(scope.row)" style="border-radius: 3px;">
														<strong>Historia</strong>
														<span class="material-icons-round">mode_edit</span>
													</el-button>
												</el-tooltip>
													<?php
                                                    
                                                    //<!-- @click="selectPatient(scope.row)" @click.native.prevent="editCustomerDetails(scope.row.customer_id)" -->
												}
	//delete_customers borrado de esta vista-------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------
													?>
										</div>
											<?php
										}
										?>
									</div>
								</template>						
							</el-table-column>
						-->	
						</el-table>
					</div>
     
					<div class="bpa-tc__wrapper" v-if="current_screen_size == 'tablet'">
						<el-table ref="multipleTable" :data="items" @selection-change="handleSelectionChange">
							<el-table-column  type="selection"></el-table-column>															
							<el-table-column  prop="customer_fullname" label="<?php esc_html_e( 'Full Name', 'bookingpress-appointment-booking' ); ?>" sortable>
								<template slot-scope="scope">														
									<el-image class="bpa-table-column-avatar" :src="scope.row.customer_avatar"></el-image>
									<label v-if="scope.row.customer_firstname != '' && scope.row.customer_lastname != ''">{{ scope.row.customer_firstname }} {{ scope.row.customer_lastname }}</label>
									<label v-else-if="scope.row.customer_fullname != ''">{{ scope.row.customer_fullname }}</label>
									<label v-else>{{ scope.row.customer_email }}</label>
								</template>
							</el-table-column>
							<el-table-column  prop="customer_email" label="<?php esc_html_e( 'Email', 'bookingpress-appointment-booking' ); ?>" sortable></el-table-column>
							<el-table-column  prop="customer_phone" label="<?php esc_html_e( 'Phone', 'bookingpress-appointment-booking' ); ?>">
								<template slot-scope="scope">
									<label>{{ scope.row.customer_phone }}</label>
									<div class="bpa-table-actions-wrap">
										<?php
										if ( ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) || $BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
											?>
										<div class="bpa-table-actions">												
											<?php
											if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) {
												?>
											<el-tooltip effect="dark" content="" placement="top" open-delay="300">
												<div slot="content">
													<span><?php esc_html_e( 'Edit', 'bookingpress-appointment-booking' ); ?></span>
												</div>
												<el-button class="bpa-btn bpa-btn--icon-without-box" @click.native.prevent="editCustomerDetails(scope.row.customer_id)">
													<span class="material-icons-round">mode_edit</span>
												</el-button>
											</el-tooltip>
												<?php
											}
											if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
												?>
											<el-tooltip effect="dark" content="" placement="top" open-delay="300">
												<div slot="content">
													<span><?php esc_html_e( 'Delete', 'bookingpress-appointment-booking' ); ?></span>
												</div>
												<el-popconfirm 
													cancel-button-text='<?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?>' 
													confirm-button-text='<?php esc_html_e( 'Delete', 'bookingpress-appointment-booking' ); ?>' 
													icon="false" 
													title="<?php esc_html_e( 'Are you sure you want to delete this customer?', 'bookingpress-appointment-booking' ); ?>" 
													@confirm="deleteCustomer(scope.row.customer_id)" 
													confirm-button-type="bpa-btn bpa-btn__small bpa-btn--danger" 
													cancel-button-type="bpa-btn bpa-btn__small">
													<el-button type="text" slot="reference" class="bpa-btn bpa-btn--icon-without-box __danger">
														<span class="material-icons-round">delete</span>
													</el-button>
												</el-popconfirm>
											</el-tooltip>
										<?php } ?>
										</div>
											<?php
										}
										?>
									</div>
								</template>
							</el-table-column>
						</el-table>
					</div>
					<div class="bpa-tc__wrapper bpa-manage-customer-container--sm" v-if="current_screen_size == 'mobile'">
						<el-table ref="multipleTable" :data="items" @selection-change="handleSelectionChange" :show-header="false">
							<el-table-column  type="selection"></el-table-column>											
							<el-table-column>
								<template slot-scope="scope">														
									<div class="bpa-mcc__item-row-head">
										<el-image class="bpa-table-column-avatar" :src="scope.row.customer_avatar"></el-image>
										<label v-if="scope.row.customer_firstname != '' && scope.row.customer_lastname != ''">{{ scope.row.customer_firstname }} {{ scope.row.customer_lastname }}</label>
										<label v-else-if="scope.row.customer_fullname != ''">{{ scope.row.customer_fullname }}</label>
										<label v-else>{{ scope.row.customer_email }}</label>
									</div>
									<p class="bpa-mcc__item-row-sm">{{ scope.row.customer_email }}</p>
									<p class="bpa-mcc__item-row-sm">{{ scope.row.customer_phone }}</p>
									<p class="bpa-mcc__item-row-sm">
										<span><?php esc_html_e('Recent Appointment:', 'bookingpress-appointment-booking'); ?></span> 
										{{ scope.row.customer_last_appointment }}
									</p>
									<p class="bpa-mcc__item-row-sm"><span>
										<?php esc_html_e('Total Appointments:', 'bookingpress-appointment-booking'); ?></span> 
										{{ scope.row.customer_total_appointment }}
									</p>
									<div class="bpa-mcc__item-btns-sm">
										<?php
										if ( ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) || $BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
											?>
											<?php
											if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_customers' ) ) {
												?>
												<el-button class="bpa-btn bpa-btn__small" @click.native.prevent="editCustomerDetails(scope.row.customer_id)">
													<span class="material-icons-round">mode_edit</span>
													<?php esc_html_e('Edit', 'bookingpress-appointment-booking'); ?>
												</el-button>
												<?php
											}
											if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_delete_customers' ) ) {
												?>
												<el-popconfirm 
													cancel-button-text='<?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?>' 
													confirm-button-text='<?php esc_html_e( 'Delete', 'bookingpress-appointment-booking' ); ?>' 
													icon="false" 
													title="<?php esc_html_e( 'Are you sure you want to delete this customer?', 'bookingpress-appointment-booking' ); ?>" 
													@confirm="deleteCustomer(scope.row.customer_id)" 
													confirm-button-type="bpa-btn bpa-btn__small bpa-btn--danger" 
													cancel-button-type="bpa-btn bpa-btn__small">
													<el-button type="text" slot="reference" class="bpa-btn bpa-btn__small __danger">
														<span class="material-icons-round">delete</span>
														<?php esc_html_e('Delete', 'bookingpress-appointment-booking'); ?>
													</el-button>
												</el-popconfirm>
										<?php } ?>
											<?php
										}
										?>
									</div>
								</template>
							</el-table-column>														
						</el-table>
					</div>
                    
 
				</el-container>
			</el-col>
		</el-row>
		<!-- FIN LISTA PACIENTES-->
   
    <div  class="el-row main-historias " >
    
        <div class="flex w-full histories-listing-header" style="width: 100%;" >
            
            <!-- se quito info de paciente -->
            
            
            <div class="flex" style="align-self: flex-end;justify-self: end;padding-right: 10px;min-width: 380px;justify-content: end;">
                <el-button class="bpa-btn " @click="bp_hc_openSummaryModal()"> 
    					<?php esc_html_e( 'Resumen', 'bookingpress-appointment-booking' ); ?>
                        <span class="material-icons-round" style="">visibility</span> 
    			</el-button>
                <el-button class="bpa-btn bpa-btn--primary" @click="bphc_edit_HystoryRecord()"> 
    					<span class="material-icons-round">add</span> 
    					<?php esc_html_e( 'Agregar Historia', 'bookingpress-appointment-booking' ); ?>
    			</el-button>
            </div>
        </div>
        <!--
        <div class="subt-historias" >
             <h2 class="bpa-page-heading">Historias del Paciente</h2>
        </div>
        -->
        <div class="lista-historias-container bphc_listing_conf-1" style="min-height: 380px;">
        
            <!--<div class="linea-tiempo"></div>-->
        
            <div class="lista-historias" >
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
                        
                </div>
                <div v-else v-for="h in histories" :key="h.id" class="flex history-Slot" :data-historia="h.date_label">
                    <div class="bphc_historia-item-before">
                        <div class="bphc_item-before-line"></div>
                        <div class="bphc_item-before-round"></div>
                    </div>
                    <div class="historia-item">
                        <div class="border-l-4 border-primary-400 bg-white rounded shadow-sm p-3 flex"> 
                            
                            <div class="text-center mr-4">
                                <div class="text-lg uppercase font-bold">{{ moment(h.date).format('DD')||'' }}</div> 
                                <div class="text-xs uppercase text-gray-500">{{ moment(h.date).format('MMM')||'' }}</div> 
                            </div> 
                            <div class="bphc_inf_sname">
                                <div class="flex-col">
                                <!--<el-tag type="info" effect="dark">{{h.service_name || ''}}</el-tag>-->
                                    <el-tag type="info" >{{h.service_name || ''}}</el-tag>
                                    <span class="text-sm text-gray-500">{{ h.staff_member_name || '' }}</span>
                                </div>
                                
                                
                            </div>
                            <div class="text-sm bphc_inf_motivo"> <span><?php if(!empty($bookingpress_staffmember_id)) echo 'Staff id'. $bookingpress_staffmember_id    ?></span>{{h.consultation_data.general.motivoConsulta|| '' }}</div>
                            <div class="text-xs text-gray-500">
                                <span></span>{{ (moment((h.time||''), 'HH').format('hh:mm A'))!='invalid_date'? (moment((h.time||''), 'HH').format('hh:mm A')) :''}}
                                
                                <span @click="bphc_edit_HystoryRecord(h.id, h)" style="cursor: pointer;">
                                    <span v-if="h.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id" class="material-icons-round" style="">edit</span>
                                    <span v-else class="material-icons-round" style="">visibility</span>
                                    <div class="flex-col">
                                    <el-tag effect="light">Consultorio ...</el-tag>
                                    </div>
                                </span>
                            </div> 
                        </div>
                    </div><!--fin new historia-item -->
                    
                    <div></div>
                    
                    <div>
                        
                    </div>
                    <br />
                    <div v-html=" "></div>
                </div>
            </div>
        </div>
        
    </div>
    

	</div><!--Fin historias_y_pacientes-->
    
    <!-- COMENTADA PAGINACION
		<el-row class="bpa-pagination" type="flex" v-if="items.length > 0"> 
			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" >
				<div class="bpa-pagination-left">
					<p><?php esc_html_e('Showing', 'bookingpress-appointment-booking'); ?> <strong><u>{{ items.length }}</u></strong>&nbsp;<?php esc_html_e('out of', 'bookingpress-appointment-booking'); ?>&nbsp;<strong>{{ totalItems }}</strong></p>
					<div class="bpa-pagination-per-page">
                        <p><?php esc_html_e('Per Page', 'bookingpress-appointment-booking'); ?></p>
						<el-select v-model="pagination_length_val" placeholder="Select" @change="changePaginationSize($event)" class="bpa-form-control" popper-class="bpa-pagination-dropdown">
							<el-option v-for="item in pagination_val" :key="item.text" :label="item.text" :value="item.value"></el-option>
						</el-select>
					</div>
				</div>
			</el-col>
			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-pagination-nav">
				<el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page.sync="currentPage" layout="prev, pager, next" :total="totalItems" :page-sizes="pagination_length" :page-size="perPage"></el-pagination>
			</el-col>
			<?php if($bookingpress_disable_bulk_action){ ?>
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

    CONMENTADA PAGINACION -->
        
  
	</div>
</el-main>


<!-- Customer Modal -->

<el-dialog id="customer_add_modal" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob" modal-append-to-body=false :visible.sync="open_customer_modal" :before-close="closeCustomerModal" fullscreen=true :close-on-press-escape="close_modal_on_esc">
	<div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		<h1 class="bpa-page-heading" v-if="customer.update_id == 0"><?php esc_html_e( 'Add Customer', 'bookingpress-appointment-booking' ); ?></h1>
		<h1 class="bpa-page-heading" v-else><?php esc_html_e( 'Edit Customer', 'bookingpress-appointment-booking' ); ?></h1>
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col">
				<el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveCustomerDetails" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Save', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button> 
				<el-button class="bpa-btn" @click="closeCustomerModal()"><?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?></el-button>
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
							<el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
								<div class="db-sec-left">
									<h2 class="bpa-page-heading"><?php esc_html_e( 'Basic Details', 'bookingpress-appointment-booking' ); ?></h2>
								</div>
							</el-col>
						</el-row>
					</div>			
					<div class="bpa-default-card bpa-db-card">
						<el-form ref="customer" :rules="rules" :model="customer" label-position="top" @submit.native.prevent>
							<template>							
								<el-row :gutter="24">
									<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-form-group">
                                        <el-upload class="bpa-upload-component" ref="avatarRef" action="<?php echo wp_nonce_url(admin_url('admin-ajax.php') . '?action=bookingpress_upload_customer_avatar', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>" :on-success="bookingpress_upload_customer_avatar_func" :file-list="customer.avatar_list" multiple="false" :show-file-list="cusShowFileList" limit="1" :on-exceed="bookingpress_image_upload_limit" :on-error="bookingpress_image_upload_err" :before-upload="bphc_checkUploadedFile" drag>
											<span class="material-icons-round bpa-upload-component__icon">cloud_upload</span>
										   <div class="bpa-upload-component__text" v-if="customer.avatar_url == ''"><?php esc_html_e( 'Please upload jpg/png/webp file', 'bookingpress-appointment-booking' ); ?>									   	
										   </div>
										</el-upload>
										<div class="bpa-uploaded-avatar__preview"  v-if="customer.avatar_url != ''">
											<button class="bpa-avatar-close-icon" @click="bookingpress_remove_customer_avatar">
												<span class="material-icons-round">close</span>
											</button>
											<el-avatar shape="square" :src="customer.avatar_url" class="bpa-uploaded-avatar__picture"></el-avatar>
										</div>
									</el-col>
								</el-row>
								<div class="bpa-form-body-row bpa-fbr--customer">
									<el-row :gutter="32" type="flex">
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="wp_user">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'WordPress User', 'bookingpress-appointment-booking' ); ?></span>
												</template>
											
												<el-select class="bpa-form-control" v-model="customer.wp_user" filterable placeholder="<?php esc_html_e( 'Start typing to fetch user.', 'bookingpress-appointment-booking' ); ?>" @change="bookingpress_get_existing_user_details($event)" remote reserve-keyword	 :remote-method="get_wordpress_users" :loading="bookingpress_loading">
													<el-option-group label="<?php esc_html_e( 'Create New User', 'bookingpress-appointment-booking' ); ?>">
														<template>
															<el-option value="add_new" label="<?php esc_html_e( 'Create New', 'bookingpress-appointment-booking' ); ?>" >
																<i class="el-icon-plus" ></i>
																<span><?php esc_html_e( 'Create New', 'bookingpress-appointment-booking' ); ?></span>
															</el-option>
														</template>
													</el-option-group>
													<el-option-group v-for="wp_user_list_cat in wpUsersList" :key="wp_user_list_cat.category" :label="wp_user_list_cat.category">
														<template>
															<el-option v-for="item in wp_user_list_cat.wp_user_data" :key="item.value" :label="item.label" :value="item.value" >
																<span>{{ item.label }}</span>
															</el-option>
														</template>
													</el-option-group>
												</el-select>
											</el-form-item>												
										</el-col>										
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="customer.wp_user =='add_new'">
											<el-form-item>
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Password', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" type="password" v-model="customer.password" placeholder="<?php esc_html_e( 'Enter Password', 'bookingpress-appointment-booking' ); ?>" :show-password="true" ></el-input>
											</el-form-item>											
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="username">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Username', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" v-model="customer.username" id="username" name="username" placeholder="<?php esc_html_e( 'Enter Username', 'bookingpress-appointment-booking' ); ?>" :disabled="customer.update_id != 0 ? true :false" ></el-input>
											</el-form-item>
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="firstname">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'First Name', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" v-model="customer.firstname" id="firstname" name="firstname" placeholder="<?php esc_html_e( 'Enter First Name', 'bookingpress-appointment-booking' ); ?>"></el-input>
											</el-form-item>
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="lastname">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Last Name', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" v-model="customer.lastname" id="lastname" name="lastname" placeholder="<?php esc_html_e( 'Enter Last Name', 'bookingpress-appointment-booking' ); ?>"></el-input>
											</el-form-item>
										</el-col>											
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="email">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Email', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" v-model="customer.email" id="email" name="email" placeholder="<?php esc_html_e( 'Enter Email', 'bookingpress-appointment-booking' ); ?>"></el-input>
											</el-form-item>
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="phone">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Phone', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<vue-tel-input v-model="customer.phone" class="bpa-form-control --bpa-country-dropdown" @country-changed="bookingpress_phone_country_change_func($event)" v-bind="bookingpress_tel_input_props" ref="bpa_tel_input_field" :mode="vue_tel_mode" :auto-format="vue_tel_auto_format">
													<template v-slot:arrow-icon>
														<span class="material-icons-round">keyboard_arrow_down</span>
													</template>
												</vue-tel-input>
											</el-form-item>
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
											<el-form-item prop="note">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Note', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-input class="bpa-form-control" type="textarea" :rows="3" v-model="customer.note"></el-input>
											</el-form-item>
										</el-col>
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="bookingpress_customer_fields.length > 0" :data-customer-field-id="bpa_cus_field.bookingpress_form_field_id" v-for="(bpa_cus_field, cfkey) in bookingpress_customer_fields">
											<el-form-item :prop="bpa_cus_field.bookingpress_field_meta_key">
												<template #label>
													<span class="bpa-form-label">{{bpa_cus_field.bookingpress_field_label}}</span>
												</template>
												<el-input class="bpa-form-control" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-if="'text' == bpa_cus_field.bookingpress_field_type"></el-input>
												<el-input class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" v-if="'textarea' == bpa_cus_field.bookingpress_field_type" type="textarea"></el-input>
												<template v-if="'checkbox' == bpa_cus_field.bookingpress_field_type">
													<el-checkbox v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-label bpa-custom-checkbox--is-label" v-for="(chk_data,keys) in bpa_cus_field.bookingpress_field_values" :label="chk_data.label" :key="chk_data.value"><div v-html="chk_data.label"></div></el-checkbox>
												</template>
												<template v-if="'radio' == bpa_cus_field.bookingpress_field_type">
													<el-radio v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-label bpa-custom-radio--is-label" v-for="(rdo_data,keys) in bpa_cus_field.bookingpress_field_values" :label="rdo_data.label" :key="rdo_data.value">{{rdo_data.label}}</el-radio>
												</template>
												<template v-if="'dropdown' == bpa_cus_field.bookingpress_field_type">
													<el-select  v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder">
														<el-option v-for="sel_data in bpa_cus_field.bookingpress_field_values" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
													</el-select>
												</template>
												<el-date-picker :format="( 'true' == bpa_cus_field.bookingpress_field_options.enable_timepicker ) ? '<?php echo esc_html( $bookingpress_common_datetime_format ); ?>' : '<?php echo esc_html( $bookingpress_common_date_format ) ?>'" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" v-if="'date' == bpa_cus_field.bookingpress_field_type || 'datepicker' == bpa_cus_field.bookingpress_field_type" :type="'true' == bpa_cus_field.bookingpress_field_options.enable_timepicker ? 'datetime' : 'date'" :placeholder="bpa_cus_field.placeholder" @change="bpa_get_customer_formatted_date($event, bpa_cus_field.bookingpress_field_meta_key,bpa_cus_field.bookingpress_field_options.enable_timepicker)" :picker-options="filter_pickerOptions"></el-date-picker>
											</el-form-item>
										</el-col>
									</el-row>
								</div>
							</template>
						</el-form>
					</div>
				</el-col>
			</el-row>
		</div>
	</div>
</el-dialog>

<el-dialog custom-class="bpa-dialog bpa-dailog__small bpa-dialog--export-customers" id="customer_export_model" title="" :visible.sync="ExportCustomer" :modal="is_mask_display" @open="bookingpress_enable_modal" @close="bookingpress_disable_modal">
	<div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
				<h1 class="bpa-page-heading"><?php esc_html_e( 'Export Data', 'bookingpress-appointment-booking' ); ?></h1>
			</el-col>
		</el-row>
	</div>
	<div class="bpa-dialog-body">
		<el-container class="bpa-grid-list-container bpa-add-categpry-container">
			<div class="bpa-form-row">				
				<el-row>
					<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
						<el-form label-position="top" @submit.native.prevent>
							<div class="bpa-form-body-row">
								<el-row>
									<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
										<el-form-item>
											  <el-checkbox-group v-model="export_checked_field">									  						 <el-checkbox class="bpa-form-label bpa-custom-checkbox--is-label" v-for="item in customer_export_field_list" :label="item.name">{{item.text}}</el-checkbox>
											  </el-checkbox-group>									  
										</el-form-item>
									</el-col> 										
								</el-row>
							</div>
						</el-form>
					</el-col>
				</el-row>
			</div>
		</el-container>
	</div>
	<div class="bpa-dialog-footer">
		<div class="bpa-hw-right-btn-group">
			<el-button class="bpa-btn bpa-btn__medium" @click="close_export_customer_model" ><?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?></el-button>
			<el-button class="bpa-btn bpa-btn__medium bpa-btn--primary" :class="(is_export_button_loader == '1') ? 'bpa-btn--is-loader' : ''" @click="
			bookingpress_export_customer" :disabled="is_export_button_disabled" >					
			  <span class="bpa-btn__label"><?php esc_html_e( 'Export', 'bookingpress-appointment-booking' ); ?></span>
			  <div class="bpa-btn--loader__circles">				    
				  <div></div>
				  <div></div>
				  <div></div>
			  </div>
			</el-button>
		</div>
	</div>
</el-dialog>





<?php


/**

    <!-- Formulario de nueva historia -->
   <!--
	<div class="el-row" v-if="selected_patient">
		<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
			<h3>
				<small style="font-weight: normal; color:#666; margin-left:8px;">
					Paciente: {{ (selected_patient.customer_firstname||'') + ' ' + (selected_patient.customer_lastname||'') }}
					<span v-if="selected_patient.dni"> DNI {{ selected_patient.dni }}</span>
				</small>
			</h3>

			<p style="margin: 4px 0 16px; color:#888;">Complete los campos. Los datos serán asociados a este paciente y al profesional actual.</p>
			<el-form label-position="top" @submit.native.prevent>
				<el-row :gutter="16">
					<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
						<el-form-item label="Antecedentes">
							<el-input type="textarea" :autosize="{minRows:3,maxRows:6}" v-model="history_form.antecedentes" placeholder="Antecedentes mÃ©dicos relevantes" maxlength="1000" show-word-limit></el-input>
						</el-form-item>
					</el-col>
					<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
						<el-form-item label="Diagnostico">
							<el-input type="textarea" :autosize="{minRows:3,maxRows:6}" v-model="history_form.diagnostico" placeholder="DiagnÃ³stico principal" maxlength="1000" show-word-limit></el-input>
						</el-form-item>
					</el-col>
					<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
						<el-form-item label="Medicamentos">
							<el-input type="textarea" :autosize="{minRows:3,maxRows:6}" v-model="history_form.medicamentos" placeholder="Medicamentos indicados y posologÃ­a" maxlength="1000" show-word-limit></el-input>
						</el-form-item>
					</el-col>
					<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
						<el-form-item label="Observaciones">
							<el-input type="textarea" :autosize="{minRows:3,maxRows:6}" v-model="history_form.observaciones" placeholder="Observaciones adicionales" maxlength="1000" show-word-limit></el-input>
						</el-form-item>
					</el-col>
	           </el-row>
			   <div style="display:flex; gap:8px; justify-content:flex-end; margin-top: 8px;">
					<el-button class="bpa-btn bpa-btn__medium" @click="resetHistoryForm" :disabled="history_saving">Limpiar</el-button>
					<el-button class="bpa-btn bpa-btn__medium bpa-btn--primary" @click="submitHistory" :loading="history_saving" :disabled="history_saving">Guardar historia</el-button>
				</div>
			</el-form>

		</el-col>
	</div>
   -->
    <!-- Formulario de nueva historia -->
    
    
    
 */
 
 ?>

<el-dialog id="bphc_history_summary_modal" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob" modal-append-to-body=false :visible.sync="bp_hc_SummaryModal" :before-close="closeCustomerModal" fullscreen=true :close-on-press-escape="close_modal_on_esc">
    <!-- HEADER FROM CUSTOMER MODAL -->
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		<?php
        /** <h1 class="bpa-page-heading" v-if="customer.update_id == 0"><?php esc_html_e( 'Add Customer', 'bookingpress-appointment-booking' ); ?></h1>
		*/ ?>
        <h1 class="bpa-page-heading" ><?php esc_html_e( 'Resumen', 'bookingpress-appointment-booking' ); ?></h1>
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
                    <span class="text-gray-500 uppercase text-xs">Presión Arterial</span> 
                </div> 
                <div class="flex items-center space-x-2"> 
                    <span class="font-medium">120/80</span> 
                    <span class="text-gray-400 text-sm">mmHg</span> 
                </div> 
            </div> 
            
            <div class="flex items-center justify-between"> 
                <div class="flex items-center"> 
                    <div class="w-6 h-6 rounded-full bg-pink-100 flex items-center justify-center mr-2"> 
                        <i class="fas fa-heart text-pink-500 text-xs"></i> 
                    </div> 
                    <span class="text-gray-500 uppercase text-xs">Frec. Cardíaca</span> 
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
        <div class="space-y-2"> <div class="flex items-center justify-between"> <div class="flex items-center"> <div class="w-6 h-6 rounded bg-red-100 flex items-center justify-center mr-2"> <i class="far fa-file-pdf text-red-500 text-xs"></i> </div> <span class="text-sm">EstudioSangre.pdf</span> </div> <div class="flex items-center space-x-2 text-xs text-gray-400"> <span>250KB</span> <span>|</span> <span>Feb 20, 2016</span> </div> </div> <div class="flex items-center justify-between"> <div class="flex items-center"> <div class="w-6 h-6 rounded bg-blue-100 flex items-center justify-center mr-2"> <i class="far fa-file-image text-blue-500 text-xs"></i> </div> <span class="text-sm">Radiografía-01.jpeg</span> </div> <div class="flex items-center space-x-2 text-xs text-gray-400"> <span>6MB</span> <span>|</span> <span>Dic 10, 2015</span> </div> </div> </div>
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
                                        <div class="mb-3"> <div class="flex justify-between"> <span class="text-sm">Cólicos</span> <div class="flex items-center"> <div class="w-4 h-4 rounded-full bg-primary-100 flex items-center justify-center mr-2"> <i class="fas fa-check text-primary-500 text-xs"></i> </div> <span class="text-sm">Fuertes dolores con náuseas y vómitos.</span> </div> </div> </div>
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





<!-- REGISTRO DE NUEVA HISTORIA -->

<el-dialog id="bphc_history_add_modal" custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" modal-append-to-body=false :visible.sync="bp_hc_ConsultationModal" :before-close="closeCustomerModal" fullscreen=true :close-on-press-escape="close_modal_on_esc">
<div v-if="bp_hc_bookingpress_staffmember_id && newRecord.bookingpress_customer_id" >

    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		<h1 class="bpa-page-heading" v-if="newRecord.update_id == 0"><?php esc_html_e( 'Nuevo Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> </h1>
		<h1 class="bpa-page-heading" v-else><?php esc_html_e( 'Editar Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?></h1>
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				<el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveRecord" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Guardar Registro', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button> 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Cancel', 'bookingpress-appointment-booking' ); ?></el-button>
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
                <div v-if="">
                    
                    <el-page-header @back="bp_hc_CloseHistoryModal()" :content="'Paciente '+selected_patient.customer_firstname " >{{ newRecord.staff_member_name }}</el-page-header>
                    <div class="first-desc-form" style="display: flex;justify-content:space-between;">
                        <div class="fdform_left" style="text-align: start;overflow: clip;min-width: 50px;max-height: 40px;text-overflow: ellipsis;justify-self: center;">
                            <span class="bpa-form-label">{{newRecord.staff_member_name }}</span>
                        </div>
                        <div class="fdform_left" style="text-align: start;">
                            <span class="bpa-form-label text-gray-300">Paciente {{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}</span>
                        </div>
                        <div class="fdform_right" style="display: flex;justify-content:end;align-self:end;max-width:150px;">
                            <div v-if="(!newRecord.id || newRecord.id == 'add_new') || (!newRecord.service_name && !newRecord.bookingpress_appointment_id)">
                                
            					<el-select class="bpa-form-control bpa-from-select-tab" v-model="newRecord.service_name"
                                required 
                                @change=""
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_name" ></el-option> 
            						</el-option-group>
            					</el-select> <!-- :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`" -->
                            </div>
                            <div v-else>
                                <el-tag class="bpa-form-label" style="padding: 10px;" type="info">{{ newRecord.service_name }}</el-tag>
                            </div>
                        </div>
                        
                    </div>
                    
                    <el-form ref="recordForm" :model="newRecord"  style="margin-top:20px;">
                    <div class="bphc-form-grid">
                        
                         <!-- en la misma columna del grid -->
                        <!-- Sección Signos Vitales -->
                        <el-card class="bphc-vitales " shadow="never" header="Signos Vitales" style="margin-bottom: 20px;" >
                            <el-row :gutter="20" :style="{ marginLeft: '', marginRight: '' }" style="padding: 10px;" >
                            
                            <!-- cambiar prop y model a altura -->
                                <el-row :gutter="20" style=" " >
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
                                        <el-input  id="vitales.saturacionOxigeno" v-model="newRecord.vitales.saturacionOxigeno" class="bpa-form-control bphc_item_input" placeholder="95% (SpO2)" ></el-input>
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
                                        <el-input  id="vitales.frecuenciaCardiaca" v-model="newRecord.vitales.frecuenciaCardiaca" class="bpa-form-control bphc_item_input" placeholder="62 (Fc)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           
                                
                                
                                
                            </el-row>
                        </el-card>
                        <!-- Fin Sección Signos Vitales -->
                        
                        
                        
                        
                        <!-- Sección Información General -->
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

                                                
                        <!-- Sección Medicamentos  -->
                         <el-card shadow="never" header="Medicamentos" >
                            <div v-for="(item, index) in newRecord.medicamentos" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10">
                                    <el-col :span="8"><el-input placeholder="Nombre del medicamento" v-model="item.nombre"></el-input></el-col>
                                    <el-col :span="6"><el-input placeholder="Dosis" v-model="item.dosis"></el-input></el-col>
                                    <el-col :span="6"><el-input placeholder="Frecuencia" v-model="item.frecuencia"></el-input></el-col>
                                    <el-col :span="4"><el-button @click.prevent="removeMedicamento(item)" type="danger" icon="el-icon-delete" circle></el-button></el-col>
                                </el-row>
                            </div>
                            <el-button @click="addMedicamento" size="small">+ Añadir Medicamento</el-button>
                        </el-card>
                        <!-- Fin Sección Medicamentos  -->
                        

                        <!-- Sección Subida de Archivos :before-upload="checkUploadedFile"  -->
                        <el-card shadow="never" header="Archivos Adjuntos" v-if=" typeof newRecord.general !='undefined' " >
                            <el-upload v-if=" typeof newRecord.general.archivos !='undefined' "
                                class="upload-demo" action="<?php echo wp_nonce_url(admin_url('admin-ajax.php') . '?action=bookingpress_upload_record_file', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>"
                                :file-list="newRecord.general.archivos"
                                 
                                :on-success="bphc_upload_record_file_func"
                                
                                :on-remove="handleRemove"
                                :on-error="bookingpress_image_upload_err" 
                                :on-remove="bookingpress_remove_customer_avatar"
                                multiple="false"
                                :limit="20"
                                :on-preview="handlePreview"
                                :on-exceed="handleExceed"
                                >
                                <el-button size="small" type="primary">Agregar archivo</el-button>
                                <div slot="tip" class="el-upload__tip">Archivos jpg/png con un tamaño menor de 500kb</div>
                            </el-upload>
                        </el-card>
                        <!--
                        <el-form-item style="margin-top: 30px;">
                            <el-button type="primary" @click="saveRecord">Guardar Historia Clínica</el-button>
                            <el-button @click="bp_hc_CloseHistoryModal" >Cancelar</el-button>
                        </el-form-item>
                        -->
                    </div>
                    </el-form>
                </div>
                    
                    
                    
                    
                    
                    
                    
                    
					</div>
                    <!-- Fin formulario registro body card -->
				</el-col>
			</el-row>
		</div>
	</div>
    

</div> 	
<div v-else class="bpa-dialog-heading" style="display: flex;width: 100%;height:100%;">

    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
		<h1 class="bpa-page-heading" >NO SE SELECCIONO PACIENTE o NO SE HA SELECCIONADO UN TURNO VINCULADO A UNO</h1>
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    <!--
    <div v-if="!newRecord.bookingpress_customer_id" class="bpa-form-label" style="display: flex;align-self:center;width: 100%;height:100%;font-size: larger;">
    <h1><span class="">NO SE SELECCIONO PACIENTE o NO SE HA SELECCIONADO UN TURNO VINCULADO A UNO</span></h1>
    </div>
    -->

</div>   
</el-dialog>









