<?php
class C_Analytics extends MY_Controller {
	var $data;

	public function __construct() {
		parent::__construct();
		$this -> data = '';
		$this -> load -> model('m_analytics');

	}

	public function active_results() {
		$this -> data['title'] = 'MoH::Analytics';
		$this -> data['active_link']['as'] = '<li class="start active">';
		$this -> data['span_selected']['as'] = '<span class="selected"></span>';
		$this -> data['active_link']['fi'] = '<li class="start has-sub">';
		$this -> data['span_selected']['fi'] = '';
		$this -> data['active_link']['s2'] = '<li class="has-sub start">';
		$this -> data['span_selected']['s2'] = '';
		$this -> data['analytics_main_title'] = 'Analytics Summary';
		$this -> data['analytics_mini_title'] = 'Facts and Figures';
		$this -> data['data_pie'] = null;
		$this -> data['data_column'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts_commodity_availability';
		//$this -> data['analytics_content_to_load'] = 'analytics/content_dashboard';
		$this -> ch_survey_response_rate();
		$this -> load -> view('pages/v_analytics', $this -> data);

	}

	public function analytics_facility_info_levels_of_care() {
		$this -> data['title'] = 'MoH::Analytics:Facility Information';
		$this -> data['analytics_main_title'] = 'Facility Information';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['fi'] = '<span class="selected"></span>';
		$this -> data['active_link']['s2'] = '<li class="has-sub start">';
		$this -> data['span_selected']['s2'] = '';
		$this -> data['data_pie'] = $this -> get_chart_data('loc');
		$this -> data['data_column'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_mini_title'] = 'Levels of Care';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function analytics_facility_info_ownership() {
		$this -> data['title'] = 'MoH::Analytics:Facility Information';
		$this -> data['analytics_main_title'] = 'Facility Information';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['fi'] = '<span class="selected"></span>';
		$this -> data['active_link']['s2'] = '<li class="has-sub start">';
		$this -> data['span_selected']['s2'] = '';
		$this -> data['data_pie'] = $this -> get_chart_data('ownership');
		$this -> data['data_column'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_mini_title'] = 'Ownership';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function analytics_facility_info_types() {
		$this -> data['title'] = 'MoH::Analytics:Facility Information';
		$this -> data['analytics_main_title'] = 'Facility Information';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['fi'] = '<span class="selected"></span>';
		$this -> data['active_link']['s2'] = '<li class="has-sub start">';
		$this -> data['span_selected']['s2'] = '';
		$this -> data['data_pie'] = $this -> get_chart_data('types');
		$this -> data['data_column'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_mini_title'] = 'Types';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function analytics_section_2_guidelines() {
		$this -> data['title'] = 'MoH::Analytics:Guidelines,Staff Training and Commodity Availability';
		$this -> data['analytics_main_title'] = 'Section 2';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start">';
		$this -> data['span_selected']['fi'] = '';
		$this -> data['active_link']['s2'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['s2'] = '<span class="selected"></span>';
		$this -> data['data_column'] = $this -> get_chart_data('guidelines');
		$this -> data['data_pie'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_mini_title'] = 'Guidelines Availability';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function analytics_section_2_staff_training() {
		$this -> data['title'] = 'MoH::Analytics:Guidelines,Staff Training and Commodity Availability';
		$this -> data['analytics_main_title'] = 'Section 2';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start">';
		$this -> data['span_selected']['fi'] = '';
		$this -> data['active_link']['s2'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['s2'] = '<span class="selected"></span>';
		$this -> data['data_column'] = $this -> get_chart_data('staff-training');
		$this -> data['data_pie'] = null;
		$this -> data['data_column_combined'] = null;
		$this -> data['analytics_mini_title'] = 'Staff Training';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function analytics_section_2_commodity_availability() {
		$this -> data['title'] = 'MoH::Analytics:Guidelines,Staff Training and Commodity Availability';
		$this -> data['analytics_main_title'] = 'Section 2';
		$this -> data['active_link']['as'] = '<li class="start">';
		$this -> data['span_selected']['as'] = '';
		$this -> data['active_link']['fi'] = '<li class="has-sub start">';
		$this -> data['span_selected']['fi'] = '';
		$this -> data['active_link']['s2'] = '<li class="has-sub start active">';
		$this -> data['span_selected']['s2'] = '<span class="selected"></span>';
		$this -> data['data_column_combined'] = $this -> get_chart_data('commodity-availability');
		$this -> data['data_pie'] = null;
		$this -> data['analytics_mini_title'] = 'Commodity Availability';
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts_commodity_availability';
		$this -> load -> view('pages/v_analytics', $this -> data);
	}

	public function facility_reporting() {
		$this -> data['title'] = 'MoH::Facility Reporting Summary';
		$this -> data['summary'] = $this -> facility_reporting_summary();
		$this -> load -> view('pages/v_temporary_report', $this -> data);
	}

	//private function get_chart_data($case,$criteria,$value){
	private function get_chart_data($case) {
		$results = null;
		switch($case) {/*case 'loc' :
			 $results = $this -> m_analytics -> get_facility_levels_of_care_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_facility_levels_of_care_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_facility_levels_of_care_by('district',null,'complete','ch');
			 break;
			 case 'ownership' :
			 $results = $this -> m_analytics -> get_facility_ownership_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_facility_ownership_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_facility_ownership_by('district',null,'complete','ch');
			 break;
			 case 'types' :
			 $results = $this -> m_analytics -> get_facility_types_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_facility_types_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_facility_types_by('district',null,'complete','ch');
			 break;
			 case 'guidelines' :
			 $results = $this -> m_analytics -> get_section_2_guidelines_availability_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_section_2_guidelines_availability_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_section_2_guidelines_availability_by('district',null,'complete','ch');
			 break;
			 case 'staff-training' :
			 $results = $this -> m_analytics -> get_section_2_staff_training_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_section_2_guidelines_availability_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_section_2_guidelines_availability_by('district',null,'complete','ch');
			 break;
			 case 'commodity-availability' :
			 $results = $this -> m_analytics -> get_section_2_commodity_availability_by('none', null, 'complete', 'ch');
			 //$results=$this -> m_analytics->get_section_2_commodity_availability_by('county',null,'complete','ch');
			 //$results=$this -> m_analytics->get_section_2_commodity_availability_by('district',null,'complete','ch');
			 break;*/
		}

		return $results;
		//var_dump($this -> m_analytics->get_facility_levels_of_care_by('district','Kasarani','complete','ch'));
	}

	public function test_query() {
		$results = $this -> m_analytics -> getCHCommoditySupplier('facility', '15830', 'complete', 'ch');
		//var_dump($results[1]);
		var_dump($results);
	}

	private function ch_survey_response_rate() {
		$this -> data['response_count'] = $this -> m_analytics -> get_response_count('ch');
	}

	private function facility_reporting_summary() {
		$results = $this -> m_analytics -> get_facility_reporting_summary('ch');
		if ($results) {
			$dyn_table = "<table width='100%' id='facility_report' class='dataTables'>
			<thead>
			<tr>
			<th>MFL Code</th>
			<th>Name</th>
			<th>District/Sub County</th>
			<th>County</th>
			<th>Contact Person</th>
			<th>Contact Person Email</th>
			<th>Date/Time Taken</th>
			</tr></thead>
			<tbody>";
			foreach ($results as $result) {

				$dbdate = new DateTime($result['updatedAt']);

				$dbdate = $dbdate -> format("d M, Y h:i:s A");

				$dyn_table .= "<tr><td>" . $result['facilityMFC'] . "</td><td>" . $result['facilityName'] . "</td><td>" . $result['facilityDistrict'] . "</td><td>" . $result['facilityCounty'] . "</td><td>" . $result['facilityInchargeContactPerson'] . "</td><td>" . $result['facilityInchargeEmail'] . "</td><td>" . $dbdate . "</td></tr>";
			}
			$dyn_table .= "</tbody></table>";
			//echo $dyn_table;
			return $dyn_table;
		}
	}

	/*
	 * Community Strategy
	 */
	public function getCommunityStrategy($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getCommunityStrategy($criteria, $value, $status, $survey);
		//$results = $this -> m_analytics -> getCommunityStrategy('facility', '17052', 'complete', 'ch');

		foreach ($results as $result) {
			$resultArray[] = array('name' => $result[0], 'data' => array((int)$result[1]));
		}
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Community Strategy';
		$datas['categories'] = json_encode(array('Quantity'));
		$datas['yAxis'] = 'Drugs';
		$datas['resultArray'] = json_encode($resultArray);
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * Guidelines Availability
	 */
	public function getGuidelinesAvailability($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getGuidelinesAvailability($criteria, $value, $status, $survey);

		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 4;
		$nCount = 4;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Guidelines';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Availability';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);

	}

	/*
	 * Get Trained Stuff
	 */
	public function getTrainedStaff($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getTrainedStaff($criteria, $value, $status, $survey);
		//var_dump($results);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 3;
		$nCount = 3;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Trained', 'data' => $yesData), array('name' => 'Working', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Trained vs Working Staff';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function getCommodityAvailability($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getCommodityAvailability($criteria, $value, $status, $survey);
		var_dump($results);
	}

	public function getChildrenServices($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getChildrenServices($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 5;
		$nCount = 5;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Services to Children with Diarrhoea';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function getDangerSigns($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getDangerSigns($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 2;
		$nCount = 2;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Danger Signs';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function getActionsPerformed($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getActionsPerformed($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 6;
		$nCount = 6;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Action Performed';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function getCounselGiven($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getCounselGiven($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 3;
		$nCount = 3;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Action Performed';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function getTools($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getTools($criteria, $value, $status, $survey);
		//var_dump($results);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 3;
		$nCount = 3;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}

		#Fill up Arrays
		for ($x = 0; $x < $yCount; $x++) {
			$yesData[] = 0;
		}
		for ($x = 0; $x < $nCount; $x++) {
			if ($no != null) {
				array_unshift($noData, 0);
			} else {
				$noData[] = 0;
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Action Performed';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * Diarrhoea case numbers per Month
	 */
	public function getDiarrhoeaCaseNumbers($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getDiarrhoeaCaseNumbers($criteria, $value, $status, $survey);
		$resultData = $results['num_of_diarrhoea_cases'];
		$category = $results['categories'];

		$monthArray = array('jan', 'feb', 'mar', 'apr', 'may', 'june', 'july', 'aug', 'sept', 'oct', 'nov', 'december');
		$monthCounter = 0;
		foreach ($monthArray as $value) {
			//echo $value;
			$dataArray[] = (int)$resultData[0][$value];
			$monthCounter++;
		}
		$resultArray = array( array('name' => 'Cases', 'data' => $dataArray));
		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		$datas = array();
		$resultArraySize = 5;

		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Diarrhoea Case Numbers';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * Diarrhoea case treatments
	 */

	public function getDiarrhoeaCaseTreatment($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getDiarrhoeaCaseTreatment($criteria, $value, $status, $survey);
		$categories = $results['categories'];
		$categoriesCount = 0;

		foreach ($results as $result => $val) {

			if ($categoriesCount < 6) {
				$index = $categories[$categoriesCount];
				if ($result == $index) {
					$severe_dehydration[] = (int)$val['severe_dehydration'];
					$some_dehydration[] = (int)$val['some_dehydration'];
					$no_dehydration[] = (int)$val['no_dehydration'];
					$dysentry[] = (int)$val['dysentry'];
					$no_classification[] = (int)$val['no_classification'];
					$category[] = $index;
					$categoriesCount++;
				}
			}
		}
		$resultArray = array( array('name' => 'Severe Dehyration', 'data' => $severe_dehydration), array('name' => 'Some Dehyration', 'data' => $some_dehydration), array('name' => 'No Dehyration', 'data' => $no_dehydration), array('name' => 'Dysentry', 'data' => $dysentry), array('name' => 'No Classification', 'data' => $no_classification));
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = 5;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Case Treatment';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * ORT Corner Assessment
	 */
	public function getORTCornerAssessment() {
		$results = $this -> m_analytics -> getORTCornerAssessment('facility', '17052', 'complete', 'ch');
		var_dump($results);
	}

	/*
	 * Availability, Location and Functionality of Equipement at ORT Corner
	 */
	public function getORTCornerEquipmemnt() {
		$results = $this -> m_analytics -> getORTCornerAssessment('facility', '17052', 'complete', 'ch');
		var_dump($results);
	}

	/*
	 * Availability, Location and Functionality of Supplies at ORT Corner
	 */
	public function getORTCornerSupplies() {
		$results = $this -> m_analytics -> getORTCornerSupplies('facility', '17052', 'complete', 'ch');
		var_dump($results);
	}

	/*
	 *  Availability, Location and Functionality of Electricity and Hardware Resources
	 */
	public function getResources() {
		$results = $this -> m_analytics -> getResources('facility', '17052', 'complete', 'ch');
		var_dump($results);
	}

	/**
	 * Get Specific Districts Filter
	 */
	 public function getSpecificDistrictNames(){
	 	$results = $this -> m_analytics -> getSpecificDistrictNames('Nairobi');
		var_dump($results);
	 }
}
