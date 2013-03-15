<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$extPath = t3lib_extMgm::extPath($_EXTKEY);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'FluidInfo');

$GLOBALS['TYPO3_CONF_VARS']['typo3/backend.php']['additionalBackendItems'][] =
	$extPath . 'registerToolbarItem.php';

$TYPO3_CONF_VARS['BE']['AJAX']['Tx_FluidInfo_Utility_Toolbar::executeAjaxRequest'] =
	$extPath . 'Classes/Utility/Toolbar.php:Tx_FluidInfo_Utility_Toolbar->executeAjaxRequest';
?>