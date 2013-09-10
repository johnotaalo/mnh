<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="ortc_assessment")
 */
 class E_OrtC_Assessment {  
  
   /**
	* @Id
	* @Column(name="ortAssessmentCode", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $ortAssessmentCode;
	
   /**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
    * @Column(name="facilityMFC", type="string",length=45, nullable=false)
	* */
	private $facilityMFC;
	
   /**
	* @Column(name="kidsDehydrated", type="integer", length=1, nullable=true)
	* */
	private $kidsDehydrated;
	
   /**
	* @Column(name="designatedDehydrationLocation", type="integer", length=1, nullable=true)
	* */
	private $designatedDehydrationLocation;
	
   /**
    * @Column(name="locationOfDehydrationUnit", type="string", length=255, nullable=true)
	* */
	private $locationOfDehydrationUnit;
	
   /**
    * @Column(name="facilitySupplier", type="string",length=45, nullable=true)
	* */
	private $facilitySupplier;
	
	 
   /**
    * @Column(name="dateOfAssessment", type="date", nullable=true)
	* */
	private $dateOfAssessment;
	
   /**
    * @Column(name="budgetKept", type="integer",length=1, nullable=true)
	* */
	private $budgetKept;
	
	
   /**
	* @Column(name="createdAt", type="datetime", nullable=false)
	* */
	private $createdAt;
	
   /**
	* @Column(name="updatedAt", type="datetime", nullable=true)
	* */
	private $updatedAt;
	
	public function getOrtAssessmentCode() {
			return $this -> ortAssessmentCode;
	}
	
	public function setOrtAssessmentCode($ortAssessmentCode) { $this -> ortAssessmentCode = $ortAssessmentCode;
	}
	public function getFacilityMFC() {
			return $this -> facilityMFC;
	}
	
	public function setFacilityMFC($facilityMFC) { $this -> facilityMFC = $facilityMFC;
	}
	public function getKidsDehydrated() {
			return $this -> kidsDehydrated;
	}
	
	public function setKidsDehydrated($kidsDehydrated) { $this ->kidsDehydrated= $kidsDehydrated;
	}
	public function getDesignatedDehydrationLocation() {
			return $this -> designatedDehydrationLocation;
	}
	
	public function setDesignatedDehydrationLocation($designatedDehydrationLocation) { $this ->designatedDehydrationLocation= $designatedDehydrationLocation;
	}
	
	public function getLocationOfDehydrationUnit() {
			return $this -> locationOfDehydrationUnit;
	}
	
	public function setLocationOfDehydrationUnit($locationOfDehydrationUnit) { $this -> locationOfDehydrationUnit = $locationOfDehydrationUnit;
	}
	
	public function getFacilitySupplier() {
			return $this -> facilitySupplier;
	}
	
	public function setFacilitySupplier($facilitySupplier) { $this -> facilitySupplier = $facilitySupplier;
	}
	
	
	public function getDateOfAssessment() {
			return $this -> dateOfAssessment;}
	
	public function setDateOfAssessment($dateOfAssessment) { $this -> dateOfAssessment = $dateOfAssessment;
	}
	
	public function getBudgetKept() {
			return $this -> budgetKept;}
	
	public function setBudgetKept($budgetKept) { $this -> budgetKept = $budgetKept;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
	
	public function getUpdatedAt() {
			return $this -> updatedAt;}
	
	public function setUpdatedAt($updatedAt) { $this -> updatedAt = $updatedAt;
	}
	
}
?>