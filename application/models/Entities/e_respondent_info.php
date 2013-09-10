<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="respondent_info")
 */
 class E_Respondent_Info {  
  
   /**
	* @Id
	* @Column(name="respondentID", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $respondentID;

   /**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
    * @Column(name="facilityCode", type="string", length=15, nullable=false)
	* */
	private $facilityCode;

   /**
	* @Column(name="respondentName", type="string", length=45, nullable=false)
	* */
	private $respondentName;

	/**
	* @Column(name="respondentPhoneNo", type="string",length=15, nullable=false)
	* */
	private $respondentPhoneNo;

	/**
	* @Column(name="respondentEmail", type="string",length=100, nullable=false)
	* */
	private $respondentEmail;

	public function getRespondentID() {
			return $this -> respondentID;
	}

	public function setRespodentID($respondentID) { $this -> respondentID = $respondentID;
	}
	public function getFacilityCode() {
			return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}
	public function getRespondentName() {
			return $this -> respondentName;
	}

	public function setRespondentName($respondentName) { $this -> respondentName = $respondentName;
	}

	public function getRespondentPhoneNo() {
			return $this -> respondentPhoneNo;
	}

	public function setRespondentPhoneNo($respondentPhoneNo) { $this -> respondentPhoneNo = $respondentPhoneNo;
	}

	public function getRespondentEmail() {
			return $this -> respondentEmail;
	}

	public function setRespondentEmail($respondentEmail) { $this -> respondentEmail = $respondentEmail;
	}
}
?>