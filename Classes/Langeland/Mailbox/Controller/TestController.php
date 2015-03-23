<?php
namespace Langeland\Mailbox\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.Mailbox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class TestController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @return void
	 */
	public function sendTestMailsAction() {
		$mail = new \TYPO3\SwiftMailer\Message();
		$mail->setFrom('from@server.dk', 'From name')
			->setTo(array('to@server.tld' => 'To name'))
			->setSubject('Plain tekst message')
			->setBody(file_get_contents('resource://Langeland.Mailbox/Private/MailContent/PlainText.txt'), 'text/plain')
			->send();

		$mail = new \TYPO3\SwiftMailer\Message();
		$mail->setFrom('from@server.dk', 'From name')
			->setTo(array('to1@server.tld' => 'To name 1', 'to2@server.tld', 'to3@server.tld' => 'To name 3'))
			->setSubject('Plain tekst message, with multiple recivers')
			->setBody(file_get_contents('resource://Langeland.Mailbox/Private/MailContent/PlainText.txt'), 'text/plain')
			->send();

		$mail = new \TYPO3\SwiftMailer\Message();
		$mail->setFrom('from@server.dk', 'From name')
			->setTo(array('to@server.tld' => 'To name'))
			->setSubject('Multi part message')
			->setBody(file_get_contents('resource://Langeland.Mailbox/Private/MailContent/PlainText.txt'), 'text/plain')
			->addPart('Part 2: ' . file_get_contents('resource://Langeland.Mailbox/Private/MailContent/PlainText.txt'), 'text/html')
			->send();

		$this->redirect('index', 'SwiftBox');
	}

}