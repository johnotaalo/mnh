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
	 * @Column(name="equipmentName", type="string", length=45, nullable=false)
	 * */
	private $equipmentName;
	
	/**
	 * @Column(name="createdAt", type="datetime", nullable=true)
	 * */
	private $createdAt;
	
	/**
	 * @Column(name="updatedAt", type="datetime", nullable=true)
	 * */
	private $updatedAt;

    
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