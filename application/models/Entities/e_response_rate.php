<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="response_rate")
 */
 class E_Response_Rate {  
  
   /**
	* @Id
	* @Column(name="responseID", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $responseID;

   /**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
    * @Column(name="facilityCode", type="string", length=15, nullable=false)
	* */
	private $facilityCode;

   /**
	* @Column(name="flagResponded", type="integer", length=1, nullable=false)
	* */
	private $flagResponded;

	/**
	* @Column(name="whenStarted", type="datetime", nullable=false)
	* */
	private $whenStarted;

	/**
	* @Column(name="whenComplete", type="datetime", nullable=false)
	* */
	private $whenComplete;

	public function getResponseID() {
			return $this -> responseID;
	}

	public function setResponseID($responseID) { $this -> responseID = $responseID;
	}
	public function getFacilityCode() {
			return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}
	public function getFlagResponded() {
			return $this -> flagResponded;
	}

	public function setFlagResponded($flagResponded) { $this -> flagResponded = $flagResponded;
	}

	public function getWhenStarted() {
			return $this -> whenStarted;
	}

	public function setWhenStarted($whenStarted) { $this -> whenStarted = $whenStarted;
	}

	public function setWhenComplete($whenComplete) { $this -> whenComplete = $whenComplete;
	}
	public function getWhenComplete() {
			return $this -> whenComplete;
	}
}
?>