function startAnalytics(base_url, county, survey) {
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
	loadGraph(base_url, 'c_analytics/getFacilityOwnerPerCounty/' + county, '#graph_5');
	loadGraph(base_url, 'c_analytics/getFacilityLevelPerCounty/' + county, '#graph_6');
	
	loadGraph(base_url, 'c_analytics/case_summary/Cases', '#graph_40');
	loadGraph(base_url, 'c_analytics/case_summary/Classification', '#graph_41');

	loadGraph(base_url, 'c_analytics/guidelines_summary/2012%20IMCI', '#graph_42');
	loadGraph(base_url, 'c_analytics/guidelines_summary/ICCM', '#graph_43');
	loadGraph(base_url, 'c_analytics/guidelines_summary/ORT%20Corner', '#graph_44');
	loadGraph(base_url, 'c_analytics/guidelines_summary/Paediatric%20Protocol', '#graph_45');

	loadGraph(base_url, 'c_analytics/tools_summary/Under%205%20register', '#graph_46');
	loadGraph(base_url, 'c_analytics/tools_summary/ORT%20Corner%20register', '#graph_47');
	loadGraph(base_url, 'c_analytics/tools_summary/Mother%20Child%20Booklet', '#graph_48');

	loadGraph(base_url, 'c_analytics/getFacilityLevelAll/' + survey, '#graph_49');
	loadGraph(base_url, 'c_analytics/getFacilityOwnerAll/' + survey, '#graph_60');

	loadGraph(base_url, 'c_analytics/training_summary/ICCM', '#graph_50');
	loadGraph(base_url, 'c_analytics/training_summary/IMCI', '#graph_51');
	loadGraph(base_url, 'c_analytics/training_summary/Enhanced%20Diarrhoea%20Management', '#graph_52');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/BEmONC', '#graph_70');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/PNC', '#graph_71');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/Essential%20Newborn%20care', '#graph_72');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/SBM-R', '#graph_73');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/FANC', '#graph_74');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/PAC', '#graph_75');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/MPDSR', '#graph_76');
	loadGraph(base_url, 'c_analytics/training_summaryMnh/UBT', '#graph_77');

	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/National%20Roadmap%20MMR', '#graph_78');
	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/PMTCT%20guidelines', '#graph_79');
	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/IYCF%20policy%20statement', '#graph_80');
	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Quality%20Obstetric%20and%20Prenatal%20Care', '#graph_81');
	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Baby%20Friendly%20Hospital%20Initiative', '#graph_82');
	loadGraph(base_url, 'c_analytics/guidelines_summaryMNH/Post%20Abortion%20Guidelines', '#graph_83');


	$('select#county_select').change(function() {
		countyClicked = $(this).val(); //$('select#county_select option:selected').text();
		countyClicked = encodeURIComponent(countyClicked);

		window.location.href = base_url + 'c_analytics/setActive/' + countyClicked + '/' + survey;
	});
	$('#home-parent').addClass('active');
	$('#home-parent').append('<span class="selected"></span>');
	$('#facility_list').hide();
	$('#reportingLabel').hide();
	$('#reporting').load(base_url + 'c_analytics/getAllReportedCounties/' + survey);
	$('#reportingModalBody').load(base_url + 'c_analytics/getAllReportedCounties/' + survey);
	if (county !== '' && county != 'Unselected') {
		$("select#county_select").find("option").filter(function(index) {
			return county === $(this).text();
		}).prop("selected", "selected");
		county = encodeURIComponent(county);
		//Make Progress Visible
		$('#reportingLabel').show();
		//Load Progress
		//alert(county);
		$('#reportingBar').load(base_url + 'c_analytics/getOneReportingCounty/' + county);

	} else {
		$('#reportingLabel').hide();
		$('#reportingBar').empty();
		$('#analytics-page').hide();
		$('#analytics-page').append('<h4 class="temp">Please Choose a County</h4>');
	}

	$('#reporting-parent').show();
	$('#analytics-page').hide();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
	//Load Initial Graphs
	$('#graph_5').load(base_url + 'c_analytics/getFacilityOwnerPerCounty/' + county);
	$('#graph_6').load(base_url + 'c_analytics/getFacilityLevelPerCounty/' + county);


	$('#graph_40').load(base_url + 'c_analytics/case_summary/Cases');
	$('#graph_41').load(base_url + 'c_analytics/case_summary/Classification');


	$('#graph_42').load(base_url + 'c_analytics/guidelines_summary/2012%20IMCI');
	$('#graph_43').load(base_url + 'c_analytics/guidelines_summary/ICCM');
	$('#graph_44').load(base_url + 'c_analytics/guidelines_summary/ORT%20Corner');
	$('#graph_45').load(base_url + 'c_analytics/guidelines_summary/Paediatric%20Protocol');
	//Tools Summary
	$('#graph_46').load(base_url + 'c_analytics/tools_summary/Under%205%20register');
	ort = 'ORT Corner register';
	ort = encodeURI(ort);
	$('#graph_47').load(base_url + 'c_analytics/tools_summary/' + ort);
	$('#graph_48').load(base_url + 'c_analytics/tools_summary/Mother%20Child%20Booklet');
	
	$('#graph_49').load(base_url + 'c_analytics/getFacilityLevelAll/' + survey);
	$('#graph_60').load(base_url + 'c_analytics/getFacilityOwnerAll/' + survey);

	$('#graph_50').load(base_url + 'c_analytics/training_summary/ICCM');
	$('#graph_51').load(base_url + 'c_analytics/training_summary/IMCI');
	$('#graph_52').load(base_url + 'c_analytics/training_summary/Enhanced%20Diarrhoea%20Management');

	$('#graph_70').load(base_url + 'c_analytics/training_summaryMnh/BEmONC');
	$('#graph_71').load(base_url + 'c_analytics/training_summaryMnh/PNC');
	$('#graph_72').load(base_url + 'c_analytics/training_summaryMnh/Essential%20Newborn%20care');
	$('#graph_73').load(base_url + 'c_analytics/training_summaryMnh/SBM-R');
	$('#graph_74').load(base_url + 'c_analytics/training_summaryMnh/FANC');
	$('#graph_75').load(base_url + 'c_analytics/training_summaryMnh/PAC');
	$('#graph_76').load(base_url + 'c_analytics/training_summaryMnh/MPDSR');
	$('#graph_77').load(base_url + 'c_analytics/training_summaryMnh/UBT');


	$('#graph_78').load(base_url + 'c_analytics/guidelines_summaryMNH/National%20Roadmap%20MMR');
	$('#graph_79').load(base_url + 'c_analytics/guidelines_summaryMNH/PMTCT%20guidelines');
	$('#graph_80').load(base_url + 'c_analytics/guidelines_summaryMNH/IYCF%20policy%20statement');
	$('#graph_81').load(base_url + 'c_analytics/guidelines_summaryMNH/Quality%20Obstetric%20and%20Prenatal%20Care');
	$('#graph_82').load(base_url + 'c_analytics/guidelines_summaryMNH/Baby%20Friendly%20Hospital%20Initiative');
	$('#graph_83').load(base_url + 'c_analytics/guidelines_summaryMNH/Post%20Abortion%20Guidelines');
	$('#graph_84').load(base_url + 'c_analytics/getIndicatorStatistics/national/n/ch/dgn');
	$('#graph_85').load(base_url + 'c_analytics/getPneumoniaCaseTreatment/national/n/ch/Pneumonia Cases');




	$('select#county_select').change(function() {
		countyClicked = $(this).val(); //$('select#county_select option:selected').text();
		countyClicked = encodeURIComponent(countyClicked);

		window.location.href = base_url + 'c_analytics/setActive/' + countyClicked + '/' + survey;
	});

	/**
	 *Assign County and Facility
	 */
	currentChart = '';
	district = '';

	facility = '';

	//Assign Secondary Filter
	filter = 'SevereDehydration';
	//Hide Secondary Filter
	$('.secondary-filter').hide();
=======
<<<<<<< HEAD
>>>>>>> adb2262b05a6f8a6b71a1e28d6ed218c6e6c6230
=======
>>>>>>> 40b15bb9759dcea54e990b757fbf2647a598adee
=======
>>>>>>> cf952a01ab1b8014101d7f01cd7b8f8f09bbc9a8
=======
>>>>>>> 4667156eae830326eaf78120c2da1f0097423501
>>>>>>> 316921d3095aaaee509a6b476baa3e42924278e0
=======
>>>>>>> 029b5d564b5e17cf74dd83007199d214ab726079


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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
		if (subID == 'facilities') {
			$('.span6').hide();
			$('#span1').show();
			$('#span1').animate({
				height: '200%',
				width: '100%'
			});
			$('#graph_2').animate({
				width: '2000px'
			});
			$('#port2').animate({
				height: '400px',
				width: '100%'
			});
		} else {
			$('.span6').css({
				'height': '100%',
				'width': '48.717948717948715%'
			});
			$('#graph_2').css({
				'width': '100%'
			});
			$('.span6').show();

		}

		if (subID == 'caseTreatment') {
			$('.secondary-filter').show();
		} else {
			$('.secondary-filter').hide();
		}
		//Change Event for Secondary Filter
		$('select.secondary-filter').change(function() {
			$('#graph_1').empty();
			$('#graph_2').empty();
			$('#graph_3').empty();
			$('#graph_4').empty();
			thisID = $(this).attr('id');
			filter = $('select#' + thisID + ' option:selected').attr('value');
			$('#graph_1').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/national/n/' + survey + '/' + filter);
			$('#graph_2').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/county/' + county + '/' + survey + '/' + filter);
			$('#graph_3').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/district/' + district + '/ch/' + extraStat);
			$('#graph_4').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/facility/' + facility + '/ch/' + extraStat);
			if (thisID == 'county') {
				$('select.secondary-filter#district').val(filter);
			} else {
				$('select.secondary-filter#county').val(filter);
			}

		});


		//Empty Graphs
		$('#graph_1').empty();
		$('#graph_2').empty();
		$('#graph_3').empty();
		$('#graph_4').empty();
		//reload district
		//Load District Names
		$('select#fi_district').load(base_url + 'c_analytics/getSpecificDistrictNames');

		switch (subID) {

			/*
			 * Overview Statistics
			 */
			case 'facilities':

				$('span.statistic').text('Facilities');
				$('#overview-statistics-parent').addClass('active');
				$('#overview-statistics-parent a').append('<span class="selected"></span>');

				$('#graph_1').load(base_url + 'c_analytics/getCountyFacilities/1');
				$('#graph_2').load(base_url + 'c_analytics/getCountyFacilitiesByOwner/' + county);
			//	$('#graph_3').load(base_url + 'c_analytics/getCountyFacilitiesByOwner/district/' + district);
			  //  $('#graph_4').load(base_url + 'c_analytics/getCountyFacilitiesByOwner/facility/' + facility);
			
				break;
				/*
				 * Facility Statistics
				 */
			case 'communityStrategy':
				currentChart = base_url + 'c_analytics/getCommunityStrategy/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Community Strategy');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');

				$('#graph_1').load(base_url + 'c_analytics/getCommunityStrategy/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommunityStrategy/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommunityStrategy/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommunityStrategy/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommunityStrategy/county/'+county+'/ch/'+extraStat);
				break;

			case 'guidelines':
				noList = 'GuidelinesAvailability';
				$('#facility_list').show();
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getGuidelinesAvailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Guidelines');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getGuidelinesAvailability/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getGuidelinesAvailability/county/' + county + '/ch/' + extraStat);
			    $('#graph_3').load(base_url + 'c_analytics/getGuidelinesAvailability/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getGuidelinesAvailability/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getGuidelinesAvailability/county/'+county+'/ch/'+extraStat);

				break;

			case 'training':
				$('#facility_list').show();
				appendToTitle = ' in the last 2 years';
				currentChart = base_url + 'c_analytics/getTrainedStaffOne/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Training');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getTrainedStaffOne/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getTrainedStaffOne/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getTrainedStaffOne/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getTrainedStaffOne/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getTrainedStaff/county/'+county+'/ch/'+extraStat);
				break;

			case 'childrenServices':
				noList = 'ServicesOffered';
				$('#facility_list').show();
				appendToTitle = ' to children with diarrhoea';
				currentChart = base_url + 'c_analytics/getChildrenServices/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Services Offered');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getChildrenServices/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getChildrenServices/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getChildrenServices/district/' + district + '/ch/' + extraStat);
				$('#graph_4').load(base_url + 'c_analytics/getChildrenServices/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getChildrenServices/county/'+county+'/ch/'+extraStat);
				break;

			case 'dangerSigns':
				noList = 'DangerSigns';
				$('#facility_list').show();
				appendToTitle = ' assessed in ongoing session for a child with diarrhoea';
				currentChart = base_url + 'c_analytics/getDangerSigns/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Danger Signs');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getDangerSigns/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getDangerSigns/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getDangerSigns/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getDangerSigns/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDangerSigns/county/'+county+'/ch/'+extraStat);
				break;

			case 'actionsPerformed':
				noList = 'ActionsPerformed';
				$('#facility_list').show();
				appendToTitle = ' in ongoing sessions for a child with diarrhoea';
				currentChart = base_url + 'c_analytics/getActionsPerformed/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Actions Performed');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getActionsPerformed/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getActionsPerformed/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getActionsPerformed/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getActionsPerformed/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getActionsPerformed/county/'+county+'/ch/'+extraStat);
