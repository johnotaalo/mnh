function startAnalytics(base_url, county, survey, survey_category) {
    var chart, div;
    var subID, parentDiv;
    var facility, smallText;
    var district;
    var currentChart, currentDiv;
    var selectedOption;
    var appendToTitle, filter, click, neverList, noList;
    var comparing;
    var extraStat;
    var criteria, value, stat_for, statistic,indicator_type;
    var countyClicked;

    criteria = value = stat_for = statistic =indicator_type= '';
    loadIndicatorTypes();

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
    $('#sectionList li').click(function() {
        $('#sectionList').find('li').removeClass('active');
        $(this).addClass('active');

    });
    $('select#sub_county_select').load(base_url + 'c_analytics/getSpecificDistrictNames');

    
    $('select#survey_type').change(function() {
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');


        if (district != 'All Sub-Counties Selected') {
            district = encodeURIComponent(district);
            loadFacilities(base_url, district, survey, survey_category);
        }
        console.log(survey);
        loadSurvey(survey);
        console.log(district);
        console.log(survey);
        //variableHandler('national', survey, survey_category,indicator_type);

    });
    $('select#survey_category').change(function() {
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');
        survey_category = $('select#survey_category option:selected').attr('value');

        if (district != 'All Sub-Counties Selected') {
            district = encodeURIComponent(district);
            loadFacilities(base_url, district, survey, survey_category);
        }
        variableHandler('national',county,district,facility, survey, survey_category,indicator_type);
        loadProgress(survey,survey_category); 
    });
    $('select#county_select').change(function() {

        county = $('select#county_select option:selected').text();
        county = encodeURIComponent(county);
        //console.log(county);
        //alert(currentChart+district+'/ch/'+extraStat);

        loadDistricts(base_url, county);
        district = $('select#sub_county_select option:selected').text();

        survey = $('select#survey_type option:selected').attr('value');
        survey_category = $('select#survey_category option:selected').attr('value');

        if (district != 'All Sub-Counties Selected') {
            district = encodeURIComponent(district);
            loadFacilities(base_url, district, survey, survey_category);
        }
        variableHandler('county',county,district,facility, survey, survey_category,indicator_type);
    });
    $('select#sub_county_select').change(function() {

        district = $('select#sub_county_select option:selected').text();
        district = encodeURIComponent(district);
        loadFacilities(base_url, district, survey, survey_category);
        variableHandler('district',county,district,facility, survey, survey_category,indicator_type);
    });

    $('select#indicator_types').change(function() {
        indicator_type = $('select#indicator_types option:selected').attr('value');
        console.log(indicator_type);
        subHandler('county', survey, survey_category,indicator_type);
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
    $("select").selectpicker({
        style: 'btn-primary',
        menuStyle: 'dropdown'
    });
    //$('body').scrollspy({ target: 'ul.dropdown-menu.down'});

}

function loadSurvey(survey) {
    $('.analytics_row').hide();
    $('.analytics_row[data-survey="' + survey + '"]').show();

    $.ajax({
        url: base_url + 'c_analytics/getSectionsChosen/' + survey,
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
function loadProgress(survey,survey_category) {

    $.ajax({
        url: base_url + 'c_analytics/getAllReportedCounties/' +survey+'/'+survey_category,
        beforeSend: function(xhr) {
            $('.reporting').empty();
            $('.reporting').append('<div class="loader" >Loading...</div>');
        },
        success: function(data) {
            $('.reporting').empty();
            $('.reporting').append(data);
        }
    });
}
function loadIndicatorTypes() {
    $('#indicator_types').load(base_url + 'c_analytics/getIndicatorTypes');
}

function loadDistricts(base_url, county) {
    $('select#sub_county_select').load(base_url + 'c_analytics/getSpecificDistrictNamesChosen/' + county);
}

function loadFacilities(base_url, district, survey, survey_category) {
    $('select#facility_select').load(base_url + 'c_analytics/getFacilitiesByDistrictOptions/' + district + '/' + survey + '/' + survey_category);

}

function variableHandler(criteria,county,district,facility, survey, survey_category,indicator_type) {
    switch(criteria){
        case 'national':
            value='Aggegated';
            statisticsHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'county':
            value=county;
            statisticsHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'district':
            value=district;
            statisticsHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'facility':
            value=facility;
            statisticsHandler(criteria, value, survey, survey_category,indicator_type);
        break;
    }
}
function subHandler(criteria,county,district,facility, survey, survey_category,indicator_type) {
    switch(parameter){
        case 'national':
            value='Aggegated';
            indicatorHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'county':
            value=county;
            indicatorHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'district':
            value=district;
            indicatorHandler(criteria, value, survey, survey_category,indicator_type);
        break;
        case 'facility':
            value=facility;
            indicatorHandler(criteria, value, survey, survey_category,indicator_type);
        break;
    }
}
function indicatorHandler(criteria, value, survey, survey_category,indicator_type){
    loadGraph(base_url, 'c_analytics/getIndicatorComparison/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/'+indicator_type, '#indicator_comparison');
}
function statisticsHandler(criteria, value, survey, survey_category,indicator_type) {

    //Section 1 CH
    loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#facility_owner');
    loadGraph(base_url, 'c_analytics/getFacilityLevelPerCounty/' + criteria +'/'+ value + '/' + survey + '/' + survey_category, '#facility_levels');
    loadGraph(base_url, 'c_analytics/getFacilityTypePerCounty/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#facility_type');
    loadGraph(base_url, 'c_analytics/getTrainedStaff/' + criteria + '/' + value + '/' + survey +  '/' + survey_category+'/' + survey, '#staff_training');
    loadGraph(base_url, 'c_analytics/getStaffAvailability/' + criteria + '/' + value + '/' + survey +  '/' + survey_category+'/' + survey, '#staff_availability');
    loadGraph(base_url, 'c_analytics/getStaffRetention/' + criteria + '/' + value + '/' + survey +  '/' + survey_category+'/' + survey, '#staff_retention');

    //Section 2 CH
    loadGraph(base_url, 'c_analytics/getGuidelinesAvailabilityCH/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#guidelines');
    loadGraph(base_url, 'c_analytics/getJobAIds/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#job_aids');
    loadGraph(base_url, 'c_analytics/getTools/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#tools');
    loadGraph(base_url, 'c_analytics/getChallengeStatistics/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#challenge');

    //Section 3 CH
    loadGraph(base_url, 'c_analytics/getTreatmentStatistics/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#u5_register');
    loadGraph(base_url, 'c_analytics/getDangerSigns/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#danger_signs');
	loadGraph(base_url, 'c_analytics/getIndicatorComparison/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/'+indicator_type, '#indicator_comparison');

    //Sections 4 CH
    loadGraph(base_url, 'c_analytics/getCHCommodityAvailabilityFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#commodity_availability');
    loadGraph(base_url, 'c_analytics/getCHCommodityAvailabilityUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#commodity_unavailability');
    loadGraph(base_url, 'c_analytics/getCHCommodityAvailabilityLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#commodity_location');
    loadGraph(base_url, 'c_analytics/getbundlingFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#bundling_availability');
    loadGraph(base_url, 'c_analytics/getbundlingUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#bundling_unavailability');
    loadGraph(base_url, 'c_analytics/getbundlingLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#bundling_location');
    
    //Section 5 CH
    loadGraph(base_url, 'c_analytics/getORTOne/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_availability');
    loadGraph(base_url, 'c_analytics/getLocationStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_location');
    loadGraph(base_url, 'c_analytics/getORTReason/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_reason');
    
    //Section 5 MNH
    loadGraph(base_url, 'c_analytics/getORTOne/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_availability');
    loadGraph(base_url, 'c_analytics/getLocationStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_location');
    loadGraph(base_url, 'c_analytics/getORTReason/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_reason');
      

    //Section 6 CH
    loadGraph(base_url, 'c_analytics/getCHEquipmentFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#equipment_availability');
    loadGraph(base_url, 'c_analytics/getCHEquipmentLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#equipment_location');
    loadGraph(base_url, 'c_analytics/getCHEquipmentFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#equipment_functionality');
    loadGraph(base_url, 'c_analytics/getORTOne/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#ort_availability');
    loadGraph(base_url, 'c_analytics/getLocationStatistics/' + criteria + '/' + value + '/' + survey + '/' + survey_category+'/ort', '#ort_location');

    //Section 7 CH
    loadGraph(base_url, 'c_analytics/getCHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#supplies_availability');
    loadGraph(base_url, 'c_analytics/getCHSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#supplies_location');

    //Section 8 CH
    loadGraph(base_url, 'c_analytics/getresourcesFrequencyCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#resource_availability');
    loadGraph(base_url, 'c_analytics/getresourcesLocationCH/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#resource_location');
    
	//MNH Analytics
	//Section 1 MNH

    loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHfacility_ownership');
    loadGraph(base_url, 'c_analytics/getFacilityLevelPerCounty/' + criteria +'/'+ value + '/' + survey + '/' + survey_category, '#MNHfacility_levels');
    loadGraph(base_url, 'c_analytics/getFacilityTypePerCounty/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHfacility_type');
    

	//Section 2 MNH 
    loadGraph(base_url, 'c_analytics/getDeliveries/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHdeliveries');

    loadGraph(base_url, 'c_analytics/getBemoncQuestion/' + criteria +'/'+ value + '/' + survey + '/' + survey_category, '#BEmONC');
    loadGraph(base_url, 'c_analytics/getBemONCReason/' + criteria +'/'+ value + '/' + survey + '/' + survey_category, '#BEMONCReasons');
    loadGraph(base_url, 'c_analytics/getCEOC/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#CEmONC');
    loadGraph(base_url, 'c_analytics/getCEOCReason/' + criteria + '/' + value + '/' + survey +  '/' + survey_category+'/' + survey, '#CEOCReasons');

	loadGraph(base_url, 'c_analytics/getNewborn/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHnewborn');
	loadGraph(base_url, 'c_analytics/getKangarooMotherCare/' + criteria +'/'+ value + '/' + survey + '/' + survey_category, '#MNHkmc');
    loadGraph(base_url, 'c_analytics/getDeliveryPreparedness/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#delivery_preparedness');
    loadGraph(base_url, 'c_analytics/getHIV/' + criteria + '/' + value + '/' + survey + '/' + survey_category, '#MNHhiv');
    //Section 3  MNH
    loadGraph(base_url, 'c_analytics/getGuidelinesAvailabilityMNH/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHguidelines');
    loadGraph(base_url, 'c_analytics/getJobAIds/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHjob_aids');
    loadGraph(base_url, 'c_analytics/getMNHTools/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#MNHtools');
    //loadGraph(base_url, 'c_analytics/getChallengeStatistics/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#challenge');
	
	//Section 4  MNH
    loadGraph(base_url, 'c_analytics/getTrainedStaff/' + criteria + '/' + value + '/' + survey+ '/' + survey_category+ '/' + survey, '#mnhStaffAvailability');
    loadGraph(base_url, 'c_analytics/getStaffRetention/' + criteria + '/' + value + '/' + survey+ '/' + survey_category+ '/' + survey, '#MNHstaffRetention');
    loadGraph(base_url, 'c_analytics/getStaffAvailability/' + criteria + '/' + value + '/' + survey+ '/' + survey_category+ '/' + survey, '#MNHStaffTraining');
    //loadGraph(base_url, 'c_analytics/getChallengeStatistics/' + criteria + '/' + value + '/' + survey+ '/' + survey_category, '#challenge');

	//Sections 5 MNH
    loadGraph(base_url, 'c_analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey +'/consumption', '#MNHcommodity_consumption');
    loadGraph(base_url, 'c_analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey +'/unavailability', '#MNHunavailability');
    loadGraph(base_url, 'c_analytics/getCommodityUsage/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey+'/reason', '#MNHReason');
    
    //Section 6 MNH
    loadGraph(base_url, 'c_analytics/getMNHCommodityAvailabilityFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#MNHcommodity_availability');
    loadGraph(base_url, 'c_analytics/getMNHCommodityAvailabilityUnavailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#MNHcommodity_unavailability');
    loadGraph(base_url, 'c_analytics/getMNHCommodityAvailabilityLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#MNHcommodity_location');
    
    //Section 7 MNH
    loadGraph(base_url, 'c_analytics/getMNHEquipmentFrequency/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#mnhequipment_availability');
    loadGraph(base_url, 'c_analytics/getMNHEquipmentFunctionality/' + criteria + '/' + value + '/' + survey + '/' + survey_category+ '/' + survey , '#mnhequipment_functionality');
    loadGraph(base_url, 'c_analytics/getMNHEquipmentLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category + '/' + survey, '#mnhequipment_location');
    
    //Section 8 MNH
    loadGraph(base_url, 'c_analytics/getMNHSuppliesAvailability/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#MNHsupplies_availability');
    loadGraph(base_url, 'c_analytics/getMNHSuppliesLocation/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#MNHsupplies_location');
    
    //Section 9 MNH
    loadGraph(base_url, 'c_analytics/getresourcesFrequencyMnh/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#mnhresource_availability');
    loadGraph(base_url, 'c_analytics/getresourcesLocationMnh/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#mnhresource_location');
    
    //Section 10 MNH
    loadGraph(base_url, 'c_analytics/getCommunityStrategyMNH/' + criteria + '/' + value + '/' + survey + '/' + survey_category , '#community_units');
    
}



