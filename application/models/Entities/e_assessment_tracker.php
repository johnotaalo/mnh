<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="assessment_tracker")
	 */
 class E_Assessment_Tracker{
 	
   /**
	* @Id
	* @Column(name="trackerID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $trackerID;

   /**
	* @ManyToOne(targetEntity="form_steps",inversedBy="stepID")
    * @Column(name="trackerSection", type="string",length=45,nullable=false)
	* */
	private $trackerSection;


   /**
	* @Column(name="lastActivity", type="datetime", nullable=false)
	* */
	private $lastActivity;

	/**
	* @ManyToOne(targetEntity="facility",inversedBy="facilityMFC")
    * @Column(name="facilityCode", type="string",length=45, nullable=false)
	* */
	private $facilityCode;

	public function getTrackerID() {
			return $this -> trackerID;
	}

	public function setTrackerID($trackerID) { $this -> trackerID = $trackerID;
	}

	public function getTrackerSection() {
			return $this -> trackerSection;
	}

	public function setTrackerSection($trackerSection) { $this -> trackerSection = $trackerSection;
	}

	public function getLastActivity() {
			return $this -> lastActivity;
	}

	public function setLastActivity($lastActivity) { $this -> lastActivity = $lastActivity;
	}

	public function getFacilityCode() {
			return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}
}
?>