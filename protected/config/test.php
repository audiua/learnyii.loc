<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=learnyii_test',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '0000',
				'charset' => 'utf8',
			)
		),
		'params'=>array(
			'test'=>'/index-test.php'
		),
	)
);
