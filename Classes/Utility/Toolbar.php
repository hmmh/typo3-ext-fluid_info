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

require_once(PATH_typo3 . 'interfaces/interface.backend_toolbaritem.php');
$GLOBALS['LANG']->includeLLFile('EXT:fluid_info/Resources/Private/Languages/locallang_db.xlf');

/**
 * Toolbar icon to enable or disable fluid information (for admin users only)
 *
 */
class Tx_FluidInfo_Utility_Toolbar implements backend_toolbarItem {

	private $backendReference;
	private $extkey = 'fluid_info';
	private $settings;

	/**
	 * Constructor
	 *
	 * @param TYPO3backend TYPO3 backend object reference
	 */
	public function __construct(TYPO3backend &$backendReference = NULL) {
		$this->backendReference = $backendReference;
		$this->settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['fluid_info']);
	}

	/**
	 * Checks wether the User is an admin user
	 *
	 * @return  boolean  true if user has access, false if not
	 */
	public function checkAccess() {
		return $GLOBALS['BE_USER']->isAdmin();
	}

	/**
	 * Renders the toolbar item
	 *
	 * @return string the toolbar item
	 */
	public function render() {
		$this->addJavascriptToBackend();

		if ($this->settings['showPathInfo'] == '0' || empty($this->settings['showPathInfo'])) {
			$status = 'off';
		} else {
			$status = 'on';
		}

		$title = $GLOBALS['LANG']->getLL('toolbaritem.title', TRUE);
		$html = '<a class="toolbar-item ' . $status .
				'" href="ajax.php?ajaxID=Tx_FluidInfo_Utility_Toolbar::executeAjaxRequest"><img src="' .
				t3lib_extMgm::extRelPath($this->extkey) . 'Resources/Public/Icons/toolbar_' . $status . '.png"' .
				' alt="' . $title . '" title="' . $title . '" /></a>';

		return $html;
	}

	/**
	 * Processes the AJAX request and writes config settings to localconf.php
	 *
	 * @return void
	 */
	public function executeAjaxRequest() {
		$valArr = array();
		if ($this->settings['showPathInfo'] == '0' || empty($this->settings['showPathInfo'])) {
			$valArr['showPathInfo'] = '1';
		} else {
			$valArr['showPathInfo'] = '0';
		}
		if (!empty($this->settings['showVariable'])) {
			$valArr['showVariable'] = $this->settings['showVariable'];
		}
		$key = '$TYPO3_CONF_VARS[\'EXT\'][\'extConf\'][\'fluid_info\']';
		$value = '\'' . serialize($valArr) . '\'';
		$instObj = t3lib_div::makeInstance('t3lib_install');
		$instObj->allowUpdateLocalConf = 1;
		$instObj->updateIdentity = 'EXT:fluid_info';
		$lines = $instObj->writeToLocalconf_control();
		$instObj->setValueInLocalconfFile($lines, $key, $value, FALSE);
		$result = $instObj->writeToLocalconf_control($lines);
	}

	/**
	 * Returns additional attributes for the list item in the toolbar
	 *
	 * @return string list item HTML attibutes
	 */
	public function getAdditionalAttributes() {
		return ' id="tx-fluidinfo-toolbar"';
	}

	/**
	 * Adds the neccessary javascript ot the backend
	 *
	 * @return void
	 */
	protected function addJavascriptToBackend() {
		$this->backendReference->addJavascriptFile(
			t3lib_extMgm::extRelPath($this->extkey) . 'Resources/Public/JavaScript/fluidinfo_toolbar.js');
	}

}

?>