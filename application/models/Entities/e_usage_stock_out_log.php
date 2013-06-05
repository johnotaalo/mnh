<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="usage_stock_out_log")
	 */
 class E_Usage_Stock_Out_Log{
 	
   /**
	* @Id
	* @Column(name="usagestockoutID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $usagestockoutID;
	
	/**
	* @Column(name="novUsage", type="integer",length=11, nullable=false)
	* */
	private $novUsage;
	
	/**
	* @Column(name="novUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $novUnavailableTimes;
	
	/**
	* @Column(name="decUsage", type="integer",length=11, nullable=false)
	* */
	private $decUsage;
	
	/**
	* @Column(name="decUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $decUnavailableTimes;
	
	/**
	* @Column(name="janUsage", type="integer",length=11, nullable=false)
	* */
	private $janUsage;
	
	/**
	* @Column(name="janUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $janUnavailableTimes;
	
	/**
	* @Column(name="febUsage", type="integer",length=11, nullable=false)
	* */
	private $febUsage;
	
	/**
	* @Column(name="febUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $febUnavailableTimes;
	
	/**
	* @Column(name="marUsage", type="integer",length=11, nullable=false)
	* */
	private $marUsage;
	
	/**
	* @Column(name="marUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $marUnavailableTimes;
	
	/**
	* @Column(name="aprUsage", type="integer",length=11, nullable=false)
	* */
	private $aprUsage;
	
	/**
	* @Column(name="aprUnavailableTimes", type="string",length=55, nullable=false)
	* */
	private $aprUnavailableTimes;
	 
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
	
	public function getNovUsage() {
			return $this ->novUsage;
	}
	
	public function setNovUsage($novUsage) { $this -> novUsage= $novUsage;
	}
	
	public function getNovUnavailableTimes() {
			return $this ->novUnavailableTimes;
	}
	
	public function setNovUnavailableTimes($novUnavailableTimes) { $this -> novUnavailableTimes= $novUnavailableTimes;
	}
	
	public function getDecUsage() {
			return $this ->decUsage;
	}
	
	public function setDecUsage($decUsage) { $this -> decUsage= $decUsage;
	}
	
	public function getDecUnavailableTimes() {
			return $this ->decUnavailableTimes;
	}
	
	public function setDecUnavailableTimes($decUnavailableTimes) { $this -> decUnavailableTimes= $decUnavailableTimes;
	}
	
	
	public function getJanUsage() {
			return $this ->janUsage;
	}
	
	public function setJanUsage($janUsage) { $this -> janUsage= $janUsage;
	}
	
	public function getJanUnavailableTimes() {
			return $this ->janUnavailableTimes;
	}
	
	public function setJanUnavailableTimes($janUnavailableTimes) { $this -> janUnavailableTimes= $janUnavailableTimes;
	}
	
	
	public function getFebUsage() {
			return $this ->febUsage;
	}
	
	public function setFebUsage($febUsage) { $this -> febUsage= $febUsage;
	}
	
	public function getFebUnavailableTimes() {
			return $this ->febUnavailableTimes;
	}
	
	public function setFebUnavailableTimes($febUnavailableTimes) { $this -> febUnavailableTimes= $febUnavailableTimes;
	}
	
	public function getMarUsage() {
			return $this ->marUsage;
	}
	
	public function setMarUsage($marUsage) { $this -> marUsage= $marUsage;
	}
	
	public function getMarUnavailableTimes() {
			return $this ->marUnavailableTimes;
	}
	
	public function setMarUnavailableTimes($marUnavailableTimes) { $this -> marUnavailableTimes= $marUnavailableTimes;
	}
	
	public function getAprUsage() {
			return $this ->aprUsage;
	}
	
	public function setAprUsage($aprUsage) { $this -> aprUsage= $aprUsage;
	}
	
	public function getAprUnavailableTimes() {
			return $this ->aprUnavailableTimes;
	}
	
	public function setAprUnavailableTimes($aprUnavailableTimes) { $this -> aprUnavailableTimes= $aprUnavailableTimes;
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