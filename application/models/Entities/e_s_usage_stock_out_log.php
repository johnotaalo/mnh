<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="s_usage_stock_out_log")
	 */
 class E_S_Usage_Stock_Out_Log{
 	
   /**
	* @Id
	* @Column(name="usagestockoutID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $usagestockoutID;
	
	/**
	* @Column(name="sUsage", type="integer",length=11, nullable=false)
	* */
	private $sUsage;
	
	/**
	* @Column(name="sUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $sUnavailableTimes;
	
	/**
	* @Column(name="sOptionOnOutage", type="string",length=25, nullable=false)
	* */
	private $sOptionOnOutage;
	 
	/**
	* @Column(name="supplyID", type="integer",length=55)
	* */
	private $supplyID;
	 
	/**
	* @Column(name="facilityID", type="string",length=55)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	public function getUsageStockOutID() {
			return $this -> usagestockoutID;
	}
	
	public function setUsageStockOutID($usagestockoutID) { $this -> usagestockoutID= $usagestockoutID;
	}
	
	public function getSupplyUsage() {
			return $this ->sUsage;
	}
	
	public function setSupplyUsage($sUsage) { $this -> sUsage= $sUsage;
	}
	
	public function getSupplyUnavailableTimes() {
			return $this ->sUnavailableTimes;
	}
	
	public function setSupplyUnavailableTimes($sUnavailableTimes) { $this -> sUnavailableTimes= $sUnavailableTimes;
	}
	
	public function getSupplyOptionOnOutage() {
			return $this ->sOptionOnOutage;
	}
	
	public function setSupplyOptionOnOutage($sOptionOnOutage) { $this -> sOptionOnOutage= $sOptionOnOutage;
	}
	
	 
	public function getSupplyID() {
			return $this -> supplyID;
	}
	
	public function setSupplyID($supplyID) { $this -> supplyID = $supplyID;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
}
?>