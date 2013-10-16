<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="squantity_available")
	 */
 class E_Squantity_Available{
 	
   /**
	* @Id
	* @Column(name="idCQuantityAvailable", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idCQuantityAvailable;
	
   /**
	* @Column(name="Availability", type="string",length=55, nullable=false)
	* */
	private $Availability;
	
	   /**
	* @Column(name="SuppliesCode", type="integer",length=55)
	* */
	private $suppliesCode;
	 
	 
	/**
	* @Column(name="SupplierID", type="integer",length=55)
	* */
	private $SupplierID;
	 
	/**
	* @Column(name="Location", type="string",length=55, nullable=false)
	* */
	private $Location;
	
	/**
	* @Column(name="quantityAvailable", type="integer",length=11,nullable=false)
	* */
	private $quantityAvailable;
	
	/**
	* @Column(name="facilityID", type="string",length=15)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	/**
	* @Column(name="Reason4Unavailability", type="string",length=55, nullable=false)
	* */
	private $Reason4Unavailability;
	 
	public function getIdCQuantityAvailable() {
			return $this -> idCQuantityAvailable;
	}
	
	public function setIdCQuantityAvailable($idCQuantityAvailable) { $this -> idCQuantityAvailable= $idCQuantityAvailable;}
	
	 
	public function getAvailability() {
			return $this -> Availability;
	}
	
	public function setAvailability($Availability) { $this -> Availability = $Availability;
	}
	
	public function getSuppliesCode() {
			return $this -> suppliesCode;
	}
	
	public function setSuppliesCode($suppliesCode) { $this -> suppliesCode = $suppliesCode;
	}
	
	public function getSupplierID() {
			return $this -> SupplierID;
	}
	
	public function setSupplierID($SupplierID) { $this -> SupplierID = $SupplierID;
	}
	
	public function getLocation() {
			return $this -> Location;
	}
	
	public function setLocation($Location) { $this -> Location = $Location;
	}
	
	public function getQuantityAvailable() {
			return $this -> QuantityAvailable;
	}
	
	public function setQuantityAvailable($quantityAvailable) { $this -> quantityAvailable = $quantityAvailable;
	}
	
	public function getReason4Unavailability() {
			return $this -> Reason4Unavailability;
	}
	
	public function setReason4Unavailability($Reason4Unavailability) { $this -> Reason4Unavailability = $Reason4Unavailability;
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