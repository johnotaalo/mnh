<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="facility")
 */
 class E_Facility {  
  
   /**
	* @Id
	* @Column(name="facilityID", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $facilityID;

   /**
	* @Column(name="facilityMFC", type="string",length=45, nullable=false)
	* */
	private $facilityMFC;

   /**
	* @Column(name="facilityName", type="string", length=45, nullable=false)
	* */
	private $facilityName;

   /**
	* @ManyToOne(targetEntity="district", inversedBy="districtName")
    * @Column(name="facilityDistrict", type="string", length=45, nullable=true)
	* */
	private $facilityDistrict;

	/**
	* @ManyToOne(targetEntity="facility_type", inversedBy="facilityType")
    * @Column(name="facilityType", type="string", length=55, nullable=true)
	* */
	private $facilityType;

	/**
	* @ManyToOne(targetEntity="facility_level", inversedBy="facilityLevel")
    * @Column(name="facilityLevel", type="string", length=45, nullable=true)
	* */
	private $facilityLevel;


   /**
	* @ManyToOne(targetEntity="county", inversedBy="countyName")
    * @Column(name="facilityCounty", type="string",length=45, nullable=true)
	* */
	private $facilityCounty;

	/**
	* @ManyToOne(targetEntity="province", inversedBy="provinceName")
    * @Column(name="facilityProvince", type="string",length=45, nullable=true)
	* */
	private $facilityProvince;

	/**
	* @ManyToOne(targetEntity="facility_owner", inversedBy="facilityOwner")
    * @Column(name="facilityOwnedBy", type="string",length=255, nullable=true)
	* */
	private $facilityOwnedBy;

   /**
	* @Column(name="facilityInchargeContactPerson", type="string", length=45, nullable=true)
	* */
	private $facilityInchargeContactPerson;

	/**
	* @Column(name="facilityInchargeEmail", type="string", length=100, nullable=true)
	* */
	private $facilityInchargeEmail;

	/**
	* @Column(name="facilityInchargeTelephone", type="string", length=55, nullable=true)
	* */
	private $facilityInchargeTelephone;

	/**
	* @Column(name="facilityMCHContactPerson", type="string", length=45, nullable=true)
	* */
	private $facilityMCHContactPerson;

	/**
	* @Column(name="facilityMCHEmail", type="string", length=100, nullable=true)
	* */
	private $facilityMCHEmail;

	/**
	* @Column(name="facilityMCHTelephone", type="string", length=55, nullable=true)
	* */
	private $facilityMCHTelephone;

	/**
	* @Column(name="facilityMaternityContactPerson", type="string", length=45, nullable=true)
	* */
	private $facilityMaternityContactPerson;

	/**
	* @Column(name="facilityMaternityEmail", type="string", length=100, nullable=true)
	* */
	private $facilityMaternityEmail;

	/**
	* @Column(name="facilityMaternityTelephone", type="string", length=55, nullable=true)
	* */
	private $facilityMaternityTelephone;

	/**
	* @Column(name="createdAt", type="datetime", nullable=true)
	* */
	private $createdAt;

	/**
	* @Column(name="updatedAt", type="datetime", nullable=true)
	* */
	private $updatedAt;

	public function getFacilityID() {
			return $this -> facilityID;
	}

	public function setFacilityID($facilityID) { $this -> facilityID = $facilityID;
	}
	public function getFacilityMFC() {
			return $this -> facilityMFC;
	}

	public function setFacilityMFC($facilityMFC) { $this -> facilityMFC = $facilityMFC;
	}
	public function getFacilityName() {
			return $this -> facilityName;
	}

	public function setFacilityName($facilityName) { $this -> facilityName = $facilityName;
	}

	public function getFacilityDistrict() {
			return $this -> facilityDistrict;
	}

	public function setFacilityDistrict($facilityDistrict) { $this -> facilityDistrict = $facilityDistrict;
	}

	public function setFacilityType($facilityType) { $this -> facilityType = $facilityType;
	}
	public function getFacilityType() {
			return $this -> facilityType;
	}

	public function setFacilityLevel($facilityLevel) { $this -> facilityLevel = $facilityLevel;
	}
	public function getFacilityLevel() {
			return $this -> facilityLevel;
	}


	public function getFacilityCounty() {
			return $this -> facilityCounty;
	}

	public function setFacilityCounty($facilityCounty) { $this -> facilityCounty = $facilityCounty;
	}

	public function getFacilityProvince() {
			return $this -> facilityProvince;
	}

	public function setFacilityProvince($facilityProvince) { $this -> facilityProvince = $facilityProvince;
	}

	public function getFacilityOwnedBy() {
			return $this -> facilityOwnedBy;
	}

	public function setFacilityOwnedBy($facilityOwnedBy) { $this -> facilityOwnedBy = $facilityOwnedBy;
	}


	public function getFacilityInchargeContactPerson() {
			return $this -> facilityInchargeContactPerson;}

	public function setFacilityInchargeContactPerson($facilityInchargeContactPerson) { $this -> facilityInchargeContactPerson = $facilityInchargeContactPerson;
	}


	public function getFacilityInchargeEmail() {
			return $this -> facilityInchargeEmail;
	}

	public function setFacilityInchargeEmail($facilityInchargeEmail) { $this -> facilityInchargeEmail = $facilityInchargeEmail;
	}

	public function getFacilityInchargeTelephone() {
			return $this -> facilityInchargeTelephone;
	}

	public function setFacilityInchargeTelephone($facilityInchargeTelephone) { $this -> facilityInchargeTelephone = $facilityInchargeTelephone;
	}

	public function getFacilityMCHContactPerson() {
			return $this -> facilityMCHContactPerson;}

	public function setFacilityMCHContactPerson($facilityMCHContactPerson) { $this -> facilityMCHContactPerson = $facilityMCHContactPerson;
	}


	public function getFacilityMCHEmail() {
			return $this -> facilityMCHEmail;
	}

	public function setFacilityMCHEmail($facilityMCHEmail) { $this -> facilityMCHEmail = $facilityMCHEmail;
	}

	public function getFacilityMCHTelephone() {
			return $this -> facilityMCHTelephone;
	}

	public function setFacilityMCHTelephone($facilityMCHTelephone) { $this -> facilityMCHTelephone = $facilityMCHTelephone;
	}

	public function getFacilityMaternityContactPerson() {
			return $this -> facilityMaternityContactPerson;}

	public function setFacilityMaternityContactPerson($facilityMaternityContactPerson) { $this -> facilityMaternityContactPerson = $facilityMaternityContactPerson;
	}


	public function getFacilityMaternityEmail() {
			return $this -> facilityMaternityEmail;
	}

	public function setFacilityMaternityEmail($facilityMaternityEmail) { $this -> facilityMaternityEmail = $facilityMaternityEmail;
	}

	public function getFacilityMaternityTelephone() {
			return $this -> facilityMaternityTelephone;
	}

	public function setFacilityMaternityTelephone($facilityMaternityTelephone) { $this -> facilityMaternityTelephone = $facilityMaternityTelephone;
	}

	public function getCreatedAt() {
			return $this -> createdAt;
	}

	public function setCreatedAt($createdAt) { $this ->createdAt = $createdAt;
	}

	public function getUpdatedAt() {
			return $this -> updatedAt;
	}

	public function setUpdatedAt($updatedAt) { $this ->updatedAt = $updatedAt;
	}
}
?>