<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="province")
	 */
 class E_Province{
 	
   /**
	* @Id
	* @Column(name="provinceID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $provinceID;
	
   /**
	* @Column(name="provinceName", type="string",length=45, nullable=false)
	* */
	private $provinceName;
	 
	public function getpProvinceID() {
			return $this -> provinceID;
	}
	
	public function setpProvinceID($provinceID) { $this -> provinceID = $provinceID;
	}
	 
	public function getProvinceName() {
			return $this -> provinceName;
	}
	
	public function setProvinceName($provinceName) { $this -> provinceName = $provinceName;
	}
}
?>