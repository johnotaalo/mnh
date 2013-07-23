<?php
$mfName = $this -> session -> userdata('fName');
$mfCode = $this -> session -> userdata('fCode');
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

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
				$(".form-container").load('<?php echo base_url() . 'c_load/get_facility_list'; ?>',function(){
					       // fcode=12864;
							//loadGlobalScript();//renderFacilityInfo(fcode);
							
							//so which link was clicked?
						  $('.action').on('click',function(){
							link_id='#'+$(this).find('a').attr('id');
							link_id=link_id.substr(link_id.indexOf('#')+1,link_id.length);
							//linkSub=$(link_id).attr('class');
							//linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
							fcode=link_id;
							
							//alert(link_id);
							if(link_id)
							
							<?php if($this->session->userdata('survey')=='mnh'){?>
								$(".form-container").load('<?php echo base_url();?>c_load/get_mnh_form',function(){
							<?php }else{?>
								$(".form-container").load('<?php echo base_url();?>c_load/get_mch_form',function(){
							<?php }?>
							
							//delegate events
							//if(loaded==false)
							//include remote scripts
					        loadGlobalScript();renderFacilityInfo(fcode);break_form_to_steps(form_id);select_option_changed();
							
							 });
							
							})/*end of which link was clicked*/
							/*----------------------------------------------------------------------------------------------------------------*/
					});
				
				/*-----------------------------------------------------------------------------------------------------------------*/
				/*start of ajax data requests*/
				function renderFacilityInfo(fcode){
    			 $.ajax({
		            type: "GET",

		            	url: "<?php echo base_url()?>c_load/getFacilityDetails",
						dataType:"json",
						cache:"true",
						data:"fcode="+fcode,
						success: function(data){
						var info = data.rData;
						$.each(info , function(i,facility) {
						//render found data
						//$("#facilityName").val(facility.facilityName).prop('disabled', true);
						$("#facilityName").text(facility.facilityName);
						$('#facilityMFLCode').val(facility.facilityMFC);
						$('#facilityHName').val(facility.facilityName);
						
						//$("#facilityType").val(facility.facilityType);
  						$("#facilityLevel").val(facility.facilityLevel);
  						$("#facilityOwnedBy").val(facility.facilityOwnedBy);
						//$("#facilityDistrict").val(facility.facilityDistrict);
						//$("#facilityCounty").val(facility.facilityCounty);
						
						$("#facilityType option").filter(function() {return $(this).text() == facility.facilityType;}).first().prop("selected", true);
  						$("#facilityLevel option").filter(function() {return $(this).text() == facility.facilityLevel;}).first().prop("selected", true);
  						$("#facilityOwnedBy option").filter(function() {return $(this).text() == facility.facilityOwnedBy;}).first().prop("selected", true);
						$("#facilityDistrict option").filter(function() {return $(this).text() == facility.facilityDistrict;}).first().prop("selected", true);
						$("#facilityCounty option").filter(function() {return $(this).text() == facility.facilityCounty;}).first().prop("selected", true);
						
						
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
					
					
					
					//specify ort supplier if other or partner is selected
					$('#ortSupplier').change(function(){
						if($(this).val()=="Partners" || $(this).val()=="Others"){
						$('#partner').show();
						}else{
							$('#partner').hide();
						}
					});
					
				
				});
				
				//to review equipment assessment--enables the disabled select options
				$('#editEquipmentListTopButton,#editEquipmentListTopButton_2,#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_4').click(function(){
				$('#tableEquipmentList,#tableEquipmentList_2,#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_4').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
				
				 
						}//end of select_option_changed
				
							

						}); /*close document ready*/
								
								
								function break_form_to_steps(form_id){
							//form_id='#zinc_ors_inventory';
						   //alert(form_id);	
						   var end_url;
								$(form_id).formwizard({ 
								 	formPluginEnabled: true,
								 	validationEnabled: true,
								 	historyEnabled:true,
								 	focusFirstInput : true,
								 	textNext : 'Save and Go to the Next Section',
		                            textBack : 'View Previous Section',
								 	formOptions :{
										//success: function(data){$("#status").fadeTo(500,1,function(){ $(this).html("Thank you for completing this assessment! :) ").fadeTo(5000, 0); })},
										//beforeSubmit: function(data){$("#data").html("Processing...");},
										dataType: 'json',
										resetForm: true,
										disableUIStyles:true
								 	}
								 });
								 
								 //remove some jQueryUI styles
								$(form_id).find('input,select,radio,form').removeClass('ui-helper-reset ui-state-default ui-helper-reset ui-wizard-content');
								
								  var remoteAjax = {}; // empty options object

								$(form_id+" .step").each(function(){ // for each step in the wizard, add an option to the remoteAjax object...
									remoteAjax[$(this).attr("id")] = {
										<?php if($this->session->userdata('survey')=='mnh'){?>
											url : "<?php echo base_url()?>submit/c_form/complete_mnh_survey", // the url which stores the stuff in db for each step
										<?php }else{?>
											url : "<?php echo base_url()?>submit/c_form/complete_ch_survey", // the url which stores the stuff in db for each step
										<?php }?>
										dataType : 'json',
										beforeSubmit: function(data){$("#data").html("<div class='error ui-autocomplete-loading' style='width:auto;height:25px'>Processing...</div>")},
										//beforeSubmit: function(data){$("#data").html("Saving the previous section's response")},
										success : function(data){
										 			if(data){ //data is either true or false (returned from store_in_database.html) simulating successful / failing store
											 			//$("#data").show();
											 			$("#data").html("Section was Saved Successfully...").fadeTo("slow",0);
																$(form_id).bind("after_remote_ajax", function(event, fdata){
																	//console.log($(form_id).formwizard('state'));
																  if(form_id=="#mnh_tool"){
																  	 if(fdata.currentStep=='section-7'){
																  //	alert('Yes');
																   //$(form_id).formwizard('reset');
																  	//$(form_id).formwizard('show','No');
																  	// console.log($(form_id).formwizard('state'));
																  	$(".form-container").load('<?php echo base_url();?>c_load/survey_complete',function(){
																  		window.location='<?php echo base_url();?>commodity/assessment'; });
																  	
																  }
																  }else{
																  	 if(fdata.currentStep=='section-6'){
																    //alert('Yes');
																   //$(form_id).formwizard('reset');
																  	//$(form_id).formwizard('show','No');
																  	// console.log($(form_id).formwizard('state'));
																  	$(".form-container").load('<?php echo base_url();?>c_load/survey_complete',function(){
																  		window.location='<?php echo base_url();?>commodity/assessment'; });
																  	
																  }
																  }
																 
																});
											 		}else{
											 			$("#data").html("");
											 			alert("An unknown error occurred, try retaking the survey later on. Kindly report this incidence.");
											 			return false;
											 		}
											 		
										 			return data; //return true to make the wizard move to the next step, false will cause the wizard to stay on the current step
										 		}
										};
										
										
								});
						
								$(form_id).formwizard("option", "remoteAjax", remoteAjax); // set the remoteAjax option for the wizard
								
								
								
								$(form_id).bind("before_step_shown", function(event, data){
									
									//alert(form_id);
										if(form_id=="#mch_tool"){						
									if(data.previousStep=='section-6'){
										//alert('yes');
										if(data.currentStep=='No'){
										$("#data").fadeTo(5000,0);
										$('#sectionNavigation').hide();
										
										}
									}else if(data.currentStep=='section-6'){
										//$(form_id).formwizard("destroy");
										$('#back').prop('disabled',true);
									}else{
										$('#sectionNavigation').show();
									}
									
									}else{
										if(data.previousStep=='section-1'){
										//alert('yes');
										if(data.currentStep=='No'){
										$("#data").fadeTo(5000,0);
										//$('#sectionNavigation').hide();
										$(".form-container").load('<?php echo base_url();?>c_load/survey_complete',function(){
										window.location='<?php echo base_url();?>commodity/assessment'; });
										
										}
									}else if(data.currentStep=='section-6'){
										//$(form_id).formwizard("destroy");
										$('#back').prop('disabled',true);
									}else{
										$('#sectionNavigation').show();
									}
									}
								});
								
							 //check if deliveries are conducted		
								$('#facDeliveriesDone').change(function(){
									if($(this).val()=="Yes" || $(this).val()=="" ){
										//show next section, hide this section
										$('#delivery_centre').find('input').prop('disabled',true);
										$('#delivery_centre').hide();
										
										//alert('Y');
									}else if($(this).val()=="No"){
										//show the follow up qn
										$('#delivery_centre').find('input').prop('disabled',false);
										$('#delivery_centre').show();
										
										//alert('N');
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
								
								 $(function() {
					
								   var clonedHeaderRow;
								
								   $(".persist-area").each(function() {
								       clonedHeaderRow = $(".persist-header", this);
								       clonedHeaderRow
								         .before(clonedHeaderRow.clone())
								         .css("width", clonedHeaderRow.width())
								         .addClass("floatingHeader");
								         
								   });
								   
								   $(window)
								    .scroll(UpdateTableHeaders())
								    .trigger("scroll");
								   
								});
								 
								//$(form_id).formwizard('show','section-7');
			
				  	}//--end of function break_form_to_steps(form_id)
			
				  	
				  	
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
		<?php $this->load->view('segments/nav-logged-in'); ?>

		<div class="main form-container ui-widget" >
             <?php echo $form; ?>
			

		</div>

		<!--footer-->
		<?php $this->load->view('segments/footer'); ?>

	</div>
</div>

</body>
		</html>
   