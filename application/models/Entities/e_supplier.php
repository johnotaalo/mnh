<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="supplier")
	 */
 class E_Supplier{
 	
   /**
	* @Id
	* @Column(name="idSupplier", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $supplierID;
	
   /**
	* @Column(name="supplierName", type="string",length=55, nullable=false)
	* */
	private $supplierName;
	
	/**
	* @Column(name="supplierCode", type="string",length=55, nullable=false)
	* */
	private $supplierCode;
	 
	public function getSupplierId() {
			return $this -> idSupplier;
	}
	
	public function setSupplierId($supplierID) { $this -> supplierID= $supplierID;
	}
	 
	public function getSupplierName() {
			return $this -> supplierName;
	}
	
	public function setSupplierName($supplierName) { $this -> supplierName = $supplierName;
	}
	
	public function getSupplierCode() {
			return $this -> supplierCode;
	}
	
	public function setSupplierCode($supplierCode) { $this -> supplierCode = $supplierCode;
	}
}
?>