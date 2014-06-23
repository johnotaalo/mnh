<?php
class C_Analytics extends MY_Controller
{
    var $data;
    var $county;
    public function __construct() {
        parent::__construct();
        $this->data = '';
        $this->load->model('m_analytics');
        $this->load->library('PHPExcel');
        
        //$this -> county = $this -> session -> userdata('county_analytics');
        
        
    }
    public function get_facility_progress($survey,$survey_category){
        $results = $this->m_analytics->get_facility_progress($survey,$survey_category);
         foreach ($results as $day => $value) {
            $data[]=(int)sizeof($value);
            $category[]=$day;
        }
        $resultArray = array('name'=>'Daily Entries','data'=>$data);
        //echo '<pre>';print_r($resultArray);echo '</pre>';die;
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'line', sizeof($category));
    }
    /**
     * [active_results description]
     * @param  [type] $survey
     * @return [type]
     */
    public function active_results($survey) {
        
        //$this -> session -> unset_userdata('survey');
        $this->session->set_userdata('survey', $survey);
        
        $this->getReportingCounties();
        $this->data['title'] = 'MoH::Analytics';
        $this->data['active_link']['as'] = '<li class="start active">';
        $this->data['span_selected']['as'] = '<span class="selected"></span>';
        $this->data['active_link']['fi'] = '<li class="start has-sub">';
        $this->data['span_selected']['fi'] = '';
        $this->data['active_link']['s2'] = '<li class="has-sub start">';
        $this->data['span_selected']['s2'] = '';
        $this->data['analytics_main_title'] = 'Analytics Summary';
        $this->data['analytics_mini_title'] = 'Facts and Figures';
        $this->data['data_pie'] = null;
        $this->data['data_column'] = null;
        $this->data['data_column_combined'] = null;
        $this->data['analytics_content_to_load'] = 'analytics/content_visual_charts_commodity_availability';
        
        //$this -> data['analytics_content_to_load'] = 'analytics/content_dashboard';
        //$this -> ch_survey_response_rate();
        $this->load->view('pages/v_analytics', $this->data);
    }
    
    public function summary() {
        $this->data['title'] = 'MoH::Analytics';
        $this->data['active_link']['as'] = '<li class="start active">';
        $this->data['span_selected']['as'] = '<span class="selected"></span>';
        $this->data['active_link']['fi'] = '<li class="start has-sub">';
        $this->data['span_selected']['fi'] = '';
        $this->data['active_link']['s2'] = '<li class="has-sub start">';
        $this->data['span_selected']['s2'] = '';
        $this->data['analytics_main_title'] = 'Analytics Summary';
        $this->data['analytics_mini_title'] = 'Facts and Figures';
        $this->data['data_pie'] = null;
        $this->data['data_column'] = null;
        $this->data['data_column_combined'] = null;
        $this->data['analytics_content_to_load'] = 'analytics/content_visual_charts';
        
        //$this -> data['analytics_content_to_load'] = 'analytics/content_dashboard';
        //$this -> ch_survey_response_rate();
        $this->load->view('pages/v_analytics', $this->data);
    }
    
    public function facility_reporting() {
        $this->data['title'] = 'MoH::Facility Reporting Summary';
        $this->data['summary'] = $this->facility_reporting_summary();
        $this->load->view('pages/v_temporary_report', $this->data);
    }
    
    public function test_query() {
        $results = $this->m_analytics->getORTCornerEquipmement('county', 'Nairobi', 'complete', 'ch');
        
        //var_dump($results[1]);
        var_dump($results);
    }
    
    public function getReportingCountyList($survey) {
        
        /*obtained from the session data*/
        
        $options = '';
        $this->data_found = $this->m_analytics->getReportingCounties($survey);
        foreach ($this->data_found as $value) {
            $options.= '<option value="' . $value['county'] . '">' . $value['county'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allCounties')); exit;
        echo $options;
    }
    public function getTotalCounties($survey) {
        $data = $this->m_analytics->getReportingCounties($survey);
        
        //echo '<pre>';print_r($data);echo '</pre>';
        $counties = (int)sizeof($data);
        echo $counties;
    }
    
    public function getAllReportedCounties($survey, $survey_category) {
        $reportingCounties = $this->m_analytics->getAllReportingRatio($survey, $survey_category);
        
        //m var_dump($reportingCounties);
        $counter = 0;
        $allProgress = '';
        foreach ($reportingCounties as $key => $county) {
            
            //echo $key;
            $allProgress.= $this->getReportedCounty($county, $key);
            $counter++;
        }
        echo $allProgress;
    }
    
    public function getOneReportingCounty($county, $survey_category) {
        $county = urldecode($county);
        $survey = $this->session->userdata('survey');
        
        //$nowCounty = $this->uri->segment(3);
        //echo $nowCounty;
        $reportingCounty = $this->m_analytics->getReportingRatio($county, $survey, $survey_category);
        $oneProgress = $this->getReportedCounty($reportingCounty, $county);
        echo ($oneProgress);
    }
    
    /**
     * [getReportedCounty description]
     * @param  [type] $county [description]
     * @param  [type] $key    [description]
     * @return [type]         [description]
     */
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
        
        switch ($percentage) {
            case ($percentage < 20):
                $status = '#e93939';
                break;

            case ($percentage < 40):
                $status = '#da8a33';
                break;

            case ($percentage < 60):
                $status = '#dad833';
                break;

            case ($percentage < 80):
                $status = '#91da33';
                break;

            case ($percentage < 100):
                $status = '#7ada33';
                break;

            case ($percentage == 100):
                $status = '#13b00b';
                break;
        }
        $progress = ' <div class="progressRow"><label>' . $countyName . '</label><div class="progress">  <div class="bar" style="width: ' . $percentage . '%;background:' . $status . '">' . $percentage . '%</div>      <div style="float:right">' . $reported . ' / ' . $actual . '</div> </div></div>';
        return $progress;
        
        //echo($progress);
        
        
    }
    
    public function test_query_2() {
        $results = $this->m_analytics->getSpecificDistrictNames('Nairobi');
        var_dump($results);
    }
    
    private function ch_survey_response_rate() {
        $this->data['response_count'] = $this->m_analytics->get_response_count('ch');
    }
    
    /**
     * [facility_reporting_summary description]
     * @return [type]
     */
    public function facility_reporting_summary() {
        $results = $this->m_analytics->get_facility_reporting_summary('ch');
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
                
                $dbdate = $dbdate->format("d M, Y h:i:s A");
                
                $dyn_table.= "<tr><td>" . $result['fac_mfl'] . "</td><td>" . $result['fac_name'] . "</td><td>" . $result['fac_district'] . "</td><td>" . $result['fac_county'] . "</td><td>" . $result['facilityInchargeContactPerson'] . "</td><td>" . $result['facilityInchargeEmail'] . "</td><td>" . $dbdate . "</td></tr>";
            }
            $dyn_table.= "</tbody></table>";
            echo $dyn_table;
            
            //return $dyn_table;
            
            
        }
    }
    
    /**
     * [getCommunityStrategy description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getCommunityStrategy($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = array();
        $results = $this->m_analytics->getCommunityStrategy($criteria, $value, $survey);
        
        $resultArray = array();
        $datas = array();
        
        //$value=urldecode($value);$results = $this -> m_analytics -> getCommunityStrategy('facility', '17052', 'complete', 'ch');
        
        if ($results != "") {
            foreach ($results as $result) {
                $category[] = $result[0];
                $resultData[] = (int)$result[1];
            }
        } else {
            $category = "";
            $resultData = 0;
        }
        
        $resultArray[] = array('name' => 'Quantity', 'data' => $resultData);
        
        $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar');
    }
    
    /*
     * Guidelines Availability
    */
    public function getGuidelinesAvailability($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = $this->m_analytics->getGuidelinesAvailability($criteria, $value, $survey);
        
        //var_dump($results);die;
        
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
        
        $resultArray = array(array('name' => 'Yes', 'data' => $yesF), array('name' => 'No', 'data' => $noF));
        
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    /*
     * Get Trained Stuff
    */
    public function getTrainedStaff($criteria, $value, $survey) {
        $yes = $no = $resultsArray = array();
        $value = urldecode($value);
        $results = $this->m_analytics->getTrainedStaff($criteria, $value, $survey);
        
        echo '<pre>';
        print_r($results);
        echo '</pre>';
        die;
        
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
        $resultArray = array(array('name' => 'Trained', 'data' => $finalYes), array('name' => 'Working', 'data' => $finalNo));
        $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar');
    }
    
    public function getTrainedStaffOne($criteria, $value, $survey) {
        $yes = $no = $resultsArray = array();
        $value = urldecode($value);
        $results = $this->m_analytics->getTrainedStaff($criteria, $value, $survey);
        
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';
        //die ;
        $finalYes = $finalNo = $category = array();
        foreach ($results['trained_values'] as $k => $t) {
            $category[] = $k;
            $finalYes[] = $t;
        }
        
        foreach ($results['working_values'] as $k => $w) {
            
            $finalNo[] = $w;
        }
        
        //echo '<pre>';print_r($finalYes);echo '</pre>';
        $resultArray = array(array('name' => 'Trained', 'data' => $finalYes), array('name' => 'Working', 'data' => $finalNo));
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getCommodityAvailabilityFrequency($criteria, $value, $survey) {
        $this->getCommodityAvailability($criteria, $value, $survey, 'Frequency', 8);
    }
    
    public function getCommodityAvailabilityUnavailability($criteria, $value, $survey) {
        $this->getCommodityAvailability($criteria, $value, $survey, 'Unavailability');
    }
    
    public function getCommodityAvailabilityLocation($criteria, $value, $survey) {
        $this->getCommodityAvailability($criteria, $value, $survey, 'Location');
    }
    
    public function getCommodityAvailabilityQuantities($criteria, $value, $survey) {
        $this->getCommodityAvailability($criteria, $value, $survey, 'Quantities');
    }
    
    public function getCommodityAvailability($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getCommodityAvailability($criteria, $value, $survey);
        
        //echo '<pre>';print_r($results);echo '</pre>';
        //die ;
        $datas = array();
        
        $resultArray = array();
        
        $counter = 0;
        $stackorno = 'charts/chart_stacked_v';
        $quantitiesFullyFunctional = $quantitiesNonFunctional = array();
        $mch = $other = $opd = $ward = $clinic = array();
        
        //$category = $frequencyCategories;
        switch ($choice) {
            case 'Frequency':
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
                
                $resultArray = array(array('name' => 'Always', 'data' => $finalAlways), array('name' => 'Sometimes', 'data' => $finalSometimes), array('name' => 'Never', 'data' => $finalNever));
                $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
                break;

            case 'Unavailability':
                $unavailability = $results['unavailability'];
                $analytics = $unavailability['responses'];
                $category = $unavailability['categories'];
                if ($analytics != null || isset($analytics)) {
                    foreach ($analytics as $key => $val) {
                        $resultArray[] = array('name' => $key, 'data' => $val);
                    }
                } else {
                }
                
                $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
                break;

            case 'Location':
                
                //var_dump($location['Table spoons']);die;
                //var_dump($results['location']);die;
                $location = $results['location']['responses'];
                $category = $results['location']['categories'];
                
                //var_dump($location);
                //  echo '<pre>';print_r($location);echo '</pre>';
                foreach ($location as $key => $value) {
                    
                    $location[] = $key;
                    foreach ($value as $k => $v) {
                        $quant = 0;
                        foreach ($v as $drugVal) {
                            $quant+= $drugVal;
                        }
                        $numbers[] = $quant;
                    }
                    $resultArray[] = array('name' => $key, 'data' => $numbers);
                    $numbers = array();
                }
                
                $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
                break;

            case 'Quantities':
                $quantities = $results['quantities']['responses'];
                $category = $results['frequency']['categories'];
                
                //$category = $results['quantities']['categories'];
                $currentData = array();
                foreach ($quantities as $val) {
                    $currentData[] = $val;
                }
                
                $resultArray[] = array('name' => 'Quantities', 'data' => $currentData);
                $stackorno = 'charts/chart_v';
                $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar', sizeof($category));
                break;
        }
    }
    
    public function getEquipmentFrequency($criteria, $value, $survey) {
        $this->getMnhEquipment($criteria, $value, $survey, 'Frequency', 8);
    }
    
    public function getEquipmentLocation($criteria, $value, $survey) {
        $this->getMnhEquipment($criteria, $value, $survey, 'Location');
    }
    
    public function getEquipmentFunctionality($criteria, $value, $survey) {
        $this->getMnhEquipment($criteria, $value, $survey, 'Functionality');
    }
    
    public function getMnhEquipment($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getMnhEquipment($criteria, $value, $survey);
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        $datas = array();
        $frequency = $results['frequency'];
        $categories = $results['frequency']['categories'];
        $quantities = $results['functionality']['responses'];
        
        //var_dump($results['location']);die;
        $resultArray = array();
        $stackorno;
        
        $counter = 0;
        
        $quantitiesFullyFunctional = $quantitiesNonFunctional = array();
        $delivery = $pharmacy = $store = $other = array();
        
        //$category = $frequencyCategories;
        switch ($choice) {
            case 'Frequency':
                $datas['availability'] = 1;
                $frequencyCategories = $frequency['categories'];
                $category = $frequencyCategories;
                $frequencyNever = $frequencySometimes = $frequencyAlways = array();
                $frequencyNever = $frequency['responses']['Never Available'];
                $frequencyAlways = $frequency['responses']['Available'];
                $frequencySometimes = $frequency['responses']['Sometimes Available'];
                $resultArray = array(array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
                $stackorno = 'charts/chart_stacked_v';
                break;

            case 'Functionality':
                foreach ($quantities as $quantity) {
                    $arr = $quantity[$counter];
                    
                    //[0]['Fully-functional'];
                    $quantitiesFullyFunctional[] = $arr['Fully-functional'];
                    $quantitiesNonFunctional[] = $arr['Non-functional'];
                    
                    //$counter++;
                    
                    
                }
                $category = $results['functionality']['categories'];
                $stackorno = 'charts/chart_stacked_v';
                $resultArray = array(array('name' => 'Fully-Functional', 'data' => $quantitiesFullyFunctional), array('name' => 'Non-Functional', 'data' => $quantitiesNonFunctional));
                break;

            case 'Location':
                
                //var_dump($location['Table spoons']);die;
                $location = $results['location']['responses'];
                $locationCategories = $results['location']['categories'];
                foreach ($location as $key => $loc) {
                    
                    if (array_key_exists('Delivery room', $loc) == true) {
                        $delivery[] = $loc['Delivery room'];
                    } else {
                        $delivery[] = 0;
                    }
                    if (array_key_exists('Pharmacy', $loc) == true) {
                        $pharmacy[] = $loc['Pharmacy'];
                    } else {
                        $pharmacy[] = 0;
                    }
                    if (array_key_exists('Store', $loc) == true) {
                        $store[] = $loc['Store'];
                    } else {
                        $store[] = 0;
                    }
                    if (array_key_exists('Other', $loc) == true) {
                        $other[] = $loc['Other'];
                    } else {
                        $other[] = 0;
                    }
                    
                    //var_dump ($location);die;
                    
                    
                }
                
                //var_dump($other);
                $resultArray = array(array('name' => 'Delivery Room', 'data' => $delivery), array('name' => 'Pharmacy', 'data' => $pharmacy), array('name' => 'Store', 'data' => $store), array('name' => 'Other', 'data' => $other));
                $category = $locationCategories;
                
                //var_dump($resultArray);die;
                $stackorno = 'charts/chart_stacked_v';
                break;
        }
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getCHCommoditySuppliers($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = $this->m_analytics->getCHCommoditySupplier($criteria, $value, $survey);
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
        $category = $newCat;
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /**
     * Indicator Statistics w/ All Specific Functions
     */
    
    /**
     * [getIndicatorStatistics description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @param  [type] $for      [description]
     * @return [type]           [description]
     */
    public function getIndicatorStatistics($criteria, $value, $survey, $for) {
        $value = urldecode($value);
        $results = $this->m_analytics->getIndicatorStatistics($criteria, $value, $survey, $for);
        foreach ($results['response'] as $service) {
            $yes[] = (array_key_exists('Yes', $service)) ? $service['Yes'] : 0;
            $no[] = (array_key_exists('No', $service)) ? $service['No'] : 0;
        }
        $category = $results['categories'];
        $resultArray = array(array('name' => 'Yes', 'data' => $yes), array('name' => 'No', 'data' => $no));
        echo '<pre>';print_r($resultArray);echo '</pre>';
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /**
     * [getChildrenServices description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getChildrenServices($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'svc');
    }
    
    /**
     * [getDangerSigns description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getDangerSigns($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'dgn');
    }

    /**
     * [getActionsPerformed description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getActionsPerformed($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'svc');
    }
    
    /**
     * [getCounselGiven description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getCounselGiven($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'cns');
    }

    /**
     * [getTools description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getTools($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'ror');
    }

    /**
     * [getAnaemia description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getAnaemia($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'anm');
    }

    /**
     * [getBreastfeeding description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getBreastfeeding($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'brf');
    }

    /**
     * [getCounselling description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getCounselling($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'cnl');
    }

    /**
     * [getCondition description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getCondition($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'con');
    }

    /**
     * [getSymptomEar description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomEar($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'ear');
    }

    /**
     * [getSymptomEye description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomEye($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'eye');
    }

    /**
     * [getSymptomFever description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomFever($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'fev');
    }

    /**
     * [getSymptomJaundice description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomJaundice($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'jau');
    }

    /**
     * [getSymptomMalaria description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomMalaria($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'mal');
    }

    /**
     * [getSymptomPneumonia description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getSymptomPneumonia($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'pne');
    }

    /**
     * [getMNHTools description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getMNHTools($criteria, $value, $survey) {
        $this->getIndicatorStatistics($criteria, $value, $survey, 'tl');
    }
    
    /**
     * [getDiarrhoeaCaseNumbers description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getDiarrhoeaCaseNumbers($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = $this->m_analytics->getDiarrhoeaCaseNumbers($criteria, $value, $survey);
        $resultData = $results['num_of_diarrhoea_cases'];
        $category = $results['categories'];
        
        $monthArray = array('jan', 'feb', 'mar', 'apr', 'may', 'june', 'july', 'aug', 'sept', 'oct', 'nov', 'december');
        $monthCounter = 0;
        foreach ($monthArray as $value) {
            
            //echo $value;
            $dataArray[] = (int)$resultData[0][$value];
            $monthCounter++;
        }
        $resultArray = array(array('name' => 'Cases', 'data' => $dataArray));
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /*
     * Diarrhoea case treatments
    */
    
    public function getDiarrhoeaCaseTreatment($criteria, $value, $survey, $filter) {
        $value = urldecode($value);
        $results = $this->m_analytics->getDiarrhoeaCaseTreatment($criteria, $value, $survey);
        
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
        switch ($filter) {
            case 'SevereDehydration':
                $resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $severe_dehydration);
                break;

            case 'SomeDehydration':
                $resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $some_dehydration);
                break;

            case 'NoDehydration':
                $resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $no_dehydration);
                break;

            case 'Dysentry':
                $resultArray[] = array('type' => 'pie', 'name' => 'Case Treatment', 'data' => $dysentry);
                break;

            case 'NoClassification':
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
        $this->load->view('charts/chart_pie_v', $datas);
    }
    
    /*
     * ORT Corner Assessment
    */
    public function getORTCornerAssessment($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = $this->m_analytics->getORTCornerAssessment($criteria, $value, $survey);
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
        
        //Fill up Arrays
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
        $resultArray = array(array('name' => 'Yes', 'data' => $yesData), array('name' => 'No', 'data' => $noData));
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /*
     * Availability, Location and Functionality of Equipement at ORT Corner
    */
    
    public function getORTCornerEquipmentFrequency($criteria, $value, $survey) {
        $this->getORTCornerEquipment($criteria, $value, $survey, 'Frequency');
    }
    
    public function getORTCornerEquipmentFunctionality($criteria, $value, $survey) {
        $this->getORTCornerEquipment($criteria, $value, $survey, 'Functionality');
    }
    
    public function getORTCornerEquipmentLocation($criteria, $value, $survey) {
        $this->getORTCornerEquipment($criteria, $value, $survey, 'Location');
    }
    
    public function getORTCornerEquipment($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getORTCornerEquipmement($criteria, $value, $survey);
        
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
        switch ($choice) {
            case 'Frequency':
                $datas['availability'] = 1;
                $frequencyCategories = $frequency['categories'];
                $category = $frequencyCategories;
                $frequencyNever = $frequency['responses']['Never Available'];
                $frequencyAlways = $frequency['responses']['Available'];
                $frequencySometimes = $frequency['responses']['Sometimes Available'];
                $resultArray = array(array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
                $stackorno = 'charts/chart_stacked_v';
                break;

            case 'Functionality':
                foreach ($quantities as $quantity) {
                    $arr = $quantity[$counter];
                    
                    //[0]['Fully-functional'];
                    $quantitiesFullyFunctional[] = $arr['Fully-functional'];
                    $quantitiesNonFunctional[] = $arr['Non-functional'];
                    
                    //$counter++;
                    
                    
                }
                $category = $results['quantities']['categories'];
                $stackorno = 'charts/chart_stacked_v';
                $resultArray = array(array('name' => 'Fully-Functional', 'data' => $quantitiesFullyFunctional), array('name' => 'Non-Functional', 'data' => $quantitiesNonFunctional));
                break;

            case 'Location':
                
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
                $resultArray = array(array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
                $category = $locationCategories;
                
                //var_dump($resultArray);die;
                $stackorno = 'charts/chart_stacked_v';
                break;
        }
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getSuppliesFrequency($criteria, $value, $survey) {
        $this->getSupplies($criteria, $value, $survey, 'Frequency');
    }
    
    public function getSuppliesLocation($criteria, $value, $survey) {
        $this->getSupplies($criteria, $value, $survey, 'Location');
    }
    
    /*
     * Availability, Location and Functionality of Supplies at ORT Corner
    */
    public function getSupplies($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getSupplies($criteria, $value, $survey);
        
        //var_dump($results['location']);
        //die ;
        $datas = array();
        
        $frequency = $results['frequency'];
        $categories = $results['frequency']['categories'];
        
        $resultArray = array();
        $stackorno;
        
        $counter = 0;
        
        $quantitiesFullyFunctional = $quantitiesNonFunctional = array();
        $mch = $other = $opd = $ward = $clinic = $pharmacy = $delivery = $store = array();
        
        //$category = $frequencyCategories;
        switch ($choice) {
            case 'Frequency':
                $frequencyNever = $frequencyAlways = $frequencySometimes = array();
                $datas['availability'] = 1;
                $frequencyCategories = $frequency['categories'];
                $frequencyNever = $frequency['responses']['Never Available'];
                $frequencyAlways = $frequency['responses']['Available'];
                $frequencySometimes = $frequency['responses']['Sometimes Available'];
                $resultArray = array(array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
                $stackorno = 'charts/chart_stacked_v';
                break;

            case 'Location':
                
                //var_dump($location['Table spoons']);die;
                $location = $results['location']['responses'];
                $locationCategories = $results['location']['categories'];
                switch ($survey) {
                    case 'ch':
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
                        $resultArray = array(array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
                        
                        break;

                    case 'mnh':
                        foreach ($location as $key => $loc) {
                            
                            if (array_key_exists('Delivery room', $loc) == true) {
                                $delivery[] = $loc['Delivery room'];
                            } else {
                                $delivery[] = 0;
                            }
                            if (array_key_exists('Other', $loc) == true) {
                                $other[] = $loc['Other'];
                            } else {
                                $other[] = 0;
                            }
                            if (array_key_exists('Pharmacy', $loc) == true) {
                                $pharmacy[] = $loc['Pharmacy'];
                            } else {
                                $pharmacy[] = 0;
                            }
                            if (array_key_exists('Store', $loc) == true) {
                                $store[] = $loc['Store'];
                            } else {
                                $store[] = 0;
                            }
                            
                            //var_dump ($location);die;
                            
                            
                        }
                        
                        //var_dump($other);
                        $resultArray = array(array('name' => 'Delivery Room', 'data' => $delivery), array('name' => 'Pharmacy', 'data' => $pharmacy), array('name' => 'Store', 'data' => $store), array('name' => 'Other', 'data' => $other));
                        
                        break;
                }
                
                //var_dump($resultArray);die;
                $stackorno = 'charts/chart_stacked_v';
                break;
        }
        $category = $categories;
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    public function getRunningWaterFrequency($criteria, $value, $survey) {
        $this->getRunningWater($criteria, $value, $survey, 'Frequency');
    }
    
    public function getRunningWaterLocation($criteria, $value, $survey) {
        $this->getRunningWater($criteria, $value, $survey, 'Location');
    }
    
    /*
     * Availability, Location and Functionality of Running Water
    */
    public function getRunningWater($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getRunningWater($criteria, $value, $survey);
        
        //var_dump($results['frequency']);die;
        //die ;
        $datas = array();
        
        $frequency = $results['frequency'];
        $categories = $results['frequency']['categories'];
        
        //var_dump($frequency);
        $resultArray = array();
        $stackorno;
        
        $counter = 0;
        
        $quantitiesFullyFunctional = $quantitiesNonFunctional = array();
        $mch = $other = $opd = $ward = $clinic = $pharmacy = $delivery = $store = array();
        
        //$category = $frequencyCategories;
        switch ($choice) {
            case 'Frequency':
                $frequencyNever = $frequencyAlways = $frequencySometimes = array();
                $datas['availability'] = 1;
                $frequencyCategories = $frequency['categories'];
                $frequencyNever = $frequency['responses']['Never Available'];
                $frequencyAlways = $frequency['responses']['Available'];
                $frequencySometimes = $frequency['responses']['Sometimes Available'];
                $resultArray = array(array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
                
                // var_dump($resultArray);die;
                break;

            case 'Location':
                
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
                    if (array_key_exists('Maternity', $loc) == true) {
                        $ward[] = $loc['Maternity'];
                    } else {
                        $ward[] = 0;
                    }
                    if (array_key_exists('U5 Clinic', $loc) == true) {
                        $clinic[] = $loc['U5 Clinic'];
                    } else {
                        $clinic[] = 0;
                    }
                }
                
                //var_dump($other);
                $resultArray = array(array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Maternity', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
                break;
        }
        
        $category = $categories;
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /**
     *
     */
    public function getCHSuppliesSupplier($criteria, $value, $survey) {
        $value = urldecode($value);
        $results = $this->m_analytics->getCHSuppliesSupplier($criteria, $value, $survey);
        
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
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getResourceFrequency($criteria, $value, $survey) {
        $this->getResources($criteria, $value, $survey, 'Frequency');
    }
    
    public function getResourceLocation($criteria, $value, $survey) {
        $this->getResources($criteria, $value, $survey, 'Location');
    }
    
    /*
     *  Availability, Location and Functionality of Electricity and Hardware Resources
    */
    public function getResources($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getResources($criteria, $value, $survey);
        $datas = array();
        $frequency = $results['response'];
        $categories = $results['categories'];
        
        var_dump($results['response']);
        die;
        $resultArray = array();
        $stackorno;
        
        $counter = 0;
        
        $quantitiesFullyFunctional = $quantitiesNonFunctional = array();
        $mch = $other = $opd = $ward = $clinic = array();
        
        //$category = $frequencyCategories;
        switch ($choice) {
            case 'Frequency':
                $frequencyNever = $frequencyAlways = $frequencySometimes = array();
                $datas['availability'] = 1;
                $frequencyCategories = $frequency['categories'];
                $frequencyNever = $frequency['responses']['Never Available'];
                $frequencyAlways = $frequency['responses']['Available'];
                $frequencySometimes = $frequency['responses']['Sometimes Available'];
                $resultArray = array(array('name' => 'Always', 'data' => $frequencyAlways), array('name' => 'Sometimes', 'data' => $frequencySometimes), array('name' => 'Never', 'data' => $frequencyNever));
                $stackorno = 'charts/chart_stacked_v';
                break;

            case 'Location':
                
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
                $resultArray = array(array('name' => 'MCH', 'data' => $mch), array('name' => 'Other', 'data' => $other), array('name' => 'OPD', 'data' => $opd), array('name' => 'Ward', 'data' => $ward), array('name' => 'U5 Clinic', 'data' => $clinic));
                
                //var_dump($resultArray);die;
                $stackorno = 'charts/chart_stacked_v';
                break;
        }
        $category = $categories;
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /**
     * Lists for NEVER
     */
    public function getFacilityListForNo($criteria, $value, $survey, $choice) {
        $value = urldecode($value);
        $results = $this->m_analytics->getFacilityListForNo($criteria, $value, $survey, $choice);
        
        //var_dump($results);
        //die ;
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';
        $pdf = "<h3>Facility List that responded <em>NO</em> for $value District</h3>";
        $pdf.= '<table>';
        foreach ($results as $key => $value) {
            $pdf.= '<tr><th colspan="2">' . $key . '<th></tr>';
            
            //Per Title
            foreach ($value as $facility) {
                $pdf.= '<tr class="tableRow"><td width="70px">' . $facility[0] . '</td><td width="500px">' . $facility[1] . '</td></tr>';
            }
        }
        $pdf.= '</table>';
        $this->loadPDF($pdf);
    }
    
    public function getFacilityListForNoMNH($criteria, $value, $survey, $question) {
        $value = urldecode($value);
        $results = $this->m_analytics->getFacilityListForNoMNH($criteria, $value, $survey, $question);
        
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';
        //die ;
        
        $pdf = "<h3>Facility List that responded <em>NO</em> for $value District</h3>";
        $pdf.= '<table>';
        foreach ($results as $key => $value) {
            $pdf.= '<tr><th colspan="2">' . $key . '<th></tr>';
            
            //Per Title
            foreach ($value as $facility) {
                $pdf.= '<tr class="tableRow"><td width="70px">' . $facility[0] . '</td><td width="500px">' . $facility[1] . '</td></tr>';
            }
        }
        $pdf.= '</table>';
        
        //echo $pdf;
        $this->loadPDF($pdf);
    }
    
    /**
     * Lists for NEVER
     */
    public function getFacilityListForNever($criteria, $value, $survey, $choice) {
        urldecode($value);
        $results = $this->m_analytics->getFacilityListForNever($criteria, $value, $survey, $choice);
        
        //var_dump($results);
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';
        $pdf = "<h3>Facility List that responded <em>NEVER</em> for $value District</h3>";
        $pdf.= '<table>';
        foreach ($results as $key => $value) {
            $pdf.= '<tr><th colspan="2">' . $key . '<th></tr>';
            
            //Per Title
            foreach ($value as $facility) {
                $pdf.= '<tr class="tableRow"><td width="70px">' . $facility[0] . '</td><td width="500px">' . $facility[1] . '</td></tr>';
            }
        }
        $pdf.= '</table>';
        $this->loadPDF($pdf);
    }
    
    /**
     * Get Facility Ownership
     */
    public function getFacilityOwnerPerCounty($county) {
        
        //$allCounties = $this -> m_analytics -> getReportingCounties('ch','baseline');
        $county = urldecode($county);
        
        //foreach ($allCounties as $county) {
        $category[] = $county;
        $results = $this->m_analytics->getFacilityOwnerPerCounty($county);
        $resultArray = array();
        foreach ($results as $value) {
            $data = array();
            $name = $value['facilityOwner'];
            $data[] = (int)$value['ownership_total'];
            $resultArray[] = array('name' => $name, 'data' => $data);
        }
        $finalResult = $resultArray;
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    /**
     * Get Lever Ownership
     */
    public function getFacilityLevelPerCounty($county, $survey, $survey_category) {
        
        //$allCounties = $this -> m_analytics -> getReportingCounties('ch','baseline');
        $county = urldecode($county);
        
        //foreach ($allCounties as $county) {
        $category[] = $county;
        $results = $this->m_analytics->getFacilityLevelPerCounty($county, $survey, $survey_category);
        $resultArray = array();
        foreach ($results as $value) {
            $data = array();
            $name = 'Level  ' . $value['facilityLevel'];
            $data[] = (int)$value['level_total'];
            $resultArray[] = array('name' => $name, 'data' => $data);
        }
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getFacilityLevelAll($survey) {
        $counties = $this->m_analytics->getReportingCounties($survey);
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getFacilityLevelPerCounty($county['county'], $survey);
            $categories[] = $county['county'];
        }
        
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';die;
        
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
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function getFacilityOwnerAll($survey) {
        $counties = $this->m_analytics->getReportingCounties($survey);
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getFacilityOwnerPerCounty($county['county'], $survey);
            $categories[] = $county['county'];
        }
        $resultArray = array();
        foreach ($results as $county) {
            foreach ($county as $level) {
                $data[$level['facilityOwner']][] = (int)$level['ownership_total'];
            }
        }
        foreach ($data as $key => $val) {
            $resultArray[] = array('name' => $key, 'data' => $val);
        }
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    /**
     * Get Specific Districts Filter
     */
    public function getSpecificDistrictNames() {
        $county = $this->session->userdata('county_analytics');
        $options = '';
        $results = $this->m_analytics->getSpecificDistrictNames($county);
        $options = '<option selected=selected>Viewing All</option>';
        foreach ($results as $result) {
            $options.= '<option>' . $result['facDistrict'] . '</option>';
        }
        
        //return $dataArray;
        echo ($options);
    }
    
    //Get Facilities per County
    public function getCountyFacilities($criteria) {
        $result = $this->m_analytics->getCountyFacilities();
        
        foreach ($result as $result) {
            $county[] = $result['fac_county'];
            $facilities[] = (int)$result['COUNT(facility.fac_name)'];
        }
        $category = $county;
        $resultArray[] = array('type' => 'column', 'name' => 'Facilities', 'data' => $facilities);
        $resultArray = json_encode($resultArray);
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getCountyFacilitiesByOwner($criteria) {
        $result = $this->m_analytics->getCountyFacilitiesByOwner($criteria);
        
        //var_dump($result);die;
        foreach ($result as $result) {
            $owners[] = $result['facilityOwnedBy'];
            $facilities[] = (int)$result['COUNT(facilityOwnedBy)'];
        }
        $category = $owners;
        $resultArray[] = array('type' => 'column', 'name' => 'Facility Owners', 'data' => $facilities);
        $resultArray = json_encode($resultArray);
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar', sizeof($category));
    }
    
    public function getFacilitiesByDistrictOptions($district, $survey) {
        $district = urldecode($district);
        $options = $this->m_analytics->getFacilitiesByDistrictOptions($district, $survey);
        
        //var_dump($options);
        echo $options;
    }
    
   
    
    
    /**
     * Deliveries Conducted
     */
    public function getDeliveriesConducted($criteria, $value, $survey) {
        $results = $this->m_analytics->getDeliveries($criteria, $value, $survey);
    }
    
    /**
     * Signal Functions
     * Options:
     *      .bemonc
     *      .cemonc
     */
    public function getSignalFunction($criteria, $value, $survey, $signal) {
        $results['conducted'] = array();
        $results = $this->m_analytics->getSignalFunction($criteria, $value, $survey, $signal);
        
        $number = $q = $resultArray = $yes = $no = array();
        foreach ($results['conducted'] as $key => $value) {
            $q[] = $key;
            $yes[] = (int)$value['yes'];
            $no[] = (int)$value['no'];
        }
        $resultArray = array(array('name' => 'Deliveries', 'data' => $yes), array('name' => 'No', 'data' => $no));
        
        $category = $q;
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    public function getBEMONCReason($criteria, $value, $survey) {
        $this->getSignalFunctionReason($criteria, $value, $survey, 'bemonc');
    }
    
    public function getCEOCReason($criteria, $value, $survey) {
        $this->getSignalFunctionReason($criteria, $value, $survey, 'ceoc');
    }
    
    public function getSignalFunctionReason($criteria, $value, $survey, $signal) {
        $results['reason'] = $results['categories'] = array();
        $results = $this->m_analytics->getSignalFunction($criteria, $value, $survey, $signal);
        
        //echo '<pre>';
        // print_r($results);
        //echo '</pre>';
        //die ;
        foreach ($results['categories'] as $cat) {
            $category[] = $cat;
        }
        
        //$categories = $results['categories'];
        $number = $q = $resultArray = $yes = $no = array();
        $counter = 0;
        
        switch ($signal) {
            case 'bemonc':
                
                foreach ($results['reason'] as $key => $value) {
                    foreach ($value as $level => $val) {
                        $data['Level ' . $level][] = $val;
                    }
                    
                    //$data = array();;
                    
                    
                }
                $resultArray = array(array('name' => 'Level 1', 'data' => $data['Level 1']), array('name' => 'Level 2', 'data' => $data['Level 2']), array('name' => 'Level 3', 'data' => $data['Level 3']));
                
                //echo '<pre>';
                // print_r($resultArray);
                //echo '</pre>';
                //die;
                break;

            case 'ceoc':
                foreach ($results['reason'] as $key => $value) {
                    foreach ($cat as $c) {
                        if (array_key_exists($c, $value)) {
                            $numbers[] = $value[$c];
                        } else {
                            $numbers[] = 0;
                        }
                        $categories[] = $c;
                    }
                    $resultArray[] = array('name' => $key, 'data' => $numbers);
                    $numbers = array();
                }
                break;
        }
        
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    public function getCEMONC($criteria, $value, $survey) {
        $this->getSignalFunction($criteria, $value, $survey, 'ceoc');
    }
    
    public function getBEMONC($criteria, $value, $survey) {
        $this->getSignalFunction($criteria, $value, $survey, 'bemonc');
    }
    
    /**
     * [getQuestionStatistics description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @param  [type] $for      [description]
     * @return [type]           [description]
     */
    public function getQuestionStatistics($criteria, $value, $survey, $for) {
        
        $results = $this->m_analytics->getQuestionStatistics($criteria, $value, $survey, $for);
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        $number = $resultArray = $q = array();
        $number = $resultArray = $q = $yes = $no = array();
        foreach ($results as $key => $value) {
            $q[] = $key;
            $yes[] = (int)$value['yes'];
            $no[] = (int)$value['no'];
        }
        $resultArray = array(array('name' => 'Yes', 'data' => $yes), array('name' => 'No', 'data' => $no));
        
        $category = $q;
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    public function getHIV($criteria, $value, $survey) {
        $this->getQuestionStatistics($criteria, $value, $survey, 'hiv');
    }
    public function getJobAids($criteria, $value, $survey) {
        $this->getQuestionStatistics($criteria, $value, $survey, 'job');
    }
    public function getGuidelinesAvailabilityMNH($criteria, $value, $survey) {
        $this->getQuestionStatistics($criteria, $value, $survey, 'guide');
    }
    /**
     * Nurses Deployed in Maternity
     */
    public function getNursesDeployed($criteria, $value, $survey) {
        $results = $this->m_analytics->getNursesDeployed($criteria, $value, $survey);
        $number = $resultArray = $q = $yes = $no = array();
        $question = '';
        foreach ($results as $key => $value) {
            $question = $key;
            $number[] = (int)$value[0];
        }
        $category[] = 'Numbers';
        $resultArray[] = array('name' => 'Nurses Deployed', 'data' => $number);
        
        $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar');
    }
    
    /**
     * Beds in facility
     */
    public function getBeds($criteria, $value, $survey) {
        $results = $this->m_analytics->getBeds($criteria, $value, $survey);
        $number = $resultArray = array();
        foreach ($results as $key => $value) {
            $number[] = (int)$value[0];
            $resultArray[] = array('name' => $key, 'data' => $number);
            $number = array();
        }
        $category[] = 'Numbers';
        
        $this->populateGraph($resultArray, '', $category, $criteria, '', 120, 'bar');
    }
    
    /**
     * 24 Hour Service
     */
    public function getServices($criteria, $value, $survey) {
        $results = $this->m_analytics->getService($criteria, $value, $survey);
        $number = $resultArray = array();
        foreach ($results as $key => $value) {
            $number[] = (int)$value[0];
            $resultArray[] = array('name' => $key, 'data' => $number);
        }
        
        $category[] = 'Numbers';
        $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar');
    }
    
    /**
     * Health Facility Management
     */
    public function getHFM($criteria, $value, $survey) {
        $results = $this->m_analytics->getHFM($criteria, $value, $survey);
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        foreach ($results as $key => $val) {
            $yes[] = (int)$val['yes'];
            $no[] = (int)$val['no'];
            $committee = trim($key, 'Does this facility have a');
            $committee = trim($committee, '?');
            $category[] = $committee;
        }
        
        $resultArray = array(array('name' => 'Yes', 'data' => $yes), array('name' => 'No', 'data' => $no));
        $this->populateGraph($resultArray, '', $category, $criteria, 'percent', 70, 'bar');
    }
    
    /**
     * Deliveries
     */
    public function getDeliveries($criteria, $value, $survey) {
        $results = $this->m_analytics->getDeliveries($criteria, $value, $survey);
        
        $number = $q = $resultArray = array();
        foreach ($results['overview'] as $key => $value) {
            $q = $key;
            $resultArray = array(array('name' => 'Deliveries', 'data' => array(array('name' => 'Yes', 'y' => (int)$value['yes'], 'drilldown' => 'levels' . $criteria), array('No', (int)$value['no']))));
        }
        
        //echo '<pre>';print_r($results['drilldown']);echo '</pre>';die;
        foreach ($results['drilldown'] as $key => $value) {
            $q = $key;
            $drilldownData[] = array('Level ' . $key, (int)$value);
        }
        
        //echo '<pre>';print_r($drilldownData);echo '</pre>';die;
        $drilldownArray[] = array('id' => 'levels' . $criteria, 'name' => 'Facility Levels', 'data' => $drilldownData);
        $category[] = $q;
        $this->populateGraph($resultArray, $drilldownArray, $category, $criteria, 'percent', 0, 'pie');
    }
    
    /**
     * Deliveriy Preparedness
     */
    public function getDeliveryPreparedness($criteria, $value, $survey) {
    }
    
    /**
     * [getCommunityStrategyMNH description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function getCommunityStrategyMNH($criteria, $value, $survey) {
        $results = $this->m_analytics->getCommunityStrategyMNH($criteria, $value, $survey);
        
        //echo '<pre>';
        //print_r($results);
        //echo '</pre>';die;
        $number = $resultArray = $q = $yes = $no = array();
        foreach ($results as $key => $value) {
            $key = trim($key, 'Total number of ');
            $category[] = $key;
            $number[] = (int)$value[0];
        }
        
        $resultArray[] = array('name' => 'Numbers', 'data' => $number);
        $resultArray = json_encode($resultArray);
        
        $this->populateGraph($resultArray, '', $category, $criteria, '', 70, 'bar');
    }
    
    /**
     *  Summary Data
     */
    
    public function case_summary($choice) {
        
        //Get All Reporting Counties
        $counties = $this->m_analytics->getReportingCounties('ch', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->case_summary($county['county'], $choice);
            $categories[] = $county['county'];
        }
        
        switch ($choice) {
            case 'Cases':
                
                //group cases
                foreach ($results as $result) {
                    $severe_dehydration[] = (int)$result[0]['severe_dehydration'];
                    $some_dehydration[] = (int)$result[0]['some_dehydration'];
                    $no_dehydration[] = (int)$result[0]['no_dehydration'];
                    $dysentry[] = (int)$result[0]['dysentry'];
                    $no_classification[] = (int)$result[0]['no_classification'];
                }
                $resultArray = array(array('name' => 'Severe Dehydration', 'data' => $severe_dehydration), array('name' => 'Some Dehydration', 'data' => $some_dehydration), array('name' => 'No Dehydration', 'data' => $no_dehydration), array('name' => 'Dysentry', 'data' => $dysentry), array('name' => 'No Classification', 'data' => $no_classification));
                break;

            case 'Classification':
                foreach ($results as $value) {
                    foreach ($value as $key => $val) {
                        $formattedArray[$key][] = (int)$val[0]['total'];
                    }
                }
                foreach ($formattedArray as $key => $arr) {
                    $resultArray[] = array('name' => $key, 'data' => $arr);
                }
                break;
        }
        
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function guidelines_summary($guideline) {
        $guideline = urldecode($guideline);
        
        //Get All Reporting Counties
        $finalYes = $finalNo = array();
        $counties = $this->m_analytics->getReportingCounties('ch', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getGuidelinesAvailability('county', $county['county'], 'ch');
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
        
        $resultArray = array(array('name' => 'Yes', 'data' => $finalYes), array('name' => 'No', 'data' => $finalNo));
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function guidelines_summaryMNH($guideline) {
        $guideline = urldecode($guideline);
        $categories = array();
        
        //echo $guideline;
        //Get All Reporting Counties
        $finalYes = $finalNo = array();
        $counties = $this->m_analytics->getReportingCounties('mnh', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getQuestionStatistics('county', $county['county'], 'mnh', 'guide');
        }
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        foreach ($results as $k => $county) {
            
            foreach ($county as $guide => $val) {
                
                //echo $guide;
                if ($guideline == $guide) {
                    
                    //echo $guideline.'  '.$guideline. '</br>';
                    $finalYes[] = (int)$val['yes'];
                    $finalNo[] = (int)$val['no'];
                    $categories[] = $k;
                }
            }
        }
        $resultArray = array(array('name' => 'Yes', 'data' => $finalYes), array('name' => 'No', 'data' => $finalNo));
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function training_summary($training) {
        $training = urldecode($training);
        
        //Get All Reporting Counties
        $finalYes = $finalNo = array();
        $counties = $this->m_analytics->getReportingCounties('ch', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getTrainedStaff('county', $county['county'], 'ch');
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
        $resultArray = array(array('name' => 'Trained', 'data' => $finalYes), array('name' => 'Working', 'data' => $finalNo));
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function tools_summary($tool) {
        $tool = urldecode($tool);
        
        //Get All Reporting Counties
        $finalYes = $finalNo = array();
        $counties = $this->m_analytics->getReportingCounties('ch', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getTools('county', $county['county'], 'ch');
            $categories[] = $county['county'];
        }
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        foreach ($results as $county) {
            foreach ($county['response'] as $key => $currentTool) {
                if ($key == $tool) {
                    $yes[] = $currentTool['Yes'];
                    $no[] = $currentTool['No'];
                }
            }
        }
        
        $resultArray = array(array('name' => 'Yes', 'data' => $yes), array('name' => 'No', 'data' => $no));
        
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    
    public function training_summaryMNH($training) {
        $training = urldecode($training);
        
        //Get All Reporting Counties
        $categories = $finalYes = $finalNo = array();
        $counties = $this->m_analytics->getReportingCounties('mnh', 'baseline');
        foreach ($counties as $county) {
            $results[$county['county']] = $this->m_analytics->getTrainedStaff('county', $county['county'], 'mnh');
        }
        foreach ($results as $key => $county) {
            foreach ($county['trained_values'] as $k => $t) {
                
                if ($k == $training) {
                    $finalYes[] = $t;
                    $categories[] = $key;
                }
            }
            
            foreach ($county['working_values'] as $k => $w) {
                if ($k == $training) {
                    $finalNo[] = $w;
                    $categories[] = $key;
                }
            }
        }
        
        $categories = array_unique($categories);
        foreach ($categories as $c) {
            $cat[] = $c;
        }
        $categories = $cat;
        $this->populateGraph($resultArray, '', $categories, $criteria, 'percent', 70, 'bar', sizeof($categories));
    }
    /**
     * [commodity_supplies_summary description]
     * @param  [type] $criteria [description]
     * @param  [type] $value    [description]
     * @param  [type] $survey   [description]
     * @return [type]           [description]
     */
    public function commodity_supplies_summary($criteria, $value, $survey) {
        
        /*using CI Database Active Record*/
        $value = urldecode($value);
        $results = $this->m_analytics->commodities_supplies_summary($criteria, $value, $survey);
        
        $supplies = $results['supplies'];
        $commodity = $results['commodities'];
        $equipments = $results['equipments'];
        $supplies_cat = $results['supply_categories'];
        $commodity_cat = $results['commodity_categories'];
        $equipment_cat = $results['equipment_categories'];
        $titles = array_merge_recursive(array_values($commodity_cat), array_values($supplies_cat), array_values($equipment_cat));
        
        //echo '<pre>';print_r($titles);    echo '<pre>';die;
        foreach ($supplies as $key => $facility) {
            foreach ($supplies_cat as $cat) {
                
                //echo $cat;
                if (!array_key_exists($cat, $facility)) {
                    $newArray[$key][$cat] = 0;
                } else {
                    $newArray[$key][$cat] = $supplies[$key][$cat];
                }
            }
        }
        
        $arr = array_merge_recursive($commodity, $newArray, $equipments);
        
        //echo '<pre>';print_r($arr);   echo '<pre>';die;
        $data['title'] = $titles;
        $data['data'] = $arr;
        $this->loadExcel($data, 'Commodity Supplies and Equipments for ' . $value);
    }
    
    /**
     * [loadExcel description]
     * @param  [type] $data     [description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
    public function loadExcel($data, $filename) {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Rufus Mbugua");
        $objPHPExcel->getProperties()->setLastModifiedBy("Rufus Mbugua");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription(" ");
        
        // Add some data
        //  echo date('H:i:s') . " Add some data\n";
        $objPHPExcel->setActiveSheetIndex(0);
        
        $rowExec = 1;
        
        //Looping through the cells
        $column = 0;
        foreach ($data['title'] as $cell) {
            
            //echo $column . $rowExec; die;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, $cell);
            $objPHPExcel->getActiveSheet()->getStyle(PHPExcel_Cell::stringFromColumnIndex($column) . $rowExec)->getFont()->setBold(true)->setSize(14);
            $objPHPExcel->getActiveSheet()->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($column))->setAutoSize(true);
            
            $column++;
        }
        $rowExec = 2;
        foreach ($data['data'] as $rowset) {
            
            //Looping through the cells per facility
            $column = 0;
            foreach ($rowset as $cell) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $rowExec, $cell);
                $column++;
            }
            $rowExec++;
        }
        
        //die ;
        
        // Rename sheet
        //  echo date('H:i:s') . " Rename sheet\n";
        $objPHPExcel->getActiveSheet()->setTitle('Simple');
        
        // Save Excel 2007 file
        //echo date('H:i:s') . " Write to Excel2007 format\n";
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        
        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');
        
        // It will be called file.xls
        header('Content-Disposition: attachment; filename=' . $filename . '.xlsx');
        
        // Write file to the browser
        $objWriter->save('php://output');
        
        // Echo done
        //echo date('H:i:s') . " Done writing file.\r\n";
        
        
    }
    
    /**
     * [loadPDF description]
     * @param  [type] $pdf [description]
     * @return [type]      [description]
     */
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
        $this->load->library('mpdf');
        $this->mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
        $this->mpdf->SetTitle('Maternal Newborn and Child Health Assessment');
        $this->mpdf->SetHTMLHeader('<em>Assessment Tool</em>');
        $this->mpdf->SetHTMLFooter('<em>Assessment Tool</em>');
        $this->mpdf->simpleTables = true;
        $this->mpdf->WriteHTML($stylesheet, 1);
        $this->mpdf->WriteHTML($html, 2);
        $report_name = 'CH Assessment Tool_Facility List' . ".pdf";
        $this->mpdf->Output($report_name, 'I');
    }
    
    /**
     * [populateGraph description]
     * @param  string  $resultArray [description]
     * @param  string  $resultSize  [description]
     * @param  string  $drilldown   [description]
     * @param  string  $category    [description]
     * @param  string  $criteria    [description]
     * @param  string  $stacking    [description]
     * @param  integer $margin      [description]
     * @param  string  $type        [description]
     * @return [type]               [description]
     */
    public function populateGraph($resultArray = '', $drilldown = '', $category = '', $criteria = '', $stacking = '', $margin = 0, $type = '', $resultSize = '') {
        $datas = array();
        $chart_size = (count($resultArray) < 5) ? 5 : count($resultArray);
        $given_size = ($resultSize != '' && $resultSize < 5) ? 5 : $resultSize;
        $datas['container'] = 'chart_' . $criteria . mt_rand();
        $datas['chart_type'] = $type;
        $datas['chart_margin'] = $margin;
        $datas['chart_size'] = ($resultSize != '') ? $given_size * 60 : $chart_size * 60;
        $datas['chart_stacking'] = $stacking;
        $datas['color_scheme'] = ($stacking != '') ? array('#8bbc21', '#fb4347', '#92e18e', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a') : array('#66aaf7', '#f66c6f', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a');
        $datas['chart_categories'] = $category;
        $datas['chart_title'] = 'Occurence';
        $datas['chart_drilldown'] = $drilldown;
        $datas['chart_series'] = $resultArray;
        echo json_encode($datas);
    }
}
