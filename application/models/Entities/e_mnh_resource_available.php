<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mnh_resource_available")
	 */
 class E_MNH_Resource_Available{
 	
   /**
	* @Id
	* @Column(name="idResourceAvailable", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idResourceAvailable;
	
   /**
	* @Column(name="Availability", type="string",length=55, nullable=false)
	* */
	private $Availability;
	
	   /**
	* @Column(name="ResourceCode", type="string",length=11)
	* */
	private $resourceCode;
	 
	 
	/**
	* @Column(name="SupplierID", type="string",length=55)
	* */
	private $SupplierID;
	 
	/**
	* @Column(name="Location", type="string",length=55, nullable=false)
	* */
	private $Location;
	
	/**
	* @Column(name="source", type="string",length=45, nullable=false)
	* */
	private $source;
	
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
	 
	public function getIdResourceAvailable() {
			return $this -> idResourceAvailable;
	}
	
	public function setIdResourceAvailable($idResourceAvailable) { $this -> idResourceAvailable= $idResourceAvailable;}
	
	 
	public function getAvailability() {
			return $this -> Availability;
	}
	
	public function setAvailability($Availability) { $this -> Availability = $Availability;
	}
	
	public function getResourceCode() {
			return $this -> resourceCode;
	}
	
	public function setResourceCode($resourceCode) { $this -> resourceCode = $resourceCode;
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
	
	public function getSource() {
			return $this -> source;
	}
	
	public function setSource($source) { $this -> source = $source;
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