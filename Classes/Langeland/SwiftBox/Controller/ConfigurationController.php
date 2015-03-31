<?php
namespace Langeland\SwiftBox\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.SwiftBox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ConfigurationController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Configuration\ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @return void
	 */
	public function indexAction() {
		$currentContextConfiguration = $this->configurationManager->getConfiguration(\TYPO3\Flow\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.SwiftMailer');

		$this->view->assignMultiple(array(
				'currentContextConfigurationCheck' => ($currentContextConfiguration['transport']['type'] == 'Langeland\SwiftBox\Transport\SwiftBoxTransport') ? TRUE : FALSE,
				'currentContextConfigurationPre' => \Symfony\Component\Yaml\Yaml::dump($currentContextConfiguration, 99, 2)
			));

//		$contextStrings = array('Development', 'Production', 'Testing');
//		$contextConfigurations = array();
//
//		foreach($contextStrings AS $contextString){
//
//			$applicationContext = new \TYPO3\Flow\Core\ApplicationContext($contextString);
//
//			$contextConfigurationManager = $this->objectManager->get('\TYPO3\Flow\Configuration\ConfigurationManager', $applicationContext);
//
//			//$contextConfigurationManager = new \TYPO3\Flow\Configuration\ConfigurationManager($applicationContext);
//
//			$contextConfigurations[$contextString] = \Symfony\Component\Yaml\Yaml::dump(
//				$contextConfigurationManager->getConfiguration(\TYPO3\Flow\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.SwiftMailer'),
//				99, 2);
//
////			$contextConfigurations[$contextString] =  $contextConfigurationManager->getConfiguration(\TYPO3\Flow\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, 'TYPO3.SwiftMailer');
//
//		}
//
//		$this->view->assign('contextConfigurations', $contextConfigurations);

	}

}