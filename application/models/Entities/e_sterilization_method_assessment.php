<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="sterilization_method_assessment")
	 */
 class E_Sterilization_Method_Assessment{
 	
   /**
	* @Id
	* @Column(name="smAssessmentID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $smAssessmentID;
	
   /**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
    * @Column(name="facilityCode", type="string",length=45, nullable=false)
	* */
	private $facilityCode;
	
	  /**
	* @Column(name="sterilizationMethod", type="string",length=255, nullable=true)
	* */
	private $sterilizationMethod;
	
	  /**
	* @Column(name="other", type="string",length=255, nullable=true)
	* */
	private $other;
	
	  /**
	* @Column(name="createdAt", type="datetime",length=45, nullable=false)
	* */
	private $createdAt;
	
	  /**
	* @Column(name="dateOfAssessment", type="date",length=45, nullable=false)
	* */
	private $dateOfAssessment;
	
	
	
	public function getSmAssessmentID() {
			return $this -> smAssessmentID;
	}
	
	public function setSmAssessmentID($smAssessmentID) { $this -> smAssessmentID = $smAssessmentID;
	}
	
 
	public function getFacilityCode() {
		return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}

	
	public function getSterilizationMethod() {
			return $this -> sterilizationMethod;
	}
	
	public function setSterilizationMethod($sterilizationMethod) { $this -> sterilizationMethod = $sterilizationMethod;
	}
	
		
	public function getOther() {
			return $this -> other;
	}
	
	public function setOther($other) { $this -> other = $other;
	}
	
	public function getCreatedAt() {
		return $this -> createdAt;
	}

	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}

	public function getDateOfAssessment() {
		return $this -> dateOfAssessment;
	}

	public function setDateOfAssessment($dateOfAssessment) { $this -> dateOfAssessment = $dateOfAssessment;
	}
}
?>