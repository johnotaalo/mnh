<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="facility_type")
	 */
 class E_Facility_Type{
 	
   /**
	* @Id
	* @Column(name="facilityTypeID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $facilityTypeID;
	
   /**
	* @Column(name="facilityType", type="string",length=55, nullable=false)
	* */
	private $facilityType;
	 
	public function getfacilityTypeID() {
			return $this -> facilityTypeID;
	}
	
	public function setfacilityTypeID($facilityTypeID) { $this -> facilityTypeID = $facilityTypeID;
	}
	 
	public function getfacilityType() {
			return $this -> facilityType;
	}
	
	public function setfacilityType($facilityType) { $this -> facilityType = $facilityType;
	}
}
?>