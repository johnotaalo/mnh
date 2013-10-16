<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_indicator_log")
	 */
 class E_MCH_Indicator_Log{
  
   /**
	* @Id
	* @Column(name="idMCHIndicatorLog", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMCHIndicatorLog;
	
   /**
	* @Column(name="response", type="string",length=6, nullable=false)
	* */
	private $response;
	
	  
	/**
	* @ManyToOne(targetEntity="mch_indicators", inversedBy="indicatorCode")
	* @Column(name="indicatorID", type="string",length=8,nullable=false)
	* */
	private $indicatorID;
	
	/**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	* @Column(name="facilityID", type="string",length=11,nullable=false)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getIdMCHIndicatorLog() {
			return $this -> idMCHIndicatorLog;
	}
	
	public function setIdMCHIndicatorLog($idMCHIndicatorLog) {$this -> idMCHIndicatorLog=$idMCHIndicatorLog;}
	
	 
	public function getResponse() {
			return $this -> response;
	}
	
	public function setResponse($response) { $this -> response = $response;
	}
	
	public function getIndicatorID() {
			return $this -> indicatorID;
	}
	
	public function setIndicatorID($indicatorID) { $this -> indicatorID = $indicatorID;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;}
}
?>