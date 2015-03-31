<?php
namespace Langeland\SwiftBox\Transport;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.SwiftBox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * A swift transport that delivers to a text file according to RFC 4155.
 *
 * Originally written by Ernesto Baschny <ernst@cron-it.de>
 */
class SwiftBoxTransport implements \TYPO3\SwiftMailer\TransportInterface {

	/**
	 *
	 * @var \Langeland\SwiftBox\Domain\Repository\MessageRepository
	 * @Flow\Inject
	 */
	protected $messageRepository;

	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * The mbox transport is always started
	 *
	 * @return boolean Always TRUE for this transport
	 */
	public function isStarted() {
		return TRUE;
	}

	/**
	 * No op
	 *
	 * @return void
	 */
	public function start() {
	}

	/**
	 * No op
	 *
	 * @return void
	 */
	public function stop() {
	}

	/**
	 * Outputs the mail to a text file according to RFC 4155.
	 *
	 * @param \Swift_Mime_Message $message The message to send
	 * @param array &$failedRecipients Failed recipients (no failures in this transport)
	 * @return integer
	 */
	public function send(\Swift_Mime_Message $message, &$failedRecipients = NULL) {

		$swiftBoxMessage = new \Langeland\SwiftBox\Domain\Model\Message();

		$swiftBoxMessage->setMessageId($message->getId())
			->setReturnPath($message->getReturnPath())
			->setFrom($message->getFrom())
			->setSender($message->getSender())
			->setTo($message->getTo())
			->setCc($message->getCc())
			->setBcc($message->getBcc())
			->setReplyTo($message->getReplyTo())
			->setSubject($message->getSubject())
			->setDate(new \dateTime('@' . $message->getDate()))
			->setContentType($message->getContentType());

//		$swiftBoxMessage->setContentTransferEncoding($message->getEncoder());

		$swiftBoxMessage->setBody($message->getBody())
			->setRawMessage($message->toString());


//		die($message->getContentType());

		$this->messageRepository->add($swiftBoxMessage);
		$this->persistenceManager->persistAll();

		// Return every receipient as "delivered"
		return count((array)$message->getTo()) + count((array)$message->getCc()) + count((array)$message->getBcc());
	}

	/**
	 * Determine the best-use reverse path for this message
	 *
	 * @param \Swift_Mime_Message $message
	 * @return mixed|NULL
	 */
	private function getReversePath(\Swift_Mime_Message $message) {
		$returnPath = $message->getReturnPath();
		$sender = $message->getSender();
		$from = $message->getFrom();
		$path = NULL;
		if (!empty($returnPath)) {
			$path = $returnPath;
		} elseif (!empty($sender)) {
			$keys = array_keys($sender);
			$path = array_shift($keys);
		} elseif (!empty($from)) {
			$keys = array_keys($from);
			$path = array_shift($keys);
		}
		return $path;
	}

	/**
	 * No op
	 *
	 * @param \Swift_Events_EventListener $plugin
	 * @return void
	 */
	public function registerPlugin(\Swift_Events_EventListener $plugin) {
	}

}
