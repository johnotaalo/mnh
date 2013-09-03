<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_community_strategy")
	 */
 class E_MCH_Community_Strategy{
   /**
	* @Id
	* @Column(name="mchCommunityStrategyEntryID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $mchCommunityStrategyEntryID;
	
   /**
	* @Column(name="strategyResponse", type="integer",nullable=false)
	* */
	private $strategyResponse;
	  
	/**
	* @ManyToOne(targetEntity="mch_questions", inversedBy="questionCode")
	* @Column(name="strategyID", type="string",length=45,nullable=false)
	* */
	private $strategyID;
	
	/**
	* @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	* @Column(name="facilityID", type="string",length=11,nullable=false)
	* */
	private $facilityID;
	
	/**
	* @Column(name="createdAt", type="datetime",nullable=false)
	* */
	private $createdAt;
	 
	 
	public function getMCHCommunityStrategyEntryID() {
			return $this -> mchCommunityStrategyEntryID;
	}
	
	public function setMCHCommunityStrategyEntryID($mchCommunityStrategyEntryID) {$this -> mchCommunityStrategyEntryID=$mchCommunityStrategyEntryID;}
	
	 
	public function getStrategyResponse() {
			return $this -> strategyResponse;
	}
	
	public function setStrategyResponse($strategyResponse) { $this -> strategyResponse = $strategyResponse;
	}
	
	public function getStrategyID() {
			return $this -> strategyID;
	}
	
	public function setStrategyID($strategyID) { $this ->strategyID = $strategyID;
	}
	
	public function getFacilityCode() {
			return $this -> facilityID;
	}
	
	public function setFacilityCode($facilityID) { $this -> facilityID = $facilityID;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;}
}
?>