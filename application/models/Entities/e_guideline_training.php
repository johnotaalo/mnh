<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="guideline_training")
	 */
   class E_Guideline_Training{
 	
   /**
	* @Id
	* @Column(name="trainingRecordId", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $trainingRecordId;
	
   /**
	* @Column(name="guidelineCode", type="string",length=11, nullable=false)
	* */
	private $guidelineCode;
	 
	/**
	* @Column(name="lastTrained", type="string",length=55, nullable=false)
	* */
	private $lastTrained;
	
	/**
	* @Column(name="facilityID", type="string",length=11, nullable=false)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime", nullable=false)
	* */
	private $createdAt;
	 
	public function getTrainingRecordId() {
			return $this -> trainingRecordId;
	}
	
	public function setTrainingRecordId($trainingRecordId) { $this -> trainingRecordId= $trainingRecordId;
	}
	 
	public function getGuidelineCode() {
			return $this -> guidelineCode;
	}
	
	public function setGuidelineCode($guidelineCode) { $this -> guidelineCode = $guidelineCode;
	}
	public function getLastTrained() {
			return $this -> lastTrained;
	}
	
	public function setLastTrained($lastTrained) { $this -> lastTrained = $lastTrained;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
}
?>