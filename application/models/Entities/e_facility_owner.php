<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="facility_owner")
	 */
 class E_Facility_Owner{
 	
   /**
	* @Id
	* @Column(name="facilityOwnerID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $facilityOwnerID;
	
   /**
	* @Column(name="facilityOwner", type="string",length=255, nullable=false)
	* */
	private $facilityOwner;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	public function getFacilityOwnerID() {
			return $this -> facilityOwnerID;
	}
	
	public function setFacilityOwnerID($facilityOwnerID) { $this -> facilityOwnerID = $facilityOwnerID;
	}
	 
	public function getFacilityOwner() {
			return $this -> facilityOwner;
	}
	
	public function setFacilityOwner($facilityOwner) { $this -> facilityOwner = $facilityOwner;
	}
	
		public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
}
?>