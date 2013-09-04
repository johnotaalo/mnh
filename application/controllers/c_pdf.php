<?php
class C_Pdf extends MY_Controller {

	public function index() {
	}

	public function form() {
		//$stylesheet = file_get_contents(base_url().'css/styles.css');
		//$html= $this->load->view('form_child_health');
		//$html = $this ->load->view('instructions');
		$stylesheet = ('
		# facilityReg td input{
			width:500px;
		}
		td input{
			float:left;
			
		}
		h3{
			font-size: 1.4em;
	font-family: Linux Libertine-DR;
	color: #039;
	border-bottom: solid 2px #039;
		}
		input, select{
			width:150px;
			height:60px;
			border:none;
			border-bottom:1px solid black;
		}
		
		/* Columns*/
.column, .column-wide {
	padding: 0 20px 10px 10px;
	height: auto;
}
.col {
	width: 33%;
	display: inline-block;
}
.block {
	margin-bottom: 5px;
	width: 95%;
	margin: auto;
	display: block;
	height: auto;
}
.block .column:first-child {
	border-right: 2px solid #999999;
}

td input[type=number] {
	float: left;
	padding:10px auto;
			width:300px;
			height:60px;
}
.block .column:nth-child(even) {
	float: right;
}
.col-x4 {
	width: 24%;
}
.column {
	width: 47.5%;
	padding-bottom: 2%;
	display: inline-block;
	position: relative;
}
.column-wide {
	width: 99%;
}
.column input, .column-wide input {
	display: table-row;
	padding:10px auto;
			width:300px;
			height:60px;
}
.column textarea, .column-wide textarea {
	display: block;
	float: right;
	width: 80%;
	height: 120px;
}
.col p, .col label {
}
.column-wide textarea {
	height: 90px;
}
.column label, .column-wide label {
	float: left;
	display: block;
	width: 85%;
}
.row {
	margin: 0;
}
.row, .row2 {
	width: 100%;
}
.row-title {
	width: 100%;
	color: #AA1317;
	display: block;
	margin-top: 10px;
	padding-bottom: 5px;
	padding-top: 5px;
	font-size: 1.1em;
	font-weight: bold;
	border-bottom: #999999 1px solid;
	border-top: #999999 1px solid;
}

.left {
	width: 60%;
}
.right {
	clear: all;
	width: 50%;
	height: 100%;
}
.left-wide {
	width: 45%;
}
.center-wide {
	width: 5%;
}
.right-wide {
	width: 45%;
}
.col-x7 {
	width: 14%;
}
.left, .right, .center {
	display: inline-block;
	height: auto;
}
.column .center {
	width: 10%;
	height: inherit;
}
.column-wide .center {
	width: 30%;
	border-right: 2px solid gray;
	padding: 1%;
}

.column-wide .left, .column-wide .right {
	width: 30%;
	padding: 1%;
}
.column label, .column-wide label {
	padding: 5px 5px 5px 5px;
	border-radius: 5px;
	-moz-border-radius: 2px;
	-o-border-radius: 2px;
	display: block;
}
input[type=radio] {
	display: inline-block;
	float: right;
}
input[type=number], select {
	display: inline-block;
	width: 45%;
}
select {
	float: left;
	padding: 1px;
}
option {
	width: 100%;
}
input[type=number] {
	float: right;
}
.ui-helper-hidden {
	display: none
}
.ui-helper-hidden-accessible {
	position: absolute !important;
	clip: rect(1px);
	clip: rect(1px,1px,1px,1px)
}
.ui-helper-reset {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	line-height: 1.3;
	text-decoration: none;
	font-size: 100%;
	list-style: none
}
.ui-helper-clearfix:before, .ui-helper-clearfix:after {
	content: "";
	display: table
}
.ui-helper-clearfix:after {
	clear: both
}
.ui-helper-clearfix {
	zoom: 1
}
.ui-helper-zfix {
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	position: absolute;
	opacity: 0;
	filter: Alpha(Opacity=0)
}
.ui-state-disabled {
	cursor: default !important
}
.ui-icon {
	display: block;
	text-indent: -99999px;
	overflow: hidden;
	background-repeat: no-repeat
}
.ui-widget-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%
}
.ui-resizable {
	position: relative
}
.ui-resizable-handle {
	position: absolute;
	font-size: 0.1px;
	display: block
}
.ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle {
	display: none
}
.ui-resizable-n {
	cursor: n-resize;
	height: 7px;
	width: 100%;
	top: -5px;
	left: 0
}
.ui-resizable-s {
	cursor: s-resize;
	height: 7px;
	width: 100%;
	bottom: -5px;
	left: 0
}
.ui-resizable-e {
	cursor: e-resize;
	width: 7px;
	right: -5px;
	top: 0;
	height: 100%
}
.ui-resizable-w {
	cursor: w-resize;
	width: 7px;
	left: -5px;
	top: 0;
	height: 100%
}
.ui-resizable-se {
	cursor: se-resize;
	width: 12px;
	height: 12px;
	right: 1px;
	bottom: 1px
}
.ui-resizable-sw {
	cursor: sw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	bottom: -5px
}
.ui-resizable-nw {
	cursor: nw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	top: -5px
}
.ui-resizable-ne {
	cursor: ne-resize;
	width: 9px;
	height: 9px;
	right: -5px;
	top: -5px
}
.ui-selectable-helper {
	position: absolute;
	z-index: 100;
	border: 1px dotted black
}
.ui-accordion .ui-accordion-header {
	display: block;
	cursor: pointer;
	position: relative;
	margin-top: 2px;
	padding: .5em .5em .5em .7em;
	zoom: 1
}
.ui-accordion .ui-accordion-icons {
	padding-left: 2.2em
}
.ui-accordion .ui-accordion-noicons {
	padding-left: .7em
}
.ui-accordion .ui-accordion-icons .ui-accordion-icons {
	padding-left: 2.2em
}
.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
	position: absolute;
	left: .5em;
	top: 50%;
	margin-top: -8px
}
.ui-accordion .ui-accordion-content {
	padding: 1em 2.2em;
	border-top: 0;
	overflow: auto;
	zoom: 1
}
.ui-autocomplete {
	position: absolute;
	cursor: default
}
* html .ui-autocomplete {
	width: 1px
}
.ui-button {
	display: inline-block;
	position: relative;
	padding: 0;
	margin-right: .1em;
	cursor: pointer;
	text-align: center;
	zoom: 1;
	overflow: visible
}
.ui-button, .ui-button:link, .ui-button:visited, .ui-button:hover, .ui-button:active {
	text-decoration: none
}
.ui-button-icon-only {
	width: 2.2em
}
button.ui-button-icon-only {
	width: 2.4em
}
.ui-button-icons-only {
	width: 3.4em
}
button.ui-button-icons-only {
	width: 3.7em
}
.ui-button .ui-button-text {
	display: block;
	line-height: 1.4
}
.ui-button-text-only .ui-button-text {
	padding: .4em 1em
}
.ui-button-icon-only .ui-button-text, .ui-button-icons-only .ui-button-text {
	padding: .4em;
	text-indent: -9999999px
}
.ui-button-text-icon-primary .ui-button-text, .ui-button-text-icons .ui-button-text {
	padding: .4em 1em .4em 2.1em
}
.ui-button-text-icon-secondary .ui-button-text, .ui-button-text-icons .ui-button-text {
	padding: .4em 2.1em .4em 1em
}
.ui-button-text-icons .ui-button-text {
	padding-left: 2.1em;
	padding-right: 2.1em
}
input.ui-button {
	padding: .4em 1em
}
.ui-button-icon-only .ui-icon, .ui-button-text-icon-primary .ui-icon, .ui-button-text-icon-secondary .ui-icon, .ui-button-text-icons .ui-icon, .ui-button-icons-only .ui-icon {
	position: absolute;
	top: 50%;
	margin-top: -8px
}
.ui-button-icon-only .ui-icon {
	left: 50%;
	margin-left: -8px
}
.ui-button-text-icon-primary .ui-button-icon-primary, .ui-button-text-icons .ui-button-icon-primary, .ui-button-icons-only .ui-button-icon-primary {
	left: .5em
}
.ui-button-text-icon-secondary .ui-button-icon-secondary, .ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary {
	right: .5em
}
.ui-button-text-icons .ui-button-icon-secondary, .ui-button-icons-only .ui-button-icon-secondary {
	right: .5em
}
.ui-buttonset {
	margin-right: 7px
}
.ui-buttonset .ui-button {
	margin-left: 0;
	margin-right: -.3em
}
button.ui-button::-moz-focus-inner {
	border: 0;
	padding: 0
}
.ui-datepicker {
	width: 17em;
	padding: .2em .2em 0;
	display: none
}
.ui-datepicker .ui-datepicker-header {
	position: relative;
	padding: .2em 0
}
.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
	position: absolute;
	top: 2px;
	width: 1.8em;
	height: 1.8em
}
.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover {
	top: 1px
}
.ui-datepicker .ui-datepicker-prev {
	left: 2px
}
.ui-datepicker .ui-datepicker-next {
	right: 2px
}
.ui-datepicker .ui-datepicker-prev-hover {
	left: 1px
}
.ui-datepicker .ui-datepicker-next-hover {
	right: 1px
}
.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span {
	display: block;
	position: absolute;
	left: 50%;
	margin-left: -8px;
	top: 50%;
	margin-top: -8px
}
.ui-datepicker .ui-datepicker-title {
	margin: 0 2.3em;
	line-height: 1.8em;
	text-align: center
}
.ui-datepicker .ui-datepicker-title select {
	font-size: 1em;
	margin: 1px 0
}
.ui-datepicker select.ui-datepicker-month-year {
	width: 100%
}
.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
	width: 49%
}
.ui-datepicker table {
	width: 100%;
	font-size: .9em;
	border-collapse: collapse;
	margin: 0 0 .4em
}
.ui-datepicker th {
	padding: .7em .3em;
	text-align: center;
	font-weight: bold;
	border: 0
}
.ui-datepicker td {
	border: 0;
	padding: 1px
}
.ui-datepicker td span, .ui-datepicker td a {
	display: block;
	padding: .2em;
	text-align: right;
	text-decoration: none
}
.ui-datepicker .ui-datepicker-buttonpane {
	background-image: none;
	margin: .7em 0 0 0;
	padding: 0 .2em;
	border-left: 0;
	border-right: 0;
	border-bottom: 0
}
.ui-datepicker .ui-datepicker-buttonpane button {
	float: right;
	margin: .5em .2em .4em;
	cursor: pointer;
	padding: .2em .6em .3em .6em;
	width: auto;
	overflow: visible
}
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: left
}
.ui-datepicker.ui-datepicker-multi {
	width: auto
}
.ui-datepicker-multi .ui-datepicker-group {
	float: left
}
.ui-datepicker-multi .ui-datepicker-group table {
	width: 95%;
	margin: 0 auto .4em
}
.ui-datepicker-multi-2 .ui-datepicker-group {
	width: 50%
}
.ui-datepicker-multi-3 .ui-datepicker-group {
	width: 33.3%
}
.ui-datepicker-multi-4 .ui-datepicker-group {
	width: 25%
}
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header {
	border-left-width: 0
}
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
	border-left-width: 0
}
.ui-datepicker-multi .ui-datepicker-buttonpane {
	clear: left
}
.ui-datepicker-row-break {
	clear: both;
	width: 100%;
	font-size: 0em
}
.ui-datepicker-rtl {
	direction: rtl
}
.ui-datepicker-rtl .ui-datepicker-prev {
	right: 2px;
	left: auto
}
.ui-datepicker-rtl .ui-datepicker-next {
	left: 2px;
	right: auto
}
.ui-datepicker-rtl .ui-datepicker-prev:hover {
	right: 1px;
	left: auto
}
.ui-datepicker-rtl .ui-datepicker-next:hover {
	left: 1px;
	right: auto
}
.ui-datepicker-rtl .ui-datepicker-buttonpane {
	clear: right
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button {
	float: left
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: right
}
.ui-datepicker-rtl .ui-datepicker-group {
	float: right
}
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px
}
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px
}
.ui-datepicker-cover {
	position: absolute;
	z-index: -1;
	filter: mask();
	top: -4px;
	left: -4px;
	width: 200px;
	height: 200px
}
.ui-dialog {
	position: absolute;
	padding: .2em;
	width: 300px;
	overflow: hidden
}
.ui-dialog .ui-dialog-titlebar {
	padding: .4em 1em;
	position: relative
}
.ui-dialog .ui-dialog-title {
	float: left;
	margin: .1em 16px .1em 0
}
.ui-dialog .ui-dialog-titlebar-close {
	position: absolute;
	right: .3em;
	top: 50%;
	width: 19px;
	margin: -10px 0 0 0;
	padding: 1px;
	height: 18px
}
.ui-dialog .ui-dialog-titlebar-close span {
	display: block;
	margin: 1px
}
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus {
	padding: 0
}
.ui-dialog .ui-dialog-content {
	position: relative;
	border: 0;
	padding: .5em 1em;
	background: none;
	overflow: auto;
	zoom: 1
}
.ui-dialog .ui-dialog-buttonpane {
	text-align: left;
	border-width: 1px 0 0 0;
	background-image: none;
	margin: .5em 0 0 0;
	padding: .3em 1em .5em .4em
}
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
	float: right
}
.ui-dialog .ui-dialog-buttonpane button {
	margin: .5em .4em .5em 0;
	cursor: pointer
}
.ui-dialog .ui-resizable-se {
	width: 14px;
	height: 14px;
	right: 3px;
	bottom: 3px
}
.ui-draggable .ui-dialog-titlebar {
	cursor: move
}
.ui-menu {
	list-style: none;
	padding: 2px;
	margin: 0;
	display: block;
	outline: none
}
.ui-menu .ui-menu {
	margin-top: -3px;
	position: absolute
}
.ui-menu .ui-menu-item {
	margin: 0;
	padding: 0;
	zoom: 1;
	width: 100%
}
.ui-menu .ui-menu-divider {
	margin: 5px -2px 5px -2px;
	height: 0;
	font-size: 0;
	line-height: 0;
	border-width: 1px 0 0 0
}
.ui-menu .ui-menu-item a {
	text-decoration: none;
	display: block;
	padding: 2px .4em;
	line-height: 1.5;
	zoom: 1;
	font-weight: normal
}
.ui-menu .ui-menu-item a.ui-state-focus, .ui-menu .ui-menu-item a.ui-state-active {
	font-weight: normal;
	margin: -1px
}
.ui-menu .ui-state-disabled {
	font-weight: normal;
	margin: .4em 0 .2em;
	line-height: 1.5
}
.ui-menu .ui-state-disabled a {
	cursor: default
}
.ui-menu-icons {
	position: relative
}
.ui-menu-icons .ui-menu-item a {
	position: relative;
	padding-left: 2em
}
.ui-menu .ui-icon {
	position: absolute;
	top: .2em;
	left: .2em
}
.ui-menu .ui-menu-icon {
	position: static;
	float: right
}
.ui-progressbar {
	height: 2em;
	text-align: left;
	overflow: hidden
}
.ui-progressbar .ui-progressbar-value {
	margin: -1px;
	height: 100%
}
.ui-slider {
	position: relative;
	text-align: left
}
.ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 1.2em;
	height: 1.2em;
	cursor: default
}
.ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: .7em;
	display: block;
	border: 0;
	background-position: 0 0
}
.ui-slider-horizontal {
	height: .8em
}
.ui-slider-horizontal .ui-slider-handle {
	top: -.3em;
	margin-left: -.6em
}
.ui-slider-horizontal .ui-slider-range {
	top: 0;
	height: 100%
}
.ui-slider-horizontal .ui-slider-range-min {
	left: 0
}
.ui-slider-horizontal .ui-slider-range-max {
	right: 0
}
.ui-slider-vertical {
	width: .8em;
	height: 100px
}
.ui-slider-vertical .ui-slider-handle {
	left: -.3em;
	margin-left: 0;
	margin-bottom: -.6em
}
.ui-slider-vertical .ui-slider-range {
	left: 0;
	width: 100%
}
.ui-slider-vertical .ui-slider-range-min {
	bottom: 0
}
.ui-slider-vertical .ui-slider-range-max {
	top: 0
}
.ui-spinner {
	position: relative;
	display: inline-block;
	overflow: hidden;
	padding: 0;
	vertical-align: middle
}
.ui-spinner-input {
	border: none;
	background: none;
	padding: 0;
	margin: .2em 0;
	vertical-align: middle;
	margin-left: .4em;
	margin-right: 22px
}
.ui-spinner-button {
	width: 16px;
	height: 50%;
	font-size: .5em;
	padding: 0;
	margin: 0;
	z-index: 100;
	text-align: center;
	position: absolute;
	cursor: default;
	display: block;
	overflow: hidden;
	right: 0
}
.ui-spinner a.ui-spinner-button {
	border-top: none;
	border-bottom: none;
	border-right: none
}
.ui-spinner .ui-icon {
	position: absolute;
	margin-top: -8px;
	top: 50%;
	left: 0
}
.ui-spinner-up {
	top: 0
}
.ui-spinner-down {
	bottom: 0
}
span.ui-spinner {
	background: none
}
.ui-spinner .ui-icon-triangle-1-s {
	background-position: -65px -16px
}
.ui-tabs {
	position: relative;
	padding: .2em;
	zoom: 1
}
.ui-tabs .ui-tabs-nav {
	margin: 0;
	padding: .2em .2em 0
}
.ui-tabs .ui-tabs-nav li {
	list-style: none;
	float: left;
	position: relative;
	top: 0;
	margin: 1px .2em 0 0;
	border-bottom: 0;
	padding: 0;
	white-space: nowrap
}
.ui-tabs .ui-tabs-nav li a {
	float: left;
	padding: .5em 1em;
	text-decoration: none
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active {
	margin-bottom: -1px;
	padding-bottom: 1px
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-tabs-loading a {
	cursor: text
}
.ui-tabs .ui-tabs-nav li a, .ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active a {
	cursor: pointer
}
.ui-tabs .ui-tabs-panel {
	display: block;
	border-width: 0;
	padding: 1em 1.4em;
	background: none
}
.ui-tooltip {
	padding: 8px;
	position: absolute;
	z-index: 9999;
	-o-box-shadow: 0 0 5px #aaa;
	-moz-box-shadow: 0 0 5px #aaa;
	-webkit-box-shadow: 0 0 5px #aaa;
	box-shadow: 0 0 5px #aaa
}
* html .ui-tooltip {
	background-image: none
}
body .ui-tooltip {
	border-width: 2px
}
.ui-widget {
	font-family: Lucida Grande, Lucida Sans, Arial, sans-serif;
	font-size: 1.1em
}
.ui-widget .ui-widget {
	font-size: 1em
}
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
	font-family: Lucida Grande, Lucida Sans, Arial, sans-serif;
	font-size: 1em
}
.ui-widget-content {
	border: 1px solid #a6c9e2;
	background: #fcfdfd url(images/ui-bg_inset-hard_100_fcfdfd_1x100.png) 50% bottom repeat-x;
	color: #222
}
.ui-widget-content a {
	color: #222
}
.ui-widget-header {
	border: 1px solid #4297d7;
	background: #5c9ccc url(images/ui-bg_gloss-wave_55_5c9ccc_500x100.png) 50% 50% repeat-x;
	color: #fff;
	font-weight: bold
}
.ui-widget-header a {
	color: #fff
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	border: 1px solid #c5dbec;
	background: #dfeffc url(images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #2e6e9e
}
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
	color: #2e6e9e;
	text-decoration: none
}
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
	border: 1px solid #79b7e7;
	background: #d0e5f5 url(images/ui-bg_glass_75_d0e5f5_1x400.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #1d5987
}
.ui-state-hover a, .ui-state-hover a:hover {
	color: #1d5987;
	text-decoration: none
}
.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
	border: 1px solid #79b7e7;
	background: #f5f8f9 url(images/ui-bg_inset-hard_100_f5f8f9_1x100.png) 50% 50% repeat-x;
	font-weight: bold;
	color: #e17009
}
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited {
	color: #e17009;
	text-decoration: none
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
	border: 1px solid #fad42e;
	background: #fbec88 url(images/ui-bg_flat_55_fbec88_40x100.png) 50% 50% repeat-x;
	color: #363636
}
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a, .ui-widget-header .ui-state-highlight a {
	color: #363636
}
.ui-state-error, .ui-widget-content .ui-state-error, .ui-widget-header .ui-state-error {
	border: 1px solid #cd0a0a;
	background: #fef1ec url(images/ui-bg_glass_95_fef1ec_1x400.png) 50% 50% repeat-x;
	color: #cd0a0a
}
.ui-state-error a, .ui-widget-content .ui-state-error a, .ui-widget-header .ui-state-error a {
	color: #cd0a0a
}
.ui-state-error-text, .ui-widget-content .ui-state-error-text, .ui-widget-header .ui-state-error-text {
	color: #cd0a0a
}
.ui-priority-primary, .ui-widget-content .ui-priority-primary, .ui-widget-header .ui-priority-primary {
	font-weight: bold
}
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary, .ui-widget-header .ui-priority-secondary {
	opacity: .7;
	filter: Alpha(Opacity=70);
	font-weight: normal
}
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled {
	opacity: .35;
	filter: Alpha(Opacity=35);
	background-image: none
}
.ui-icon {
	width: 16px;
	height: 16px;
	background-image: url(images/ui-icons_469bdd_256x240.png)
}
.ui-widget-content .ui-icon {
	background-image: url(images/ui-icons_469bdd_256x240.png)
}
.ui-widget-header .ui-icon {
	background-image: url(images/ui-icons_d8e7f3_256x240.png)
}
.ui-state-default .ui-icon {
	background-image: url(images/ui-icons_6da8d5_256x240.png)
}
.ui-state-hover .ui-icon, .ui-state-focus .ui-icon {
	background-image: url(images/ui-icons_217bc0_256x240.png)
}
.ui-state-active .ui-icon {
	background-image: url(images/ui-icons_f9bd01_256x240.png)
}
.ui-state-highlight .ui-icon {
	background-image: url(images/ui-icons_2e83ff_256x240.png)
}
.ui-state-error .ui-icon, .ui-state-error-text .ui-icon {
	background-image: url(images/ui-icons_cd0a0a_256x240.png)
}
.ui-icon-carat-1-n {
	background-position: 0 0
}
.ui-icon-carat-1-ne {
	background-position: -16px 0
}
.ui-icon-carat-1-e {
	background-position: -32px 0
}
.ui-icon-carat-1-se {
	background-position: -48px 0
}
.ui-icon-carat-1-s {
	background-position: -64px 0
}
.ui-icon-carat-1-sw {
	background-position: -80px 0
}
.ui-icon-carat-1-w {
	background-position: -96px 0
}
.ui-icon-carat-1-nw {
	background-position: -112px 0
}
.ui-icon-carat-2-n-s {
	background-position: -128px 0
}
.ui-icon-carat-2-e-w {
	background-position: -144px 0
}
.ui-icon-triangle-1-n {
	background-position: 0 -16px
}
.ui-icon-triangle-1-ne {
	background-position: -16px -16px
}
.ui-icon-triangle-1-e {
	background-position: -32px -16px
}
.ui-icon-triangle-1-se {
	background-position: -48px -16px
}
.ui-icon-triangle-1-s {
	background-position: -64px -16px
}
.ui-icon-triangle-1-sw {
	background-position: -80px -16px
}
.ui-icon-triangle-1-w {
	background-position: -96px -16px
}
.ui-icon-triangle-1-nw {
	background-position: -112px -16px
}
.ui-icon-triangle-2-n-s {
	background-position: -128px -16px
}
.ui-icon-triangle-2-e-w {
	background-position: -144px -16px
}
.ui-icon-arrow-1-n {
	background-position: 0 -32px
}
.ui-icon-arrow-1-ne {
	background-position: -16px -32px
}
.ui-icon-arrow-1-e {
	background-position: -32px -32px
}
.ui-icon-arrow-1-se {
	background-position: -48px -32px
}
.ui-icon-arrow-1-s {
	background-position: -64px -32px
}
.ui-icon-arrow-1-sw {
	background-position: -80px -32px
}
.ui-icon-arrow-1-w {
	background-position: -96px -32px
}
.ui-icon-arrow-1-nw {
	background-position: -112px -32px
}
.ui-icon-arrow-2-n-s {
	background-position: -128px -32px
}
.ui-icon-arrow-2-ne-sw {
	background-position: -144px -32px
}
.ui-icon-arrow-2-e-w {
	background-position: -160px -32px
}
.ui-icon-arrow-2-se-nw {
	background-position: -176px -32px
}
.ui-icon-arrowstop-1-n {
	background-position: -192px -32px
}
.ui-icon-arrowstop-1-e {
	background-position: -208px -32px
}
.ui-icon-arrowstop-1-s {
	background-position: -224px -32px
}
.ui-icon-arrowstop-1-w {
	background-position: -240px -32px
}
.ui-icon-arrowthick-1-n {
	background-position: 0 -48px
}
.ui-icon-arrowthick-1-ne {
	background-position: -16px -48px
}
.ui-icon-arrowthick-1-e {
	background-position: -32px -48px
}
.ui-icon-arrowthick-1-se {
	background-position: -48px -48px
}
.ui-icon-arrowthick-1-s {
	background-position: -64px -48px
}
.ui-icon-arrowthick-1-sw {
	background-position: -80px -48px
}
.ui-icon-arrowthick-1-w {
	background-position: -96px -48px
}
.ui-icon-arrowthick-1-nw {
	background-position: -112px -48px
}
.ui-icon-arrowthick-2-n-s {
	background-position: -128px -48px
}
.ui-icon-arrowthick-2-ne-sw {
	background-position: -144px -48px
}
.ui-icon-arrowthick-2-e-w {
	background-position: -160px -48px
}
.ui-icon-arrowthick-2-se-nw {
	background-position: -176px -48px
}
.ui-icon-arrowthickstop-1-n {
	background-position: -192px -48px
}
.ui-icon-arrowthickstop-1-e {
	background-position: -208px -48px
}
.ui-icon-arrowthickstop-1-s {
	background-position: -224px -48px
}
.ui-icon-arrowthickstop-1-w {
	background-position: -240px -48px
}
.ui-icon-arrowreturnthick-1-w {
	background-position: 0 -64px
}
.ui-icon-arrowreturnthick-1-n {
	background-position: -16px -64px
}
.ui-icon-arrowreturnthick-1-e {
	background-position: -32px -64px
}
.ui-icon-arrowreturnthick-1-s {
	background-position: -48px -64px
}
.ui-icon-arrowreturn-1-w {
	background-position: -64px -64px
}
.ui-icon-arrowreturn-1-n {
	background-position: -80px -64px
}
.ui-icon-arrowreturn-1-e {
	background-position: -96px -64px
}
.ui-icon-arrowreturn-1-s {
	background-position: -112px -64px
}
.ui-icon-arrowrefresh-1-w {
	background-position: -128px -64px
}
.ui-icon-arrowrefresh-1-n {
	background-position: -144px -64px
}
.ui-icon-arrowrefresh-1-e {
	background-position: -160px -64px
}
.ui-icon-arrowrefresh-1-s {
	background-position: -176px -64px
}
.ui-icon-arrow-4 {
	background-position: 0 -80px
}
.ui-icon-arrow-4-diag {
	background-position: -16px -80px
}
.ui-icon-extlink {
	background-position: -32px -80px
}
.ui-icon-newwin {
	background-position: -48px -80px
}
.ui-icon-refresh {
	background-position: -64px -80px
}
.ui-icon-shuffle {
	background-position: -80px -80px
}
.ui-icon-transfer-e-w {
	background-position: -96px -80px
}
.ui-icon-transferthick-e-w {
	background-position: -112px -80px
}
.ui-icon-folder-collapsed {
	background-position: 0 -96px
}
.ui-icon-folder-open {
	background-position: -16px -96px
}
.ui-icon-document {
	background-position: -32px -96px
}
.ui-icon-document-b {
	background-position: -48px -96px
}
.ui-icon-note {
	background-position: -64px -96px
}
.ui-icon-mail-closed {
	background-position: -80px -96px
}
.ui-icon-mail-open {
	background-position: -96px -96px
}
.ui-icon-suitcase {
	background-position: -112px -96px
}
.ui-icon-comment {
	background-position: -128px -96px
}
.ui-icon-person {
	background-position: -144px -96px
}
.ui-icon-print {
	background-position: -160px -96px
}
.ui-icon-trash {
	background-position: -176px -96px
}
.ui-icon-locked {
	background-position: -192px -96px
}
.ui-icon-unlocked {
	background-position: -208px -96px
}
.ui-icon-bookmark {
	background-position: -224px -96px
}
.ui-icon-tag {
	background-position: -240px -96px
}
.ui-icon-home {
	background-position: 0 -112px
}
.ui-icon-flag {
	background-position: -16px -112px
}
.ui-icon-calendar {
	background-position: -32px -112px
}
.ui-icon-cart {
	background-position: -48px -112px
}
.ui-icon-pencil {
	background-position: -64px -112px
}
.ui-icon-clock {
	background-position: -80px -112px
}
.ui-icon-disk {
	background-position: -96px -112px
}
.ui-icon-calculator {
	background-position: -112px -112px
}
.ui-icon-zoomin {
	background-position: -128px -112px
}
.ui-icon-zoomout {
	background-position: -144px -112px
}
.ui-icon-search {
	background-position: -160px -112px
}
.ui-icon-wrench {
	background-position: -176px -112px
}
.ui-icon-gear {
	background-position: -192px -112px
}
.ui-icon-heart {
	background-position: -208px -112px
}
.ui-icon-star {
	background-position: -224px -112px
}
.ui-icon-link {
	background-position: -240px -112px
}
.ui-icon-cancel {
	background-position: 0 -128px
}
.ui-icon-plus {
	background-position: -16px -128px
}
.ui-icon-plusthick {
	background-position: -32px -128px
}
.ui-icon-minus {
	background-position: -48px -128px
}
.ui-icon-minusthick {
	background-position: -64px -128px
}
.ui-icon-close {
	background-position: -80px -128px
}
.ui-icon-closethick {
	background-position: -96px -128px
}
.ui-icon-key {
	background-position: -112px -128px
}
.ui-icon-lightbulb {
	background-position: -128px -128px
}
.ui-icon-scissors {
	background-position: -144px -128px
}
.ui-icon-clipboard {
	background-position: -160px -128px
}
.ui-icon-copy {
	background-position: -176px -128px
}
.ui-icon-contact {
	background-position: -192px -128px
}
.ui-icon-image {
	background-position: -208px -128px
}
.ui-icon-video {
	background-position: -224px -128px
}
.ui-icon-script {
	background-position: -240px -128px
}
.ui-icon-alert {
	background-position: 0 -144px
}
.ui-icon-info {
	background-position: -16px -144px
}
.ui-icon-notice {
	background-position: -32px -144px
}
.ui-icon-help {
	background-position: -48px -144px
}
.ui-icon-check {
	background-position: -64px -144px
}
.ui-icon-bullet {
	background-position: -80px -144px
}
.ui-icon-radio-on {
	background-position: -96px -144px
}
.ui-icon-radio-off {
	background-position: -112px -144px
}
.ui-icon-pin-w {
	background-position: -128px -144px
}
.ui-icon-pin-s {
	background-position: -144px -144px
}
.ui-icon-play {
	background-position: 0 -160px
}
.ui-icon-pause {
	background-position: -16px -160px
}
.ui-icon-seek-next {
	background-position: -32px -160px
}
.ui-icon-seek-prev {
	background-position: -48px -160px
}
.ui-icon-seek-end {
	background-position: -64px -160px
}
.ui-icon-seek-start {
	background-position: -80px -160px
}
.ui-icon-seek-first {
	background-position: -80px -160px
}
.ui-icon-stop {
	background-position: -96px -160px
}
.ui-icon-eject {
	background-position: -112px -160px
}
.ui-icon-volume-off {
	background-position: -128px -160px
}
.ui-icon-volume-on {
	background-position: -144px -160px
}
.ui-icon-power {
	background-position: 0 -176px
}
.ui-icon-signal-diag {
	background-position: -16px -176px
}
.ui-icon-signal {
	background-position: -32px -176px
}
.ui-icon-battery-0 {
	background-position: -48px -176px
}
.ui-icon-battery-1 {
	background-position: -64px -176px
}
.ui-icon-battery-2 {
	background-position: -80px -176px
}
.ui-icon-battery-3 {
	background-position: -96px -176px
}
.ui-icon-circle-plus {
	background-position: 0 -192px
}
.ui-icon-circle-minus {
	background-position: -16px -192px
}
.ui-icon-circle-close {
	background-position: -32px -192px
}
.ui-icon-circle-triangle-e {
	background-position: -48px -192px
}
.ui-icon-circle-triangle-s {
	background-position: -64px -192px
}
.ui-icon-circle-triangle-w {
	background-position: -80px -192px
}
.ui-icon-circle-triangle-n {
	background-position: -96px -192px
}
.ui-icon-circle-arrow-e {
	background-position: -112px -192px
}
.ui-icon-circle-arrow-s {
	background-position: -128px -192px
}
.ui-icon-circle-arrow-w {
	background-position: -144px -192px
}
.ui-icon-circle-arrow-n {
	background-position: -160px -192px
}
.ui-icon-circle-zoomin {
	background-position: -176px -192px
}
.ui-icon-circle-zoomout {
	background-position: -192px -192px
}
.ui-icon-circle-check {
	background-position: -208px -192px
}
.ui-icon-circlesmall-plus {
	background-position: 0 -208px
}
.ui-icon-circlesmall-minus {
	background-position: -16px -208px
}
.ui-icon-circlesmall-close {
	background-position: -32px -208px
}
.ui-icon-squaresmall-plus {
	background-position: -48px -208px
}
.ui-icon-squaresmall-minus {
	background-position: -64px -208px
}
.ui-icon-squaresmall-close {
	background-position: -80px -208px
}
.ui-icon-grip-dotted-vertical {
	background-position: 0 -224px
}
.ui-icon-grip-dotted-horizontal {
	background-position: -16px -224px
}
.ui-icon-grip-solid-vertical {
	background-position: -32px -224px
}
.ui-icon-grip-solid-horizontal {
	background-position: -48px -224px
}
.ui-icon-gripsmall-diagonal-se {
	background-position: -64px -224px
}
.ui-icon-grip-diagonal-se {
	background-position: -80px -224px
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
	-moz-border-radius-topleft: 5px;
	-webkit-border-top-left-radius: 5px;
	-khtml-border-top-left-radius: 5px;
	border-top-left-radius: 5px
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
	-moz-border-radius-topright: 5px;
	-webkit-border-top-right-radius: 5px;
	-khtml-border-top-right-radius: 5px;
	border-top-right-radius: 5px
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-khtml-border-bottom-left-radius: 5px;
	border-bottom-left-radius: 5px
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
	-moz-border-radius-bottomright: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-khtml-border-bottom-right-radius: 5px;
	border-bottom-right-radius: 5px
}
.ui-widget-overlay {
	background: #aaa url(images/ui-bg_flat_0_aaaaaa_40x100.png) 50% 50% repeat-x;
	opacity: .3;
	filter: Alpha(Opacity=30)
}
.ui-widget-shadow {
	margin: -8px 0 0 -8px;
	padding: 8px;
	background: #aaa url(images/ui-bg_flat_0_aaaaaa_40x100.png) 50% 50% repeat-x;
	opacity: .3;
	filter: Alpha(Opacity=30);
	-moz-border-radius: 8px;
	-khtml-border-radius: 8px;
	-webkit-border-radius: 8px;
	border-radius: 8px
}		
		');
		$html = ('
<h3 align="center">Diarrhoea Morbidity Data </h3>
<!--begin of child health commodity form-->
<!--begin diarrhoiea morbidity factor div-->
<table id="diarrhoea_cases" class="step">
	<input type="hidden" name="step_name" value="diarrhoea_cases"/>
	
	<tr class="row2">
		<td >
			<label> Indicate number of diarrhoea cases seen in this facility in the <b>last 2 months</b></label>
		</td>
		<td>
			<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned numbers"/> 
		</td>
		<td>
			and
		</td>
		<td>
			<input type="text" id="diarrhoeaCases" name="diarrhoeaCases" class="cloned numbers"/>
		</td>
	</tr>
</table>

<!--end diarrhoiea morbidity factor div-->

<!--begin child health drug section -->
<div id="tabs-1" class="tab MCH step">
	<input type="hidden" name="step_name" value="childhealth_mch_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: MCH
	</div>

	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>
			<tr></tr>
			<tr>
				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Tablets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->
			</tr>
		</thead>
		<tr class="clonable zinc">
			<!--td width="144">
			<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
			</td-->
			<td width="144">
			<input type="number"  name="znMCHStockQuantity_1" id="znMCHStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znMCHCommodityName_1" id="znMCHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znMCHUnit_1" id="znMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znMCHStockExpiryDate_1" id="znMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_1">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="orsMCHStockQuantity_1" id="orsMCHStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsMCHCommodityName_1" id="orsMCHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsMCHUnit_1" id="orsMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsMCHStockExpiryDate_1" id="orsMCHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_2">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="cipStockQuantity_1" id="cipStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipCommodityName_1" id="cipCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipMCHUnit_1" id="cipMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipStockExpiryDate_1" id="cipStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_3">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_3" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_3" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="metStockQuantity_1" id="metStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metCommodityName_1" id="metCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metMCHUnit_1" id="metMCHUnit_1" value="MCH" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metStockExpiryDate_1" id="metStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_4">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_4" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_4" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-1-->

<div id="tabs-2" class="tab PEDS step">
	<input type="hidden" name="step_name" value="childhealth_peds_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: PEDS
	</div>
	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>

			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Tablets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<tr class="clonable zinc">
			<!--td width="144">
			<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
			</td-->
			<td width="144">
			<input type="number"  name="znPEDStockQuantity_1" id="znPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znPEDCommodityName_1" id="znPEDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znPEDUnit_1" id="znPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znPEDStockExpiryDate_1" id="znPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_5">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_5" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_5" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="orsPEDStockQuantity_1" id="orsPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsPEDCommodityName_1" id="orsPEDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsPEDUnit_1" id="orsPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsPEDStockExpiryDate_1" id="orsPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_6">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_6" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_6" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="cipPEDStockQuantity_1" id="cipPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipPEDCommodityName_1" id="cipPEDCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipPEDUnit_1" id="cipPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipPEDStockExpiryDate_1" id="cipPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_7">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_7" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_7" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="metPEDStockQuantity_1" id="metPEDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metPEDCommodityName_1" id="metPEDCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metPEDUnit_1" id="metPEDUnit_1" value="PED" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metPEDStockExpiryDate_1" id="metPEDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_8">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_8" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_8" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-2-->

<div id="tabs-3" class="tab OPD step">
	<input type="hidden" name="step_name" value="childhealth_opd_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: OPD
	</div>
	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Tablets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<tr class="clonable zinc">
			<!--td width="144">
			<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
			</td-->
			<td width="144">
			<input type="number"  name="znOPDStockQuantity_1" id="znOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="znOPDCommodityName_1" id="znOPDCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znOPDUnit_1" id="znOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="znOPDStockExpiryDate_1" id="znOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_9">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_9" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_9" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="orsOPDStockQuantity_1" id="orsOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="orsOPDCommodityName_1" id="orsOPDCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsOPDUnit_1" id="orsOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="orsOPDStockExpiryDate_1" id="orsOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_10">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_10" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_10" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="cipOPDStockQuantity_1" id="cipOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="cipOPDCommodityName_1" id="cipOPDCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipOPDUnit_1" id="cipOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="cipOPDStockExpiryDate_1" id="cipOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_11">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_11" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_11" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
	<table>
		<thead>
			<tr>

				<!--td width="144">Batch No</td-->
				<td width="144">Quantities at Hand (Sachets)</td>
				<!--td width="144">Date Supplied to Facility</td-->
				<!--td width="144">Supplier</td-->
				<td width="144">Expiry Date</td>
				<!--td width="144">Comments</td-->

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<!--td width="144">
			<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

			</td-->
			<td width="144">
			<input type="number"  name="metOPDStockQuantity_1" id="metOPDStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			<input type="hidden"  name="metOPDCommodityName_1" id="metOPDCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metOPDUnit_1" id="metOPDUnit_1" value="OPD" />
			</td>
			<!--td width="144">
			<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td-->
			<!--td width="144">
			<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
			</td-->
			<td width="144">
			<input type="text"  name="metOPDStockExpiryDate_1" id="metOPDStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_12">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_12" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_12" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-3-->

<div id="tabs-4" class="tab Pharmacy step">
	<input type="hidden" name="step_name" value="childhealth_pharm_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Pharmacy
	</div>
	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Tablets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<tr class="clonable zinc">
			<td width="144">
			<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znPHAUnit_1" id="znPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znPHAStockDispensedDate_1" id="znPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockSupplier_1" id="znPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockExpiryDate_1" id="znPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znPHAStockComments_1" id="znPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_13">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_13" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_13" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="orsPHAStockBatchNo_1" id="orsPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsPHACommodityName_1" id="orsPHACommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsPHAUnit_1" id="orsPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsPHAStockDispensedDate_1" id="orsPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockSupplier_1" id="orsPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockExpiryDate_1" id="orsPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsPHAStockComments_1" id="orsPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_14">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_14" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_14" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="cipPHAStockBatchNo_1" id="cipPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipPHACommodityName_1" id="cipPHACommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipPHAUnit_1" id="cipPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipPHAStockDispensedDate_1" id="cipPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockSupplier_1" id="cipPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockExpiryDate_1" id="cipPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipPHAStockComments_1" id="cipPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_15">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_15" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_15" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>

		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="metPHAStockBatchNo_1" id="metPHAStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metPHACommodityName_1" id="metPHACommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metPHAUnit_1" id="metPHAUnit_1" value="PHA" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metPHAStockDispensedDate_1" id="metPHAStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockSupplier_1" id="metPHAStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockExpiryDate_1" id="metPHAStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metPHAStockComments_1" id="metPHAStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_16">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_16" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_16" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--close tabs-4-->

<div id="tabs-5" class="tab Stores step">
	<input type="hidden" name="step_name" value="childhealth_store_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Stores
	</div>
	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Tablets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<tr class="clonable zinc">
			<td width="144">
			<input type="text"    name="znSTOBatchNo_1" id="znSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="znSTOCommodityName_1" id="znSTOCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			<input type="hidden"  name="znSTOUnit_1" id="znSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znSTOStockDispensedDate_1" id="znSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockSupplier_1" id="znSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znSTOStockComments_1" id="znSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_17">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_17" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_17" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="orsSTOStockBatchNo_1" id="orsSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsSTOCommodityName_1" id="orsSTOCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			<input type="hidden"  name="orsSTOUnit_1" id="orsSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsSTOStockDispensedDate_1" id="orsSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockSupplier_1" id="orsSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockExpiryDate_1" id="orsSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsSTOStockComments_1" id="orsSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_18">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_18" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_18" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="cipSTOStockBatchNo_1" id="cipSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipSTOCommodityName_1" id="cipSTOCommodityName_1" value="Ciprofloxacin" />
			<input type="hidden"  name="cipSTOUnit_1" id="cipSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipSTOStockDispensedDate_1" id="cipSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockSupplier_1" id="cipSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockExpiryDate_1" id="cipSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipSTOStockComments_1" id="cipSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_19">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_19" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_19" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="metSTOStockBatchNo_1" id="metSTOStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metSTOCommodityName_1" id="metSTOCommodityName_1" value="Metronidazole (Flagyl)" />
			<input type="hidden"  name="metSTOUnit_1" id="metSTOUnit_1" value="Store" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metSTOStockDispensedDate_1" id="metSTOStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockSupplier_1" id="metSTOStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockExpiryDate_1" id="metSTOStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metSTOStockComments_1" id="metSTOStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_20">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_20" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_20" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

</div>
<!--close tabs-5-->

<div id="tabs-6" class="tab Others step">
	<input type="hidden" name="step_name" value="childhealth_other_tab"/>
	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the:
	</p>
	<div align="center" class="row-title" style="font-size:1.8em">
		Unit: Others
	</div>
	<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Tablets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<div class="row2">
			<label>Unit Name</label>
			<input type="text"  name="otherUnit_1" id="otherUnit_1" class="cloned" maxlength="45"/>
		</div>
		<tr class="clonable zinc">
			<td width="144">
			<input type="text"  name="znOTHStockBatchNo_1" id="znOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="znOTHCommodityName_1" id="znOTHCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
			</td>
			<!--td width="144">
			<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="znOTHStockDispensedDate_1" id="znOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="znOTHStockSupplier_1" id="znOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="znOTHStockExpiryDate_1" id="znOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_21">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_21" value="Add Batch Number" width="auto"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_21" value="Remove Batch Number" width="auto"/>
		</tr>
	</table>

	<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="orsOTHStockBatchNo_1" id="orsOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="orsOTHCommodityName_1" id="orsOTHCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="orsOTHStockDispensedDate_1" id="orsOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="orsOTHStockSupplier_1" id="orsOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="orsOTHStockExpiryDate_1" id="orsOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsOTHStockComments_1" id="orsOTHStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_22">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_22" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_22" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Ciprofloxacin Assessment</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="cipOTHStockBatchNo_1" id="cipOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="cipOTHCommodityName_1" id="cipOTHCommodityName_1" value="Ciprofloxacin" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="cipOTHStockDispensedDate_1" id="cipOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="cipOTHStockSupplier_1" id="cipOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="cipOTHStockExpiryDate_1" id="cipOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<!--td width="144">
			<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
			</td-->
		</tr>
		<tr id="formbuttons_23">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_23" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_23" value="Remove Batch Number" width="12"/>
		</tr>
	</table>

	<h3 align="center"> Metronidazole (Flagyl)</h3>
	<table>
		<thead>
			<tr>

				<td width="144">Batch No</td>
				<!--td width="144">Quantities at Hand (Sachets)</td-->
				<td width="144">Date Supplied to Facility</td>
				<td width="144">Supplier</td>
				<td width="144">Expiry Date</td>
				<td width="144">Comments</td>

			</tr>
		</thead>
		<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
		<tr class="clonable ors">
			<td width="144">
			<input type="text"  name="metOTHStockBatchNo_1" id="metOTHStockBatchNo_1" class="cloned" maxlength="10"/>
			<input type="hidden"  name="metOTHCommodityName_1" id="metOTHCommodityName_1" value="Metronidazole" />
			</td>
			<!--td width="144">
			<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned numbers  fromZero" maxlength="6"/>
			</td-->
			<td width="144">
			<input type="date"  name="metOTHStockDispensedDate_1" id="metOTHStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockSupplier_1" id="metOTHStockSupplier_1" class="cloned" maxlength="45"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockExpiryDate_1" id="metOTHStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
			</td>
			<td width="144">
			<input type="text"  name="metOTHStockComments_1" id="metOTHStockComments_1" class="cloned" maxlength="255"/>
			</td>
		</tr>
		<tr id="formbuttons_24">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_24" value="Add Batch Number" width="12"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_24" value="Remove Batch Number" width="12"/>
		</tr>
	</table>
</div>
<!--end of tabs-6-->
<!--end child health drug section -->

<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
<table id="ort_part1" class="step">
	<input type="hidden" name="step_name" value="ort_part1"/>

	<tr class="row-title">
		<td ><b>ASPECTS</b></td>
		<td  style="float:right"><td class="col"><b>YES</b></td>
		<td class="col"><b>NO</b></td>
		</td>
	</tr>
	<tr>
		<td ><label>1. Are dehydrated children rehydrated at this facility? </label></td>
		<td ><td class="col">
		<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
		</td>
		<td class="col">
		<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
		</td>
		</td>
	</tr>
	<tr>
		<td ><label>2. Does the facility have a designated location for oral rehydration ?</label></td>
		<td ><td class="col">
		<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
		</td>
		<td class="col">
		<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<label class="dcah-label">3. Check the various locations where rehydration is carried out</label>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> MCH</label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> OPD</label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocationOPD" id="ortDehydrationLocationOPD"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> WARD </label></td>
		<td ><td class="col">
		<input type="checkbox" name="ortDehydrationLocationWard" id="ortDehydrationLocationWard"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>
	<tr class="row hide" style="display:none">
		<td  ><label> Other*?</label></td>
		<td ><td class="col">
		<input type="text" name="ortDehydrationLocationOther" id="ortDehydrationLocationOther"  value="" maxlength="50"/>
		</td>
		</td>
	</tr>

</table>
<!--end of ort corner part1 -->

<table id="ort_questions" class="step">

	<tr class="row">
		<td ><label class="dcah-label" style="font-size:1.0em">4. Who supplied the supplies to the facility?</label></td>
		<td ><label>Government</label>
		<input type="radio" />
		<label>Partners</label>
		<input type="radio" />
		</td>
	</tr>

	<tr class="row">
		<td ><label class="dcah-label" style="font-size:1.0em">5. Is there a budget for replacement of the missing or Broken ORT Corner equipment?</label></td>
		<td ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>

</table>
<!--end of ort questions-->
<div class="row-title">
	<label class="dcah-label">EQUIPMENT</label>
</div>
<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>

<table id="tableEquipmentList">
	<tr class="row2">
		<input type="button" id="editEquipmentListTopButton" name="editEquipmentListTopButton" class="awesome myblue medium" value="Edit List"/>
	</tr>
	<tr>

		<td><label class="dcah-label" style="font-size:1.0em"><b>Equipment Name</b></label></td>
		<td><label class="dcah-label" style="font-size:1.0em"><b>Yes/No</b></label></td>
		<td><label class="dcah-label" style="font-size:1.0em"><b>Total Equipment Quantities</b></label></td>

	</tr>

	<tr class="row2" id="tr_1">
		<td><label>Tea spoons </label>
		<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_2">
		<td><label>Table spoons </label>
		<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_3">
		<td><label>Stirring spoon </label>
		<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_4">
		<td><label>Plastic buckets (with lids for infection prevention) </label>
		<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_5">
		<td><label> Buckets – for storing cups, spoons </label>
		<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_6">
		<td><label> Plastic cups (50-100mls) </label>
		<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_7">
		<td><label> Plastic cups (101-200mls) </label>
		<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_8">
		<td><label> Plastic cups (201mls-499mls) </label>
		<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_9">
		<td><label> Plastic cups (500mls) </label>
		<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_10">
		<td><label> 1 litre Calibrated measuring jars </label>
		<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_11">
		<td><label> Table Trays </label>
		<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_12">
		<td><label> Wash Basins </label>
		<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_13">
		<td><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
		<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_14">
		<td><label> Hot plate-Electric/Solar powered </label>
		<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_15">
		<td><label> Heater- Gas powered </label>
		<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_16">
		<td><label> Charcoal or Firewood  stove/Heater </label>
		<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_17">
		<td><label> Paraffin Stove/Heater </label>
		<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_18">
		<td><label> Sufurias  with a Lid (14 inch) </label>
		<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_19">
		<td><label> Waste Container </label>
		<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_20">
		<td><label> Wall Clock /Timing device </label>
		<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_21">
		<td><label> Table- for mixing ORS </label>
		<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_22">
		<td><label> Benches/chair(s) </label>
		<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_23">
		<td><label> Water Storage Container ( at least 40lts)- With Tap </label>
		<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_24">
		<td><label> Water Storage Container ( at least 40lts)- Without Tap </label>
		<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_25">
		<td><label> Locally available measuring containers e.g. cooking fat Tins. </label>
		<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_26">
		<td><label> Weighing scale </label>
		<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_27">
		<td><label> Hand Washing Facility/Point e.g. tippy taps. </label>
		<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_28">
		<td><label> Safe water source </label>
		<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_29">
		<td><label> Thermometer </label>
		<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<tr class="row2" id="tr_30">
		<td><label> MUAC Tape </label>
		<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td>
		<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
		</td>

	</tr>
	<!--tr class="row2">
	<input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
	</tr>
</table>

<!--end of child health commodity form-->

<!--begin of mnh_form-->
<!-- form for collecting mnh information -->
<div id="beginMNH" class="step">
	<input type="hidden" name="step_name" value="mnh_sec_ass"/>
	<div class="block">
		<h3 align="center" style="font-size:2em;color:#AA1317">Maternal Health Assessment</h3>
		<div class="row" style="margin-top:3%">
			<div >
				<label>Does the facility provide for delivery services?</label>
			</div>
			<div class="center cloned" >
<label>Yes</label>
<input type="radio" />
<label>No</label>
<input type="radio" />
			</div>

			<div id="q4comm"  style="display: none">
				<input type="text" name="lndq4Comment" id="lndq4Comment" class="cloned"/>

			</div>

		</div>
	</div>
</div><!--end of beginMNH div -->
<!--begin delivery cases div-->
<div id="delivery_cases" class="step">
	<input type="hidden" name="step_name" value="delivery_cases"/>
	<h3 align="center">Information on Delivery Cases </h3>

	<div class="row2">
		<div >
			<label>Indicate number of deliveries cases (includes deliveries by caesarian section) recorded in the <b>last 2  months</b></label>
		</div>
		<div >

			<input type="text" id="deliveryCases" name="deliveryCases" class="cloned numbers fromZero"/>
		</div>
		<div >
            and
		</div>
		<div >

			<input type="text" id="deliveryCases" name="deliveryCases" class="cloned numbers fromZero"/>
		</div>
	</div>
</div>

<!--end delivery cases div-->

<!-- form for collecting mnh inventory status information -->

	<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>
<!--begin emonc td-->
<table id="emonc" class="step">


	<tr class="row-title">
		<td><label ><b>Inventory Type: Labor and Delivery</b></label></td>
		<td><label><b>ANSWER</b></label></td>
	</tr>

	<tr>
		<td><label>5. Does the facility provide 24 hour coverage for delivery services?</label></td>
		<td class="center cloned" ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label>Comment</label>
		<input type="text" name="lndq5Comment" id="lndq5Comment" class="cloned"/>
		</td>

	</tr>
	<tr>
		<td><label>6a. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
			including weekends, to provide delivery care?</label></td>
		<td class="center cloned"><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>
	<tr>
		<td><label>6b. Who conducts deliveries in this facility?</label></td>
		
		<td>
		<label>Mid-wife</label>
		<input type="radio" />
		</td>
		<td>
		<label>Trained Medical Officer</label>
		<input type="radio" />
		</td>
		<td>
		<label>Clinicial Officer</label>
		<input type="radio" />
		</td>
		<td>
		<label>Nursing Officer</label>
		<input type="radio" />
		</td>
		<label>Doctor</label>
		<input type="radio" />
		<td>
		<label>Community Health Worker</label>
		<input type="radio" />
		</td>
		<td>
		<p></p><label for="lndq6otherProvider">Others(Specify)</label>
		<input type="text" id="lndq6otherProvider" name="lndq6otherProvider" maxlength="55" placeholder="provider1,provider2,...,"/>
		</td>
	</tr>
	<tr>
		<td><label>7. Indicate the total number of beds in the maternity ward / unit in this facility*</label></td>
		<td>
		<input type="number" name="lndq7TotalBeds" id="lndq7TotalBeds" class="cloned numbers  fromZero" min="0" style="float:left"/>
		</td>

	</tr>
</table>

<!--begin delivery place description div-->
<table id="delivery_td" class="step">
	<input type="hidden" name="step_name" value="delivery_td"/>

	<tr >
		<label >*Ask to see the room where Normal Deliveries are conducted</label>
	</tr>

	<tr>
		<td><label>8. What is the setting of the Delivery Room?</label></td>
		<td><td><label>Private Room (accomodates one client)</label>
		<input type="radio" /></td>
		<td><label>Partitioned Shared Room</label>
		<input type="radio" /></td>
		<td><label>Non-Partitioned Shared Room</label>
		<input type="radio" /></td>
		</td>

	</tr>

	<!--end delivery place description td-->
</table>

<h3>NOTE THE AVAILABILITY AND FUNCTIONALITY OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

<table id="tableEquipmentList_1">

	<tr class="row-title">
		<td><label class="dcah-label">9. EQUIPMENT REQUIRED FOR DELIVERY SERVICES</label></td>
		<td><label class="dcah-label" style="width:45%"><b>Availability (A)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>
		<td><label class="dcah-label" style="width:45%"><b>Functioning (b)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>
	</tr>

	<tr class="row" id="mtr_1">
		<td><label>9a. Examination light</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_1" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_1" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_1" id="q9equipCode_1" value="EQP31" />
	</tr>
	<tr class="row" id="mtr_2">
		<td><label>9b. Delivery bed/ couch</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_2" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_2" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_2" id="q9equipCode_2" value="EQP32" />
	</tr>
	<tr class="row" id="mtr_3">
		<td><label>9c. Drip stand</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_3" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_3" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_3" id="q9equipCode_3" value="EQP33" />
	</tr>
	<tr class="row" id="mtr_4">
		<td><label>9d.Mackintosh (On the Delivery Couch)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_4" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_4" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_4" id="q9equipCode_4" value="EQP34" />
	</tr>
	<tr class="row" id="mtr_5">
		<td><label>9e. Linen(Draping)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_5" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_5" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_5" id="q9equipCode_5" value="EQP35" />
	</tr>
	<tr class="row" id="mtr_6">
		<td><label>9f.i. Linen(Delivery Couch)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_6" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_6" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_6" id="q9equipCode_6" value="EQP36" />
	</tr>
	<tr class="row" id="mtr_7">
		<td><label>9f.ii. Linen(Green Towels)</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_7" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_7" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_7" id="q9equipCode_7" value="EQP37" />
	</tr>
	<tr class="row" id="mtr_8">
		<td><label>9g. Sharps container</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_8" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipFQty_8" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q9equipCode_8" id="q9equipCode_8" value="EQP38" />
	</tr>
	<tr class="row" id="mtr_9">
		<td><label>9h. At least five or more 2-ml or 5-ml disposable syringes</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_9" id="q9equipCode_9" value="EQP39" />
	</tr>
	<tr class="row" id="mtr_10">
		<td><label>9i. Three properly labeled or colour coded IP buckets</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_10" id="q9equipCode_10" value="EQP40" />
	</tr>
	<tr class="row" id="mtr_11">
		<td><label>9j. High Level Chemical Disinfectant (Jik, Cidex)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q9equipCode_11" id="q9equipCode_11" value="EQP41" />
	</tr>
	<tr class="row" id="mtr_12">
		<td><label>9k. Soap for washing instruments (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_12" id="q9equipCode_12" value="EQP42" />
	</tr>
	<tr class="row" id="mtr_13">
		<td><label>9l.Soap for handwashing (constantly available)</label></td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_13" id="q9equipCode_13" value="EQP43" />
	</tr>
	<tr class="row" id="mtr_14">
		<td><label>9m.Properly Labelled or colour coded waste segragation bins</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label>Do not Know</label>
		<input type="radio" />
		<input name="q9equipAQty_14" type="number" class="cloned numbers  fromZero" min="0"/>
		<input type="hidden"  name="q9equipCode_14" id="q9equipCode_14" value="EQP44" />
		</td>
	</tr>
	<tr class="row" id="mtr_15">
		<td><label>9o. Single-use hand-drying towels (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_15" id="q9equipCode_15" value="EQP45" />
	</tr>
	<tr class="row" id="mtr_16">
		<td><label>9p. Running  Water for handwashing (constantly available)</label></td>

		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		<input type="hidden"  name="q9equipCode_16" id="q9equipCode_16" value="EQP46" />
	</tr>
</table>
<!--close editTable-->

<table>

	<tr class="row-title">
		<td ><label class="dcah-label"><b>10. Indicate the quantities available of the following delivery instruments</b></label></td>
		<td><label class="dcah-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Quantity</b></label></td>

	</tr>

	<tr class="row">
		<td ><label>10a. Cord scissors</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_1" id="q10equipAQty_1" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_1" id="q10equipCode_1" value="EQP47"/>
	</tr>

	<tr class="row">
		<td ><label>10b. Long artery Forceps (straight, lockable)</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_2" id="q10equipAQty_2" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_2" id="q10equipCode_2" value="EQP48" />
	</tr>

	<tr class="row">
		<td ><label>10c. Episiotomy scissors</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_3" id="q10equipAQty_3" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_3" id="q10equipCode_3" value="EQP49" />

	</tr>

	<tr class="row">
		<td ><label>10d. Kidney dishes</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_4" id="q10equipAQty_4" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_4" id="q10equipCode_4" value="EQP50" />
	</tr>

	<tr class="row">
		<td ><label>10e. Gallipots</label></td>
		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_5" id="q10equipAQty_5" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_5" id="q10equipCode_5" value="EQP51" />
	</tr>

	<tr class="row">
		<td ><label>10f. Sponge-holding forceps</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_6" id="q10equipAQty_6" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_6" id="q10equipCode_6" value="EQP52" />
	</tr>

	<tr class="row">
		<td ><label>10g. Needle holder</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_7" id="q10equipAQty_7" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_7" id="q10equipCode_7" value="EQP53" />
	</tr>

	<tr class="row">
		<td ><label> 10h. Dissecting forceps -toothed </label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_8" id="q10equipAQty_8" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_8" id="q10equipCode_8" value="EQP54" />
	</tr>

	<tr class="row">
		<td ><label>10i. Instrument tray</label></td>

		<td >
		<input type="number" class="cloned numbers  fromZero" name="q10equipAQty_9" id="q10equipAQty_9" min="0"/>
		</td>
		<input type="hidden"  name="q10equipCode_9" id="q10equipCode_9" value="EQP55" />

	</tr>
</table>
<br/>
<br/>
<!--/div-->
<!--end delivery kit contents div-->

<!--begin other equipments td-->
<table id="tableEquipmentList_2">
	<tr class="row-title">
		<td ><label class="dcah-label"><b>11. Other Equipment and supplies</b></label></td>
		<td ><label class="dcah-label" style="width:45%"><b>Availability (A)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>

		<td ><label class="dcah-label" style="width:45%"><b>Functioning (b)</b></label><label class="dcah-label" style="float:right;width:45%"><b>Quantity</b></label></td>

	</tr>

	<tr class="row" id="mtr_17">
		<td ><label>11a. Stethoscopes (Adult)</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_17" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_17" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_17" id="q11equipCode_17" value="EQP56" />
	</tr>

	<tr class="row" id="mmtr_18">
		<td ><label>11b. Stethoscopes (Paediatric)</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_18" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_18" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_18" id="q11equipCode_18" value="EQP57" />
	</tr>

	<tr class="row" id="mmtr_19">
		<td ><label>11c. BP machine</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_19" id="q11equipCode_19" value="EQP58" />
	</tr>

	<tr class="row" id="mtr_20">
		<td ><label>11d.i. Clinical Thermometer</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_20" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_20" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_20" id="q11equipCode_20" value="EQP59" />
	</tr>

	<tr class="row" id="mtr_21">
		<td ><label>11d.ii. Room Thermometer</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_21" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_21" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_21" id="q11equipCode_21" value="EQP60" />
	</tr>

	<tr class="row" id="mtr_22">
		<td ><label>11e. Fetoscope</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_22" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_22" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_22" id="q11equipCode_22" value="EQP61" />
	</tr>

	<tr class="row" id="mtr_23">
		<td ><label>11f. Sonicaid</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_23" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_23" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_23" id="q11equipCode_23" value="EQP62" />
	</tr>

	<tr class="row" id="mtr_24">
		<td ><label>11g. Suction Machine</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" /></br>
		<input name="q11equipAQty_24" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_24" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_24" id="q11equipCode_24" value="EQP63" />
	</tr>

	<tr class="row" id="mtr_25">
		<td ><label>11h. Weighing Scale for babies</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Digital</label>
		<input type="radio"/>
		<label>Graduated</label>
		<input type="radio"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_25" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_25" id="q11equipCode_25" value="EQP64" />
	</tr>

	<tr class="row" id="mtr_26">
		<td ><label>11i. Adult resuscitation tray</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_26" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_26" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_26" id="q11equipCode_26" value="EQP65" />
	</tr>

	<tr class="row" id="mtr_27a">
		<td ><label>11j. Indicate the Sterilization Method(s) used or avaialable in this facility</label></td>

		<td ><label>Autoclave</label>
		<input type="radio" />
		<label>HLD</label>
		<input type="radio" />
		<input type="text" style="display:none" name="sterilizationMethodOther" id="sterilizationMethodOther"/>
		</td>
	</tr>

	<tr class="row" id="mtr_27">
		<td ><label>11k. Indicate if a Manual Vacuum Aspiration kit is available in this unit or else where in the facility</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_27" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_27" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_27" id="q11equipCode_27" value="EQP66" />
	</tr>

	<tr class="row" id="mtr_29a">
		<td ><label>11l. Indicate the Vacuum Extractors available in this unit/facility</label></td>
		<td ><label>Ventouse</label>
		<input type="radio" />
		<label>Kiwi Vacuum Extractor</label>
		<input type="radio" />
		<input name="q11equipAQty_28" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_28" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_28" id="q11equipCode_28" />
	</tr>

	<tr class="row" id="mtr_29">
		<td ><label>11n. Dilatation and curretage kit</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_29" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_29" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_29" id="q11equipCode_29" value="EQP69" />
	</tr>

	<tr class="row" id="mtr_30">
		<td ><label>11o. Sterile gauze</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_30" id="q11equipCode_30" value="EQP70" />
	</tr>

	<tr class="row" id="mtr_31">
		<td ><label>11p. Sanitary pads</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_31" id="q11equipCode_31" value="EQP71" />
	</tr>

	<tr class="row" id="mtr_32">
		<td ><label>11q. Elbow length gloves</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_32" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_32" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_32" id="q11equipCode_32" value="EQP72" />
	</tr>

	<tr class="row" id="mtr_33">
		<td ><label>11r. Patellar Hammer</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_33" id="q11equipCode_33" value="EQP73" />
	</tr>

	<tr class="row" id="mtr_34">
		<td ><label>11s. Sutures</label></td>

		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<input name="q11equipAQty_34" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td ><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Do Not Know</label>
		<input type="radio" />
		<input name="q11equipFQty_34" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q11equipCode_34" id="q11equipCode_34" value="EQP74" />
	</tr>

	<tr class="row" id="mtr_35">
		<td ><label>11s.i. Oxygen-Cylinder</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_35" id="q11equipCode_35" value="EQP75" />
	</tr>

	<tr class="row" id="mtr_36">
		<td ><label>11s.ii. Oxygen-Concentrator</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q11equipCode_36" id="q11equipCode_36" value="EQP76" />
	</tr>

</table>

<table>

	<tr>
		<td ><label><b>12. Medications in the Maternity/Labour ward</b></label></td>
		<td ><label><b>Availability</b></label></td>

	</tr>

	<tr>
		<td ><label>12a.i. Injectable-Oxytocin(or Injectable-Syntocin)</label></td>
		<input type="hidden"  name="q12mnhCommodityName_1" id="q12mnhCommodityName_1" value="Injectable-Oxytocin" />

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		

	</tr>

	
	<tr class="row" id="mtr_40">
		<td ><label>12b.i. Indicate the available Intravenous fluids</label></td>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_41">
		<td ><label>12b.ii. Intravenous Metronidazole</label></td>
		<input type="hidden"  name="q12mnhCommodityName_4" id="q12mnhCommodityName_4" value="Intravenous Metronidazole"/>
		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

		</td>

		<!--td class="row" id="mtr_42">
		<td >
		12c. Injectable methergine
		</td>
		<input type="hidden"  name="q12mnhCommodityName_5" id="q12mnhCommodityName_5" value="Injectable methergine"/>

		<td >
		<select class="cloned left-combo" name="q12equipAvailability_5" id="q12equipAvailability_5">
		<option value="" selected="selected">Select One</option>
		<option>Always Available</option>
		<option>Sometimes Available</option>
		<option>Never Available</option>
		</select>
		</td>

		</td-->

	<tr class="row" id="mtr_43i">
		<td ><label>12di. Injectable Hydralazine/Apresoline</label></td>
		<input type="hidden"  name="q12mnhCommodityName_6" id="q12mnhCommodityName_6" value="Injectable Hydralazine"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>
	<!--td class="row" id="mtr_43ii">
	<td >
	12dii. Injectable Apresoline
	</td>
	<input type="hidden"  name="q12mnhCommodityName_7" id="q12mnhCommodityName_7" value="Injectable Apresoline"/>

	<td >
	<select class="cloned left-combo" name="q12equipAvailability_7" id="q12equipAvailability_7">
	<option value="" selected="selected">Select One</option>
	<option>Always Available</option>
	<option>Sometimes Available</option>
	<option>Never Available</option>
	</select>

	</td>

	</td-->

	<tr class="row" id="mtr_44">
		<td ><label>12e. Injectable diazepam</label></td>
		<input type="hidden"  name="q12mnhCommodityName_8" id="q12mnhCommodityName_8" value="Injectable diazepam"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_45">
		<td ><label>12f. Injectable magnesium sulfate</label></td>
		<input type="hidden"  name="q12mnhCommodityName_9" id="q12mnhCommodityName_9" value="Injectable magnesium sulfate"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_46">
		<td ><label>12g. Injectable penicillin</label></td>
		<input type="hidden"  name="q12mnhCommodityName_10" id="q12mnhCommodityName_10" value="Injectable amoxicillin/ampicillin"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_47">
		<td ><label>12h. Injectable gentamicin</label></td>
		<input type="hidden"  name="q12mnhCommodityName_11" id="q12mnhCommodityName_11" value="Injectable gentamicin"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_48">
		<td ><label>12i. Calcium gluconate</label></td>
		<input type="hidden"  name="q12mnhCommodityName_12" id="q12mnhCommodityName_12" value="Calcium gluconate"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_49">
		<td ><label>12j. Methyldopa/Aldomet</label></td>
		<input type="hidden"  name="q12mnhCommodityName_13" id="q12mnhCommodityName_13" value="Methyldopa/Aldomet"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_50">
		<td ><label>12k. Lidocaine (lignocaine) or other local anesthetic</label></td>
		<input type="hidden"  name="q12mnhCommodityName_14" id="q12mnhCommodityName_14" value="Lidocaine(lignocaine)/other local anesthetic"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_51">
		<td ><label>12l. Nifedipine Tablets</label></td>
		<input type="hidden"  name="q12mnhCommodityName_15" id="q12mnhCommodityName_15" value="Nifedipine Tablets"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_52">
		<td ><label>12m. Vitamin A</label></td>
		<input type="hidden"  name="q12mnhCommodityName_16" id="q12mnhCommodityName_16" value="Vitamin A"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>

	<tr class="row" id="mtr_53">
		<td ><label>12n. Vitamin K</label></td>
		<input type="hidden"  name="q12mnhCommodityName_17" id="q12mnhCommodityName_17" value="Vitamin K"/>

		<td ><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>

	</tr>
</table>

	<h3>New-Born Care</h3>
<!--begin newborn care div-->
<table id="nbc_td_1" class="step">

	<tr>
		<td class="row-title"><td><label class="dcah-label">QUESTION</label></td>
		<td ><label class="dcah-label">ANSWER</label></td>
		</td>
	</tr>
	<tr>
		<td><label>13. Does this facility perform newborn resuscitation?</label></td>
		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
	</tr>
</table>
<!--end of new born care div 1-->

<h3> Neonatal Unit</h3>
<!--begin neonatal unit div-->
<table id="neonatal_unit" class="step">
	<input type="hidden" name="step_name" value="neonatal_unit"/>

	<tr>
		
	</tr>

	<tr>
		<td><label class="dcah-label">14. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE</label></td><td><label class="dcah-label" style="width:45%">Availability (A)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td><td><label class="dcah-label" style="width:45%">Functioning (b)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td><td></td>
	</tr>
	<tr class="row2">
		<input type="button" id="editEquipmentListTopButton_3b" class="awesome myblue medium" value="Edit List"/>
	</tr>
	<tr class="row" id="mtr_58">
		<td><label>14c. Clock  with seconds arm</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_58" id="q14equipCode_58" value="EQP82" />
	</tr>
	<tr class="row" id="mtr_59">
		<td><label>14d. Neonatal Incubator</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_59" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_59" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_59" id="q14equipCode_59" value="EQP83" />
	</tr>
	<tr class="row" id="mtr_60">
		<td><label>14e. A Radiant Heater</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_60" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_60" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_60" id="q14equipCode_60" value="EQP84" />
	</tr>
	<tr class="row" id="mtr_61">
		<td><label>14f. Infant Scale</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_61" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_61" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_61" id="q14equipCode_61" value="EQP85" />
	</tr>
	<tr class="row" id="mtr_62">
		<td><label>14g. Suction bulb for mucus extraction</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_62" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_62" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_62" id="q14equipCode_62" value="EQP86" />
	</tr>
	<tr class="row" id="mtr_63">
		<td><label>14h. Suction apparatus for use with catheter</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<input name="q14equipAQty_63" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<td><label>Yes</label>
		<input type="radio" />
		<label>No</label>
		<input type="radio" />
		<label>Dont Know</label>
		<input type="radio" />
		<input name="q14equipFQty_63" type="number" class="cloned numbers  fromZero" min="0"/>
		</td>
		<input type="hidden"  name="q14equipCode_63" id="q14equipCode_63" value="EQP87" />
	</tr>
	<tr class="row" id="mtr_64">
		<td><label>14i. A flat, clean, dry and warm newborn resuscitation surface</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_64" id="q14equipCode_64" value="EQP88" />
	</tr>
	<tr class="row" id="mtr_65">
		<td><label>14j. Disposable cord ties or clamps</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_65" id="q14equipCode_65" value="EQP89" />
	</tr>
	<tr class="row" id="mtr_66">
		<td><label>14k. Clean and warm towels/cloths for drying / warming / wrapping baby</label></td>

		<td><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		</td>
		<td><label>Always Available</label>
		<input type="radio" />
		<label>Sometimes Available</label>
		<input type="radio" />
		<label>Never Available</label>
		<input type="radio" />
		</td>
		<input type="hidden"  name="q14equipCode_66" id="q14equipCode_66" value="EQP90" />
	</tr>
</table>
<!--end neonatal unit div-->

<h3>Blood Transfusion Services Assessment</h3>
<!--begin blood transfusion div-->
<table id="blood_transfusion" class="step">
	<input type="hidden" name="step_name" value="blood_transfusion"/>

	

	<tr class="row">
		<td ><label>15. Does this facility perform blood transfusions?</label></td>
		<td ><label>YES</label>
		<input type="radio" />
		<label>NO</label>
		<input type="radio" />
		<label for="q15BloodTransfusions_2">
	</tr>
	<tr>
		<td>Specify:</label></td><td><label>Blood Bank available</label></td>
		<td>
		<input type="radio" />
		<label>Transfusions done but no blood bank</label>
		<input type="radio" />
		</td>
	</tr>

</table>
<!--end blood transfusion div-->
<!--begin level-4-and-above-->

<div id="level_4_above" class="step">
	<div class="column-wide">
		<div class="hide-level">
			<tr class="row">
				<h3>Complete this section for Level 4, 5 and 6 Facilities</h3>
		</div>

		<table id="tableEquipmentList_4">
			<tr class="row-title">

				<td><label class="dcah-label">Supply/Equipment</label></td>
				<td><label class="dcah-label" style="width:45%">Availability (A)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td>
				<td><label class="dcah-label" style="width:45%">Functioning(b)</label><label class="dcah-label" style="float:right;width:45%">Quantity</label></td>
			</tr>
			<tr class="row" id="mtr_67">
				<td><label>16a. Operating Table</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_67" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_67" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_67" id="q16equipCode_67" value="EQP91" />
			</tr>

			<tr class="row" id="mtr_68">
				<td><label>16b. Operating Light</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_68" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input type="number" class="cloned numbers  fromZero" />
				</td>
				<input type="hidden"  name="q16equipCode_68" id="q16equipCode_68" value="EQP92" />
			</tr>

			<tr class="row" id="mtr_69">
				<td><label>16c. Anaesthetic machine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_69" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_69" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_69" id="q16equipCode_69" value="EQP93" />
			</tr>

			<tr class="row" id="mtr_70">
				<td><label>16d. Laryngoscopes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_70" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_70" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_70" id="q16equipCode_70" value="EQP94" />
			</tr>

			<tr class="row" id="mtr_71">
				<td><label>16e. Endotracheal tubes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_71" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_71" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_71" id="q16equipCode_71" value="EQP95" />
			</tr>

			<tr class="row" id="mtr_72">
				<td><label>16f. Anaesthetic drugs e.g ketamine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_72" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_72" id="q16equipCode_72" value="EQP96" />
			</tr>

			<tr class="row" id="mtr_73">
				<td><label>16g. Anaesthetic gases (halothane, NO2, Oxygen, etc)</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_73" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_73" id="q16equipCode_73" value="EQP97" />
			</tr>

			<tr class="row" id="mtr_74">
				<td><label>16h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_74" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_74" id="q16equipCode_74" value="EQP98" />
			</tr>

			<tr class="row" id="mtr_75">
				<td><label>16i. Scrub area adjacent to or in the operating room</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_75" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_75" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_75" id="q16equipCode_75" value="EQP99" />
			</tr>

			<tr class="row" id="mtr_76">
				<td><label>16j. Running Water</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				</td>
				<input type="hidden"  name="q16equipCode_76" id="q16equipCode_76" value="EQP100" />
			</tr>

			<tr class="row" id="mtr_77">
				<td><label>16k. Suction Machine</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_77" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_77" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_77" id="q16equipCode_77" value="EQP101" />
			</tr>

			<tr class="row" id="mtr_78">
				<td><label>16l. Standard Cesaerian Section kit</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_78" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_78" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_78" id="q16equipCode_78" value="EQP102" />
			</tr>

			<tr class="row" id="mtr_79">
				<td><label>16m. Sterile operation gowns</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_79" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_79" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_79" id="q16equipCode_79" value="EQP103" />
			</tr>

			<tr class="row" id="mtr_80">
				<td><label>16n. Sterile Drapes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_80" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_80" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_80" id="q16equipCode_80" value="EQP104" />
			</tr>

			<tr class="row" id="mtr_81">
				<td><label>16o. Sterile gloves in various sizes</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_81" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_81" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_81" id="q16equipCode_81" value="EQP105" />
			</tr>
			<tr>
				<td><label>Sizes</label></td>
				<td><label>Size 1</label>
				<input type="radio" />
				<label>Size 2</label>
				<input type="radio" />
				<label>Size 3</label>
				<input type="radio" />
				<label>Size 4</label>
				<input type="radio" />
				<label>Size 5</label>
				<input type="radio" />
				<label>Size 6</label></td><td>
				<input type="radio" />
				<label>Size 6.5</label>
				<input type="radio" />
				<label>Size 7</label>
				<input type="radio" />
				<label>Size 7.5</label>
				<input type="radio" />
				<label>Size 8</label>
				<input type="radio" />
				<label>Size 8.5</label>
				<input type="radio" />
				<label>Size 9</label>
				<input type="radio" />
				</td>
			</tr>

			<tr class="row" id="mtr_82">
				<td><label>16p. IV canulas</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_82" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_82" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_82" id="q16equipCode_82" value="EQP106" />
			</tr>

			<tr class="row" id="mtr_83">
				<td><label>16q. Drip Stand</label></td>
				<input type="hidden"  name="q16equipCode_105" id="q16equipCode_105" value="EQP107" />
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_83" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_83" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
			</tr>

			<tr class="row" id="mtr_84">
				<td><label>16r. Blood transfusion set</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_84" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_84" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_84" id="q16equipCode_84" value="EQP108" />
			</tr>

			<tr class="row" id="mtr_85">
				<td><label>16s. Recovery room/ recovery area</label></td>

				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipAQty_85" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<td><label>YES</label>
				<input type="radio" />
				<label>NO</label>
				<input type="radio" />
				<input name="q16equipFQty_85" type="number" class="cloned numbers  fromZero" min="0"/>
				</td>
				<input type="hidden"  name="q16equipCode_85" id="q16equipCode_85" value="EQP109" />
			</tr>
			<!--close div tableEquipmentList_4-->
		</table>
		<label class="dcah-label" style="text-align:center">End of Questionnaire</label>

	</div><!--close div level-hide-->
</div>


		');
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('DCAH Assessment Tool');
		$this -> mpdf -> SetHTMLHeader('<em>DCAH Assessment Tool</em>');
        $this -> mpdf -> SetHTMLFooter('<em>DCAH Assessment Tool</em>');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($html, 2);
		$report_name = 'DCAH Assessment Tool' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

}
