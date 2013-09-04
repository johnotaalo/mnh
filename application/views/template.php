<!--
	Template Page	
-->
<html>
	<!--
		Head
	-->
	<head>
		<?php $this -> load->view('segments/head') ?>
		<div id="network">
	<?php $this->load->view('segments/top-public'); ?>
</div>
	</head>
	<body>
		<div id="header">
			<?php $this -> load->view('segments/header'); ?>
		</div>
		<div id="content">
			<?php $this -> load->view($content); ?>
		</div>
		<div id="footer">
			<?php $this -> load->view('segments/footer'); ?>
		</div>
	</body>
</html>