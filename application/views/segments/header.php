		<div id="network">
	<?php 
	
	if(isset($logged)){
		$this->load->view('segments/top-logged-in'); 
	}
	else{
		$this->load->view('segments/top-public'); 
	}
	
	?>
	
</div>