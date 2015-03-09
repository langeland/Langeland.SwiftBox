<?php
namespace Langeland\Mailbox\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Message {

	/**
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $messageId;

	/**
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $subject;


	/**
	 * @ORM\Column(nullable=true)
	 * @var \DateTime
	 */
	protected $date;

	/**
	 * @ORM\Column(name="from_msg", nullable=true)
	 * @var string
	 */
	protected $from;

	/**
	 * @ORM\Column(name="to_msg", nullable=true)
	 * @var string
	 */
	protected $to;

	/**
	 * @ORM\Column(nullable=true, type="blob")
	 * @var string
	 */
	protected $body;

	/**
	 * @ORM\Column(nullable=true, type="blob")
	 * @var string
	 */
	protected $rawMessage;

	/**
	 * @return string
	 */
	public function getMessageId() {
		return $this->messageId;
	}

	/**
	 * @param string $messageId
	 * @return $this
	 */
	public function setMessageId($messageId) {
		$this->messageId = $messageId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @param string $subject
	 * @return $this
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param \DateTime $date
	 * @return $this
	 */
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFrom() {
		return $this->from;
	}

	/**
	 * @param string $from
	 * @return $this
	 */
	public function setFrom($from) {
		$this->from = $from;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTo() {
		return $this->to;
	}

	/**
	 * @param string $to
	 * @return $this
	 */
	public function setTo($to) {
		$this->to = $to;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * @param string $body
	 * @return $this
	 */
	public function setBody($body) {
		$this->body = $body;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getRawMessage() {
		return $this->rawMessage;
	}

	/**
	 * @param string $rawMessage
	 * @return $this
	 */
	public function setRawMessage($rawMessage) {
		$this->rawMessage = $rawMessage;
		return $this;
	}

}