=======
		$('span.statistic').text($(this).find('a').text());
		$(this).parent().parent().addClass('active');
		$(this).parent().parent().find('a').append('<span class="selected"></span>');
<<<<<<< HEAD
>>>>>>> adb2262b05a6f8a6b71a1e28d6ed218c6e6c6230
=======
>>>>>>> cf952a01ab1b8014101d7f01cd7b8f8f09bbc9a8
>>>>>>> 316921d3095aaaee509a6b476baa3e42924278e0

		currentChart = $(this).attr('id');

<<<<<<< HEAD
			case 'counselGiven':
				noList = 'CounselGiven';
				$('#facility_list').show();
				appendToTitle = ' in ongoing session for a child with diarrhoea';
				currentChart = base_url + 'c_analytics/getCounselGiven/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Counsel Given');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCounselGiven/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCounselGiven/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCounselGiven/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCounselGiven/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCounselGiven/county/'+county+'/ch/'+extraStat);
				break;

			case 'tools':
				noList = 'Tools';
				$('#facility_list').show();
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getTools/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Tools in a given Unit');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getTools/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getTools/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getTools/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getTools/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getTools/county/'+county+'/ch/'+extraStat);
				break;

	

				/*
				 * ------End of Facility Statistics
				 */
				/*
				 * Commodities
				 */
			case 'commodityFrequency':
				$('#facility_list_never').show();
				neverList = 'Commodity';
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityFrequency/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Availability');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/ch/'+extraStat);
				break;

		    

			case 'commodityUnavailability':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityUnavailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Reasons For Unavailability');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/ch/'+extraStat);
				break;

			

			case 'commodityLocation':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Location');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/ch/'+extraStat);
				break;

			

			case 'commodityQuantities':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityQuantities/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Quantities');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/county/'+county+'/ch/'+extraStat);
				break;

			

			case 'commoditySuppliers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCHCommoditySupplier/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Suppliers');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCHCommoditySupplier/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCHCommoditySupplier/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCHCommoditySupplier/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCHCommoditySupplier/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCHCommoditySupplier/county/'+county+'/ch/'+extraStat);
				break;


				/*
				 * ------End of Commodities
				 */

				 /*
				 *  Bundling Commodities
				 */  
            case 'bundlingFrequency':
				$('#facility_list_never').show();
				neverList = 'Bundling';
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityFrequency/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Bundling Frequency');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/national/n/bun/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/county/' + county + '/bun/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/district/' + district + '/bun/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/facility/' + facility + '/bun/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/ch/'+extraStat);
				break;

            case 'bundlingUnavailability':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityUnavailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Reasons For Bundling Unavailability');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/national/n/bun/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/county/' + county + '/bun/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/district/' + district + '/bun/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/facility/' + facility + '/bun/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/ch/'+extraStat);
				break;

            case 'bundlingLocation':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Bundling Location');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/national/n/bun/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/county/' + county + '/bun/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/district/' + district + '/bun/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/facility/' + facility + '/bun/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/ch/'+extraStat);
				break;

            case 'bundlingQuantities':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityQuantities/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Bundling Quantities');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/national/n/bun/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/county/' + county + '/bun/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/district/' + district + '/bun/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/facility/' + facility + '/bun/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityQuantities/county/'+county+'/ch/'+extraStat);
				break;

            case 'bundlingSuppliers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCHCommoditySupplier/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Bundling Suppliers');
				$('#commodities-parent').addClass('active');
				$('#commodities-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCHCommoditySupplier/national/n/bun/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCHCommoditySupplier/county/' + county + '/bun/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCHCommoditySupplier/district/' + district + '/bun/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCHCommoditySupplier/facility/' + facility + '/bun/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCHCommoditySupplier/county/'+county+'/ch/'+extraStat);
				break;

				 /*
				 * ------End of Bundling Commodities
				 */


                /*
				 * Malaria Cases
				 */
			case 'MalcaseNumbers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getPneumoniaCaseNumbers/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Numbers');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getMalariaCaseNumbers/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getMalariaCaseNumbers/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getMalariaCaseNumbers/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getMalariaCaseNumbers/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/ch/'+extraStat);
				break;

			case 'MalcaseTreatment':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getMalariaCaseTreatment/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Treatment');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getMalariaCaseTreatment/national/n/ch/' + filter);
				$('#graph_2').load(base_url + 'c_analytics/getMalariaCaseTreatment/county/' + county + '/ch/' + filter);
				$('#graph_3').load(base_url + 'c_analytics/getMalariaCaseTreatment/district/' + district + '/ch/' + filter);
			    $('#graph_4').load(base_url + 'c_analytics/getMalariaCaseTreatment/facility/' + facility + '/ch/' + filter);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/ch/'+extraStat);
				break;
                 /*
				 * Pneumonia Cases
				 */
			case 'PnecaseNumbers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getPneumoniaCaseNumbers/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Numbers');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getPneumoniaCaseNumbers/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getPneumoniaCaseNumbers/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getPneumoniaCaseNumbers/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getPneumoniaCaseNumbers/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/ch/'+extraStat);
				break;

			case 'PnecaseTreatment':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getPneumoniaCaseTreatment/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Treatment');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getPneumoniaCaseTreatment/national/n/ch/' + filter);
				$('#graph_2').load(base_url + 'c_analytics/getPneumoniaCaseTreatment/county/' + county + '/ch/' + filter);
				$('#graph_3').load(base_url + 'c_analytics/getPneumoniaCaseTreatment/district/' + district + '/ch/' + filter);
			    $('#graph_4').load(base_url + 'c_analytics/getPneumoniaCaseTreatment/facility/' + facility + '/ch/' + filter);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/ch/'+extraStat);
				break;



				/*
				 * Diarrhoea Cases
				 */
			case 'caseNumbers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getDiarrhoeaCaseNumbers/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Numbers');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getDiarrhoeaCaseNumbers/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getDiarrhoeaCaseNumbers/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getDiarrhoeaCaseNumbers/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getDiarrhoeaCaseNumbers/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseNumbers/county/'+county+'/ch/'+extraStat);
				break;

			case 'caseTreatment':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getDiarrhoeaCaseTreatment/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Case Treatment');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/national/n/ch/' + filter);
				$('#graph_2').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/county/' + county + '/ch/' + filter);
				$('#graph_3').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/district/' + district + '/ch/' + filter);
			    $('#graph_4').load(base_url + 'c_analytics/getDiarrhoeaCaseTreatment/facility/' + facility + '/ch/' + filter);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getDiarrhoeaCaseTreatment/county/'+county+'/ch/'+extraStat);
				break;

			case 'u5Total':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getU5Total/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Total U5 Children seen');
				$('#diarrhoea-cases-parent').addClass('active');
				$('#diarrhoea-cases-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getU5Total/national/n/ch/' + filter);
				$('#graph_2').load(base_url + 'c_analytics/getU5Total/county/' + county + '/ch/' + filter);
				$('#graph_3').load(base_url + 'c_analytics/getU5Total/district/' + district + '/ch/' + filter);
			    $('#graph_4').load(base_url + 'c_analytics/getU5Total/facility/' + facility + '/ch/' + filter);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getU5Total/county/'+county+'/ch/'+extraStat);
				break;

				/*
				 * ------End of Diarrhoea Cases
				 */
				/*
				 * ORT Corner
				 */
			case 'ORTAssessment':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getORTCornerAssessment/';
				currentDiv = '#graph_3';
				$('span.statistic').text('ORT Assessment');
				$('#ORT-Corner-parent').addClass('active');
				$('#ORT-Corner-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getORTCornerAssessment/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getORTCornerAssessment/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getORTCornerAssessment/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getORTCornerAssessment/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerAssessment/county/'+county+'/ch/'+extraStat);
				break;

			case 'ORTEquipmentAvailability':
				$('#facility_list_never').show();
				neverList = 'ORT';
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getORTCornerEquipmentFrequency/';
				currentDiv = '#graph_3';
				$('span.statistic').text('ORT Equipment Availability');
				$('#ORT-Corner-parent').addClass('active');
				$('#ORT-Corner-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getORTCornerEquipmentFrequency/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getORTCornerEquipmentFrequency/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getORTCornerEquipmentFrequency/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getORTCornerEquipmentFrequency/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentFrequency/county/'+county+'/ch/'+extraStat);
				break;

			case 'ORTEquipmentLocation':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getORTCornerEquipmentLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('ORT Equipment Location');
				$('#ORT-Corner-parent').addClass('active');
				$('#ORT-Corner-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getORTCornerEquipmentLocation/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getORTCornerEquipmentLocation/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getORTCornerEquipmentLocation/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getORTCornerEquipmentLocation/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentLocation/county/'+county+'/ch/'+extraStat);
				break;

			case 'ORTEquipmentFunctionality':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getORTCornerEquipmentAvailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('ORT Equipment Functionality');
				$('#ORT-Corner-parent').addClass('active');
				$('#ORT-Corner-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getORTCornerEquipmentAvailability/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getORTCornerEquipmentAvailability/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getORTCornerEquipmentAvailability/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getORTCornerEquipmentAvailability/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerEquipmentAvailability/county/'+county+'/ch/'+extraStat);
				break;

			case 'ORTSupplies':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getORTCornerSupplies/';
				currentDiv = '#graph_3';
				$('span.statistic').text('ORT Supplies');
				$('#ORT-Corner-parent').addClass('active');
				$('#ORT-Corner-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getORTCornerSupplies/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getORTCornerSupplies/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getORTCornerSupplies/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getORTCornerSupplies/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getORTCornerSupplies/county/'+county+'/ch/'+extraStat);
				break;
				/*
				 * ------End of ORT Corner
				 */
				/*
				 * Supplies
				 */
			case 'suppliesFrequency':
				$('#facility_list_never').show();
				neverList = 'Water';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				currentChart = base_url + 'c_analytics/getSuppliesFrequency/';
				$('span.statistic').text('Supplies Availability');
				$('#supplies-parent').addClass('active');
				$('#supplies-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getSuppliesFrequency/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getSuppliesFrequency/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getSuppliesFrequency/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getSuppliesFrequency/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'suppliesLocation':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getSuppliesLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Supplies Location');
				$('#supplies-parent').addClass('active');
				$('#supplies-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getSuppliesLocation/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getSuppliesLocation/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getSuppliesLocation/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getSuppliesLocation/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'suppliesSuppliers':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCHSuppliesSupplier/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Suppliers');
				$('#supplies-parent').addClass('active');
				$('#supplies-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCHSuppliesSupplier/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCHSuppliesSupplier/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCHSuppliesSupplier/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCHSuppliesSupplier/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;
				/*
				 * Resources
				 */

			case 'resourceAvailability':
				$('#facility_list_never').show();
				neverList = 'Resources';
				currentChart = base_url + 'c_analytics/getResourcesFrequency/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Hardware Resource Availability');
				$('#resources-parent').addClass('active');
				$('#resources-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getResourcesFrequency/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getResourcesFrequency/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getResourcesFrequency/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getResourcesFrequency/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'resourceLocation':
				currentChart = base_url + 'c_analytics/getResourcesLocation/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Hardware Resource Location');
				$('#resources-parent').addClass('active');
				$('#resources-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getResourcesLocation/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getResourcesLocation/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getResourcesLocation/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getResourcesLocation/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

				/**
				 * MNH Section
				 */
			case 'nursesDeployed':
				currentChart = base_url + 'c_analytics/getNursesDeployed/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				extraStat = 'nur';
				$('span.statistic').text('Nurses Deployed');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getNursesDeployed/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getNursesDeployed/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getNursesDeployed/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getNursesDeployed/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'beds':
				currentChart = base_url + 'c_analytics/getBeds/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Beds in Facility');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getBeds/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getBeds/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getBeds/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getBeds/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'services':
				currentChart = base_url + 'c_analytics/getChildrenServices/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Services in Facility');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getServices/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getServices/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getServices/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'hfm':
				currentChart = base_url + 'c_analytics/getHFM/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Health Facility Management');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getHFM/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getHFM/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getHFM/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getHFM/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;
			case 'deliveries':
				currentChart = base_url + 'c_analytics/getDeliveries/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = 'prep';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('Deliveries');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getDeliveries/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getDeliveries/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getDeliveries/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getDeliveries/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'hiv':
				currentChart = base_url + 'c_analytics/getQuestionStatistics/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = 'hiv';
				extraStat = 'hiv';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('HIV Testing');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getQuestionStatistics/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getQuestionStatistics/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getQuestionStatistics/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getQuestionStatistics/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'newborn':
				currentChart = base_url + 'c_analytics/getQuestionStatistics/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = extraStat = 'newb';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('Newborn Care');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getQuestionStatistics/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getQuestionStatistics/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getQuestionStatistics/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getQuestionStatistics/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh/'+extraStat);
				break;

			case 'kmc':
				currentChart = base_url + 'c_analytics/getQuestionStatistics/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = extraStat = 'kang';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('Kangaroo Mother Care');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getQuestionStatistics/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getQuestionStatistics/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getQuestionStatistics/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getQuestionStatistics/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh/'+extraStat);
				break;n

			case 'jobaids':
				currentChart = base_url + 'c_analytics/getQuestionStatistics/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = extraStat = 'job';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('Job Aids');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getQuestionStatistics/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getQuestionStatistics/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getQuestionStatistics/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getQuestionStatistics/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh/'+extraStat);
				break;

			case 'guidelinesmnh':
				currentChart = base_url + 'c_analytics/getGuidelinesAvailabilityMNH/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				neverList = extraStat = 'guide';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('Guidelines Availability');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getGuidelinesAvailabilityMNH/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getGuidelinesAvailabilityMNH/county/' + county + '/mnh/' + extraStat);
                $('#graph_3').load(base_url + 'c_analytics/getGuidelinesAvailabilityMNH/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getGuidelinesAvailabilityMNH/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'communitystrategy':
				currentChart = base_url + 'c_analytics/getCommunityStrategyMNH/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Community Strategy');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommunityStrategyMNH/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommunityStrategyMNH/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommunityStrategyMNH/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommunityStrategyMNH/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'staffTrainingMnh':
				currentChart = base_url + 'c_analytics/getTrainedStaff/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Staff Training');
				$('#facility-statistics-parent').addClass('active');
				$('#facility-statistics-parent a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getTrainedStaff/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getTrainedStaff/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getTrainedStaff/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getTrainedStaff/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

				/*
				 * Commodities
				 */
			case 'commodityFrequencyMnh':
				$('#facility_list_never').show();
				neverList = 'Commodity';
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityFrequency/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Availability');
				$('#commodities-parent-mnh').addClass('active');
				$('#commodities-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityFrequency/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityFrequency/county/'+county+'/mnh'+extraStat);
				break;

			case 'commodityUnavailabilityMnh':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityUnavailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Reasons For Unavailability');
				$('#commodities-parent-mnh').addClass('active');
				$('#commodities-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityUnavailability/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityUnavailability/county/'+county+'/mnh'+extraStat);
				break;

			case 'commodityLocationMnh':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Location');
				$('#commodities-parent-mnh').addClass('active');
				$('#commodities-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityLocation/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getCommodityAvailabilityLocation/county/'+county+'/mnh'+extraStat);
				break;

			case 'commodityQuantitiesMnh':
				appendToTitle = ' ';
				$('#facility_list_commodity_supplies_county').show();
				$('#facility_list_commodity_supplies').show();
				currentChart = base_url + 'c_analytics/getCommodityAvailabilityQuantities/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Quantities');
				$('#commodities-parent-mnh').addClass('active');
				$('#commodities-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCommodityAvailabilityQuantities/facility/' + facility + '/mnh/' + extraStat);
				break;

			case 'commoditySuppliersMnh':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCHCommoditySupplier/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Commodity Suppliers');
				$('#commodities-parent-mnh').addClass('active');
				$('#commodities-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCHCommoditySupplier/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCHCommoditySupplier/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCHCommoditySupplier/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCHCommoditySupplier/facility/' + facility + '/mnh/' + extraStat);
				break;
				/*
				 * ------End of Commodities
				 */

				/*
				 * Supplies
				 */
			case 'suppliesFrequencyMnh':
				$('#facility_list_never').show();
				neverList = 'Water';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				currentChart = base_url + 'c_analytics/getSuppliesFrequency/';
				$('span.statistic').text('Supplies Availability');
				$('#supplies-parentMnh').addClass('active');
				$('#supplies-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getSuppliesFrequency/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getSuppliesFrequency/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getSuppliesFrequency/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getSuppliesFrequency/facility/' + facility + '/mnh/' + extraStat);
				break;

			case 'suppliesLocationMnh':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getSuppliesLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Supplies Location');
				$('#supplies-parentMnh').addClass('active');
				$('#supplies-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getSuppliesLocation/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getSuppliesLocation/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getSuppliesLocation/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getSuppliesLocation/facility/' + facility + '/mnh/' + extraStat);
				break;

			case 'suppliesSuppliersMnh':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCHSuppliesSupplier/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Suppliers');
				$('#supplies-parentMnh').addClass('active');
				$('#supplies-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCHSuppliesSupplier/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCHSuppliesSupplier/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCHSuppliesSupplier/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCHSuppliesSupplier/facility/' + facility + '/mnh/' + extraStat);
				break;

				/**
				 *Signal functions
				 */
			case 'cemonc':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCEOC/';
				currentDiv = '#graph_3';
				neverList = 'ceoc';
				$('#facility_list_no_mnh').show();
				$('span.statistic').text('CEmONC Signal Function');
				$('#signal-parentMnh').addClass('active');
				$('#signal-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCEOC/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCEOC/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCEOC/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCEOC/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh'+extraStat);
				break;

			case 'cemoncReason':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getCEOCReason/';
				currentDiv = '#graph_3';
				$('span.statistic').text('CEmONC Signal Function Challenges');
				$('#signal-parentMnh').addClass('active');
				$('#signal-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getCEOCReason/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getCEOCReason/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getCEOCReason/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getCEOCReason/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh'+extraStat);
				break;

			case 'bemonc':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getBEMONC/';
				currentDiv = '#graph_3';
				$('span.statistic').text('BEmONC Signal Function');
				$('#signal-parentMnh').addClass('active');
				$('#signal-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getBEMONC/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getBEMONC/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getBEMONC/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getBEMONC/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh'+extraStat);
				break;

			case 'bemoncReason':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getBEMONCReason/';
				currentDiv = '#graph_3';
				$('span.statistic').text('BEmONC Signal Function Challenges');
				$('#signal-parentMnh').addClass('active');
				$('#signal-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getBEMONCReason/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getBEMONCReason/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getBEMONCReason/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getBEMONCReason/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/mnh'+extraStat);
				break;

				/*
				 * Equipment Corner
				 */


			case 'equipmentFrequency':
				$('#facility_list_never').show();
				neverList = 'ORT';
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getEquipmentFrequency/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Equipment Availability');
				$('#equipments-parent-mnh').addClass('active');
				$('#equipments-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getEquipmentFrequency/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getEquipmentFrequency/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getEquipmentFrequency/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getEquipmentFrequency/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentFrequency/county/'+county+'/ch/'+extraStat);
				break;

			case 'equipmentLocation':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getEquipmentLocation/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Equipment Location');
				$('#equipments-parent-mnh').addClass('active');
				$('#equipments-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getEquipmentLocation/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getEquipmentLocation/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getEquipmentLocation/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getEquipmentLocation/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentLocation/county/'+county+'/ch/'+extraStat);
				break;

			case 'equipmentFunctionality':
				$('#facility_list_commodity_supplies_county').show();
				$('#facility_list_commodity_supplies').show();
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getEquipmentFunctionality/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Equipment Functionality');
				$('#equipments-parent-mnh').addClass('active');
				$('#equipments-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getEquipmentFunctionality/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getEquipmentFunctionality/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getEquipmentFunctionality/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getEquipmentFunctionality/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentAvailability/county/'+county+'/ch/'+extraStat);
				break;

			case 'equipmentFunctionality':
				appendToTitle = ' ';
				currentChart = base_url + 'c_analytics/getEquipmentAvailability/';
				currentDiv = '#graph_3';
				$('span.statistic').text('Equipment Functionality');
				$('#equipments-parent-mnh').addClass('active');
				$('#equipments-parent-mnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getEquipmentAvailability/national/n/ch/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getEquipmentAvailability/county/' + county + '/ch/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getEquipmentAvailability/district/' + district + '/ch/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getEquipmentAvailability/facility/' + facility + '/ch/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getEquipmentAvailability/county/'+county+'/ch/'+extraStat);
				break;

			case 'hardwareFrequencyMnh':
				$('#facility_list_never').show();
				neverList = 'Resources';
				currentChart = base_url + 'c_analytics/getResourcesFrequency/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Hardware Resource Availability');
				$('#hardware-parentMnh').addClass('active');
				$('#hardware-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getResourcesFrequency/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getResourcesFrequency/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getEquipmentFrequency/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getEquipmentFrequency/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'resourcesFrequencyMnh':

				currentChart = base_url + 'c_analytics/getRunningWaterFrequency/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Running Water Availability');
				$('#resources-parentMnh').addClass('active');
				$('#resources-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getRunningWaterFrequency/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getRunningWaterFrequency/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getRunningWaterFrequency/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getRunningWaterFrequency/facility/' + facility + '/mnh/' + extraStat);
				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

			case 'resourcesLocationMnh':
				currentChart = base_url + 'c_analytics/getRunningWaterLocation/';
				appendToTitle = ' ';
				currentDiv = '#graph_3';
				$('span.statistic').text('Running Water Location');
				$('#resources-parentMnh').addClass('active');
				$('#resources-parentMnh a').append('<span class="selected"></span>');
				$('#graph_1').load(base_url + 'c_analytics/getRunningWaterLocation/national/n/mnh/' + extraStat);
				$('#graph_2').load(base_url + 'c_analytics/getRunningWaterLocation/county/' + county + '/mnh/' + extraStat);
				$('#graph_3').load(base_url + 'c_analytics/getRunningWaterLocation/district/' + district + '/mnh/' + extraStat);
			    $('#graph_4').load(base_url + 'c_analytics/getRunningWaterLocation/facility/' + facility + '/mnh/' + extraStat);

				//$('#graph_2').load('<?php //echo base_url();?>c_analytics/getResources/county/'+county+'/ch/'+extraStat);
				break;

		}


		//Set Title Text

		smallText = $('ul.sub li.active a').text();
		//$('h3.page-title').text($('li.has-sub.start.open a span.title').text());
		$('h3.page-title').text(smallText + appendToTitle);
		$('#breadcrumb-title').text($('li.has-sub.start.open a span.title').text());
		$('#breadcrumb-sub-title').text(smallText);
