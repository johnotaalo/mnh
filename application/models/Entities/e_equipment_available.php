<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="equipments_available")
	 */
 class E_Equipment_Available{
 	
   /**
	* @Id
	* @Column(name="idEquipmentsAvailable", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idEquipmentsAvailable;
	
   /**
	* @Column(name="equipAvailability", type="string",length=55, nullable=false)
	* */
	private $equipAvailability;
	
	/**
	* @Column(name="equipLocation", type="string",length=255, nullable=false)
	* */
	private $equipLocation;
	
	
	/**
	* @Column(name="equipmentID", type="string",length=55)
	* */
	private $equipmentID;
	
	/**
	* @Column(name="qtyFullyFunctional", type="integer",length=11,nullable=false)
	* */
	private $qtyFullyFunctional;
	
	/**
	* @Column(name="qtyPartiallyFunctional", type="integer",length=11,nullable=false)
	* */
	private $qtyPartiallyFunctional;
	
	/**
	* @Column(name="qtyNonFunctional", type="integer",length=11,nullable=false)
	* */
	private $qtyNonFunctional;
	
	/**
	* @Column(name="facilityID", type="string",length=15)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getIdEquipmentsAvailable() {
			return $this -> idEquipmentsAvailable;
	}
	
	public function setIdEquipmentsAvailable($idEquipmentsAvailable) { $this -> idEquipmentsAvailable= $idEquipmentsAvailable;}
	
	 
	public function getEquipAvailability() {
			return $this -> equipAvailability;
	}
	
	public function setEquipAvailability($equipAvailability) { $this -> equipAvailability = $equipAvailability;
	}
	
	public function getEquipLocation() {
			return $this -> equipLocation;
	}
	
	public function setEquipLocation($equipLocation) { $this -> equipLocation = $equipLocation;
	}
	
	public function getEquipmentID() {
			return $this -> equipmentID;
	}
	
	public function setEquipmentID($equipmentID) { $this -> equipmentID = $equipmentID;
	}
	

	public function getQuantityFullyFunctional() {
			return $this ->qtyFullyFunctional;
	}
	
	public function setQuantityFullyFunctional($qtyFullyFunctional) { $this -> qtyFullyFunctional = $qtyFullyFunctional;
	}
	
	public function getQuantityPartiallyFunctional() {
			return $this ->qtyPartiallyFunctional;
	}
	
	public function setQuantityPartiallyFunctional($qtyPartiallyFunctional) { $this -> qtyPartiallyFunctional = $qtyPartiallyFunctional;
	}
	
	public function getQuantityNonFunctional() {
			return $this ->qtyNonFunctional;
	}
	
	public function setQuantityNonFunctional($qtyNonFunctional) { $this -> qtyNonFunctional = $qtyNonFunctional;
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