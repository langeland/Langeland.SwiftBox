<?php
namespace Langeland\Mailbox\View\SwiftBox;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ShowMessage extends \TYPO3\Flow\Mvc\View\AbstractView {

	/**
	 * @return string
	 */
	public function render() {

		/** @var \Langeland\Mailbox\Domain\Model\Message $message */
		$message = $this->variables['message'];

		$this->controllerContext->getResponse()->setHeader('Content-Type', $message->getContentType());
		return $message->getBody();

	}
}