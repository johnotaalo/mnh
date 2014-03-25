<?php
$mfName = $this -> session -> userdata('fName');
$mfCode = $this -> session -> userdata('fCode');
?>
<script src="<?php echo base_url()?>js/js_libraries.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/style-table.js"></script>


<script>
				
</script>

<style type="text/css">
.ui-autocomplete-loading {
background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
border-color: #ffffff;
color:#FF0000;
}

</style>
<script src="<?php echo base_url();?>js/survey.js"></script>
<script>
	var base_url = "<?php echo base_url();?>";
	var survey   = "<?php echo $this->session->userdata('survey')?>";
	$(document).ready(startSurvey(base_url,survey));
</script>
</head>
<body id="top">
<div id="site">
	<div class="center-wrapper">
		<!--logo and main nav-->
		<?php $this->load->view('segments/nav-logged-in'); ?>
		<div class="main form-container ui-widget" >
			<?php echo $form; ?>
			
		</div>
		
	</div>
</div>