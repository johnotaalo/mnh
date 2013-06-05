<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="newborncare_general_questions")
	 */
 class E_NewBornCare_General_Questions{
 	
   /**
	* @Id
	* @Column(name="nbcAssessmentID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $nbcAssessmentID;
	
   /**
	* @Column(name="facilityCode", type="string",length=45, nullable=false)
	* */
	private $facilityCode;
	
   /**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	* @Column(name="newbornResuscitated", type="string",length=45, nullable=false)
	* */
	private $newbornResuscitated;
	
   /**
	* @Column(name="bloodTransfusionDone", type="string",length=45, nullable=false)
	* */
	private $bloodTransfusionDone;
	
   /**
	* @Column(name="bloodBank", type="string",length=45, nullable=false)
	* */
	private $bloodBank;
	
   /**
	* @Column(name="deliveriesDone", type="string",length=45, nullable=false)
	* */
	private $deliveriesDone;
	
	/**
	* @Column(name="whyNoDeliveries", type="text", nullable=true)
	* */
	private $whyNoDeliveries;
	
   /**
	* @Column(name="deliveriesDoneInMonthOne", type="integer", nullable=true)
	* */
	private $deliveriesDoneInMonthOne;
	
	/**
	* @Column(name="deliveriesDoneInMonthTwo", type="integer", nullable=true)
	* */
	private $deliveriesDoneInMonthTwo;
	
   /**
	* @Column(name="dateOfAssessment", type="datetime",length=45, nullable=true)
	* */
	private $dateOfAssessment;
	
   /**
	* @Column(name="createdAt", type="date",length=45, nullable=false)
	* */
	private $createdAt;
	
	/**
	* @Column(name="updatedAt", type="date",length=45, nullable=false)
	* */
	private $updatedAt;
	 
	public function getNbcAssessmentID() {
			return $this -> nbcAssessmentID;
	}
	
	public function setNbcAssessmentID($nbcAssessmentID) { $this -> nbcAssessmentID = $nbcAssessmentID;
	}
	 
	public function getFacilityCode() {
			return $this -> facilityCode;
	}
	
	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}
	
	public function getNewbornResuscitated() {
			return $this -> newbornResuscitated;
	}
	
	public function setNewbornResuscitated($newbornResuscitated) { $this -> newbornResuscitated = $newbornResuscitated;
	}
	
	public function getBloodTransfusionDone() {
			return $this -> bloodTransfusionDone;
	}
	
	public function setBloodTransfusionDone($bloodTransfusionDone) { $this -> bloodTransfusionDone = $bloodTransfusionDone;
	}
	
	public function getBloodBank() {
			return $this -> bloodBank;
	}
	
	public function setBloodBank($bloodBank) { $this -> bloodBank = $bloodBank;
	}
	
	public function getDeliveriesDone() {
			return $this -> deliveriesDone;
	}
	
	public function setDeliveriesDone($deliveriesDone) { $this -> deliveriesDone = $deliveriesDone;
	}
	
	public function getDeliveriesDoneInMonthOne() {
			return $this -> deliveriesDoneInMonthOne;
	}
	
	public function setDeliveriesDoneInMonthOne($deliveriesDoneInMonthOne) { $this -> deliveriesDoneInMonthOne = $deliveriesDoneInMonthOne;
	}
	
	
	public function getDeliveriesDoneInMonthTwo() {
			return $this -> deliveriesDoneInMonthTwo;
	}
	
	public function setDeliveriesDoneInMonthTwo($deliveriesDoneInMonthTwo) { $this -> deliveriesDoneInMonthTwo = $deliveriesDoneInMonthTwo;
	}
	
	public function getDateOfAssessment() {
			return $this -> dateOfAssessment;
	}
	
	public function setDateOfAssessment($dateOfAssessment) { $this -> dateOfAssessment = $dateOfAssessment;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
	
	public function getUpdatedAt() {
			return $this -> updatedAt;
	}
	
	public function setUpdatedAt($updatedAt) { $this -> updatedAt = $updatedAt;
	}
}
?>