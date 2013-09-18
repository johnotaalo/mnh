<?php
class C_Analytics extends MY_Controller {
	var $data;
	var $county;
	public function __construct() {
		parent::__construct();
		$this -> data = '';
		$this -> load -> model('m_analytics');
		$this -> session -> set_userdata('county_analytics', 'Nairobi');
		$this -> county = $this -> session -> userdata('county_analytics');
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

	public function facility_reporting() {
		$this -> data['title'] = 'MoH::Facility Reporting Summary';
		$this -> data['summary'] = $this -> facility_reporting_summary();
		$this -> load -> view('pages/v_temporary_report', $this -> data);
	}

	public function test_query() {
		$results = $this -> m_analytics -> getORTCornerEquipmement('county', 'Nairobi', 'complete', 'ch');
		//var_dump($results[1]);
		var_dump($results);
	}

	public function test_query_2() {
		$results = $this -> m_analytics -> getSpecificDistrictNames('Nairobi');
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

		if ($results != null) {
			foreach ($results as $result) {
				$resultArray[] = array('name' => $result[0], 'data' => array((int)$result[1]));
			}
		} else {
			$resultArray = 'No Data';
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

		$cat = $results['categories'];
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 4;
		$nCount = 4;
		//var_dump($yes);

		//var_dump($result);

		$categoryCounter = 0;
		$yesCounter = $noCounter = 0;

		foreach ($cat as $categories) {
			if ($yes[$yesCounter][0] == $categories) {
				$yesDataF[] = $yes[$yesCounter];
				$yesCounter++;
				//echo $categories;
			} else {

				$yesDataF[] = array($categories, 0);
				//$yes = $this->insert($yes,$categories, 0);
			}

		}
		foreach ($cat as $categories) {
			if ($no[$noCounter][0] == $categories) {
				$noDataF[] = $no[$noCounter];
				$noCounter++;
				//echo $categories;
			} else {

				$noDataF[] = array($categories, 0);
				//$yes = $this->insert($yes,$categories, 0);
			}

		}
		if ($yesDataF != null) {
			foreach ($yesDataF as $value) {
				$category[] = $value[0];
				$yesData[] = (int)$value[1];
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($noDataF != null) {
			foreach ($noDataF as $value) {
				$category[] = $value[0];
				$noData[] = (int)$value[1];
				$nCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		//var_dump($noDataF[1]);

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
		//var_dump($resultArray);
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
		$this -> load -> view('charts/chart_stacked_v', $datas);

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
		$category = array();
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
		$datas['chartTitle'] = 'Trained Staff vs Working with Children';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Ratio';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function getCommodityAvailability($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getCommodityAvailability($criteria, $value, $status, $survey);
		var_dump($results);
	}

	public function getChildrenServices($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getChildrenServices($criteria, $value, $status, $survey);
		//var_dump($results);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$yCount = 5;
		$nCount = 5;
		$category = $results['categories'];
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				//$category[] = $value[0];
				$yesData[] = (int)$value;
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				//$category[] = $value[0];
				$noData[] = (int)$value;
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
		//var_dump($resultArray);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Services to Children with Diarrhoea';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	private function insert($array, $index, $val) {//function decleration
		$temp = array();
		// this temp array will hold the value
		$size = count($array);
		//because I am going to use this more than one time
		// just validate if index value is proper
		if (@$index)
			if ($index < 0 || $index > $size) {
				echo "Error: Wrong index at Insert. Index: " . $index . " Current Size: " . $size;
				echo "<br/>";
				return false;
			}

		//here is the actual insertion code
		$temp = array_slice($array, 0, $index);
		//slice from 0 to index
		array_push($temp, $val);
		//add the value at the end of the array
		$temp = array_merge($temp, array_slice($array, $index, $size));
		//reconnect the remaining of the array to the current temp
		$array = $temp;
		//swap// no need for this if you pass the array cuz you can simply return $temp, but, if u r using a class array for example, this is useful.

		return $array;
		// you can return $temp instead if you don't use class array
	}

	public function getDangerSigns($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getDangerSigns($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$category = $results['categories'];
		$yCount = 2;
		$nCount = 2;
		//var_dump($yes);

		//var_dump($results);
		if ($yes != null) {
			foreach ($yes as $value) {
				//$category[] = $value[0];
				//echo (int)$value;
				$yesData[] = (int)$value;
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				//$category[] = $value[0];
				$noData[] = (int)$value;
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
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function getActionsPerformed($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getActionsPerformed($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$category = $results['categories'];
		$yCount = 6;
		$nCount = 6;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				//$category[] = $value[0];
				$yesData[] = (int)$value;
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				//$category[] = $value[0];
				$noData[] = (int)$value;
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
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function getCounselGiven($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getCounselGiven($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$category = $results['categories'];
		$yCount = 3;
		$nCount = 3;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				//$category[] = $value[0];
				$yesData[] = (int)$value;
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				//$category[] = $value[0];
				$noData[] = (int)$value;
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
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function getTools($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getTools($criteria, $value, $status, $survey);
		//var_dump($results);die;
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$category = $results['categories'];
		$yCount = 3;
		$nCount = 3;
		//var_dump($yes);

		//var_dump($result);
		if ($yes != null) {
			foreach ($yes as $value) {
				//$category[] = $value[0];
				$yesData[] = (int)$value;
				$yCount--;
				//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
			}
		}
		if ($no != null) {
			foreach ($no as $value) {
				//$category[] = $value[0];
				$noData[] = (int)$value;
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
		$this -> load -> view('charts/chart_stacked_v', $datas);
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
	public function getORTCornerAssessment($criteria, $value, $status, $survey) {
		$results = $this -> m_analytics -> getORTCornerAssessment($criteria, $value, $status, $survey);
		$yes = $results['yes_values'];
		$no = $results['no_values'];
		$category = array();
		$category[] = $results['categories'][0];
		$category[] = $results['categories'][1];
		$yCount = 2;
		$nCount = 2;
		//var_dump($no);

		//var_dump($results);
		if ($results != null) {
			if ($yes != null) {
				foreach ($yes as $value) {
					//echo $value;
					//$category[] = $value[0];
					$yesData[] = (int)$value;
					$yCount--;
					//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
				}
			}
			if ($no != null) {
				foreach ($no as $value) {
					//$category[] = $value[0];
					$noData[] = (int)$value;
					$nCount--;
					//$resultArray[] = array('name'=>$value[0],'data'=>(int)$value[1]);
				}
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
		//var_dump($resultArray);
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
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	/*
	 * Availability, Location and Functionality of Equipement at ORT Corner
	 */

	public function getORTCornerEquipmentFrequency($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'frequency',30);

	}

	public function getORTCornerEquipmentAvailability($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'availability',30);

	}

	public function getORTCornerEquipmentLocation($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'location',100);

	}

	public function getORTCornerEquipment($criteria, $value, $status, $survey, $choice,$resultSize) {
		$results = $this -> m_analytics -> getORTCornerEquipmement('county', 'Nairobi', 'complete', 'ch');
		$frequency = $results['frequency'];
		$location = $results['location']['responses'];
		$quantities = $results['quantities']['responses'];
		//var_dump($results['location']);die;
		$resultArray = array();
		$frequencyCategories = $frequency['categories'];
		$locationCategories = $results['location']['categories'];
		$counter = 0;
		$frequencyAlways = $frequency['responses']['Available'];
		$frequencySometimes = $frequency['responses']['Sometimes Available'];
		$frequencyNever = $frequency['responses']['Never Available'];
		$quantitiesFullyFunctional = $quantitiesNonFunctional = array();
		$mch = $other = $opd = $ward = $clinic = array();
		$category = $frequencyCategories;
		switch($choice) {
			case 'frequency' :
				$resultArray = array( array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
				break;
			case 'availability' :
				foreach ($quantities as $quantity) {
					$arr = $quantity[$counter];
					//[0]['Fully-functional'];
					$quantitiesFullyFunctional[] = $arr['Fully-functional'];
					$quantitiesNonFunctional[] = $arr['Non-functional'];
					//$counter++;
				}
				$resultArray = array( array('name' => 'Fully-Functional', 'data' => $quantitiesFullyFunctional), array('name' => 'Non-Functional', 'data' => $quantitiesNonFunctional));
				break;
			case 'location' :
				//var_dump ($location);die;
				$mch = $location['MCH'];
				$other = $location['Other'];
				$opd = $location['OPD'];
				$ward = $location['Ward'];
				$clinic = $location['U5 Clinic'];
				$resultArray = array( array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
				$category = $locationCategories;
				//var_dump($resultArray);

				break;
		}
		//var_dump($quantitiesFullyFunctional);
		//die;
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = $resultSize;
		
		//var_dump($resultArray);die;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria;

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'ORT Assessment Functional';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
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
	public function getSpecificDistrictNames() {
		$county = $this -> county;
		$options = '';
		$results = $this -> m_analytics -> getSpecificDistrictNames($county);
		$options = '<option selected=selected>Viewing All</option>';
		foreach ($results as $result) {
			$options .= '<option>' . $result['facilityDistrict'] . '</option>';
			//$dataArray.='<option>'.$result['facilityDistrict'].'</option>';
		}
		//return $dataArray;
		echo($options);
	}

	public function getFacilitiesByDistrictOptions($district) {
		$options = $this -> m_analytics -> getFacilitiesByDistrictOptions($district);
		//var_dump($options);
		echo $options;
	}

}
