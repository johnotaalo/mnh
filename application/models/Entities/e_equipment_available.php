<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="equipment_available")
	 */
 class E_Equipment_Available{
 	
   /**
	* @Id
	* @Column(name="idEquipmentsAvailable", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idEquipmentsAvailable;
	
   /**
	* @Column(name="supequipAvailability", type="string",length=55, nullable=false)
	* */
	private $equipAvailability;
	
	   /**
	* @Column(name="equipmentID", type="integer",length=55)
	* */
	private $equipmentID;
	 
	 
	/**
	* @Column(name="SupplierID", type="varchar",length=55)
	* */
	private $SupplierID;
	 
	/**
	* @Column(name="equipLocation", type="string",length=55, nullable=false)
	* */
	private $equipLocation;
	
	/**
	* @Column(name="supQuantityAvailable", type="integer",length=11,nullable=false)
	* */
	private $supQuantityAvailable;
	
	/**
	* @Column(name="facilityID", type="string",length=15)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	/**
	* @Column(name="functionality", type="string",length=55, nullable=false)
	* */
	private $functionality;
	 
	public function getidEquipmentsAvailable() {
			return $this -> idEquipmentsAvailable;
	}
	
	public function setidEquipmentsAvailable($idEquipmentsAvailable) { $this -> idEquipmentsAvailable= $idEquipmentsAvailable;}
	
	 
	public function getequipAvailability() {
			return $this -> equipAvailability;
	}
	
	public function setequipAvailability($equipAvailability) { $this -> equipAvailability = $equipAvailability;
	}
	
	public function getequipmentID() {
			return $this -> equipmentID;
	}
	
	public function setequipmentID($equipmentID) { $this -> equipmentID = $equipmentID;
	}
	
	
	public function getequipLocation() {
			return $this -> equipLocation;
	}
	
	public function setequipLocation($equipLocation) { $this -> equipLocation = $equipLocation;
	}
	

	public function getfunctionality() {
			return $this -> functionality;
	}
	
	public function setfunctionality($functionality) { $this -> functionality = $functionality;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;}
}
?>