<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <?php //$this->load->view('segments/meta');?>
    <?php $this->load->view('segments/head');?>
    <?php //$this->load->view('segments/analytics_css');?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/metronic.css">

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
    <!-- BEGIN HEADER -->

        <?php $this->load->view('segments/header');?>

    <?php $this -> load -> view('segments/nav-public'); ?>


    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->
        <?php $this->load->view('segments/analytics_sidebar_menu');?>
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>portlet Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here will be a configuration form</p>
                </div>
            </div>
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE CONTAINER-->
            <div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">

                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">
                        	
                           <?php echo $analytics_main_title; ?> for <?php echo $this->session->userdata('county_analytics')." County:"?> <?php echo strtoupper($this->session->userdata('survey')) ?> <small><?php echo $analytics_mini_title; ?></small> 
                            <h4 style="float:right;padding-right:3%;"><?php //echo $this->session->userdata('county_analytics') ?>


                            </h4>
                        </h3>

                        <ul class="breadcrumb">

                            <li><a id="breadcrumb-title">No Section Selected</a></li>
                            <i class="fa fa-chevron-right"></i>
                            <li><a id="breadcrumb-sub-title">Select a Statistic</a></li>
                            <label id="county_select_label" for="county_select">
                            <span>Select a County</span>
                            <select name="county_select" id="county_select" class="input">
                                <option selected=selected>No County Selected</option>
                                    <?php echo $this->selectReportingCounties;?>
                            </select>
                            </label>
                            <label href="#reportingCountiesModal" data-toggle="modal" id="reportingLabel"><span>Reporting Statistics : </span>
                                <div id="reportingBar">

                                </div>
                            </label>


                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <?php $this->load->view($analytics_content_to_load);?>
                <!-- END PAGE CONTENT-->
            </div>
            <!-- BEGIN PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
          &copy; <?php echo date('Y');?> Ministry of Health, Government of Kenya
        <div class="span pull-right">
            Move to Top
            <a href="#" class="go-top">
                <i class="fa fa-angle-double-up fa-7x title="Top""></i>
                &nbsp; Move to Top
            </a>


        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS -->
    <?php //$this->load->view('segments/analytics_js'); ?>
    <script src="<?php echo base_url();?>js/core.js"></script>
    <script src="<?php echo base_url();?>js/analytics.js"></script>
    <script>
    var base_url = "<?php echo base_url();?>";
    var county   = "<?php echo $this->session->userdata('county_analytics');?>";
    var survey   = "<?php echo $this->session->userdata('survey')?>";
    $(document).ready(startAnalytics(base_url,county,survey));
    </script>
    <!-- END JAVASCRIPTS -->
    <?php $this->load->view('segments/modals')?>
</body>
<!-- END BODY -->
</html>
