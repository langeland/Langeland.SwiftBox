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
	 * @param string $q
	 * @return void
	 */
	public function indexAction($q = null) {

		if($q){
			die('Searching for: ' . $q);
		}

		$messages = $this->messageRepository->findAll();

		$this->view->assign('messages', $messages);
	}

	/**
	 * @param \Langeland\Mailbox\Domain\Model\Message $message
	 * @return void
	 */
	public function showAction(\Langeland\Mailbox\Domain\Model\Message $message) {

//		\TYPO3\Flow\var_dump($message->getRawMessage());
//		echo get_resource_type($message->getRawMessage());
		$this->view->assign('message', $message);
	}

}