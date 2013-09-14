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
		$this -> data['analytics_content_to_load'] = 'analytics/content_dashboard';
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
		switch($case) {
			case 'loc' :
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
				break;
		}

		return $results;
		//var_dump($this -> m_analytics->get_facility_levels_of_care_by('district','Kasarani','complete','ch'));
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

	public function chartShow() {
		$datas=array();
		$resultArraySize = 5;
		$result[]=array('name'=>'Test','data'=>array(1,2,7,8,0,8,3,5));
		//$resultArray = 5;
		$datas['resultArraySize'] = $resultArraySize;
		$datas['container'] = 'chart_expiry';
		$datas['chartType'] = 'bar';
		$datas['title'] = 'Chart';
		$datas['chartTitle'] = 'Expired Drugs';
		$datas['categories'] = json_encode(array('One'));
		$datas['yAxis'] = 'Drugs';
		$datas['resultArray'] = json_encode($result);		
		$this -> load -> view('charts/chart_v',$datas);
	}

}
