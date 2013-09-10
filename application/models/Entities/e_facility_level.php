<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="facility_level")
	 */
 class E_Facility_Level{
 	
   /**
	* @Id
	* @Column(name="facilityLevelID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $facilityLevelID;
	
   /**
	* @Column(name="facilityLevel", type="string",length=45, nullable=false)
	* */
	private $facilityLevel;
	 
	public function getfacilityLevelID() {
			return $this -> facilityLevelID;
	}
	
	public function setfacilityLevelID($facilityLevelID) { $this -> facilityLevelID = $facilityLevelID;
	}
	 
	public function getfacilityLevel() {
			return $this -> facilityLevel;
	}
	
	public function setfacilityLevel($facilityLevel) { $this -> facilityLevel = $facilityLevel;
	}
}
?>