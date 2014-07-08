<html>
	<head>
		<?php $this->load->view('segments/admin_head');?>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>MNCH Admin</title>
	
	</head>
	<body>

		<div id="menu">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
    <li class="name">
      <h1><a href="#"><i class="fi-list"></i>MNCH Admin</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar icon"><a href="#"><span>Menu</span></a></li>
  </ul>
  <section class="top-bar-section">
  <ul class="left">
<li class="divider hide-for-small"></li>
<li class=""><a href="<?php echo base_url()?>firepad">Documentation</a>
</li>
</ul>
</section>
  </nav>
</div>

<section id="content">
<?php $this->load->view($contentView); ?>
</section>

		<script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/gnmenu.js"></script>
		<script src="<?php echo base_url(); ?>assets/javascripts/foundation/foundation.js"></script>
	</body>
</html>