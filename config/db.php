<?php
	return 
	[
		'db' => 
		[
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=cbt',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8'
		],
		'db2'=>
		[
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=nemo_guide_etalon',
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8'
		]
	];