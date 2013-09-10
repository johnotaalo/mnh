 
		<div class="left" ><i class="icon-calendar"></i><?php echo '<strong>'.date("l, d F Y").'</strong>';?> <span class="text-separator">|</span><i class="icon-user"></i>Logged on as, <?php echo '<strong>Respondent</strong> for <strong>'. $this -> session -> userdata('dName').' District</strong>';?></div>
		<div class="right">
		<li class="current-tab">
		<a href="<?php echo base_url().$this -> session -> userdata('survey').'/assessment';?>"><i class="icon-building"></i>Total Facilities:</a> <strong><?php echo  $this -> session -> userdata('fCount');?></strong><span class="text-separator">|</span><a href="<?php echo base_url().'session/close';?>" >Logout</a></div>
		</li>
		<div class="clearer">&nbsp;</div>
	