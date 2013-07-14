<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mch_questions")
	 */
 class E_MCH_Questions{
 	
   /**
	* @Id
	* @Column(name="idMchQuestion", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMchQuestion;
	
   /**
	* @Column(name="questionCode", type="string",length=10, nullable=false)
	* */
	private $questionCode;
	
	/**
	* @Column(name="mchQuestion", type="string", nullable=false)
	* */
	private $mchQuestion;
	
	/**
	* @Column(name="mchQuestionFor", type="string",length=3, nullable=false)
	* */
	private $mchQuestionFor;
	 
	public function getMCHQuestionId() {
			return $this -> idMchQuestion;
	}
	
	public function setMCHQuestionId($idMchQuestion) { $this -> idMchQuestion= $idMchQuestion;
	}
	 
	public function getQuestionCode() {
			return $this -> questionCode;
	}
	
	public function setQuestionCode($questionCode) { $this -> questionCode = $questionCode;
	}
	
	public function getMCHQuestion() {
			return $this -> mchQuestion;
	}
	
	public function setMCHQuestion($mchQuestion) { $this -> mchQuestion= $mchQuestion;
	}
	
	public function getMCHQuestionFor() {
			return $this -> mchQuestionFor;
	}
	
	public function setMCHQuestionFor($mchQuestionFor) { $this -> mchQuestionFor= $mchQuestionFor;
	}
}