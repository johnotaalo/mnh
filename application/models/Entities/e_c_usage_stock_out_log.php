<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="c_usage_stock_out_log")
	 */
 class E_C_Usage_Stock_Out_Log{
 	
   /**
	* @Id
	* @Column(name="usagestockoutID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $usagestockoutID;
	
	/**
	* @Column(name="cUsage", type="integer",length=11, nullable=false)
	* */
	private $cUsage;
	
	/**
	* @Column(name="cUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $cUnavailableTimes;
	
	/**
	* @Column(name="cOptionOnOutage", type="string",length=25, nullable=false)
	* */
	private $cOptionOnOutage;
	 
	/**
	* @Column(name="commodityID", type="integer",length=55)
	* */
	private $commodityID;
	 
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
	
	public function getCommodityUsage() {
			return $this ->cUsage;
	}
	
	public function setCommodityUsage($cUsage) { $this -> cUsage= $cUsage;
	}
	
	public function getCommodityUnavailableTimes() {
			return $this ->cUnavailableTimes;
	}
	
	public function setCommodityUnavailableTimes($cUnavailableTimes) { $this -> cUnavailableTimes= $cUnavailableTimes;
	}
	
	public function getCommodityOptionOnOutage() {
			return $this ->cOptionOnOutage;
	}
	
	public function setCommodityOptionOnOutage($cOptionOnOutage) { $this -> cOptionOnOutage= $cOptionOnOutage;
	}
	
	 
	public function getCommodityID() {
			return $this -> commodityID;
	}
	
	public function setCommodityID($commodityID) { $this -> commodityID = $commodityID;
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