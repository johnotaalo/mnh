<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="morbidity_data_log")
	 */
 class E_Morbidity_Data_Log{
 	
   /**
	* @Id
	* @Column(name="idDiarrhoeaCases", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idDiarrhoeaCases;
	
   /**
	* @Column(name="jan12", type="integer",length=11, nullable=true)
	* */
	private $jan12;
	
	/**
	* @Column(name="feb12", type="integer",length=11, nullable=true)
	* */
	private $feb12;
	
	/**
	* @Column(name="mar12", type="integer",length=11, nullable=true)
	* */
	private $mar12;
	
	/**
	* @Column(name="apr12", type="integer",length=11, nullable=true)
	* */
	private $apr12;
	
	/**
	* @Column(name="may12", type="integer",length=11, nullable=true)
	* */
	private $may12;
	
	/**
	* @Column(name="jun12", type="integer",length=11, nullable=true)
	* */
	private $jun12;
	
	/**
	* @Column(name="jul12", type="integer",length=11, nullable=true)
	* */
	private $jul12;
	
	/**
	* @Column(name="aug12", type="integer",length=11, nullable=true)
	* */
	private $aug12;
	
	/**
	* @Column(name="sep12", type="integer",length=11, nullable=true)
	* */
	private $sep12;
	
	/**
	* @Column(name="oct12", type="integer",length=11, nullable=true)
	* */
	private $oct12;
	
	/**
	* @Column(name="nov12", type="integer",length=11, nullable=true)
	* */
	private $nov12;
	
	/**
	* @Column(name="dec12", type="integer",length=11, nullable=true)
	* */
	private $dec12;
	
	/**
	* @Column(name="jan13", type="integer",length=11, nullable=false)
	* */
	private $jan13;
	
	/**
	* @Column(name="feb13", type="integer",length=11, nullable=false)
	* */
	private $feb13;
	
	/**
	* @Column(name="mar13", type="integer",length=11, nullable=false)
	* */
	private $mar13;
	
	/**
	* @Column(name="apr13", type="integer",length=11, nullable=false)
	* */
	private $apr13;
	
	/**
	* @Column(name="may13", type="integer",length=11, nullable=false)
	* */
	private $may13;
	
	/**
	* @Column(name="june13", type="integer",length=11, nullable=false)
	* */
	private $jun13;
	
	 
	
	/**
	* @Column(name="facilityID", type="string",length=55)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime", nullable=false)
	* */
	private $createdAt;
	
	
	
	public function getIdDiarrhoeaCases() {
			return $this -> idDiarrhoeaCases;
	}
	
	public function setIdDiarrhoeaCases($idDiarrhoeaCases) { $this -> idDiarrhoeaCases= $idDiarrhoeaCases;
	}
	
	public function setJan12($jan12) { $this -> jan12= $jan12;
	}
	 
	public function getJan12() {
			return $this -> jan12;
	}
	
	public function setFeb12($feb12) { $this -> feb12= $feb12;
	}
	 
	public function getFeb12() {
			return $this -> feb12;
	}
	
	public function setMar12($mar12) { $this -> mar12= $mar12;
	}
	 
	public function getMar12() {
			return $this -> mar12;
	}
	
	public function setApr12($apr12) { $this -> apr12= $apr12;
	}
	 
	public function getApr12() {
			return $this -> apr12;
	}
	
	public function setMay12($may12) { $this -> may12= $may12;
	}
	 
	public function getMay12() {
			return $this -> may12;
	}
	
	public function setJun12($jun12) { $this -> jun12= $jun12;
	}
	 
	public function getJun12() {
			return $this -> jun12;
	}
	
	public function setJul12($jul12) { $this -> jul12= $jul12;
	}
	 
	public function getJul12() {
			return $this -> jul12;
	}
	
	public function setAug12($aug12) { $this -> aug12= $aug12;
	}
	 
	public function getAug12() {
			return $this -> aug12;
	}
	
	public function setSep12($sep12) { $this -> sep12= $sep12;
	}
	 
	public function getSep12() {
			return $this -> sep12;
	}
	
	public function setOct12($oct12) { $this -> oct12= $oct12;
	}
	 
	public function getOct12() {
			return $this -> oct12;
	}
	
	public function setNov12($nov12) { $this -> nov12= $nov12;
	}
	 
	public function getNov12() {
			return $this -> nov12;
	}
	
	public function setDec12($dec12) { $this -> dec12= $dec12;
	}
	 
	public function getDec12() {
			return $this -> dec12;
	}
	
	public function setJan13($jan13) { $this -> jan13= $jan13;
	}
	 
	public function getJan13() {
			return $this -> jan13;
	}
	
	public function setFeb13($feb13) { $this -> feb13= $feb13;
	}
	 
	public function getFeb13() {
			return $this -> feb13;
	}
	
	public function setMar13($mar13) { $this -> mar13= $mar13;
	}
	 
	public function getMar13() {
			return $this -> mar13;
	}
	
	public function setApr13($apr13) { $this -> apr13= $apr13;
	}
	 
	public function getApr13() {
			return $this -> apr13;
	}
	
	public function setMay13($may13) { $this -> may13= $may13;
	}
	 
	public function getMay13() {
			return $this -> may13;
	}
	
	public function setJun13($jun13) { $this -> jun13= $jun13;
	}
	 
	public function getJun13() {
			return $this -> jun13;
	}
	
	public function getFacilityID() {
			return $this -> facilityID;
	}
	
	public function setFacilityID($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;}
	
}
?>