<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'FluidInfo',
	'description' => 'Developer Extension to show fluid template infos',
	'category' => 'plugin',
	'author' => 'hmmh Team TYPO3',
	'author_email' => 'typo3@hmmh.de',
	'author_company' => 'hmmh multimediahaus AG',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '4.7',
			'fluid' => '1.3',
			'typo3' => '4.7',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>