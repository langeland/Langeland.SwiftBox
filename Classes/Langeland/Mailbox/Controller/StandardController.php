<?php
namespace Langeland\Mailbox\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController {

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
	 * @return void
	 */
	public function indexAction() {

		$messages = $this->messageRepository->findAll();

		$this->view->assign('messages', $messages);
	}

}