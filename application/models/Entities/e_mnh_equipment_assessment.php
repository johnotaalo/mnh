<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="mnh_equipment_assessment")
 */
class E_MNH_Equipment_Assessment {

	/**
	 * @Id
	 * @Column(name="assessmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $assessmentID;

	/**
	 * @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	 * @Column(name="facilityCode", type="string",length=45, nullable=false)
	 * */
	private $facilityCode;

	/**
	 * @ManyToOne(targetEntity="equipment", inversedBy="equipmentCode")
	 * @Column(name="equipmentCode", type="string",length=45, nullable=false)
	 * */
	private $equipmentCode;

	/**
	 * @Column(name="available", type="string",length=45, nullable=true)
	 * */
	private $available;

	/**
	 * @Column(name="quantityAvailable", type="integer", nullable=true)
	 * */
	private $quantityAvailable;

	/**
	 * @Column(name="functioning", type="string",length=45, nullable=true)
	 * */
	private $functioning;

	/**
	 * @Column(name="quantityFunctioning", type="integer", nullable=true)
	 * */
	private $quantityFunctioning;

	/**
	 * @Column(name="equipmentType", type="string",length=45, nullable=true)
	 * */
	private $equipmentType;

	/**
	 * @Column(name="questionSection", type="string",length=45, nullable=true)
	 * */
	private $questionSection;

	/**
	 * @Column(name="dateOfAssessment", type="date",nullable=false)
	 * */
	private $dateOfAssessment;

	/**
	 * @Column(name="createdAt", type="datetime",nullable=false)
	 * */
	private $createdAt;

	/**
	 * @Column(name="updatedAt", type="datetime",nullable=true)
	 * */
	private $updatedAt;

	public function getAssessmentID() {
		return $this -> assessmentID;
	}

	public function setAssessmentID($assessmentID) { $this -> assessmentID = $assessmentID;
	}

	public function getFacilityCode() {
		return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}

	public function getEquipmentCode() {
		return $this -> equipmentCode;
	}

	public function setEquipmentCode($equipmentCode) { $this -> equipmentCode = $equipmentCode;
	}

	public function getAvailable() {
		return $this -> available;
	}

	public function setAvailable($available) { $this -> available = $available;
	}

	public function getQuantityAvailable() {
		return $this -> quantityAvailable;
	}

	public function setQuantityAvailable($quantityAvailable) { $this -> quantityAvailable = $quantityAvailable;
	}

	public function getFunctioning() {
		return $this -> functioning;
	}

	public function setFunctioning($functioning) { $this -> functioning = $functioning;
	}

	public function getQuantityFunctioning() {
		return $this -> quantityFunctioning;
	}

	public function setQuantityFunctioning($quantityFunctioning) { $this -> quantityFunctioning = $quantityFunctioning;
	}

	public function getEquipmentType() {
		return $this -> equipmentType;
	}

	public function setEquipmentType($equipmentType) { $this -> equipmentType = $equipmentType;
	}

	public function getQuestionSection() {
		return $this -> questionSection;
	}

	public function setQuestionSection($questionSection) { $this -> questionSection = $questionSection;
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