<html>
	<head>
		<?php $this->load->view('segments/admin_head');?>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>MNCH Admin</title>
	
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<!--div class="container">
		<nav>
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-list"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li>
									<a class="gn-icon gn-icon-download">Downloads</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
										<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
									</ul>
								</li>
								<li><a class="gn-icon gn-icon-cog">Settings</a></li>
								<li><a class="gn-icon gn-icon-help">Help</a></li>
								<li>
									<a class="gn-icon gn-icon-archive">Archives</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Articles</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					<!--/nav>
				</li>
				<li><a href="">Stats</a></li>
			</ul>
		</nav>
		</div><!-- /container -->

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
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>