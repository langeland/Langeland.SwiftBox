<?php
namespace Langeland\SwiftBox\ViewHelpers\Format;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Langeland.SwiftBox".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\Fluid\Core\ViewHelper;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\Fluid\Core\ViewHelper\Exception;
use TYPO3\Fluid\Core\ViewHelper\Facets\CompilableInterface;

/**
 * Class EmailViewHelper
 *
 * @author Jon Klixbüll Langeland <jon@moc.net>
 * @package Langeland\SwiftBox\ViewHelpers\Format
 */
class EmailViewHelper extends AbstractViewHelper {

	protected $escapeOutput = FALSE;

	/**
	 * @param array $emails
	 * @return string
	 */
	public function render($emails) {


		foreach ($emails as $email => $name) {
			if ($name == NULL) {
				$a[] = '<span class="label label-primary" data-toggle="tooltip" data-placement="right" title="' . $email . '">' . $email . '</span>';
			} else {
				$a[] = '<span class="label label-primary" data-toggle="tooltip" data-placement="right" title="' . $email . '">' . $name . '</span>';
			}
		}
		return implode(' ', $a);
	}

}
