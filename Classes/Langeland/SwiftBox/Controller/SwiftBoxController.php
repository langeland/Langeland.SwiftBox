<?php
namespace Langeland\SwiftBox\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.SwiftBox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class SwiftBoxController extends \TYPO3\Flow\Mvc\Controller\ActionController {

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
	 * @param string $q
	 * @return void
	 */
	public function indexAction($q = null) {

		if ($q) {
			$messages = $this->messageRepository->findByQuery($q);
			$this->view->assign('searchQuery', $q);
		} else {
			$messages = $this->messageRepository->findAll();
		}

		$this->view->assign('messages', $messages);
	}

	/**
	 * @param \Langeland\SwiftBox\Domain\Model\Message $message
	 * @return void
	 */
	public function showAction(\Langeland\SwiftBox\Domain\Model\Message $message) {
		$this->view->assign('message', $message);
	}

	/**
	 * @param \Langeland\SwiftBox\Domain\Model\Message $message
	 * @return void
	 */
	public function deleteAction(\Langeland\SwiftBox\Domain\Model\Message $message) {
		$this->messageRepository->remove($message);
		$this->persistenceManager->persistAll();
		$this->redirect('index');
	}

	/**
	 * @return void
	 */
	public function deleteAllAction() {
		$this->messageRepository->removeAll();
		$this->persistenceManager->persistAll();
		$this->redirect('index');
	}

}