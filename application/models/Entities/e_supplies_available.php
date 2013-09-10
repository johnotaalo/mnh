<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="supplies_available")
	 */
 class E_Cquantity_Available{
 	
   /**
	* @Id
	* @Column(name="idSuppliesAvailable", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idSuppliesAvailable;
	
   /**
	* @Column(name="supsupAvailability", type="string",length=55, nullable=false)
	* */
	private $supAvailability;
	
	   /**
	* @Column(name="SuppliesID", type="integer",length=55)
	* */
	private $SuppliesID;
	 
	 
	/**
	* @Column(name="SupplierID", type="varchar",length=55)
	* */
	private $SupplierID;
	 
	/**
	* @Column(name="supLocation", type="string",length=55, nullable=false)
	* */
	private $supLocation;
	
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
	* @Column(name="Reason4UnsupAvailability", type="string",length=55, nullable=false)
	* */
	private $Reason4UnsupAvailability;
	 
	public function getidSuppliesAvailable() {
			return $this -> idSuppliesAvailable;
	}
	
	public function setidSuppliesAvailable($idSuppliesAvailable) { $this -> idSuppliesAvailable= $idSuppliesAvailable;}
	
	 
	public function getsupAvailability() {
			return $this -> supAvailability;
	}
	
	public function setsupAvailability($supAvailability) { $this -> supAvailability = $supAvailability;
	}
	
	public function getSuppliesID() {
			return $this -> SuppliesID;
	}
	
	public function setSuppliesID($SuppliesID) { $this -> SuppliesID = $SuppliesID;
	}
	
	public function getSupplierID() {
			return $this -> SupplierID;
	}
	
	public function setSupplierID($SupplierID) { $this -> SupplierID = $SupplierID;
	}
	
	public function getsupLocation() {
			return $this -> supLocation;
	}
	
	public function setsupLocation($supLocation) { $this -> supLocation = $supLocation;
	}
	
	public function getsupQuantityAvailable() {
			return $this -> supQuantityAvailable;
	}
	
	public function setsupQuantityAvailable($supQuantityAvailable) { $this -> supQuantityAvailable = $supQuantityAvailable;
	}
	
	public function getReason4UnsupAvailability() {
			return $this -> Reason4UnsupAvailability;
	}
	
	public function setReason4UnsupAvailability($Reason4UnsupAvailability) { $this -> Reason4UnsupAvailability = $Reason4UnsupAvailability;
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