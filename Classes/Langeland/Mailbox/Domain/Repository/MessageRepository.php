<?php
namespace Langeland\Mailbox\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class MessageRepository extends Repository {

	var $defaultOrderings = array('date' => \TYPO3\Flow\Persistence\QueryInterface::ORDER_ASCENDING);

	/**
	 * Returns all objects of this repository
	 *
	 * @return \TYPO3\Flow\Persistence\QueryResultInterface The query result
	 * @api
	 * @see \TYPO3\Flow\Persistence\QueryInterface::execute()
	 */

	/**
	 * @param string $queryString
	 * @return \TYPO3\Flow\Persistence\QueryResultInterface The query result
	 */
	public function findByQuery($queryString) {
		$query = $this->createQuery();

		$constraints = array(
			$query->like('subject', '%' . $queryString . '%', FALSE),
			$query->like('from', '%' . $queryString . '%', FALSE),
			$query->like('to', '%' . $queryString . '%', FALSE)
		);

		$query->matching(
			$query->logicalOr($constraints)
		);

		return $query->execute();

	}


}