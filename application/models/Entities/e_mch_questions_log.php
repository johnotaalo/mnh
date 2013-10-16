<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_questions_log")
	 */
 class E_MCH_Questions_Log{
  
   /**
	* @Id
	* @Column(name="idMCHQuestionLog", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMCHQuestionLog;
	
   /**
	* @Column(name="response", type="string",length=6, nullable=false)
	* */
	private $response;
	
	/**
	* @Column(name="noOfGuides", type="integer",length=11, nullable=false)
	* */
	private $noOfGuides;
	
	  
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
	 
	 
	public function getIdMCHQuestionLog() {
			return $this -> idMCHQuestionLog;
	}
	
	public function setIdMCHQuestionLog($idMCHQuestionLog) {$this -> idMCHQuestionLog=$idMCHQuestionLog;}
	
	 
	public function getResponse() {
			return $this -> response;
	}
	
	public function setResponse($response) { $this -> response = $response;
	}
	
	public function getNoOfGuides() {
			return $this -> noOfGuides;
	}
	
	public function setNoOfGuides($noOfGuides) { $this -> noOfGuides = $noOfGuides;
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