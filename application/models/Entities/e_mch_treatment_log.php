<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_treatment_log")
	 */
 class E_MCH_Treatment_Log{
   /**
	* @Id
	* @Column(name="idMCHTreatmentLog", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMCHTreatmentLog;
	
   /**
	* @Column(name="otherTreatment", type="string",length=255, nullable=false)
	* */
	private $otherTreatment;
	
	/**
	* @Column(name="severeDehydrationNo", type="integer",length=11, nullable=false)
	* */
	private $severeDehydrationNo;
	
	/**
	* @Column(name="someDehydrationNo", type="integer",length=11, nullable=false)
	* */
	private $someDehydrationNo;
	
	/**
	* @Column(name="dysentryNo", type="integer",length=11, nullable=false)
	* */
	private $dysentryNo;
	
	/**
	* @Column(name="noClassificationNo", type="integer",length=11, nullable=false)
	* */
	private $noClassificationNo;
	
	  
	/**
	* @ManyToOne(targetEntity="mch_treatments", inversedBy="treatmentCode")
	* @Column(name="treatmentID", type="string",length=8,nullable=false)
	* */
	private $treatmentID;
	
	/**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	* @Column(name="facilityID", type="string",length=11,nullable=false)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getIdMCHTreatmentLog() {
			return $this -> idMCHTreatmentLog;
	}
	
	public function setIdMCHTreatmentLog($idMCHTreatmentLog) {$this -> idMCHTreatmentLog=$idMCHTreatmentLog;}
	
	 
	public function getOtherTreatment() {
			return $this -> otherTreatment;
	}
	
	public function setOtherTreatment($otherTreatment) { $this -> otherTreatment = $otherTreatment;
	}
	
	
	public function getSevereDehydrationNo() {
			return $this -> severeDehydrationNo;
	}
	
	public function setSevereDehydrationNo($severeDehydrationNo) { $this -> severeDehydrationNo = $severeDehydrationNo;
	}
	
	
	public function getSomeDehydrationNo() {
			return $this -> someDehydrationNo;
	}
	
	public function setSomeDehydrationNo($someDehydrationNo) { $this -> someDehydrationNo = $someDehydrationNo;
	}
	
	public function getDysentryNo() {
			return $this -> dysentryNo;
	}
	
	public function setDysentryNo($dysentryNo) { $this -> dysentryNo = $dysentryNo;
	}
	
	public function getNoClassificationNo() {
			return $this -> noClassificationNo;
	}
	
	public function setNoClassificationNo($noClassificationNo) { $this -> noClassificationNo = $noClassificationNo;
	}
	
	
	public function getTreatmentID() {
			return $this -> treatmentID;
	}
	
	public function setTreatmentID($treatmentID) { $this -> treatmentID = $treatmentID;
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