<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "fluid_info".
 *
 * Auto generated 15-03-2013 11:11
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'FluidInfo',
	'description' => 'Developer Extension to show fluid template infos. See https://github.com/hmmh/typo3-ext-fluid_info',
	'category' => 'plugin',
	'author' => 'hmmh Team TYPO3',
	'author_email' => 'typo3@hmmh.de',
	'author_company' => 'hmmh multimediahaus AG',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '4.7',
			'fluid' => '1.3',
			'typo3' => '4.7-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:17:{s:21:"ext_conf_template.txt";s:4:"9973";s:12:"ext_icon.gif";s:4:"e922";s:14:"ext_tables.php";s:4:"ca96";s:9:"README.md";s:4:"4324";s:23:"registerToolbarItem.php";s:4:"a69f";s:27:"Classes/Utility/Toolbar.php";s:4:"9ea5";s:24:"Classes/Utility/View.php";s:4:"c195";s:31:"Classes/View/StandaloneView.php";s:4:"a881";s:29:"Classes/View/TemplateView.php";s:4:"2232";s:38:"Configuration/TypoScript/constants.txt";s:4:"d41d";s:34:"Configuration/TypoScript/setup.txt";s:4:"df67";s:46:"Resources/Private/Language/de.locallang_db.xlf";s:4:"26e4";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"88fd";s:38:"Resources/Public/Icons/toolbar_off.png";s:4:"425e";s:37:"Resources/Public/Icons/toolbar_on.png";s:4:"7a73";s:48:"Resources/Public/JavaScript/fluidinfo_toolbar.js";s:4:"a36f";s:14:"doc/manual.rst";s:4:"d682";}',
);

?>