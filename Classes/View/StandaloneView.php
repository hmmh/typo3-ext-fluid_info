<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 hmmh Team TYPO3 <typo3@hmmh.de>, hmmh multimediahaus AG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * A standalone template view.
 * Should be used as view if you want to use Fluid without Extbase extensions
 *
 * @api
 */
class Tx_FluidInfo_View_StandaloneView extends Tx_Fluid_View_StandaloneView {

	/**
	 * @var Tx_FluidInfo_Utility_View
	 */
	protected $view;

	/**
	 * Injects the View
	 *
	 * @param Tx_FluidInfo_Utility_View $view
	 * @return void
	 */
	public function injectView(Tx_FluidInfo_Utility_View $view) {
		$this->view = $view;
		$this->view->setRenderingContext($this->baseRenderingContext);
	}

	/**
	 * Resolves the path and file name of the partial file, based on
	 * $this->getPartialRootPath() and request format and returns the file contents
	 *
	 * @param string $partialName The name of the partial
	 * @return string contents of the layout file if it was found
	 * @throws Tx_Fluid_View_Exception_InvalidTemplateResourceException
	 */
	protected function getPartialSource($partialName) {
		$partialSource = parent::getPartialSource($partialName);
		if ($this->view->showPathInfo()) {
			$partialSource = $this->view->renderPartial($this->getPartialPathAndFilename($partialName), $partialSource);
		}
		return $partialSource;
	}

	/**
	 * Returns the Fluid template source code
	 *
	 * @param string $actionName Name of the action. This argument is not used in this view!
	 * @return string Fluid template source
	 * @throws Tx_Fluid_View_Exception_InvalidTemplateResourceException
	 */
	protected function getTemplateSource($actionName = NULL) {
		$this->templateSource = parent::getTemplateSource($actionName);
		if ($this->view->showPathInfo()) {
			$this->templateSource = $this->view->renderTemplate($this->templatePathAndFilename, $this->templateSource);
		}
		return $this->templateSource;
	}

	/**
	 * Resolves the path and file name of the layout file, based on
	 * $this->getLayoutRootPath() and request format and returns the file contents
	 *
	 * @param string $layoutName Name of the layout to use. If none given, use "Default"
	 * @return string contents of the layout file if it was found
	 * @throws Tx_Fluid_View_Exception_InvalidTemplateResourceException
	 */
	protected function getLayoutSource($layoutName = 'Default') {
		$layoutSource = parent::getLayoutSource($layoutName);
		if ($this->view->showPathInfo()) {
			$layoutSource = $this->view->renderLayout($this->getLayoutPathAndFilename($layoutName), $layoutSource);
		}
		return $layoutSource;
	}
}

?>