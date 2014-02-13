<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="mnh_questions_log")
 */
class E_MNH_Questions_Log {

	/**
	 * @Id
	 * @Column(name="idMNHQuestionLog", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $idMNHQuestionLog;

	/**
	 * @Column(name="response", type="string",length=6, nullable=false)
	 * */
	private $response;

	/**
	 * @Column(name="reasonForResponse", type="string",length=200, nullable=false)
	 * */
	private $reasonForResponse;

	/**
	 * @Column(name="specifiedOrFollowUp", type="string",length=255, nullable=false)
	 * */
	private $specifiedOrFollowUp;

	/**
	 * @ManyToOne(targetEntity="mnh_questions", inversedBy="questionCode")
	 * @Column(name="questionID", type="string",length=8,nullable=false)
	 * */
	private $questionID;

	/**
	 * @ManyToOne(targetEntity="facility", inversedBy="facilityMFC")
	 * @Column(name="facilityID", type="string",length=11,nullable=false)
	 * */
	private $facilityID;

	/**
	 * @Column(name="createdAt", type="datetime",nullable=false)
	 * */
	private $createdAt;

	/**
	 * @Column(name="responseCount", type="integer",nullable=false)
	 * */
	private $responseCount;

	public function getIdMNHQuestionLog() {
		return $this -> idMNHQuestionLog;
	}

	public function setIdMNHQuestionLog($idMCHQuestionLog) {$this -> idMNHQuestionLog = $idMNHQuestionLog;
	}

	public function getResponse() {
		return $this -> response;
	}

	public function setResponse($response) { $this -> response = $response;
	}

	public function getReasonForResponse() {
		return $this -> reasonForResponse;
	}

	public function setReasonForResponse($reasonForResponse) { $this -> reasonForResponse = $reasonForResponse;
	}

	public function getSpecifedOrFollowUp() {
		return $this -> specifiedOrFollowUp;
	}

	public function setSpecifedOrFollowUp($specifiedOrFollowUp) { $this -> specifiedOrFollowUp = $specifiedOrFollowUp;
	}

	public function getQuestionID() {
		return $this -> questionID;
	}

	public function setQuestionID($questionID) { $this -> questionID = $questionID;
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

	public function getResponseCount() {
		return $this -> responseCount;
	}

	public function setResponseCount($responseCount) { $this -> responseCount = $responseCount;
	}

}
?>