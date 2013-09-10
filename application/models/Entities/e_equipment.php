<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="equipment")
 */

class E_Equipment{

	/**
	 * @Id
	 * @Column(name="equipmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $equipmentID;

	/**
	 *  @Column(name="equipmentCode", type="string", length=8, nullable=false)
	 * */
	private $equipmentCode;

	/**
	 * @Column(name="equipmentName", type="string", length=100, nullable=false)
	 * */
	private $equipmentName;
	
	/**
	 * @Column(name="equipmentUnit", type="string", length=45, nullable=false)
	 * */
	private $equipmentUnit;
	
	/**
	 * @Column(name="equipmentFor", type="string", length=3, nullable=false)
	 * */
	private $equipmentFor;

    
	public function getEquipmentID() {
		return $this -> equipmentID;
	}

	public function setEquipmentID($equipmentID) {
		$this -> equipmentID = $equipmentID;
	}

    
	public function getEquipmentCode() {
		return $this -> equipmentCode;
	}

	public function setEquipmentCode($equipmentCode) {
		$this -> equipmentCode = $equipmentCode;
	}

    public function getEquipmentName() {
		return $this -> equipmentName;
	}

	public function setEquipmentName($equipmentName) {
		$this -> equipmentName = $equipmentName;
	}
	
	public function getEquipmentUnit() {
		return $this -> equipmentUnit;
	}

	public function setEquipmentUnit($equipmentUnit) {
		$this -> equipmentUnit = $equipmentUnit;
	}
	
	public function getEquipmentFor() {
		return $this -> equipmentFor;
	}
	
	public function setEquipmentFor($equipmentFor) {
		$this -> equipmentFor = $equipmentFor;
	}

	
	
	

}
?>