<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="stock")
 */
 class E_Stock {  
  
   /**
	* @Id
	* @Column(name="stockID", type="integer", length=11, nullable=false)
    * @GeneratedValue(strategy="AUTO")
	* */
	private $stockID;
	
   /**
	* @Column(name="stockBatchNo", type="string",length=45, nullable=true)
	* */
	private $stockBatchNo;
	
   /**
	* @Column(name="stockQuantity", type="integer", length=11, nullable=false)
	* */
	private $stockQuantity;
	
   /**
    * @Column(name="stockDateDispensed", type="string", length=12, nullable=false)
	* */
	private $stockDateDispensed;
	
	 
   /**
    * @Column(name="stockSupplier", type="string",length=45, nullable=true)
	* */
	private $stockSupplier;
	
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
	* @Column(name="stockDateOfInventory", type="date", nullable=true)
	* */
	private $stockDateOfInventory;
	
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
	public function getStockBatchNo() {
			return $this -> stockBatchNo;
	}
	
	public function setStockBatchNo($stockBatchNo) { $this -> stockBatchNo = $stockBatchNo;
	}
	public function getStockQuantity() {
			return $this -> stockQuantity;
	}
	
	public function setStockQuantity($stockQuantity) { $this -> stockQuantity = $stockQuantity;
	}
	public function getStockDateDispensed() {
			return $this -> stockDateDispensed;
	}
	
	public function setStockDateDispensed($stockDateDispensed) { $this -> stockDateDispensed = $stockDateDispensed;
	}
	public function getStockSupplier() {
			return $this -> stockSupplier;
	}
	
	public function setStockSupplier($stockSupplier) { $this ->stockSupplier = $stockSupplier;
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
	
	public function getStockDateOfInventory() {
			return $this -> stockDateOfInventory;
	}
	
	public function setStockDateOfInventory($stockDateOfInventory) { $this ->stockDateOfInventory = $stockDateOfInventory;
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