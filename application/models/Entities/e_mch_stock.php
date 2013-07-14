<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="mch_stock")
 */
 class E_MCH_Stock {  
  
   /**
	* @Id
	* @Column(name="stockID", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $stockID;
	
	
   /**
	* @Column(name="stockQuantity", type="integer", length=11, nullable=false)
	* */
	private $stockQuantity;
	
	
   /**
	* @Column(name="stockExpiryDate", type="string", length=12, nullable=false)
	* */
	private $stockExpiryDate;
	
	/**
	* @Column(name="stockComments", type="string", length=45, nullable=false)
	* */
	private $stockComments;
	
	/**
	* @ManyToOne(targetEntity="commodity", inversedBy="commodityName") 
	* @Column(name="stockCommodityType", type="string", length=100, nullable=true)
	* */
	private $stockCommodityType;
	
	/**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC") 
	* @Column(name="stockFacility", type="string", length=15, nullable=true)
	* */
	private $stockFacility;
	
	
	/**
	* @Column(name="placeFound", type="string", length=45, nullable=true)
	* */
	private $placeFound;
	
	/**
	* @Column(name="createdAt", type="datetime", nullable=false)
	* */
	private $createdAt;
	
	/**
	* @Column(name="updatedAt", type="datetime", nullable=true)
	* */
	private $updatedAt;
	
	public function getStockID() {
			return $this -> stockID;
	}
	
	public function setStockID($stockID) { $this -> stockID = $stockID;
	}
	
	public function getStockQuantity() {
			return $this -> stockQuantity;
	}
	
	public function setStockQuantity($stockQuantity) { $this -> stockQuantity = $stockQuantity;
	}
	
	
	public function getStockExpiryDate() {
			return $this -> stockExpiryDate;}
	
	public function setStockExpiryDate($stockExpiryDate) { $this -> stockExpiryDate = $stockExpiryDate;
	}
	
	public function getStockComments() {
			return $this -> zincOrsDispensedFrom;}
	
	public function setStockComments($stockComments) { $this -> stockComments = $stockComments;
	}
	
	public function getStockCommodityType() {
			return $this -> stockCommodityType;
	}
	
	public function setStockCommodityType($stockCommodityType) { $this -> stockCommodityType = $stockCommodityType;
	}
	
	public function getStockFacility() {
			return $this -> stockFacility;
	}
	
	public function setStockFacility($stockFacility) { $this -> stockFacility = $stockFacility;
	}

	
	public function getPlaceFound() {
			return $this -> placeFound;
	}
	
	public function setPlaceFound($placeFound) { $this ->placeFound = $placeFound;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this ->createdAt = $createdAt;
	}
	
	public function getUpdatedAt() {
			return $this -> updatedAt;
	}
	
	public function setUpdatedAt($updatedAt) { $this ->updatedAt = $updatedAt;
	}
	
	
}
?>