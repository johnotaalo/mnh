    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<meta name="description" content="Online Data Management Tool for the Ministry of Health, Governent of Kenya <?php echo date('Y')?>">
	<meta name="keywords" content="Kenya,MNH,commodity assessment,Nairobi,eHealth,ministry of health,GoK,government,survey,health analytics,mfl,maternal health,new born health care" />
    <meta name="author" content="Ministry of Health, Government of Kenya">
    
    <!--fav and touch icons -->
    <link rel="shortcut icon"  href="<?php echo base_url(); ?>/images/favicon.ico">
    <title><?php echo $title; ?></title>

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>css/fixed-layout.css" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />
	 <script src="<?php echo base_url()?>/js/jquery-1.8.2.min.js"></script>
	<script src="<?php echo base_url()?>/js/FusionMaps/FusionCharts.js"></script>
	<script src="<?php echo base_url()?>/js/Merged-JS.js"></script>
	<!--link href="<?php echo base_url(); ?>css/layout.css" rel="stylesheet" type="text/css" /-->
		<!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /-->
        
        <!--script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script-->
		<!-- -->
		<!-- Attach CSS files -->
	
		<!--link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css"/-->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--fav and touch icons -->

    <link rel="shortcut icon"  href="<?php echo base_url(); ?>/images/favicon.ico">
    
	<script>
	$(document).ready(function(){
	var selectClicked2;
	var selectValue2;
	var selectLink;
	$('.level2').click(function(){
		selectClicked2  = $(this).attr('id');
		selectValue2 = $('#'+selectClicked).attr('value');
		
		//alert(selectValue);
		//if(selectValue==2){
			switch(selectClicked2){
				case 'mnh-level2':
					alert(' ');
					selectLink = '<?php echo base_url();?>'+'mnh/analytics';
				break;
				case 'ch-level2' :
					alert(' ');
			  	 	selectLink = '<?php echo base_url();?>'+'ch/analytics';
				break;
			}
		//}
		
	});
	$('#mnh-btn').click(function(){
		alert(selectLink);
	});
	});
	</script>

    <link rel="shortcut icon"  href="<?php echo base_url(); ?>/images/favicon.ico">

