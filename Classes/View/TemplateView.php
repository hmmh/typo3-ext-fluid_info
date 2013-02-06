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
 * The main template view. Should be used as view if you want Fluid Templating
 *
 * @api
 */
class Tx_FluidInfo_View_TemplateView extends Tx_Fluid_View_TemplateView {

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
	 * Figures out which partial to use.
	 *
	 * @param string $partialName The name of the partial
	 * @return string contents of the partial template
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
	 * Resolve the template path and filename for the given action. If $actionName
	 * is NULL, looks into the current request.
	 *
	 * @param string $actionName Name of the action. If NULL, will be taken from request.
	 * @return string Full path to template
	 * @throws Tx_Fluid_View_Exception_InvalidTemplateResourceException
	 */
	protected function getTemplateSource($actionName = NULL) {
		$templateSource = parent::getTemplateSource($actionName);
		if ($this->view->showPathInfo()) {
			$templateSource = $this->view->renderTemplate($this->getTemplatePathAndFilename($actionName), $templateSource);
		}
		return $templateSource;
	}

	/**
	 * Resolve the path and file name of the layout file, based on
	 * $this->layoutPathAndFilename and $this->layoutPathAndFilenamePattern.
	 *
	 * In case a layout has already been set with setLayoutPathAndFilename(),
	 * this method returns that path, otherwise a path and filename will be
	 * resolved using the layoutPathAndFilenamePattern.
	 *
	 * @param string $layoutName Name of the layout to use. If none given, use "Default"
	 * @return string contents of the layout template
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