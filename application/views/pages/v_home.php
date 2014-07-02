<div id="site">
    <div class="center-wrapper">

        <!--logo and main nav-->
        <?php $this -> load -> view('segments/nav-public'); ?>

        <div class="main" >
            <div class="row">
                <div class="tile link" id="surveys">
                    <h3>Current Surveys</h3>
                    <img src="<?php echo base_url(); ?>images/survey.PNG" />

                    <div class="tile-content">
                        <p>
                            <!--img src="<?php echo base_url()?>images/survey.png" alt="" width="150" height="120" class="bordered" /-->
                        </p>

                        <!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
                        <p></p>

                        <!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

                        <div class="post-body">

                            <!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->

                            <p class="large"></p>

                            <p>
                            <ul class="nice-list">
                                <li>
                                    <a href="<?php echo base_url(); ?>mnh/takesurvey"> 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment-Baseline </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>ch/takesurvey"> 2. Child Health - Diarrhoea, Treatment Scale Up Assessment-Baseline </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>hcw/takesurvey"> 3. IMCI Follow-Up Tool Assessment-Baseline</a>
                                </li>
                                <!--li>Post surveys online for easy access</li>
<li>Conduct timely Analysis</li-->
                            </ul>
                            </p>
                    </div>
                </div>

                <!--div class="content-separator"></div-->

            </div>

            <div class="tile map" id="reporting-rates">
                <h3>Reporting Rates</h3>
                <div class="map-header">

                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                            Maternal and Neonatal Health <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a data-survey="mnh" data-survey-category="baseline" href="#">Baseline</a></li>
                            <li><a data-survey="mnh" data-survey-category="mid-term" href="#">Mid-Term</a></li>
                            <li><a data-survey="mnh" data-survey-category="end-term" href="#">End-Term</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                            Child Health <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a data-survey="ch" data-survey-category="baseline" href="#">Baseline</a></li>
                            <li><a data-survey="ch" data-survey-category="mid-term" href="#">Mid-Term</a></li>
                            <li><a data-survey="ch" data-survey-category="end-term" href="#">End-Term</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                            IMCI Follow-Up Tool <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a data-survey="hcw" data-survey-category="baseline" href="#">Baseline</a></li>
                            <li><a data-survey="hcw" data-survey-category="mid-term" href="#">Mid-Term</a></li>
                            <li><a data-survey="hcw" data-survey-category="end-term" href="#">End-Term</a></li>
                        </ul>
                    </div>

                    <h5 id="current-map">Current Map : None Chosen</h5>

                </div>

                <div class="post" id="map">

                </div><!--./kenya_county_map-->



            </div><!--./middle_column-->

            <div class="tile link" id="analytics">

                <h3>Survey Analysis</h3>
                <img src="<?php echo base_url(); ?>images/analysis.PNG" />

                <div class="tile-content">
                    <p>
                        <!--img src="<?php echo base_url()?>images/analysis.png" alt="" width="150" height="120" class="bordered" /-->
                    </p>

                    <!--div class="post-title"><h2><a>Take Survey</a></h2></div-->
                    <p></p>

                    <!--div class="post-date">Last Update 23:22, Saturday, June 15, 2013 by Admin</div-->

                    <div class="post-body">

                        <!--p class="large">This is the Ministry of Health, Online Data Management tool.</p-->

                        <p class="large"></p>
                        <p>
                        <ul class="nice-list">
                            <!--li><a href="<?php echo base_url(); ?>mnh/analytics"> 1. Maternal and Newborn Health Survey Analytics</a></li-->

                            <li>
                                <a href="<?php echo base_url(); ?>mnh/analytics" > 1. Maternal Neonatal Health - Emergency Obstetric Care Assessment </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>ch/analytics" > 2. Child Health - Diarrhoea, Treatment Scale Up Assessment </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>hcw/analytics" > 3. IMCI Follow-Up Tool Assessment </a>
                            </li>
                        </ul>
                        </p>
                </div>
            </div>

            <!--div class="content-separator"></div-->

        </div>
    </div>


</div>

<!--footer-->
<?php //$this->load->view('segments/footer-public'); ?>

</div>
</div>
<script>
    $(document).ready(function(){
        var styles1={
            'padding':'2%',
            'border':'2px solid #ddd',
            'color':'black'
        }
        var styles2={
            'text-decoration':'none',
            'color':'#005580',
            'border':'none'
        }



        $('#mnh_map').hide();
        $('#ch-map').css(styles1);
        $('#hcw_map').hide();


        $('#mnh-map').click(function(){
            //alert(' ');
            $('#mnh_map').show();
            $('#ch_map').hide();
            $('#hcw_map').hide();

            $('#mnh-map').css(styles1);
            $('#ch-map').css(styles2);
            $('#hcw-map').css(styles2);
        });


$('button').css('display','inline-block');
        $('#ch-map').click(function(){
            //alert(' ');
            $('#ch_map').show();
            $('#mnh_map').hide();
            $('#hcw_map').hide();

            $('#ch-map').css(styles1);
            $('#mnh-map').css(styles2);
            $('#hcw-map').css(styles2);
        });


        $('#hcw-map').click(function(){
            //alert(' ');
            $('#hcw_map').show();
            $('#mnh_map').hide();
            $('#ch_map').hide();

            $('#hcw-map').css(styles1);
            $('#mnh-map').css(styles2);
            $('#ch-map').css(styles2);
        });
        runMap('empty','empty');
        $('.dropdown-menu li a').click(function(){
            survey=$(this).attr('data-survey');
            survey_category=$(this).attr('data-survey-category');
            survey_in_full=$(this).parent().parent().parent().find('.dropdown-toggle').text();
            $('#current-map').text(survey_in_full+' : '+survey_category);
            $('#current-map').css('textTransform', 'capitalize');
            runMap(survey,survey_category);

        });
    });
    function runMap(survey,survey_category){

        $.ajax({
            url: '<?php echo base_url();?>c_front/runMap/'+survey+'/'+survey_category,
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=x-user-defined");
            },
            success: function(data) {
                //console.log(data);

                obj = jQuery.parseJSON(data);
                var map= new FusionMaps ("js/FusionMaps/Maps/FCMap_KenyaCounty.swf","KenyaMap","100%","70%","0","0");
                map.setJSONData(data);
                map.render("map");

            }
        });
    }
</script>
