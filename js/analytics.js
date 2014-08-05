function startAnalytics(base_url, county, survey,survey_category) {
    var chart, div;
    var subID, parentDiv;
    var facility, smallText;
    var district;
    var currentChart, currentDiv;
    var selectedOption;
    var appendToTitle, filter, click, neverList, noList;
    var comparing;
    var extraStat;
    var criteria, value, stat_for, statistic;
var countyClicked;

criteria= value= stat_for= statistic='';


    if (county === '') {
        county = 'Unselected';
    }
    $('.analytics_row').hide();
   loadSurvey(survey);
    if (survey_category !== '') {
        $("select#survey_category").find("option").filter(function(index) {
            return survey_category === $(this).attr('value');
        }).prop("selected", "selected");


    }
    if (survey !== '') {
        $("select#survey_type").find("option").filter(function(index) {
            return survey === $(this).attr('value');
        }).prop("selected", "selected");


    }
    $('#sectionList li').click(function(){
        $('#sectionList').find('li').removeClass('active');
        $(this).addClass('active');

    });
    $('select#sub_county_select').load(base_url + 'c_analytics/getSpecificDistrictNames');

    $('select#county_select').change(function() {

        county = $('select#county_select option:selected').attr('value');
variableHandler(county,district,facility,survey,survey_category);
    });
    $('select#survey_type').change(function() {
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');


        if(district!='All Sub-Counties Selected'){
            district = encodeURIComponent(district);
            loadFacilities(base_url,district,survey,survey_category);
        }
        console.log(survey);
        loadSurvey(survey);
        console.log(district);
        console.log(survey);
variableHandler(county,district,facility,survey,survey_category);

    });
    $('select#survey_category').change(function() {
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');
        survey_category = $('select#survey_category option:selected').attr('value');

        if(district!='All Sub-Counties Selected'){
            district = encodeURIComponent(district);
            loadFacilities(base_url,district,survey,survey_category);
        }
variableHandler(county,district,facility,survey,survey_category);
    });
    $('select#county_select').change(function() {

        county = $('select#county_select option:selected').text();
        county = encodeURIComponent(county);
        //console.log(county);
        //alert(currentChart+district+'/ch/'+extraStat);

        loadDistricts(base_url,county);
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');
        survey_category = $('select#survey_category option:selected').attr('value');

        if(district!='All Sub-Counties Selected'){
            district = encodeURIComponent(district);
            loadFacilities(base_url,district,survey,survey_category);
        }
variableHandler(county,district,facility,survey,survey_category);
    });
    $('select#sub_county_select').change(function() {

        district = $('select#sub_county_select option:selected').text();
        district = encodeURIComponent(district);
        loadFacilities(base_url,district,survey,survey_category);
        variableHandler(county,district,facility,survey,survey_category);
    });

   //Change Event for District Select
    $('select#compare_1').change(function() {
        $("#graph_10").empty();
        compar2 = $('select#compare_1 option:selected').text();
        compar2 = encodeURIComponent(compar2);
        $("#graph_10").load(currentChart + compare + '/' + compar2 + '/' + survey + '/' + extraStat);
        //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
    });

    $('select#compare_2').change(function() {
        $("#graph_11").empty();
        compar = $('select#compare_2 option:selected').text();
        compar = encodeURIComponent(compar);
        $("#graph_11").load(currentChart + compare + '/' + compar + '/' + survey + '/' + extraStat);
        //$('#graph_10').load(currentChart+'district/'+district+'/ch/'+extraStat);
    });

    /**
     * [Facility List]
     * @return {[type]} [description]
     */
    $('#facility_list').click(function() {
        window.open(base_url + 'c_analytics/getFacilityListForNo/district/' + district + '/' + survey + '/' + noList);

    });
    /**
     * [description]
     * @return {[type]} [description]
     */
    $('#facility_list_never').click(function() {
        window.open(base_url + 'c_analytics/getFacilityListForNever/district/' + district + '/' + survey + '/' + neverList);

    });
    /**
     * [description]
     * @return {[type]} [description]
     */
    $('#facility_list_no_mnh').click(function() {
        window.open(base_url + 'c_analytics/getFacilityListForNoMNH/district/' + district + '/' + survey + '/' + neverList);

    });
    /**
     * [description]
     * @return {[type]} [description]
     */
    $('#facility_list_commodity_supplies_county').click(function() {
        window.open(base_url + 'c_analytics/commodity_supplies_summary/county/' + county + '/' + survey);

    });
    /**
     * [description]
     * @return {[type]} [description]
     */
    $('#facility_list_commodity_supplies').click(function() {
        window.open(base_url + 'c_analytics/commodity_supplies_summary/district/' + district + '/' + survey);

    });
    $("select").selectpicker({style: 'btn-primary', menuStyle: 'dropdown'});
//$('body').scrollspy({ target: 'ul.dropdown-menu.down'});

}

function loadSurvey(survey){
    $('.analytics_row').hide();
    $('.analytics_row[data-survey="'+survey+'"]').show();

    $.ajax({
        url: base_url+'c_analytics/getSectionsChosen/'+ survey ,
        beforeSend: function(xhr) {
            xhr.overrideMimeType("text/plain; charset=x-user-defined");
        },
        success: function(data) {
            obj = jQuery.parseJSON(data);
            console.log(obj);
            $('.sectionList').empty();
            $('.sectionList').append(obj);
    }
    });
}
function loadDistricts(base_url,county){
    $('select#sub_county_select').load(base_url + 'c_analytics/getSpecificDistrictNamesChosen/' + county);
}
function loadFacilities(base_url,district,survey,survey_category){
    $('select#facility_select').load(base_url + 'c_analytics/getFacilitiesByDistrictOptions/' + district + '/' + survey+'/' + survey_category);

}
function variableHandler(county,district,facility,survey,survey_category){
    if(county!=''){
        criteria='county';
        statisticsHandler(criteria,county,survey,survey_category);
    }
    else if(district!=''){
        criteria='district'
        statisticsHandler(criteria,district,survey,survey_category);
    }
    else if(facility!=''){
        criteria='facility';
        statisticsHandler(criteria,district,survey,survey_category);
    }

}
function statisticsHandler(criteria,value,survey,survey_category){
    //CH
    //Section 1
    //switch(criteria){
        //case 'county':
            //loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/'+criteria+'/'+ value +'/'+survey,'#ch_ownership');
       // break;
    //}

    loadGraph(base_url, 'c_analytics/','#ch_ownership');
    loadGraph(base_url, 'c_analytics/getFacilityLevelPerCounty/'+ value +'/'+survey+'/'+survey_category,'#levels_of_care');
    loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/'+criteria+'/'+ value +'/'+survey,'#facility_type');
    loadGraph(base_url, 'c_analytics/getTrainedStaff/'+criteria+'/'+ value +'/'+survey+'/'+survey,'#staff_training');
    loadGraph(base_url, 'c_analytics/getStaffAvailability/'+criteria+'/'+ value +'/'+survey+'/'+survey,'#staff_availability');
    loadGraph(base_url, 'c_analytics/getStaffRetention/'+criteria+'/'+ value +'/'+survey+'/'+survey,'#staff_retention');

//Section 3
    loadGraph(base_url, 'c_analytics/getTreatmentStatistics/'+criteria+'/'+ value +'/'+survey,'#u5_register');
    loadGraph(base_url, 'c_analytics/getDangerSigns/'+criteria+'/'+ value +'/'+survey,'#danger_signs');

}
