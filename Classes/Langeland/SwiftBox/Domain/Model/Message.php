<?php
namespace Langeland\SwiftBox\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.SwiftBox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Message {

	/**
	 * Identifies this message with a unique ID, usually containing the domain name and time generated
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $messageId;

	/**
	 * Specifies where bounces should go (Swift Mailer reads this for other uses)
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $returnPath;

	/**
	 * Specifies the address of the person who the message is from. This can be multiple addresses if multiple people wrote the message.
	 *
	 * @ORM\Column(name="`from`", type="json_array", nullable=true)
	 * @var array
	 */
	protected $from;

	/**
	 * Specifies the address of the person who physically sent the message (higher precedence than From:)
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $sender;

	/**
	 * Specifies the addresses of the intended recipients
	 *
	 * @ORM\Column(name="`to`", type="json_array", nullable=true)
	 * @var array
	 */
	protected $to;

	/**
	 * Specifies the addresses of recipients who will be copied in on the message
	 *
	 * @ORM\Column(type="json_array", nullable=true)
	 * @var array
	 */
	protected $cc;

	/**
	 * Specifies the addresses of recipients who the message will be blind-copied to. Other recipients will not be aware of these copies.
	 *
	 * @ORM\Column(type="json_array", nullable=true)
	 * @var array
	 */
	protected $bcc;

	/**
	 * Specifies the address where replies are sent to
	 *
	 * @ORM\Column(type="json_array", nullable=true)
	 * @var array
	 */
	protected $replyTo;

	/**
	 * Specifies the subject line that is displayed in the recipients' mail client
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $subject;

	/**
	 * Specifies the date at which the message was sent
	 *
	 * @ORM\Column(nullable=true)
	 * @var \DateTime
	 */
	protected $date;

	/**
	 * Specifies the format of the message (usually text/plain or text/html)
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $contentType;

	/**
	 * Specifies the encoding scheme in the message
	 *
	 * @ORM\Column(nullable=true)
	 * @var string
	 */
	protected $contentTransferEncoding;

	/**
	 * @ORM\Column(nullable=true, type="text")
	 * @var string
	 */
	protected $body;

	/**
	 * @ORM\Column(nullable=true, type="text")
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
	public function getReturnPath() {
		return $this->returnPath;
	}

	/**
	 * @param string $returnPath
	 * @return $this
	 */
	public function setReturnPath($returnPath) {
		$this->returnPath = $returnPath;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getFrom() {
		return $this->from;
	}

	/**
	 * @param array $from
	 * @return $this
	 */
	public function setFrom($from) {
		$this->from = $from;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSender() {
		return $this->sender;
	}

	/**
	 * @param string $sender
	 * @return $this
	 */
	public function setSender($sender) {
		$this->sender = $sender;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getTo() {
		return $this->to;
	}

	/**
	 * @param array $to
	 * @return $this
	 */
	public function setTo($to) {
		$this->to = $to;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getCc() {
		return $this->cc;
	}

	/**
	 * @param array $cc
	 * @return $this
	 */
	public function setCc($cc) {
		$this->cc = $cc;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getBcc() {
		return $this->bcc;
	}

	/**
	 * @param array $bcc
	 * @return $this
	 */
	public function setBcc($bcc) {
		$this->bcc = $bcc;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getReplyTo() {
		return $this->replyTo;
	}

	/**
	 * @param array $replyTo
	 * @return $this
	 */
	public function setReplyTo($replyTo) {
		$this->replyTo = $replyTo;
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
	public function getContentType() {
		return $this->contentType;
	}

	/**
	 * @param string $contentType
	 * @return $this
	 */
	public function setContentType($contentType) {
		$this->contentType = $contentType;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContentTransferEncoding() {
		return $this->contentTransferEncoding;
	}

	/**
	 * @param string $contentTransferEncoding
	 * @return $this
	 */
	public function setContentTransferEncoding($contentTransferEncoding) {
		$this->contentTransferEncoding = $contentTransferEncoding;
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