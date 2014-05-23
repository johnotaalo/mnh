<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *model to persist data for mch form
 */

class M_MCH_Survey extends MY_Model
{
    var $id, $attr, $frags, $elements, $noOfInserts, $batchSize, $mfcCode, $facility, $commodity, $isFacility, $ortAspectsList, $mchGuidelineAvailabilityList, $commodityList, $trainingGuidelinesList, $equipmentList, $suppliesList, $indicatorList, $treatmentList;
    
    function __construct() {
        parent::__construct();
        $this->isFacility = 'false';
    }
    
    /*calls the query defined in MY_Model*/
    public function getOrtAspectQuestions($for) {
        $this->ortAspectsList = $this->getAllOrtAspects($for);
        
        //var_dump($this->ortAspectsList);die;
        return $this->ortAspectsList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getAccessChallenges() {
        $this->challengeList = $this->getAllAccessChallenges();
        
        //var_dump($this->ortAspectsList);die;
        return $this->challengeList;
    }
	/*calls the query defined in MY_Model*/
    public function getmchConsultationQuestions() {
        $this->mnhCeocQuestionsList = $this->getQuestionsBySection('imci', 'QUC');
        
        //var_dump($this->mnhCeocQuestionsList);die;
        return $this->mnhCeocQuestionsList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getMchCommunityStrategyQuestions() {
        $this->ortAspectsList = $this->getQuestionsBySection('cms', 'QUC');
        
        //var_dump($this->ortAspectsList);die;
        return $this->ortAspectsList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getGuidelineAvailabilityQuestions($for) {
        $this->mchGuidelineAvailabilityList = $this->getAllOrtAspects($for);
        
        //var_dump($this->ortAspectsList);die;
        return $this->mchGuidelineAvailabilityList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getCommodityNames() {
        $this->commodityList = $this->getAllCommodityNames('ch');
        
        //var_dump($this->commodityList);die;
        return $this->commodityList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getBundlingNames() {
        $this->commodityList = $this->getAllCommodityNames('bun');
        
        //var_dump($this->commodityList);die;
        return $this->commodityList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getCommoditySupplierNames() {
        $this->supplierList = $this->getAllCommoditySupplierNames('mnh');
        
        //var_dump($this->supplierList);die;
        return $this->supplierList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getOtherSupplierNames() {
        $this->supplierList = $this->getAllCommoditySupplierNames('mch');
        
        //var_dump($this->supplierList);die;
        return $this->supplierList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getAllHWSources() {
        $this->supplierList = $this->getAllSources('sou');
        
        //var_dump($this->supplierList);die;
        return $this->supplierList;
    }
    
    /*calls the query defined in MY_Model*/
    public function getTrainingGuidelines() {
        $this->trainingGuidelinesList = $this->getAllTrainingGuidelines('ch');
        
        //var_dump($this->trainingGuidelinesList);die;
        return $this->trainingGuidelinesList;
    }
    
    public function getEquipmentNames($section) {
        $this->equipmentList = $this->getAllEquipmentNames($section);
        
        //var_dump($this->equipmentList);die;
        return $this->equipmentList;
    }
    
    public function getSupplyNames() {
        $this->suppliesList = $this->getAllSupplyNames('ch');
        
        //var_dump($this->suppliesList);die;
        return $this->suppliesList;
    }
    
    public function getIndicatorNames() {
        $this->indicatorList = $this->getAllMCHIndicators();
        
        //var_dump($this->indicatorList);die;
        return $this->indicatorList;
    }
    
    public function getTreatmentNames() {
        $this->treatmentList = $this->getAllMCHTreatments();
        
        //var_dump($this->treatmentList);die;
        return $this->treatmentList;
    }
    
    public function getTreatmentFor($type)
    {
        $this->treatmentList = $this->getTreatmentsByType($type);

        //var_dump($this->treatmentList);
        return $this->treatmentList;
    }
    private function addQuestionsInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'question') !== FALSE) {
                 //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //mark the end of 1 row...for record count
                if ($this->attr == "questionCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\logQuestions();
            
            //create an object of the model
            
            //$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            
            (array_key_exists('questionLocResponse', $this->elements[$i])) ? $this->theForm->setLqResponse($this->elements[$i]['questionLocResponse']) : $this->theForm->setLqResponse($this->elements[$i]['questionResponse']);
            
            (array_key_exists('questionCount', $this->elements[$i])) ? $this->theForm->setLqResponseCount($this->elements[$i]['questionCount']) : $this->theForm->setLqResponseCount(-1);
            (array_key_exists('questionReason', $this->elements[$i])) ? $this->theForm->setLqReason($this->elements[$i]['questionReason']) : $this->theForm->setLqReason('n/a');
            (array_key_exists('questionSpecified', $this->elements[$i])) ? $this->theForm->setLqSpecifiedOrFollowUp($this->elements[$i]['questionSpecified']) : $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            $this->theForm->setQuestionCode($this->elements[$i]['questionCode']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLqCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addMchGuidelinesAvailabilityInfo
    
    private function addMchCommunityStrategyInfo() {
        
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'mchCommunity') !== FALSE) {
                 //select data for mch community strategy
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "mchCommunityStrategyQCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\CommunityStrategies();
            
            //create an object of the model
            
            $this->theForm->setStrategyCode(1);
             //$this -> elements[$i]['mchCommunityStrategyQCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['mchCommunityStrategy']) && $this->elements[$i]['mchCommunityStrategy'] != '') ? $this->theForm->setCsResponse($this->elements[$i]['mchCommunityStrategy']) : $this->theForm->setCsResponse(-1);
            $this->theForm->setCsCreated(new DateTime());
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex -> getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
    }
     //close addMchCommunityStrategyInfo()
    
    private function addGuidelinesStaffInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'gs') !== FALSE) {
                 //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "gsguideCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\TrainingGuidelines();
            
            //create an object of the model
            
            $this->theForm->setGuideCode($this->elements[$i]['gsguideCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['gstrainedbefore2010'])) ? $this->theForm->setTgTrainedBefore2010($this->elements[$i]['gstrainedbefore2010']) : $this->theForm->setTgTrainedBefore2010(-1);
            (isset($this->elements[$i]['gstrainedafter2010'])) ? $this->theForm->setTgTrainedAfter2010($this->elements[$i]['gstrainedafter2010']) : $this->theForm->setTgTrainedAfter2010(-1);
            (isset($this->elements[$i]['gsworking'])) ? $this->theForm->setTgWorking($this->elements[$i]['gsworking']) : $this->theForm->setTgWorking(-1);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setTgCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addGuidelinesStaffInfo
    private function addAccessChallengesInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'ach') !== FALSE) {
                 //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "achResponse") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\LogChallenges();
            
            //create an object of the model
            
            $this->theForm->setAchCode($this->elements[$i]['achResponse']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addGuidelinesStaffInfo
    
    private function addCommodityQuantityAvailabilityInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'cq') !== FALSE) {
                 //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //	print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "cqCommCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        /*foreach($this->elements as $key=>$value){
        if(isset($value['cqNumberOfUnits'])){
        print $value['cqNumberOfUnits'].'<br/>';
        }else{
        print 'Missing...'.'<br/>';
        }
        
        }*/
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //  print 'Found :'.$this->noOfInsertsBatch;die;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\AvailableCommodities();
            
            //create an object of the model
            
            //  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            $this->theForm->setCommCode($this->elements[$i]['cqCommCode']);
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['cqExpiryDate']) && $this->elements[$i]['cqExpiryDate'] != '') ? $this->theForm->setAcExpiryDate($this->elements[$i]['cqExpiryDate']) : $this->theForm->setAcExpiryDate('n/a');
            (isset($this->elements[$i]['cqNumberOfUnits'])) ? $this->theForm->setAcQuantity($this->elements[$i]['cqNumberOfUnits']) : $this->theForm->setAcQuantity(-1);
            (isset($this->elements[$i]['cqSupplier']) || $this->elements[$i]['cqSupplier'] == '') ? $this->theForm->setSupplierCode($this->elements[$i]['cqSupplier']) : $this->theForm->setSupplierCode("Other");
            (isset($this->elements[$i]['cqReason']) || $this->elements[$i]['cqReason'] == '') ? $this->theForm->setAcReasonUnavailable($this->elements[$i]['cqReason']) : $this->theForm->setAcReasonUnavailable("N/A");
            (isset($this->elements[$i]['cqAvailability'])) ? $this->theForm->setAcAvailability($this->elements[$i]['cqAvailability']) : $this->theForm->setAcAvailability("N/A");
            (isset($this->elements[$i]['cqLocation'])) ? $this->theForm->setAcLocation($this->elements[$i]['cqLocation']) : $this->theForm->setAcLocation("N/A");
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setAcCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                // die(print 'I completed well after iteration: '.$i);
                
                //print 'I just saved rec no: '.$i;
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addCommodityQuantityAvailabilityInfo
    
    //adding bundling function
    private function addBundling() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'cq') !== FALSE) {
                 //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //	print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "eqCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        /*foreach($this->elements as $key=>$value){
        if(isset($value['cqNumberOfUnits'])){
        print $value['cqNumberOfUnits'].'<br/>';
        }else{
        print 'Missing...'.'<br/>';
        }
        
        }*/
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //  print 'Found :'.$this->noOfInsertsBatch;die;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\AvailableEquipments();
            
            //create an object of the model
            
            //  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));
            
            $this->theForm->setFacilityCode($this->session->userdata('facilityMFL'));
            $this->theForm->setCommodityID($this->elements[$i]['cqCommodityCode']);
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['cqExpiryDate']) && $this->elements[$i]['cqExpiryDate'] != '') ? $this->theForm->setCommodityExpiryDate($this->elements[$i]['cqExpiryDate']) : $this->theForm->setCommodityExpiryDate('n/a');
            (isset($this->elements[$i]['cqNumberOfUnits'])) ? $this->theForm->setQuantityAvailable($this->elements[$i]['cqNumberOfUnits']) : $this->theForm->setQuantityAvailable(-1);
            (isset($this->elements[$i]['cqSupplier']) || $this->elements[$i]['cqSupplier'] == '') ? $this->theForm->setSupplierID($this->elements[$i]['cqSupplier']) : $this->theForm->setSupplierID("Other");
            (isset($this->elements[$i]['cqReason']) || $this->elements[$i]['cqReason'] == '') ? $this->theForm->setReason4Unavailability($this->elements[$i]['cqReason']) : $this->theForm->setReason4Unavailability("N/A");
            (isset($this->elements[$i]['cqAvailability'])) ? $this->theForm->setAvailability($this->elements[$i]['cqAvailability']) : $this->theForm->setAvailability("N/A");
            (isset($this->elements[$i]['cqLocation'])) ? $this->theForm->setLocation($this->elements[$i]['cqLocation']) : $this->theForm->setLocation("N/A");
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            $this->theForm->setCreatedAt(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                // die(print 'I completed well after iteration: '.$i);
                
                //print 'I just saved rec no: '.$i;
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addCommodityQuantityAvailabilityInfo
    
    private function addMCHIndicatorInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'mchI') !== FALSE) {
                 //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "mchIndicatorCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\LogIndicators();
            
            //create an object of the model
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['mchIndicator'])) ? $this->theForm->setLiResponse($this->elements[$i]['mchIndicator']) : $this->theForm->setLiResponse("N/A");
            $this->theForm->setIndicatorCode($this->elements[$i]['mchIndicatorCode']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLiCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addMCHIndicatorInfo
        private function addmchConsultationQuestions() {
    	$count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
        	//For every posted values
            if (strpos($key, 'mch') !== FALSE) {
            	//select data for bemonc signal functions
                //we separate the attribute name from the number
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //mark the end of 1 row...for record count
                if ($this->attr == "mchConsultationQCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print_r($this->elements);die;
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\logQuestions();
            
            //create an object of the model
            
            //$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            
            (array_key_exists('questionLocResponse', $this->elements[$i])) ? $this->theForm->setLqResponse($this->elements[$i]['questionLocResponse']) : $this->theForm->setLqResponse($this->elements[$i]['mchConsultationResponse']);
            
            (array_key_exists('questionCount', $this->elements[$i])) ? $this->theForm->setLqResponseCount($this->elements[$i]['questionCount']) : $this->theForm->setLqResponseCount(-1);
            (array_key_exists('questionReason', $this->elements[$i])) ? $this->theForm->setLqReason($this->elements[$i]['questionReason']) : $this->theForm->setLqReason('n/a');
            (array_key_exists('questionSpecified', $this->elements[$i])) ? $this->theForm->setLqSpecifiedOrFollowUp($this->elements[$i]['questionSpecified']) : $this->theForm->setLqSpecifiedOrFollowUp('n/a');
            $this->theForm->setQuestionCode($this->elements[$i]['mchConsultationQCode']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLqCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
    }
     //close addMchGuidelinesAvailabilityInfo
    private function addDiarrhoeaCasesByMonthInfo() {
        
        //print_r($this -> input -> post());die;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'dn') !== FALSE) {
                 //select data for number of deliveries
                $this->attr = $key;
                
                //the attribute name
                
                //split into 2 years: 2012 & 2013 --for later :-)
                
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    // $this->elements[$this->id][$this->attr]=htmlentities($val);
                    $count = 1;
                    foreach ($val as $k => $month) {
                        $this->elements[$count]['monthData'] = htmlentities($month);
                        $this->elements[$count]['monthName'] = htmlentities($k);
                        $count++;
                    }
                } else {
                    $this->elements[$this->attr] = '';
                }
                
                //print $key.' val='.$val.' <br />';
                
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = 12;
        
        //labour and delivery Qn5 to 8 will have a single response each
        //print_r($this -> elements);
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //echo 'Done'.$i;
            $this->theForm = new \models\Entities\LogMorbidity();
            
            //create an object of the model
            
            $this->theForm->setCreatedAt(new DateTime());
            
            /*timestamp option*/
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            
            /*if no value set, then set to -1*/
            
            //print_r($this->elements);die;
            $this->theForm->setMonth($this->elements[$i]['monthName']);
            $this->theForm->setLmNumber($this->elements[$i]['monthData']);
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addDiarrhoeaCasesByMonthInfo()
    
    private function addMCHTreatmentInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'mcht') !== FALSE) {
                 //select data for mch treatments
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "mchtTreatmentCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\LogTreatment();
            
            //create an object of the model
            
            $this->theForm->setTreatmentCode($this->elements[$i]['mchtTreatmentCode']);
            $this->theForm->setFacilityMfl($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['mchtSevereDehydration']) && $this->elements[$i]['mchtSevereDehydration'] != '') ? $this->theForm->setLtSevereDehydrationNumber($this->elements[$i]['mchtSevereDehydration']) : $this->theForm->setLtSevereDehydrationNumber(-1);
            (isset($this->elements[$i]['mchtSomeDehydration']) && $this->elements[$i]['mchtSomeDehydration'] != '') ? $this->theForm->setLtSomeDehydrationNumber($this->elements[$i]['mchtSomeDehydration']) : $this->theForm->setLtSomeDehydrationNumber(-1);
            (isset($this->elements[$i]['mchtNoDehydration']) && $this->elements[$i]['mchtNoDehydration'] != '') ? $this->theForm->setLtNoDehydrationNumber($this->elements[$i]['mchtNoDehydration']) : $this->theForm->setLtNoDehydrationNumber(-1);
            (isset($this->elements[$i]['mchtDysentry']) && $this->elements[$i]['mchtDysentry'] != '') ? $this->theForm->setLtDysentryNumber($this->elements[$i]['mchtDysentry']) : $this->theForm->setLtDysentryNumber(-1);
            (isset($this->elements[$i]['mchtNoClassification']) && $this->elements[$i]['mchtNoClassification'] != '') ? $this->theForm->setLtNoClassificationNumber($this->elements[$i]['mchtNoClassification']) : $this->theForm->setLtNoClassificationNumber(-1);
            
            //if other treatment has been entered
            (isset($this->elements[$i]['mchtTreatmentOther']) && $this->elements[$i]['mchtTreatmentOther'] != '') ? $this->theForm->setLtOtherTreatment($this->elements[$i]['mchtTreatmentOther']) : $this->theForm->setLtOtherTreatment('n/a');
            
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setLtCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                    
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addMCHTreatmentInfo
    
    private function addMchOrtConerAssessmentInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'ortc') !== FALSE) {
                 //select data for bemonc signal functions
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "ortcAspectCode") {
                    
                    // print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    // print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\LogQuestions();
            
            //create an object of the model
            
            //$this -> theForm -> setIdMCHQuestionLog($this->elements[$i]['ortcAspectCode']);
            $this->theForm->setFacilityCode($this->session->userdata('facilityMFL'));
            
            //check if that key exists, else set it to some default value
            
            if (isset($this->elements[$i]['ortcAspectLocResponse'])) {
                (isset($this->elements[$i]['ortcAspectLocResponse'])) ? $this->theForm->setOcaResponse($this->elements[$i]['ortcAspectLocResponse']) : $this->theForm->setOcaResponse('N/A');
            } else {
                (isset($this->elements[$i]['ortcAspect'])) ? $this->theForm->setOcaResponse($this->elements[$i]['ortcAspect']) : $this->theForm->setOcaResponse('N/A');
            }
            
            $this->theForm->setIndicatorID($this->elements[$i]['ortcAspectCode']);
            (isset($this->elements[$i]['ortcGuidesCount'])) ? $this->theForm->setNoOfGuides($this->elements[$i]['ortcGuidesCount']) : $this->theForm->setNoOfGuides(-1);
            $this->theForm->setOcaCreated(new DateTime());
            
            /*timestamp option*/
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    //return true;
                    
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                //on the last record to be inserted, log the process and return true;
                if ($i == $this->noOfInsertsBatch) {
                    
                    //die(print $i);
                    // $this->writeAssessmentTrackerLog();
                    return true;
                }
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addMchOrtConerAssessmentInfo
    
    private function addEquipmentQuantityAvailabilityInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'eq') !== FALSE) {
                 //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //	print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "eqCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //  print 'Found :'.$this->noOfInsertsBatch;die;
        //print_r($this->elements);
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\AvailableEquipments();
            
            //create an object of the model
            
            //  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            $this->theForm->setEqCode($this->elements[$i]['eqCode']);
            
            //check if that key exists, else set it to some default value
            
            (array_key_exists('eqAvailability', $this->elements[$i])) ? $this->theForm->setAeAvailability($this->elements[$i]['eqAvailability']) : $this->theForm->setAeAvailability("N/A");
            (array_key_exists('eqLocation', $this->elements[$i])) ? $this->theForm->setAeLocation($this->elements[$i]['eqLocation']) : $this->theForm->setAeLocation("N/A");
            (array_key_exists('eqQtyFullyFunctional', $this->elements[$i])) ? $this->theForm->setAeFullyFunctional($this->elements[$i]['eqQtyFullyFunctional']) : $this->theForm->setAeFullyFunctional(-1);
            (array_key_exists('eqQtyPartiallyFunctional', $this->elements[$i])) ? $this->theForm->setAePartiallyFunctional($this->elements[$i]['eqQtyPartiallyFunctional']) : $this->theForm->setAePartiallyFunctional(-1);
            (array_key_exists('eqQtyNonFunctional', $this->elements[$i])) ? $this->theForm->setAeNonFunctional($this->elements[$i]['eqQtyNonFunctional']) : $this->theForm->setAeNonFunctional(-1);
            
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            
            $this->theForm->setAeCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                // die(print 'I completed well after iteration: '.$i);
                
                //print 'I just saved rec no: '.$i;
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addEquipmentQuantityAvailabilityInfo
    
    private function addSuppliesQuantityAvailabilityInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'sq') !== FALSE) {
                 //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //	print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "sqsupplyCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //  print 'Found :'.$this->noOfInsertsBatch;die;
        
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\AvailableSupplies();
            
            //create an object of the model
            
            //  die(print 'Code: '.$this -> session -> userdata('facilityMFL'));
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            $this->theForm->setSupplyCode($this->elements[$i]['sqsupplyCode']);
            
            //check if that key exists, else set it to some default value
            //(isset($this->elements[$i]['sqNumberOfUnits']))?$this -> theForm -> setQuantityAvailable($this->elements[$i]['sqNumberOfUnits']):$this -> theForm -> setQuantityAvailable(-1);
            (isset($this->elements[$i]['sqSupplier']) || $this->elements[$i]['sqSupplier'] == '') ? $this->theForm->setSupplierCode($this->elements[$i]['sqSupplier']) : $this->theForm->setSupplierCode("Other");
            
            //(isset($this->elements[$i]['sqReason']) || $this->elements[$i]['sqReason']=='')?$this -> theForm -> setReason4Unavailability($this->elements[$i]['sqReason']):$this -> theForm -> setReason4Unavailability("N/A");
            (isset($this->elements[$i]['sqAvailability'])) ? $this->theForm->setAsAvailability($this->elements[$i]['sqAvailability']) : $this->theForm->setAsAvailability("N/A");
            (isset($this->elements[$i]['sqLocation'])) ? $this->theForm->setAsLocation($this->elements[$i]['sqLocation']) : $this->theForm->setAsLocation("N/A");
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setAsCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addSuppliesQuantityAvailabilityInfo
    
    private function addResourceAvailabilityInfo() {
        $count = $finalCount = 1;
        foreach ($this->input->post() as $key => $val) {
             //For every posted values
            if (strpos($key, 'hw') !== FALSE) {
                 //select data for availability of commodities
                //we separate the attribute name from the number
                
                $this->frags = explode("_", $key);
                
                //$this->id = $this->frags[1];  // the id
                
                $this->id = $count;
                
                // the id
                
                $this->attr = $this->frags[0];
                
                //the attribute name
                
                //stringify any array value
                if (is_array($val)) {
                    $val = implode(',', $val);
                }
                
                //	print $key.' ='.$val.' <br />';
                //print 'ids: '.$this->id.'<br />';
                
                //mark the end of 1 row...for record count
                if ($this->attr == "hwEqCode") {
                    
                    //print 'count at:'.$count.'<br />';
                    
                    $finalCount = $count;
                    $count++;
                    
                    //print 'count at:'.$count.'<br />';
                    //print 'final count at:'.$finalCount.'<br />';
                    //print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
                    
                }
                
                //collect key and value to an array
                if (!empty($val)) {
                    
                    //We then store the value of this attribute for this element.
                    $this->elements[$this->id][$this->attr] = htmlentities($val);
                    
                    //$this->elements[$this->attr]=htmlentities($val);
                    
                } else {
                    $this->elements[$this->id][$this->attr] = '';
                    
                    //$this->element=array('id'=>$this->id,'name'=>$this->attr,'value'=>'');
                    
                }
            }
        }
         //close foreach ($this -> input -> post() as $key => $val)
        //print var_dump($this->elements);
        
        //exit;
        
        //get the highest value of the array that will control the number of inserts to be done
        $this->noOfInsertsBatch = $finalCount;
        
        //  print 'Found :'.$this->noOfInsertsBatch;die;
        //print_r($this->elements);
        for ($i = 1; $i <= $this->noOfInsertsBatch + 1; ++$i) {
            
            //go ahead and persist data posted
            $this->theForm = new \models\Entities\AvailableResources();
            
            //create an object of the model
            
            //die(print 'Code: '.$this -> session -> userdata('facilityMFL'));
            
            $this->theForm->setFacMfl($this->session->userdata('facilityMFL'));
            $this->theForm->setEquipmentCode($this->elements[$i]['hwEqCode']);
            
            //check if that key exists, else set it to some default value
            (isset($this->elements[$i]['hwNumberOfUnits'])) ? $this->theForm->setArQuantity($this->elements[$i]['hwNumberOfUnits']) : $this->theForm->setArQuantity(-1);
            (isset($this->elements[$i]['hwSupplier']) || $this->elements[$i]['hwSupplier'] != '') ? $this->theForm->setSupplierCode($this->elements[$i]['hwSupplier']) : $this->theForm->setSupplierCode("Other");
            (isset($this->elements[$i]['hwReason'])) ? $this->theForm->setArReasonUnavailable($this->elements[$i]['hwReason']) : $this->theForm->setArReasonUnavailable("N/A");
            (isset($this->elements[$i]['hwAvailability'])) ? $this->theForm->setArAvailability($this->elements[$i]['hwAvailability']) : $this->theForm->setArAvailability("N/A");
            (isset($this->elements[$i]['hwLocation'])) ? $this->theForm->setArLocation($this->elements[$i]['hwLocation']) : $this->theForm->setArLocation("N/A");
            $this->theForm->setSsId((int)$this->session->userdata('survey_status'));
            $this->theForm->setArCreated(new DateTime());
            
            /*timestamp option*/
            $this->em->persist($this->theForm);
            
            //now do a batched insert, default at 5
            $this->batchSize = 5;
            if ($i % $this->batchSize == 0) {
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detaches all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            } else if ($i < $this->batchSize || $i > $this->batchSize || $i == $this->noOfInsertsBatch && $this->noOfInsertsBatch - $i < $this->batchSize) {
                
                //total records less than a batch, insert all of them
                try {
                    
                    $this->em->flush();
                    $this->em->clear();
                    
                    //detactes all objects from doctrine
                    
                    //on the last record to be inserted, log the process and return true;
                    if ($i == $this->noOfInsertsBatch) {
                        
                        //die(print 'Limit: '.$this->noOfInsertsBatch);
                        //$this->writeAssessmentTrackerLog();
                        return true;
                    }
                }
                catch(Exception $ex) {
                    
                    //die($ex->getMessage());
                    return false;
                    
                    /*display user friendly message*/
                }
                 //end of catch
                
                
            }
            
            //end of batch condition
            
        }
         //end of innner loop
        
        
    }
     //close addResourceAvailabilityInfo
    
    function store_data() {
        
        /*check assessment tracker log*/
        if ($this->input->post()) {
            
            $step = $this->input->post('step_name', TRUE);
            switch ($step) {
                case 'section-1':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if (
                         /*$this->updateFacilityInfo()	==	true &&*/
                       // $this->addMchCommunityStrategyInfo() == true) {
                        	 $this->addmchConsultationQuestions() == true) {
                             //Defined in MY_Model
                            $this->writeAssessmentTrackerLog();
                            
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        return $this->response = 'true';
                    }
                    
                    //return $this -> response = 'true';
                    break;

                case 'section-2':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if ($this->addQuestionsInfo() == true && $this->addGuidelinesStaffInfo() == true && $this->addCommodityQuantityAvailabilityInfo() == true) {
                             //defined in this model
                            $this->writeAssessmentTrackerLog();
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        return $this->response = 'true';
                    }
                    break;

                case 'section-3':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if ($this->addMCHIndicatorInfo() == true) {
                             //defined in this model
                            $this->writeAssessmentTrackerLog();
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        return $this->response = 'true';
                    }
                    break;

                case 'section-4':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if ($this->addAccessChallengesInfo() == true && $this->addMCHIndicatorInfo() == true && $this->addDiarrhoeaCasesByMonthInfo() == true && $this->addMCHTreatmentInfo() == true) {
                             //defined in this model
                            $this->writeAssessmentTrackerLog();
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        return $this->response = 'true';
                    }
                    break;

                case 'section-5':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if ($this->addQuestionsInfo() == true && $this->addEquipmentQuantityAvailabilityInfo() == true) {
                             //defined in this model
                            $this->writeAssessmentTrackerLog();
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        return $this->response = 'true';
                    }
                    break;

                case 'section-6':
                    
                    //check if entry exists
                    $this->section = $this->sectionEntryExists($this->session->userdata('facilityMFL'), $this->input->post('step_name', TRUE), $this->session->userdata('survey'));
                    
                    // die($this->session->userdata('facilityMFL').':'.$this->session->userdata('survey'));
                    //print var_dump($this->section);
                    
                    //insert log entry if new, else update the existing one
                    if ($this->sectionExists == false) {
                        if ($this->addSuppliesQuantityAvailabilityInfo() == true && $this->addResourceAvailabilityInfo() == true &&$this->addMchCommunityStrategyInfo() == true) {
                             //defined in this model
                            $this->writeAssessmentTrackerLog();
                            
                            //update facility survey status
                            //$this->markSurveyStatusAsComplete();
                            return $this->response = 'true';
                        } else {
                            return $this->response = 'false';
                        }
                    } else {
                        
                        //die('Entry exsits');
                        //update facility survey status
                        //$this->markSurveyStatusAsComplete();
                        return $this->response = 'true';
                    }
                    break;
            }
             //close switch
            
            //return $this -> response = 'true';
            
        }
    }
}
 //end of class m_mch_survey
