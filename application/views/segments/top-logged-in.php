    <div class="center-wrapper">
		<div class="left" ><?php echo '<strong>'.date("l, d F Y").'</strong>';?> <span class="text-separator">|</span>Logged on as, <?php echo '<strong>Respondent</strong> for <strong>'. $this -> session -> userdata('dName').' District</strong>';?></div>
		<div class="right"><a href="<?php echo base_url().$this -> session -> userdata('survey').'/assessment';?>">Total Facilities:</a> <strong><?php echo  $this -> session -> userdata('fCount');?></strong><span class="text-separator">|</span><a href="<?php echo base_url().'session/close';?>" >Logout</a></div>
		<div class="clearer">&nbsp;</div>
	</div>