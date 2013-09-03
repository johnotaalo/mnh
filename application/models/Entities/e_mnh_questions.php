<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="mnh_questions")
	 */
 class E_MNH_Questions{
 	
   /**
	* @Id
	* @Column(name="idMnhQuestion", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $idMnhQuestion;
	
   /**
	* @Column(name="questionCode", type="string",length=10, nullable=false)
	* */
	private $questionCode;
	
	/**
	* @Column(name="mnhQuestion", type="text", nullable=false)
	* */
	private $mnhQuestion;
	
	/**
	* @Column(name="mnhQuestionFor", type="string",length=7, nullable=false)
	* */
	private $mnhQuestionFor;
	 
	public function getMNHQuestionId() {
			return $this -> idMnhQuestion;
	}
	
	public function setMNHQuestionId($idMnhQuestion) { $this -> idMnhQuestion= $idMnhQuestion;
	}
	 
	public function getQuestionCode() {
			return $this -> questionCode;
	}
	
	public function setQuestionCode($questionCode) { $this -> questionCode = $questionCode;
	}
	
	public function getMNHQuestion() {
			return $this -> mnhQuestion;
	}
	
	public function setMNHQuestion($mnhQuestion) { $this -> mnhQuestion= $mnhQuestion;
	}
	
	public function getMNHQuestionFor() {
			return $this -> mnhQuestionFor;
	}
	
	public function setMNHQuestionFor($mnhQuestionFor) { $this -> mnhQuestionFor= $mnhQuestionFor;
	}
}