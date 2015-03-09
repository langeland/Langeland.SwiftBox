<?php
namespace Langeland\Mailbox\Transport;

/*                                                                        *
 * This script belongs to the FLOW3 package "SwiftMailer".                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * A swift transport that delivers to a text file according to RFC 4155.
 *
 * Originally written by Ernesto Baschny <ernst@cron-it.de>
 */
class LocalboxTransport implements \TYPO3\SwiftMailer\TransportInterface {



	/**
	 *
	 * @var \Langeland\Mailbox\Domain\Repository\MessageRepository
	 * @Flow\Inject
	 */
	protected $messageRepository;

	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;


	/**
	 * @var string The file to write the mails into
	 */
	protected $mboxPathAndFilename;

	/**
	 * Set path and filename of mbox file to use.
	 *
	 * @param string $mboxPathAndFilename
	 */
	public function setMboxPathAndFilename($mboxPathAndFilename) {
		$this->mboxPathAndFilename = $mboxPathAndFilename;
	}

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
	public function start() {}

	/**
	 * No op
	 *
	 * @return void
	 */
	public function stop() {}

	/**
	 * Outputs the mail to a text file according to RFC 4155.
	 *
	 * @param \Swift_Mime_Message $message The message to send
	 * @param array &$failedRecipients Failed recipients (no failures in this transport)
	 * @return integer
	 */
	public function send(\Swift_Mime_Message $message, &$failedRecipients = NULL) {


		$localMessage = new \Langeland\Mailbox\Domain\Model\Message();
		$localMessage->setMessageId($message->getId());
		$localMessage->setSubject($message->getSubject());
		$localMessage->setDate(new \dateTime('@' . $message->getDate()));
//		$localMessage->setFrom($this->getReversePath($message));
		$localMessage->setTo($message->getTo());
		$localMessage->setBody($message->getBody());
		$localMessage->setRawMessage($message->toString());

		$this->messageRepository->add($localMessage);
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
	public function registerPlugin(\Swift_Events_EventListener $plugin) {}

}
