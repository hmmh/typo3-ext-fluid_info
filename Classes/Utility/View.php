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
 * View Helper
 *
 * @api
 */
class Tx_FluidInfo_Utility_View {

	/**
	 * show Path info
	 *
	 * @return bool
	 */
	public function showPathInfo() {
		$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['fluid_info']);
		return !empty($settings['showPathInfo']);
	}

	/**
	 * show Var info
	 *
	 * @return bool
	 */
	public function showVarInfo() {
		$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['fluid_info']);
		return !empty($settings['showVariable']);
	}

	/**
	 * Sets a fresh rendering context
	 *
	 * @param Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext
	 * @return void
	 */
	public function setRenderingContext(Tx_Fluid_Core_Rendering_RenderingContextInterface $renderingContext) {
		$this->baseRenderingContext = $renderingContext;
	}

	/**
	 * render Partial with info
	 *
	 * @param string $path
	 * @param string $content
	 * @return string
	 */
	public function renderPartial($path, $content) {
		return $this->render($path, $content, 'fluid_path_info_partial');
	}

	/**
	 * render Template with info
	 *
	 * @param string $path
	 * @param string $content
	 * @return string
	 */
	public function renderTemplate($path, $content) {
		return $this->render($path, $content, 'fluid_path_info_template');
	}

	/**
	 * render Layout with info
	 *
	 * @param string $path
	 * @param string $content
	 * @return string
	 */
	public function renderLayout($path, $content) {
		return $this->render($path, $content, 'fluid_path_info_layout');
	}

	/**
	 * render Content with info
	 *
	 * @param string $path
	 * @param string $content
	 * @param string $class CSS-Class
	 * @return string
	 */
	protected function render($path, $content, $class) {
		$html  = '<div class="' . $class . '"><h5 class="' . $class . '">' . $path;
		$html .= ($this->showVarInfo()) ? '&nbsp;<a href="#" onclick="$(this).parent().next().slideToggle(0); return false;">(Variables)</a></h5>' : '</h5>';
		$html .= ($this->showVarInfo()) ? '<div class="fluid_path_info_identifiers">' . $this->renderVarInfo() . '</div>' : '';
		$html .= $content;
		$html .= '</div>';

		return $html;
	}

	/**
	 * render var info
	 *
	 * @return string
	 */
	protected function renderVarInfo() {
		$var = array();
		$templateVariableContainer = $this->baseRenderingContext->getTemplateVariableContainer();
		$identifiers = $templateVariableContainer->getAllIdentifiers();

		foreach ($identifiers as $identifier) {
			$variable = $templateVariableContainer->get($identifier);
			if (is_object($variable)) {
				$var[$identifier] = get_class($variable);
			} else {
				$var[$identifier] = gettype($variable);
			}
		}

		$html = '';
		foreach ($var as $identifier => $type) {
			$html .= '<p><strong>' . $identifier . '</strong> => ' . $type . '</p>';
		}

		return $html;
	}
}

?>