<?php
$mfName = $this -> session -> userdata('fName');
$mfCode = $this -> session -> userdata('fCode');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

	<head>
		
		<?php $this->load->view('segments/meta'); ?>
		
		
		<!-- Attach CSS files -->
		
		<!-- Attach JavaScript files -->
		<!--script src="http://code.jquery.com/jquery-latest.min.js" charset="utf-8"></script-->
		<script src="<?php echo base_url()?>js/js_libraries.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/style-table.js"></script>
		
		
		<script>
		$().ready(function(){
			/**
			 * variables
			 */
			var form_id='';
			var link_id='';
			var linkIdUrl='';
			var linkSub='';
			var linkDomain='';
			var visit_site = ''; 
			var devices='';
			
				
			    //start of close_opened_form click event
				$("#close_opened_form").click(function() {

				$(".form-container").load('<?php echo base_url() . 'c_front/formviewer'; ?>',function(){

					//delegate events
					loadGlobalScript();

					});
					});/*end of close_opened_form click event

					/*----------------------------------------------------------------------------------------------------------------*/

					/*start of loadGlobalJS*/
					var onload_queue = [];
					var dom_loaded = false;

					function loadGlobalJS(src, callback) {
					var script = document.createElement('script');
					script.type = "text/javascript";
					script.async = true;
					script.src = src;
					script.onload = script.onreadystatechange = function() {
					if (dom_loaded)
					callback();
					else
					onload_queue.push(callback);
					// clean up for IE and Opera
					script.onload = null;
					script.onreadystatechange = null;
					};
					var head = document.getElementsByTagName('head')[0];
					head.appendChild(script);
					}/*end of loadGlobalJS*/

					function domLoaded() {
					dom_loaded = true;
					var len = onload_queue.length;
					for (var i = 0; i < len; i++) {
					onload_queue[i]();
					}
					onload_queue = null;
					};/*end of domLoaded*/

					/*-----------------------------------------------------------------------------------------------------------*/

					//check box/checked radio function was here

					domLoaded();

					/*----------------------------------------------------------------------------------------------------------------*/

					/*reset form event*/
					/*start of reset_current_form click event*/
					$("#reset_current_form").click(function() {
					$(form_id).resetForm();

					});/*end of reset_current_form click event*/

					/*----------------------------------------------------------------------------------------------------------------*/
					var loaded=false;
					function loadGlobalScript(){
					loaded=true;

					var scripts=['<?php echo base_url();?>js/js_ajax_load.js'];

						for(i=0;i<scripts.length;i++){
						loadGlobalJS(scripts[i],function(){});
						}
						form_id='#'+$(".form-container").find('form').attr('id');

						}
						/*----------------------------------------------------------------------------------------------------------------*/

				
				
				//load 1st section of the assessment on page load
				$(".form-container").load('<?php echo base_url() . 'c_load/get_new_form'; ?>',function(){

					//include remote scripts
					loadGlobalScript();renderFacilityInfo();select_option_changed();

					});
				
				/*-----------------------------------------------------------------------------------------------------------------*/
				/*start of ajax data requests*/
				function renderFacilityInfo(){
    			 $.ajax({
		            type: "GET",

		            	url: "<?php echo base_url()?>c_load/getFacilityDetails",
						dataType:"json",
						cache:"true",
						data:"",
						success: function(data){
						var info = data.rData;
						$.each(info , function(i,facility) {
						//render found data
						$("#facilityName").val(facility.facilityName);
						
						$("#facilityType").val(facility.facilityType);
  						$("#facilityLevel").val(facility.facilityLevel);
  						$("#facilityOwnedBy").val(facility.facilityOwnedBy);
						$("#facilityDistrict").val(facility.facilityDistrict);
						$("#facilityCounty").val(facility.facilityCounty);
						
						/*$("#facilityType option").filter(function() {return $(this).text() == facility.facilityType;}).first().prop("selected", true);
  						$("#facilityLevel option").filter(function() {return $(this).text() == facility.facilityLevel;}).first().prop("selected", true);
  						$("#facilityOwnedBy option").filter(function() {return $(this).text() == facility.facilityOwnedBy;}).first().prop("selected", true);
						$("#facilityDistrict option").filter(function() {return $(this).text() == facility.facilityDistrict;}).first().prop("selected", true);
						$("#facilityCounty option").filter(function() {return $(this).text() == facility.facilityCounty;}).first().prop("selected", true);*/
						
						
						$("#facilityInchargename").val(facility.facilityInchargeContactPerson);
						$("#facilityInchargemobile").val(facility.facilityInchargeTelephone);
						$("#facilityInchargeemail").val(facility.facilityInchargeEmail);
						
						$("#facilityMchname").val(facility.facilityMCHContactPerson);
						$("#facilityMchmobile").val(facility.facilityMCHTelephone);
						$("#facilityMchemail").val(facility.facilityMCHEmail);
						
						$("#facilityMaternityname").val(facility.facilityMaternityContactPerson);
						$("#facilityMaternitymobile").val(facility.facilityMaternityTelephone);
						$("#facilityMaternityemail").val(facility.facilityMaternityEmail);
					
						//}
						});

						//return false;
						},
						beforeSend:function(){},
						afterSend:function(){}
						});
						return false;
						}
						/*end of ajax data requests*/
						/*-----------------------------------------------------------------------------------------------------------------*/
						
			
			//equipment availability change detectors			
			function select_option_changed(){
								
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {
                     
					var cb_id;
					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).hasClass('cloned left-combo')){

					cb_id='#'+$(this).attr('id');
					//alert(cb_id);
					
					/*
					 * display q5 comment on NO option
					 */
					if(cb_id=='#lndq4FacilityDelivery'){
						//alert(cb_id);
						if($(cb_id).val() == 'No'){
						$("#q4comm").show();
						}else{
							$("#q4comm").hide();
						}
					}
					
					/*
					 * display q6b on q6a YES option
					 */
					if(cb_id=='#lndq6aConductingDelivery'){
						if($(cb_id).val() == 'Yes'){
						$("#q6ay").show();
						}else{
							$("#q6ay").hide();
						}
					}
					
					if(cb_id.indexOf('_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")) {
						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}
					
				}
				});
				
				//enable equipment availability option
				$('#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_2i,#editEquipmentListTopButton_2ii,#editEquipmentListTopButton_2a,#editEquipmentListTopButton_2b,#editEquipmentListTopButton_1a,#editEquipmentListTopButton_1b').click(function(){
					                $('#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_2i,#tableEquipmentList_2ii,#tableEquipmentList_2a,#tableEquipmentList_2b,#tableEquipmentList_1a,#tableEquipmentList_1b').find('select:disabled').each(function(){
                	if($(this).hasClass('cloned left-combo'))
                	$(this).prop('disabled', false);
                	
                });
				//$('#tableEquipmentList').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
				
			     //hide/show  input field on Specify(other) selected
			     
				$('#sterilizationMethod,#nbcgqBloodTransfusionsDone').change(function(){
					
					method=$('#sterilizationMethod').val();
					csDone=$('#nbcgqCSDone').val();
					btDone=$('#nbcgqBloodTransfusionsDone').val();
					if(method=="other"){
						
						$("#sterilizationMethodOther").show();
					}else{
						$("#sterilizationMethodOther").hide();
					}

					if(btDone=='Yes'){
							$("#bloodBankAvailable").show();
					}else{
							$("#bloodBankAvailable").hide();
					}
					
				});
				
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {
					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).attr('class')=='cloned left-combo'){
					cb_id='#'+$(this).attr('id');
					if(cb_id.indexOf(0,'_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")||($(cb_id).val() == "Never Available")) {

						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}//for enabling/disabling rows
					} //close if($(this).attr('class')=='cloned left-combo')
					
					//hide or show qn18 on facility's level
					$('#facilityLevel').change(function(){
						if($(this).val()<3){
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', true);
						$('hide-level').hide();
						}else{
						$('hide-level').show();	
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', false);
						}
					});
					
					//specify ort supplier if other or partner is selected
					$('#ortSupplier').change(function(){
						if($(this).val()=="Partners" || $(this).val()=="Others"){
						$('#partner').show();
						}else{
							$('#partner').hide();
						}
					});
					
					//check if deliveries are conducted		
					$('#cDeliveries').change(function(){
						if($(this).val()=="Yes" || $(this).val()=="" ){
							//show next section, hide this section
							$('#delivery_centre').hide();
							$('#delivery_centre').find('input').prop('disabled',false);
							//alert('Y');
						}else if($(this).val()=="No"){
							//show the follow up qn
							$('#delivery_centre').show();
							//alert('N');
						}
					});
					
				
					
				
				});
				
				//to review equipment assessment--enables the disabled select options
				$('#editEquipmentListTopButton,#editEquipmentListTopButton_2,#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_4').click(function(){
				$('#tableEquipmentList,#tableEquipmentList_2,#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_4').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
						}//end of select_option_changed
				
				
				
				
				

					//     
					$(function() {
					
					   var clonedHeaderRow;
					
					   $(".persist-area").each(function() {
					       clonedHeaderRow = $(".persist-header", this);
					       clonedHeaderRow
					         .before(clonedHeaderRow.clone())
					         .css("width", clonedHeaderRow.width())
					         .addClass("floatingHeader");
					         
					   });
					   
					   $('.form-container')
					    .scroll(UpdateTableHeaders)
					    .trigger("scroll");
					   
					});		

						}); /*close document ready*/
								
								//disable or enable maternity contact information on check	
								 $('#noMaternityContact').change(function(){
								 	if($(this).is(':checked')){
								 		$('#maternity_info').find('input').prop('disabled', true);
								 		$('#maternity_info').hide();
								 	}else{
								 		$('#maternity_info').show();
								 		$('#maternity_info').find('input').prop('disabled', false);
								 	}
								 });
								 
								
								//fixed heading function
								function UpdateTableHeaders() {
								   $(".persist-area").each(function() {
								   
								       var el             = $(this),
								           offset         = el.offset(),
								           scrollTop      = $(window).scrollTop(),
								           floatingHeader = $(".floatingHeader", this)
								       
								       if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
								           floatingHeader.css({
								            "visibility": "visible"
								           });
								       } else {
								           floatingHeader.css({
								            "visibility": "hidden"
								           });      
								       };
								   });
								}
			
				  	
				  	
						/*---------------------end form wizard functions----------------------------------------------------------------*/
						
		</script>
		
		<style type="text/css">
		.ui-autocomplete-loading {
        		background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
        		border-color: #ffffff;
        		color:#FF0000;
    		}
    	
		</style>
		
	</head>
	<body id="top">

<div id="network">
	<?php $this->load->view('segments/top-logged-in'); ?>
</div>

<div id="site">
	<div class="center-wrapper">

		<!--logo and main nav-->
		<?php $this->load->view('segments/nav-public'); ?>

		<div class="main form-container ui-widget" >
             <?php echo $form; ?>
			

		</div>

		<!--footer-->
		<?php $this->load->view('segments/footer'); ?>

	</div>
</div>

</body>
		</html>
   