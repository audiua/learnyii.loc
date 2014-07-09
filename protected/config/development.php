<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=learnyii',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '0000',
				'charset' => 'utf8',
			)
		),
		'params'=>array(
			'test'=>''
		),
	)
);
