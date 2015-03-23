<?php
namespace Langeland\Mailbox\View\SwiftBox;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ShowData extends \TYPO3\Flow\Mvc\View\AbstractView {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @return void
	 */
	public function injectUriBuilder() {
		$this->uriBuilder = $this->controllerContext->getUriBuilder();
	}

	/**
	 * @return string
	 */
	public function render() {

		/** @var \Langeland\Mailbox\Domain\Model\Message $message */
		$message = $this->variables['message'];
		$uriBuilder = $this->controllerContext->getUriBuilder();

		$messageData = array(
			'identifier' => $this->persistenceManager->getIdentifierByObject($message),
			'subject' => $message->getSubject(),
			'date' => $message->getDate()->format('l, j M Y - g:i:s A'),
			'from' => $message->getFrom(),
			'to' => $message->getTo(),
			'showUrl' => $uriBuilder->setCreateAbsoluteUri(TRUE)->reset()->uriFor('show', array('message' => $message)),
			'messageUrl' => $uriBuilder->setCreateAbsoluteUri(TRUE)->reset()->setFormat('message')->uriFor('show', array('message' => $message)),
			'sourceUrl' => $uriBuilder->setCreateAbsoluteUri(TRUE)->reset()->setFormat('source')->uriFor('show', array('message' => $message)),
			'deleteUrl' => $uriBuilder->setCreateAbsoluteUri(TRUE)->reset()->uriFor('delete', array('message' => $message)),
		);

		return json_encode($messageData);
	}
}