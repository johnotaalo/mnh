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

    var countyClicked;

    if (county === '') {
        county = 'Unselected';
    }

    //smallText = $('ul.sub li.active a').text();
    //$('h3.page-title').text($('li.has-sub.start.open a span.title').text());
    //$('h3.page-title').text(smallText + appendToTitle);
    //$('#breadcrumb-title').text($('li.has-sub.start.open a span.title').text());
    //$('#breadcrumb-sub-title').text(smallText);

    
    //Load Initial Graphs

    //loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/' + county+'/'+survey+'/'+survey_category, '#graph_60');
    //loadGraph(base_url, 'c_analytics/getFacilityLevelPerCounty/' + county+'/'+survey+'/'+survey_category, '#graph_6');

    loadGraph(base_url, 'c_analytics/case_summary/Cases/'+ survey+'/'+survey_category, '#graph_40');
    loadGraph(base_url, 'c_analytics/case_summary/Classification/'+ survey+'/'+survey_category, '#graph_41');

    loadGraph(base_url, 'c_analytics/guidelines_summary/2012%20IMCI/'+ survey+'/'+survey_category, '#graph_42');
    loadGraph(base_url, 'c_analytics/guidelines_summary/ICCM/'+ survey+'/'+survey_category, '#graph_43');
    loadGraph(base_url, 'c_analytics/guidelines_summary/ORT%20Corner/'+ survey+'/'+survey_category, '#graph_44');
    loadGraph(base_url, 'c_analytics/guidelines_summary/Paediatric%20Protocol/'+ survey+'/'+survey_category, '#graph_45');

    loadGraph(base_url, 'c_analytics/tools_summary/Under%205%20register/'+ survey+'/'+survey_category, '#graph_46');
    loadGraph(base_url, 'c_analytics/tools_summary/ORT%20Corner%20register/'+ survey+'/'+survey_category, '#graph_47');
    loadGraph(base_url, 'c_analytics/tools_summary/Mother%20Child%20Booklet/'+ survey+'/'+survey_category, '#graph_48');

    loadGraph(base_url, 'c_analytics/getFacilityLevelAll/' + survey+'/'+survey_category, '#graph_49');
    loadGraph(base_url, 'c_analytics/getFacilityOwnerAll/' + survey+'/'+survey_category, '#graph_60');

    loadGraph(base_url, 'c_analytics/training_summary/ICCM/'+ survey+'/'+survey_category, '#graph_50');
    loadGraph(base_url, 'c_analytics/training_summary/IMCI/'+ survey+'/'+survey_category, '#graph_51');
    loadGraph(base_url, 'c_analytics/training_summary/Enhanced%20Diarrhoea%20Management/'+ survey+'/'+survey_category, '#graph_52');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/BEmONC/'+ survey+'/'+survey_category, '#graph_70');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/PNC/'+ survey+'/'+survey_category, '#graph_71');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/Essential%20Newborn%20care/'+ survey+'/'+survey_category, '#graph_72');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/SBM-R/'+ survey+'/'+survey_category, '#graph_73');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/FANC/'+ survey+'/'+survey_category, '#graph_74');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/PAC/'+ survey+'/'+survey_category, '#graph_75');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/MPDSR/'+ survey+'/'+survey_category, '#graph_76');
    loadGraph(base_url, 'c_analytics/training_summaryMnh/UBT/'+ survey+'/'+survey_category, '#graph_77');

    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/National%20Roadmap%20MMR/'+ survey+'/'+survey_category, '#graph_78');
    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/PMTCT%20guidelines/'+ survey+'/'+survey_category, '#graph_79');
    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/IYCF%20policy%20statement/'+ survey+'/'+survey_category, '#graph_80');
    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Quality%20Obstetric%20and%20Prenatal%20Care/'+ survey+'/'+survey_category, '#graph_81');
    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Baby%20Friendly%20Hospital%20Initiative/'+ survey+'/'+survey_category, '#graph_82');
    loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Post%20Abortion%20Guidelines/'+ survey+'/'+survey_category, '#graph_83');



    $('select#county_select').change(function() {
        countyClicked = $(this).val(); //$('select#county_select option:selected').text();
        countyClicked = encodeURIComponent(countyClicked);

        window.location.href = base_url + 'c_analytics/setActive/' + countyClicked + '/' + survey+'/'+survey_category;
    });
    $('#home-parent').addClass('active');
    $('#home-parent').append('<span class="selected"></span>');
    $('#facility_list').hide();
    $('#reportingLabel').hide();
    $('#reporting').load(base_url + 'c_analytics/getAllReportedCounties/' + survey+'/'+survey_category);
    $('#reportingModalBody').load(base_url + 'c_analytics/getAllReportedCounties/' + survey+'/'+survey_category);
    if (county !== '' && county != 'Unselected') {
        $("select#county_select").find("option").filter(function(index) {
            return county === $(this).text();
        }).prop("selected", "selected");
        county = encodeURIComponent(county);
        //Make Progress Visible
        $('#reportingLabel').show();
        //Load Progress
        //alert(county);
        $('#reportingBar').load(base_url + 'c_analytics/getOneReportingCounty/' + county+'/'+survey_category);

    } else {
        $('#reportingLabel').hide();
        $('#reportingBar').empty();
        $('#analytics-page').hide();
        $('#analytics-page').append('<h4 class="temp">Please Choose a County</h4>');
    }

    $('#reporting-parent').show();
    $('#analytics-page').hide();


    //Home Action Event
    $('#home-parent').click(function() {
        $('h3.page-title').text('Analytics Summary for ' + county + ' County');
        $('h3.page-title').append('<small>Facts and Figures</small>');
        $('#breadcrumb-title').text('');
        $('#breadcrumb-sub-title').text('');

        $('.has-sub.start').removeClass('active');
        $('.has-sub.start a').remove('span');
        $('#home-parent').addClass('active');
        $('#home-parent').append('<span class="selected"></span>');
        $('#analytics-page').hide();
        $('#reporting-parent').show();
    });

    /**
     * New Graph Loading Function
     */
    $('ul.sub li').click(function() {
        $('#graph_county').empty();
        $('#graph_national').empty();
        $('#graph_facility').empty();
        $('#graph_district').empty();

        $('select#fi_district').load(base_url + 'c_analytics/getSpecificDistrictNames');
        $('#facility_list').hide();
        $('#facility_list_never').hide();
        $('#facility_list_commodity_supplies_county').hide();
        $('#facility_list_commodity_supplies').hide();
        $('#facility_list_no_mnh').hide();
        $('#reporting-parent').hide();
        $('#analytics-page').show();

        $('ul.sub li').removeClass('active');
        $(this).addClass('active');
        $('.has-sub.start').removeClass('active');
        $('.has-sub.start a').remove('span');

        $('span.statistic').text($(this).find('a').text());
        $('#breadcrumb-title').text( $(this).parent().parent().find('a .title').text());
        $('#breadcrumb-sub-title').text($(this).find('a').text());
        $(this).parent().parent().addClass('active');
        $(this).parent().parent().find('a').append('<span class="selected"></span>');

        currentChart = $(this).attr('id');

        function_url_national = 'c_analytics' + '/get' + currentChart + '/national/n' + '/' + survey + '/' + extraStat;
        console.log(function_url_national);
        loadGraph(base_url, function_url_national, '#graph_national');

        function_url_county = 'c_analytics' + '/get' + currentChart + '/county/' + county + '/' + survey + '/' + extraStat;
        loadGraph(base_url, function_url_county, '#graph_county');

        function_url_district = 'c_analytics' + '/get' + currentChart + '/district/' + district + '/' + survey + '/' + extraStat;
        loadGraph(base_url, function_url_district, '#graph_district');

        function_url_facility = 'c_analytics' + '/get' + currentChart + '/facility/' + facility + '/' + survey + '/' + extraStat;
        loadGraph(base_url, function_url_facility, '#graph_facility');
    });

    //Change Event for District Select
    $('select#fi_district').change(function() {

        $('#graph_facility').empty();
        $('#graph_district').empty();
        district = $('select#fi_district option:selected').text();
        district = encodeURIComponent(district);
        //alert(currentChart+district+'/ch/'+extraStat);

        function_url_district = 'c_analytics' + '/get' + currentChart + '/district/' + district + '/' + survey + '/' + extraStat;
        loadGraph(base_url, function_url_district, '#graph_district');
        $('select#fi_facility').load(base_url + 'c_analytics/getFacilitiesByDistrictOptions/' + district + '/' + survey);

    });
    /**
     * [description]
     * @return {[type]} [description]
     */
    $('select#fi_facility').change(function() {
        $('#graph_facility').empty();
        facility = $('select#fi_facility option:selected').attr('value');
        facility = encodeURIComponent(facility);

        function_url_facility = 'c_analytics' + '/get' + currentChart + '/facility/' + facility + '/' + survey + '/' + extraStat;
        loadGraph(base_url, function_url_facility, '#graph_facility');

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


}
