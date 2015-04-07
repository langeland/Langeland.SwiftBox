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

		$contextStrings = array('Development', 'Production', 'Testing');
		$contextConfigurations = array();

		foreach ($contextStrings AS $contextString) {
			$output = [];

			$cmd = vsprintf('FLOW_CONTEXT=%s %sflow swiftbox:configuration:show', array(
				$contextString,
				FLOW_PATH_ROOT
			));

			exec($cmd, $output, $result);

			if ($result === 0) {
				$configurations = json_decode($output[0], TRUE);
				$contextConfigurations[$contextString] = array(
					'check' => ($configurations['transport']['type'] == 'Langeland\SwiftBox\Transport\SwiftBoxTransport') ? TRUE : FALSE,
					'source' => \Symfony\Component\Yaml\Yaml::dump($configurations, 99, 2)
				);
			} else {
				$contextConfigurations[$contextString] = array(
					'check' => FALSE,
					'source' => 'N/A'
				);
			}

		}

		$this->view->assign('contextConfigurations', $contextConfigurations);

	}

}