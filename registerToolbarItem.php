<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

if (TYPO3_MODE == 'BE') {
		// first include the class file
	require_once(t3lib_extMgm::extPath('fluid_info') . 'Classes/Utility/Toolbar.php');

		// now register the class as toolbar item
	$GLOBALS['TYPO3backend']->addToolbarItem('fluidinfo', 'Tx_FluidInfo_Utility_Toolbar');
}

?>