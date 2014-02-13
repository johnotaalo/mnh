<?php
class C_Analytics extends MY_Controller {
	var $data;
	var $county;
	public function __construct() {
		parent::__construct();
		$this -> data = '';
		$this -> load -> model('m_analytics');

		//$this -> county = $this -> session -> userdata('county_analytics');
	}

	public function setActive($county) {
		$county = urldecode($county);
		$this -> session -> unset_userdata('county_analytics');
		$this -> session -> set_userdata('county_analytics', $county);
		$this -> county = $this -> session -> userdata('county_analytics');
		redirect('ch/analytics');
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

	public function summary() {
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
		$this -> data['analytics_content_to_load'] = 'analytics/content_visual_charts';
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

	public function getReportingCountyList() {/*obtained from the session data*/
		$options = '';
		$this -> data_found = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($this->data_found as $value) {
			$options .= '<option value="' . $value['county'] . '">' . $value['county'] . '</option>' . '<br />';
		}

		//var_dump($this -> session -> userdata('allCounties')); exit;
		echo $options;

	}

	public function getAllReportedCounties($survey) {
		$reportingCounties = $this -> m_analytics -> getAllReportingRatio($survey);
		$counter = 0;
		$allProgress = '';
		foreach ($reportingCounties as $key => $county) {
			//echo $key;
			$allProgress .= $this -> getReportedCounty($county, $key);
			$counter++;
		}
		echo $allProgress;
	}

	public function getOneReportingCounty($county) {
		$county = urldecode($county);
		//$nowCounty = $this->uri->segment(3);
		//echo $nowCounty;
		$reportingCounty = $this -> m_analytics -> getReportingRatio($county);
		$oneProgress = $this -> getReportedCounty($reportingCounty, $county);
		echo($oneProgress);
	}

	public function getReportedCounty($county, $key) {
		$progress = "";

		//var_dump($reportingCounties);
		//die ;

		$countyName = $key;
		$percentage = (int)$county[0]['percentage'];
		$reported = (int)$county[0]['reported'];
		$actual = (int)$county[0]['actual'];

		/**
		 * Check status
		 *
		 * Different Colors for Different LEVELS
		 */

		switch($percentage) {
			case ($percentage<20) :
				$status = '#e93939';
				break;
			case ($percentage<40) :
				$status = '#da8a33';
				break;
			case ($percentage<60) :
				$status = '#dad833';
				break;
			case ($percentage<80) :
				$status = '#91da33';
				break;
			case ($percentage<100) :
				$status = '#7ada33';
				break;
			case ($percentage==100) :
				$status = '#13b00b';
				break;
		}
		$progress = ' <div class="progressRow"><label>' . $countyName . '</label><div class="progress">  <div class="bar" style="width: ' . $percentage . '%;background:' . $status . '">' . $percentage . '%</div>      <div style="float:right">' . $reported . ' / ' . $actual . '</div> </div></div>';
		return $progress;

		//echo($progress);
	}

	public function test_query_2() {
		$results = $this -> m_analytics -> getSpecificDistrictNames('Nairobi');
		var_dump($results);
	}

	private function ch_survey_response_rate() {
		$this -> data['response_count'] = $this -> m_analytics -> get_response_count('ch');
	}

	public function facility_reporting_summary() {
		$results = $this -> m_analytics -> get_facility_reporting_summary('ch');
		if ($results) {
			$dyn_table = "<table width='100%' id='facility_report' class='dataTables'>
			<tr>
			<tr>
			<tr><th>MFL Code</th></tr>
			<tr><th>Name</th></tr>
			<tr><th>District/Sub County</th></tr>
			<tr><th>County</th></tr>
			<tr><th>Contact Person</th></tr>
			<tr><th>Contact Person Email</th></tr>
			<tr><th>Date/Time Taken</th></tr>
			</tr></tr>
			<tbody>";
			foreach ($results as $result) {

				$dbdate = new DateTime($result['updatedAt']);

				$dbdate = $dbdate -> format("d M, Y h:i:s A");

				$dyn_table .= "<tr><td>" . $result['facilityMFC'] . "</td><td>" . $result['facilityName'] . "</td><td>" . $result['facilityDistrict'] . "</td><td>" . $result['facilityCounty'] . "</td><td>" . $result['facilityInchargeContactPerson'] . "</td><td>" . $result['facilityInchargeEmail'] . "</td><td>" . $dbdate . "</td></tr>";
			}
			$dyn_table .= "</tbody></table>";
			echo $dyn_table;
			//return $dyn_table;
		}
	}

	/*
	 * Community Strategy
	 */
	public function getCommunityStrategy($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = array();
		$results = $this -> m_analytics -> getCommunityStrategy($criteria, $value, $status, $survey, $chartorlist);
		//var_dump($results);die;
		$resultArray = array();
		$datas = array();

		//$value=urldecode($value);$results = $this -> m_analytics -> getCommunityStrategy('facility', '17052', 'complete', 'ch');

		if ($results != "") {
			foreach ($results as $result) {
				$categories[] = $result[0];
				$resultData[] = (int)$result[1];
			}
		} else {
			$categories = "";
			$resultData = 0;
		}
		$resultArraySize = count($categories);
		$resultArray[] = array('name' => 'Quantity', 'data' => $resultData);
		////$resultArraySize =  ; 5;
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Guidelines';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Availability';
		$datas['resultArray'] = json_encode($resultArray);
		//var_dump($datas['categories']);die;
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * Guidelines Availability
	 */
	public function getGuidelinesAvailability($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getGuidelinesAvailability($criteria, $value, $status, $survey, $chartorlist);
		//var_dump($results);die;
		switch($chartorlist) {
			#When Chart is chosen
			case 'chart' :
				$categories = $results['categories'];
				$yes = $results['yes_values'];
				$no = $results['no_values'];
				$yCount = 0;
				$nCount = 0;
				$yesSize = sizeof($yes);
				$noSize = sizeof($no);
				//var_dump($yes);
				if ($yes == null) {
					$yesF = array(0, 0, 0, 0);
				} else {
					foreach ($categories as $category) {
						if ($yCount < $yesSize) {
							if (array_key_exists($category, $yes[$yCount])) {
								$yesF[] = $yes[$yCount][$category];
								$yCount++;
							} else {
								$yesF[] = 0;
							}
						} else {
							$yesF[] = 0;
						}
					}
				}
				if ($no == null) {
					$noF = array(0, 0, 0, 0);
				} else {
					foreach ($categories as $category) {
						if ($nCount < $noSize) {
							if (array_key_exists($category, $no[$nCount])) {
								$noF[] = $no[$nCount][$category];
								$nCount++;
							} else {
								$noF[] = 0;
							}
						} else {
							$noF[] = 0;
						}
					}
				}

				$resultArray = array( array('name' => 'Yes', 'data' => $yesF), array('name' => 'No', 'data' => $noF));
				$resultArray = json_encode($resultArray);
				//var_dump($resultArray);
				$datas = array();
				$resultArraySize = count($categories);
				////$resultArraySize =  ; 5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				$datas['resultArraySize'] = $resultArraySize;

				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Guidelines';
				$datas['categories'] = json_encode($categories);
				$datas['yAxis'] = 'Availability';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			#When List is chosen
			case 'list' :
				$IMCI = $results['IMCI'];
				$ORT = $results['ORT'];
				$ICCM = $results['ICCM'];
				$PAED = $results['PAED'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Does the facility have updated 2012 IMCI guidelines?</th></tr>';
				foreach ($IMCI as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Does the facility have updated ORT Corner guidelines?</th></tr>';
				foreach ($ORT as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Does the facility have updated ICCM guidelines?</th></tr>';
				foreach ($ICCM as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Does the facility have an updated Paediatric Protocol?</th></tr>';
				foreach ($PAED as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);

				break;
		}

	}

	/*
	 * Get Trained Stuff
	 */
	public function getTrainedStaff($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getTrainedStaff($criteria, $value, $status, $survey, $chartorlist);
		//var_dump($results);

		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($category);
				$datas['resultArraySize'] = $resultArraySize;

				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Trained Staff vs Working with Children';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Ratio';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				break;
		}

	}

	public function getCommodityAvailabilityFrequency($criteria, $value, $status, $survey) {
		$this -> getCommodityAvailability($criteria, $value, $status, $survey, 'Frequency', 8);
	}

	public function getCommodityAvailabilityUnavailability($criteria, $value, $status, $survey) {
		$this -> getCommodityAvailability($criteria, $value, $status, $survey, 'Unavailability');
	}

	public function getCommodityAvailabilityLocation($criteria, $value, $status, $survey) {
		$this -> getCommodityAvailability($criteria, $value, $status, $survey, 'Location');
	}

	public function getCommodityAvailabilityQuantities($criteria, $value, $status, $survey) {
		$this -> getCommodityAvailability($criteria, $value, $status, $survey, 'Quantities');
	}

	public function getCommodityAvailability($criteria, $value, $status, $survey, $choice) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getCommodityAvailability($criteria, $value, $status, $survey);
		//var_dump($results);
		//die ;
		$datas = array();

		$resultArray = array();

		$counter = 0;
		$stackorno = 'charts/chart_stacked_v';
		$quantitiesFullyFunctional = $quantitiesNonFunctional = array();
		$mch = $other = $opd = $ward = $clinic = array();
		//$category = $frequencyCategories;
		switch($choice) {
			case 'Frequency' :
				$datas['availability'] = 1;
				$frequency = $results['frequency'];
				$category = $frequency['categories'];
				$responses = $frequency['responses'];
				$catkey = 0;
				$always = $responses['Available'];
				$sometimes = $responses['Sometimes Available'];
				$never = $responses['Never Available'];
				$finalAlways = $finalSometimes = $finalNever = array();
				$drug_always = $drug_sometimes = $drug_never = 0;
				//echo count($category);die;
				for ($catkey = 0; $catkey < count($category); $catkey++) {
					$drug = $category[$catkey];
					//var_dump($never[$drug]);die;

					if (array_key_exists($drug, $always) == false) {
						$drug_always = 0;
					} else {
						$drug_always = $always[$drug];
					}
					if (array_key_exists($drug, $sometimes) == false) {
						$drug_sometimes = 0;
					} else {
						$drug_sometimes = $sometimes[$drug];
					}
					if (array_key_exists($drug, $never) == false) {
						$drug_never = 0;
					} else {
						$drug_never = $never[$drug];
					}
					//var_dump($always[$drug]);
					$finalAlways[] = $drug_always;
					$finalSometimes[] = $drug_sometimes;
					$finalNever[] = $drug_never;

				}

				$resultArray = array( array('name' => 'Always', 'data' => $finalAlways), array('name' => 'Sometimes', 'data' => $finalSometimes), array('name' => 'Never', 'data' => $finalNever));
				break;
			case 'Unavailability' :
				$unavailability = $results['unavailability'];
				$analytics = $unavailability['responses'];
				$category = $unavailability['categories'];
				if ($analytics != null || isset($analytics)) {
					foreach ($analytics as $key => $val) {
						$resultArray[] = array('name' => $key, 'data' => $val);
					}
				} else {

				}

				break;
			case 'Location' :
				//var_dump($location['Table spoons']);die;
				//var_dump($results['location']);die;
				$location = $results['location']['responses'];
				$category = $results['location']['categories'];
				//var_dump($location);

				foreach ($location as $key => $value) {
					$zinc = $ors = $cipro = $metro = 0;
					foreach ($value as $val) {
						switch($val[1]) {
							case 'Zinc Sulphate' :
								$zinc += $val[0];
								break;
							case 'Low Osmolarity Oral Rehydration Salts (ORS)' :
								$ors += $val[0];
								break;
							case 'Ciprofloxacin' :
								$cipro += $val[0];
								break;
							case 'Metronidazole (Flagyl)' :
								$metro += $val[0];
								break;
						}
					}
					$resultArray[] = array('name' => $key, 'data' => array($zinc, $ors, $cipro, $metro));
				}

				break;
			case 'Quantities' :
				$quantities = $results['quantities']['responses'];
				$category = $results['frequency']['categories'];
				//$category = $results['quantities']['categories'];
				$currentData = array();
				foreach ($quantities as $val) {
					$currentData[] = $val;
				}

				$resultArray[] = array('name' => 'Quantities', 'data' => $currentData);
				$stackorno = 'charts/chart_v';
				break;
		}

		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		//die;

		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Commodity ' . $choice;
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view($stackorno, $datas);
	}

	public function getCHCommoditySupplier($criteria, $value, $status, $survey) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getCHCommoditySupplier($criteria, $value, $status, $survey);
		$category = $results['analytic_variables'];
		$suppliers = $results['responses'];
		$resultArray = array();
		foreach ($category as $cat) {
			if ($cat != null) {
				$newCat[] = $cat;
			}
		}
		//var_dump($newCat);die;
		foreach ($suppliers as $key => $value) {
			$finalD = array();
			foreach ($value as $key1 => $val) {
				$finalD[] = $val;
			}
			$resultArray[] = array('name' => $key, 'data' => $finalD);
			unset($finalD);
		}
		$newCat[] = 'Metronidazole (Flagyl)';
		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = count($newCat);
		//$resultArraySize =  8;

		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Commodity Suppliers';
		$datas['categories'] = json_encode($newCat);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);

	}

	public function getChildrenServices($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getChildrenServices($criteria, $value, $status, $survey, $chartorlist);
		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($resultArray);
				$datas['resultArraySize'] = $resultArraySize;

				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Services Offered to Children with Diarrhoea';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Occurence';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				$temp = $results['temp'];
				$weight = $results['weight'];
				$height = $results['height'];
				$mch = $results['mch'];
				$muac = $results['muac'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Temperature Taken</th></tr>';
				foreach ($temp as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Weight taken</th></tr>';
				foreach ($weight as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Height taken</th></tr>';
				foreach ($height as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>MCH taken</th></tr>';
				foreach ($mch as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>MUAC taken</th></tr>';
				foreach ($muac as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);
				break;
		}

	}

	public function getDangerSigns($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getDangerSigns($criteria, $value, $status, $survey, $chartorlist);

		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($category);
				$datas['resultArraySize'] = $resultArraySize;

				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Danger Signs';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Occurence';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				$breastfeed = $results['breastfeed'];
				$lethargy = $results['lethargy'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Inability to drink or breastfeed</th></tr>';
				foreach ($breastfeed as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Lethargy and unconsciousness</th></tr>';
				foreach ($lethargy as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);
				break;
		}

	}

	public function getActionsPerformed($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getActionsPerformed($criteria, $value, $status, $survey, $chartorlist);

		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($category);
				$datas['resultArraySize'] = $resultArraySize;
				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Action Performed';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Occurence';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				$diarrhoea = $results['diarrhoea'];
				$blood = $results['blood'];
				$sunken = $results['sunken'];
				$fluid = $results['fluid'];
				$pinch = $results['pinch'];
				$dehydration = $results['dehydration'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Ask about the duration of diarrhoea</th></tr>';
				foreach ($diarrhoea as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Ask about the presence of Blood in stool</th></tr>';
				foreach ($blood as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Look for sunken eyes</th></tr>';
				foreach ($sunken as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Offer the child fluid to drink</th></tr>';
				foreach ($fluid as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Perform skin pinch</th></tr>';
				foreach ($pinch as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Correctly assess and classify diarrhoea and dehydration</th></tr>';
				foreach ($dehydration as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);
				break;
		}

	}

	public function getCounselGiven($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getCounselGiven($criteria, $value, $status, $survey, $chartorlist);
		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($category);
				$datas['resultArraySize'] = $resultArraySize;

				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Counsel Given';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Occurence';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				$extra = $results['extra'];
				$home = $results['home'];
				$follow = $results['follow'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>On giving extra feeding</th></tr>';
				foreach ($extra as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>On home care</th></tr>';
				foreach ($home as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>On when to return for follow up</th></tr>';
				foreach ($follow as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);
				break;
		}

	}

	public function getTools($criteria, $value, $status, $survey, $chartorlist) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getTools($criteria, $value, $status, $survey, $chartorlist);
		//var_dump($results);die;
		switch($chartorlist) {
			case 'chart' :
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
				$resultArraySize = count($category);
				//$resultArraySize =  5;
				//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
				//$resultArray = 5;
				//var_dump($category);
				$datas['resultArraySize'] = $resultArraySize;
				$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
				$datas['chartType'] = 'bar';
				$datas['chartMargin'] = 70;
				$datas['title'] = 'Chart';
				$datas['chartTitle'] = ' ';
				//$datas['chartTitle'] = 'Tools in a given Unit';
				$datas['categories'] = json_encode($category);
				$datas['yAxis'] = 'Occurence';
				$datas['resultArray'] = $resultArray;
				$this -> load -> view('charts/chart_stacked_v', $datas);
				break;
			case 'list' :
				$under5 = $results['under5'];
				$ORT = $results['ORT'];
				$book = $results['book'];

				$pdf = '<h3>Facility List that responded <em>NO</em></h3>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Under 5 register</th></tr>';
				foreach ($under5 as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>ORT Corner register(improvised)</th></tr>';
				foreach ($ORT as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';
				$pdf .= '<table>';
				$pdf .= '<tr><th>Mother Child Booklet</th></tr>';
				foreach ($book as $val) {
					$pdf .= '<tr><td>' . $val[0] . '</td><td>' . $val[1] . '</td></tr>';
				}
				$pdf .= '</table>';

				#End of List
				#Generate PDF
				$this -> loadPDF($pdf);
				break;
		}

	}

	/*
	 * Diarrhoea case numbers per Month
	 */
	public function getDiarrhoeaCaseNumbers($criteria, $value, $status, $survey) {
		$value = urldecode($value);
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
		//$resultArraySize =  5;

		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Diarrhoea Case Numbers';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	/*
	 * Diarrhoea case treatments
	 */

	public function getDiarrhoeaCaseTreatment($criteria, $value, $status, $survey, $filter) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getDiarrhoeaCaseTreatment($criteria, $value, $status, $survey);
		//var_dump($results);die;
		$categories = $results['categories'];
		$categoriesCount = 0;
		$resultArray = array();
		if ($results != null && count($results) > 0) {
			foreach ($results as $result => $val) {

				if ($categoriesCount < 6) {
					$index = $categories[$categoriesCount];
					if ($result == $index) {
						$severe_dehydration[] = array($result, (int)$val['severe_dehydration']);
						$some_dehydration[] = array($result, (int)$val['some_dehydration']);
						$no_dehydration[] = array($result, (int)$val['no_dehydration']);
						$dysentry[] = array($result, (int)$val['dysentry']);
						$no_classification[] = array($result, (int)$val['no_classification']);
						$category[] = $index;
						$categoriesCount++;
					}
				}
			}
		}
		switch($filter) {
			case 'SevereDehydration' :
				$resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $severe_dehydration);
				break;
			case 'SomeDehydration' :
				$resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $some_dehydration);
				break;
			case 'NoDehydration' :
				$resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $no_dehydration);
				break;
			case 'Dysentry' :
				$resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $dysentry);
				break;
			case 'NoClassification' :
				$resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $no_classification);
				break;
		}

		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		$datas = array();
		$resultArraySize = count($categories);
		//$resultArraySize =  1;
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Case Treatment';
		$datas['categories'] = '';
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_pie_v', $datas);
	}

	/*
	 * ORT Corner Assessment
	 */
	public function getORTCornerAssessment($criteria, $value, $status, $survey) {
		$value = urldecode($value);
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
		$resultArraySize = count($category);
		//$resultArraySize =  5;
		//var_dump($resultArray);
		//$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		//var_dump($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'ORT Corner Assessment';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	/*
	 * Availability, Location and Functionality of Equipement at ORT Corner
	 */

	public function getORTCornerEquipmentFrequency($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'Frequency');

	}

	public function getORTCornerEquipmentAvailability($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'Functionality');

	}

	public function getORTCornerEquipmentLocation($criteria, $value, $status, $survey) {
		$this -> getORTCornerEquipment($criteria, $value, $status, $survey, 'Location');

	}

	public function getORTCornerEquipment($criteria, $value, $status, $survey, $choice) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getORTCornerEquipmement($criteria, $value, $status, $survey);
		//var_dump($results);die;
		$datas = array();
		$frequency = $results['frequency'];
		$categories = $results['frequency']['categories'];
		$quantities = $results['quantities']['responses'];
		//var_dump($results['location']);die;
		$resultArray = array();
		$stackorno;

		$counter = 0;

		$quantitiesFullyFunctional = $quantitiesNonFunctional = array();
		$mch = $other = $opd = $ward = $clinic = array();
		//$category = $frequencyCategories;
		switch($choice) {
			case 'Frequency' :
				$datas['availability'] = 1;
				$frequencyCategories = $frequency['categories'];
				$category = $frequencyCategories;
				$frequencyNever = $frequency['responses']['Never Available'];
				$frequencyAlways = $frequency['responses']['Available'];
				$frequencySometimes = $frequency['responses']['Sometimes Available'];
				$resultArray = array( array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
				$stackorno = 'charts/chart_stacked_v';
				break;
			case 'Functionality' :
				foreach ($quantities as $quantity) {
					$arr = $quantity[$counter];
					//[0]['Fully-functional'];
					$quantitiesFullyFunctional[] = $arr['Fully-functional'];
					$quantitiesNonFunctional[] = $arr['Non-functional'];
					//$counter++;
				}
				$category = $results['quantities']['categories'];
				$stackorno = 'charts/chart_stacked_v';
				$resultArray = array( array('name' => 'Fully-Functional', 'data' => $quantitiesFullyFunctional), array('name' => 'Non-Functional', 'data' => $quantitiesNonFunctional));
				break;
			case 'Location' :
				//var_dump($location['Table spoons']);die;
				$location = $results['location']['responses'];
				$locationCategories = $results['location']['categories'];
				foreach ($location as $key => $loc) {

					if (array_key_exists('MCH', $loc) == true) {
						$mch[] = $loc['MCH'];
					} else {
						$mch[] = 0;
					}
					if (array_key_exists('Other', $loc) == true) {
						$other[] = $loc['Other'];
					} else {
						$other[] = 0;
					}
					if (array_key_exists('OPD', $loc) == true) {
						$opd[] = $loc['OPD'];
					} else {
						$opd[] = 0;
					}
					if (array_key_exists('Ward', $loc) == true) {
						$ward[] = $loc['Ward'];
					} else {
						$ward[] = 0;
					}
					if (array_key_exists('U5 Clinic', $loc) == true) {
						$clinic[] = $loc['U5 Clinic'];
					} else {
						$clinic[] = 0;

					}
					//var_dump ($location);die;

				}
				//var_dump($other);
				$resultArray = array( array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
				$category = $locationCategories;
				//var_dump($resultArray);die;
				$stackorno = 'charts/chart_stacked_v';
				break;
		}
		//var_dump($quantitiesFullyFunctional);
		//die;
		$resultArray = json_encode($resultArray);
		//$resultArraySize =  $resultSize;

		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'ORT Assessment ' . $choice;
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view($stackorno, $datas);
	}

	public function getSuppliesFrequency($criteria, $value, $status, $survey) {
		$this -> getSupplies($criteria, $value, $status, $survey, 'Frequency');
	}

	public function getSuppliesLocation($criteria, $value, $status, $survey) {
		$this -> getSupplies($criteria, $value, $status, $survey, 'Location');
	}

	/*
	 * Availability, Location and Functionality of Supplies at ORT Corner
	 */
	public function getSupplies($criteria, $value, $status, $survey, $choice) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getSupplies($criteria, $value, $status, $survey);
		$datas = array();

		$frequency = $results['frequency'];
		$categories = $results['frequency']['categories'];
		//var_dump($results['location']);die;
		$resultArray = array();
		$stackorno;

		$counter = 0;

		$quantitiesFullyFunctional = $quantitiesNonFunctional = array();
		$mch = $other = $opd = $ward = $clinic = array();
		//$category = $frequencyCategories;
		switch($choice) {
			case 'Frequency' :
				$frequencyNever = $frequencyAlways = $frequencySometimes = array();
				$datas['availability'] = 1;
				$frequencyCategories = $frequency['categories'];
				$frequencyNever = $frequency['responses']['Never Available'];
				$frequencyAlways = $frequency['responses']['Available'];
				$frequencySometimes = $frequency['responses']['Sometimes Available'];
				$resultArray = array( array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
				$stackorno = 'charts/chart_stacked_v';
				break;
			case 'Location' :
				//var_dump($location['Table spoons']);die;
				$location = $results['location']['responses'];
				$locationCategories = $results['location']['categories'];
				foreach ($location as $key => $loc) {

					if (array_key_exists('MCH', $loc) == true) {
						$mch[] = $loc['MCH'];
					} else {
						$mch[] = 0;
					}
					if (array_key_exists('Other', $loc) == true) {
						$other[] = $loc['Other'];
					} else {
						$other[] = 0;
					}
					if (array_key_exists('OPD', $loc) == true) {
						$opd[] = $loc['OPD'];
					} else {
						$opd[] = 0;
					}
					if (array_key_exists('Ward', $loc) == true) {
						$ward[] = $loc['Ward'];
					} else {
						$ward[] = 0;
					}
					if (array_key_exists('U5 Clinic', $loc) == true) {
						$clinic[] = $loc['U5 Clinic'];
					} else {
						$clinic[] = 0;

					}
					//var_dump ($location);die;

				}
				//var_dump($other);
				$resultArray = array( array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));

				//var_dump($resultArray);die;
				$stackorno = 'charts/chart_stacked_v';
				break;
		}
		$category = $categories;
		//var_dump($quantitiesFullyFunctional);
		//die;
		$resultArray = json_encode($resultArray);
		//$resultArraySize =  $resultSize;
		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'ORT Assessment ' . $choice;
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view($stackorno, $datas);
	}

	/**
	 *
	 */
	public function getCHSuppliesSupplier($criteria, $value, $status, $survey) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getCHSuppliesSupplier($criteria, $value, $status, $survey);
		//var_dump($results);
		$category = $results['analytic_variables'];
		$suppliers = $results['responses'];
		$resultArray = $newCat = array();
		foreach ($category as $cat) {
			if ($cat != null) {
				$newCat[] = $cat;
			}
		}
		//var_dump($newCat);die;
		foreach ($suppliers as $key => $value) {
			$finalD = array();
			foreach ($value as $key1 => $val) {
				$finalD[] = $val;
			}
			$resultArray[] = array('name' => $key, 'data' => $finalD);
			unset($finalD);
		}

		$resultArray = json_encode($resultArray);
		$datas = array();
		$resultArraySize = count($newCat);
		//$resultArraySize =  5;

		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Commodity Suppliers';
		$datas['categories'] = json_encode($newCat);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);

	}

	public function getResourcesFrequency($criteria, $value, $status, $survey) {
		$this -> getResources($criteria, $value, $status, $survey, 'Frequency');
	}

	public function getResourcesLocation($criteria, $value, $status, $survey) {
		$this -> getResources($criteria, $value, $status, $survey, 'Location');
	}

	/*
	 *  Availability, Location and Functionality of Electricity and Hardware Resources
	 */
	public function getResources($criteria, $value, $status, $survey, $choice) {
		$value = urldecode($value);
		$results = $this -> m_analytics -> getResources($criteria, $value, $status, $survey);
		$datas = array();
		$frequency = $results['frequency'];
		$categories = $results['frequency']['categories'];
		//var_dump($results['location']);die;
		$resultArray = array();
		$stackorno;

		$counter = 0;

		$quantitiesFullyFunctional = $quantitiesNonFunctional = array();
		$mch = $other = $opd = $ward = $clinic = array();
		//$category = $frequencyCategories;
		switch($choice) {
			case 'Frequency' :
				$frequencyNever = $frequencyAlways = $frequencySometimes = array();
				$datas['availability'] = 1;
				$frequencyCategories = $frequency['categories'];
				$frequencyNever = $frequency['responses']['Never Available'];
				$frequencyAlways = $frequency['responses']['Available'];
				$frequencySometimes = $frequency['responses']['Sometimes Available'];
				$resultArray = array( array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
				$stackorno = 'charts/chart_stacked_v';
				break;
			case 'Location' :
				//var_dump($location['Table spoons']);die;
				$location = $results['location']['responses'];
				$locationCategories = $results['location']['categories'];
				foreach ($location as $key => $loc) {

					if (array_key_exists('MCH', $loc) == true) {
						$mch[] = $loc['MCH'];
					} else {
						$mch[] = 0;
					}
					if (array_key_exists('Other', $loc) == true) {
						$other[] = $loc['Other'];
					} else {
						$other[] = 0;
					}
					if (array_key_exists('OPD', $loc) == true) {
						$opd[] = $loc['OPD'];
					} else {
						$opd[] = 0;
					}
					if (array_key_exists('Ward', $loc) == true) {
						$ward[] = $loc['Ward'];
					} else {
						$ward[] = 0;
					}
					if (array_key_exists('U5 Clinic', $loc) == true) {
						$clinic[] = $loc['U5 Clinic'];
					} else {
						$clinic[] = 0;

					}
					//var_dump ($location);die;

				}
				//var_dump($other);
				$resultArray = array( array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));

				//var_dump($resultArray);die;
				$stackorno = 'charts/chart_stacked_v';
				break;
		}
		$category = $categories;
		//var_dump($quantitiesFullyFunctional);
		//die;
		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		//$resultArraySize =  $resultSize;

		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'ORT Assessment ' . $choice;
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view($stackorno, $datas);

	}

	/**
	 * Lists for NEVER
	 */
	public function getFacilityListForNo($criteria, $value, $status, $survey, $choice) {
		urldecode($value);
		$results = $this -> m_analytics -> getFacilityListForNo($criteria, $value, $status, $survey, $choice);
		var_dump($results);
		die ;
		//echo '<pre>';
		//print_r($results);
		//echo '</pre>';
		$pdf = "<h3>Facility List that responded <em>NO</em> for $value District</h3>";
		$pdf .= '<table>';
		foreach ($results as $key => $value) {
			$pdf .= '<tr><th colspan="2">' . $key . '<th></tr>';
			#Per Title
			foreach ($value as $facility) {
				$pdf .= '<tr class="tableRow"><td width="70px">' . $facility[0] . '</td><td width="500px">' . $facility[1] . '</td></tr>';
			}

		}
		$pdf .= '</table>';
		$this -> loadPDF($pdf);

	}

	/**
	 * Lists for NEVER
	 */
	public function getFacilityListForNever($criteria, $value, $status, $survey, $choice) {
		urldecode($value);
		$results = $this -> m_analytics -> getFacilityListForNever($criteria, $value, $status, $survey, $choice);
		//var_dump($results);
		//echo '<pre>';
		//print_r($results);
		//echo '</pre>';
		$pdf = "<h3>Facility List that responded <em>NEVER</em> for $value District</h3>";
		$pdf .= '<table>';
		foreach ($results as $key => $value) {
			$pdf .= '<tr><th colspan="2">' . $key . '<th></tr>';
			#Per Title
			foreach ($value as $facility) {
				$pdf .= '<tr class="tableRow"><td width="70px">' . $facility[0] . '</td><td width="500px">' . $facility[1] . '</td></tr>';
			}

		}
		$pdf .= '</table>';
		$this -> loadPDF($pdf);

	}

	/**
	 * Get Facility Ownership
	 */
	public function getFacilityOwnerPerCounty($county) {
		//$allCounties = $this -> m_analytics -> getReportingCounties('ch');
		$county = urldecode($county);
		//foreach ($allCounties as $county) {
		$category[] = $county;
		$results = $this -> m_analytics -> getFacilityOwnerPerCounty($county);
		$resultArray = array();
		foreach ($results as $value) {
			$data = array();
			$name = $value['facilityOwner'];
			$data[] = (int)$value['ownership_total'];
			$resultArray[] = array('name' => $name, 'data' => $data);
		}
		$finalResult = $resultArray;
		//}
		//$category=$category[0];
		//$finalResult=$finalResult[0];
		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_one';

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Guidelines';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Facilities';
		$datas['resultArray'] = json_encode($finalResult);
		//var_dump($datas['categories']);die;
		$this -> load -> view('charts/chart_stacked_v', $datas);
		//echo '<pre>';
		//print_r($finalResult);
		//echo '</pre>';

	}

	/**
	 * Get Lever Ownership
	 */
	public function getFacilityLevelPerCounty($county) {
		//$allCounties = $this -> m_analytics -> getReportingCounties('ch');
		$county = urldecode($county);
		//foreach ($allCounties as $county) {
		$category[] = $county;
		$results = $this -> m_analytics -> getFacilityLevelPerCounty($county);
		$resultArray = array();
		foreach ($results as $value) {
			$data = array();
			$name = 'Level  ' . $value['facilityLevel'];
			$data[] = (int)$value['level_total'];
			$resultArray[] = array('name' => $name, 'data' => $data);
		}
		$finalResult = $resultArray;
		//}
		$resultArraySize = count($category);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_two';

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Guidelines';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Facilities';
		$datas['resultArray'] = json_encode($finalResult);
		//var_dump($datas['categories']);die;
		$this -> load -> view('charts/chart_stacked_v', $datas);
		//echo '<pre>';
		//print_r($finalResult);
		//echo '</pre>';

	}

	public function getFacilityLevelAll() {
		$counties = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($counties as $county) {
			$results[$county['county']] = $this -> m_analytics -> getFacilityLevelPerCounty($county['county']);
			$categories[] = $county['county'];
		}

		$resultArray = array();
		foreach ($results as $county) {
			foreach ($county as $level) {
				$data[$level['facilityLevel'] + 1][] = (int)$level['level_total'];
			}
		}
		unset($data[5]);
		unset($data[6]);
		foreach ($data as $key => $val) {
			$resultArray[] = array('name' => 'Level ' . $key, 'data' => $val);

		}

		//echo '<pre>';
		//print_r($resultArray);
		//echo '</pre>';die;

		$finalResult = $resultArray;
		//}
		$resultArraySize = count($categories);
		$datas['resultArraySize'] = $resultArraySize;

		$datas['container'] = 'chart_two' . rand(5, 300);

		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 70;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Guidelines';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Facilities';
		$datas['resultArray'] = json_encode($finalResult);
		//var_dump($datas['categories']);die;
		$this -> load -> view('charts/chart_stacked_v', $datas);
		//echo '<pre>';
		//print_r($finalResult);
		//echo '</pre>';

	}

	/**
	 * Get Specific Districts Filter
	 */
	public function getSpecificDistrictNames() {
		$county = $this -> session -> userdata('county_analytics');
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

	#Get Facilities per County
	public function getCountyFacilities($criteria) {
		$result = $this -> m_analytics -> getCountyFacilities();

		foreach ($result as $result) {
			$county[] = $result['facilityCounty'];
			$facilities[] = (int)$result['COUNT(facility.facilityName)'];
		}
		$category = $county;
		$resultArray[] = array('type' => 'column', 'name' => 'Facilities', 'data' => $facilities);
		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		$datas = array();
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'column';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
		//var_dump($resultArray);
		//var_dump($result);
	}

	public function getCountyFacilitiesByOwner($criteria) {
		$result = $this -> m_analytics -> getCountyFacilitiesByOwner($criteria);
		//var_dump($result);die;
		foreach ($result as $result) {
			$owners[] = $result['facilityOwnedBy'];
			$facilities[] = (int)$result['COUNT(facilityOwnedBy)'];
		}
		$category = $owners;
		$resultArray[] = array('type' => 'column', 'name' => 'Facility Owners', 'data' => $facilities);
		$resultArray = json_encode($resultArray);
		//var_dump($resultArray);
		$datas = array();
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $criteria . rand(1, 10000);
		$datas['chartType'] = 'column';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($category);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
		//var_dump($resultArray);
		//var_dump($result);
	}

	public function getFacilitiesByDistrictOptions($district) {
		$district = urldecode($district);
		$options = $this -> m_analytics -> getFacilitiesByDistrictOptions($district);
		//var_dump($options);
		echo $options;
	}

	/**
	 *  Summary Data
	 */

	public function case_summary($choice) {

		//Get All Reporting Counties
		$counties = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($counties as $county) {
			$results[$county['county']] = $this -> m_analytics -> case_summary($county['county'], $choice);
			$categories[] = $county['county'];
		}

		switch($choice) {
			case 'Cases' :

				//group cases
				foreach ($results as $result) {
					$severe_dehydration[] = (int)$result[0]['severe_dehydration'];
					$some_dehydration[] = (int)$result[0]['some_dehydration'];
					$no_dehydration[] = (int)$result[0]['no_dehydration'];
					$dysentry[] = (int)$result[0]['dysentry'];
					$no_classification[] = (int)$result[0]['no_classification'];
				}
				$resultArray = array( array('name' => 'Severe Dehydration', 'data' => $severe_dehydration), array('name' => 'Some Dehydration', 'data' => $some_dehydration), array('name' => 'No Dehydration', 'data' => $no_dehydration), array('name' => 'Dysentry', 'data' => $dysentry), array('name' => 'No Classification', 'data' => $no_classification));
				break;

			case 'Classification' :
				foreach ($results as $value) {
					foreach ($value as $key => $val) {
						$formattedArray[$key][] = (int)$val[0]['total'];
					}
				}
				foreach ($formattedArray as $key => $arr) {
					$resultArray[] = array('name' => $key, 'data' => $arr);
					//$categories[]=$key;
				}
				break;
		}

		$resultArray = json_encode($resultArray);
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $choice . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function guidelines_summary($guideline) {
		$guideline = urldecode($guideline);
		//Get All Reporting Counties
		$finalYes = $finalNo = array();
		$counties = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($counties as $county) {
			$results[$county['county']] = $this -> m_analytics -> getGuidelinesAvailability('county', $county['county'], 'complete', 'ch', 'chart');
			$categories[] = $county['county'];
		}
		foreach ($results as $county) {
			foreach ($county['yes_values'] as $yes) {
				//var_dump($yes);

				foreach ($yes as $k => $y) {
					if ($k == $guideline) {
						$finalYes[] = $y;
					}
				}
			}

			foreach ($county['no_values'] as $no) {
				foreach ($no as $k => $n) {
					if ($k == $guideline) {
						$finalNo[] = $n;
					}
				}
			}
		}
		$resultArray = array( array('name' => 'Yes', 'data' => $finalYes), array('name' => 'No', 'data' => $finalNo));
		$guideline = str_replace(" ", "_", $guideline);
		$resultArray = json_encode($resultArray);
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $guideline . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	public function training_summary($training) {
		$training = urldecode($training);
		//Get All Reporting Counties
		$finalYes = $finalNo = array();
		$counties = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($counties as $county) {
			$results[$county['county']] = $this -> m_analytics -> getTrainedStaff('county', $county['county'], 'complete', 'ch', 'chart');
			$categories[] = $county['county'];
		}
		//echo '<pre>';print_r($results);echo '</pre>';die;
		foreach ($results as $county) {
			foreach ($county['trained_values'] as $k => $t) {

				if ($k == $training) {
					$finalYes[] = $t;

				}
			}

			foreach ($county['working_values'] as $k => $w) {
				if ($k == $training) {
					$finalNo[] = $w;

				}
			}
		}
		//echo '<pre>';print_r($finalYes);echo '</pre>';
		$resultArray = array( array('name' => 'Trained', 'data' => $finalYes), array('name' => 'Working', 'data' => $finalNo));
		$training = str_replace(" ", "_", $training);
		$resultArray = json_encode($resultArray);
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $training . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_v', $datas);
	}

	public function tools_summary($tool) {
		$tool = urldecode($tool);
		//Get All Reporting Counties
		$finalYes = $finalNo = array();
		$counties = $this -> m_analytics -> getReportingCounties('ch');
		foreach ($counties as $county) {
			$results[$county['county']] = $this -> m_analytics -> getTools('county', $county['county'], 'complete', 'ch', 'chart');
			$categories[] = $county['county'];
		}
		//echo '<pre>';print_r($results);echo '</pre>';die;
		foreach ($results as $county) {
			foreach ($county['yes_values'] as $yes => $y) {//var_dump($yes);

				if ($yes == $tool) {
					$finalYes[] = $y;

				}
			}

			foreach ($county['no_values'] as $no => $n) {
				if ($no == $tool) {
					$finalNo[] = $n;

				}
			}
		}

		$resultArray = array( array('name' => 'Yes', 'data' => $finalYes), array('name' => 'No', 'data' => $finalNo));
		//echo '<pre>';print_r($resultArray);echo '</pre>';die;
		$tool = str_replace(" ", "_", $tool);
		$resultArray = json_encode($resultArray);
		$resultArraySize = count($categories);
		//$resultArraySize =  5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_' . $tool . rand(1, 10000);
		$datas['chartType'] = 'bar';
		$datas['chartMargin'] = 100;
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = ' ';
		//$datas['chartTitle'] = 'Facilities per County';
		$datas['categories'] = json_encode($categories);
		$datas['yAxis'] = 'Occurence';
		$datas['resultArray'] = $resultArray;
		$this -> load -> view('charts/chart_stacked_v', $datas);
	}

	#Load PDF
	public function loadPDF($pdf) {
		$stylesheet = ('
		th{
			padding:5px;
			text-align:left;
		}
		tr.tableRow:nth-child(even){
			background:#DDD;
		}
		h3 em {
			color:red;
		}
		');
		$html = ($pdf);
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('Maternal Newborn and Child Health Assessment');
		$this -> mpdf -> SetHTMLHeader('<em>Child Health Assessment Tool</em>');
		$this -> mpdf -> SetHTMLFooter('<em>Child Health Assessment Tool</em>');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($html, 2);
		$report_name = 'CH Assessment Tool_Facility List' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

}