=======
=======
=======
>>>>>>> 029b5d564b5e17cf74dd83007199d214ab726079
		$('span.statistic').text($(this).find('a').text());
		$(this).parent().parent().addClass('active');
		$(this).parent().parent().find('a').append('<span class="selected"></span>');

		currentChart = $(this).attr('id');

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 40b15bb9759dcea54e990b757fbf2647a598adee
=======
>>>>>>> 4667156eae830326eaf78120c2da1f0097423501
>>>>>>> 316921d3095aaaee509a6b476baa3e42924278e0
=======
>>>>>>> 029b5d564b5e17cf74dd83007199d214ab726079
		function_url_national = 'c_analytics' + '/get' + currentChart + '/national/n' + '/' + survey + '/' + extraStat;
		console.log(function_url_national);
		loadGraph(base_url, function_url_national, '#graph_national');

		function_url_county = 'c_analytics' + '/get' + currentChart + '/county/' + county + '/' + survey + '/' + extraStat;
		loadGraph(base_url, function_url_county, '#graph_county');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> adb2262b05a6f8a6b71a1e28d6ed218c6e6c6230
=======
>>>>>>> 40b15bb9759dcea54e990b757fbf2647a598adee
=======
>>>>>>> cf952a01ab1b8014101d7f01cd7b8f8f09bbc9a8
=======
>>>>>>> 4667156eae830326eaf78120c2da1f0097423501
>>>>>>> 316921d3095aaaee509a6b476baa3e42924278e0
=======
>>>>>>> 029b5d564b5e17cf74dd83007199d214ab726079
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