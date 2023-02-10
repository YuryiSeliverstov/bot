<?php

use yii\db\Migration;

class m230209_155434_mod_flight_segment extends Migration
{
	private string $tableName = '{{%flight_segment}}';
    private string $indexName = 'flight_segment-';
	
	private $indexes=
	[
		'tripId',
		'tripServiceServiceId'
	];
	
	private function addedColumns()
	{
		return [
			'tripId'					=>	$this->integer()->comment('trip.id'),
			'tripServiceServiceId'		=>	$this->integer()->comment('trip_service.service_id')
		];
	}
	
    public function safeUp()
    {
		foreach ($this->addedColumns() as $columnName=>$columnType)
		{
			$this->addColumn($this->tableName,$columnName,$columnType);
		}
		
		foreach ($this->indexes as $k=>$v)
		{
			$this->createIndex($this->indexName.$v, $this->tableName, $v);
		}
		
		/*
			Fill From trip_service
		*/
		$q='UPDATE '.$this->tableName.' fs LEFT JOIN
			`trip_service` ts
			ON      fs.flight_id = ts.id
			SET     fs.tripId = ts.trip_id, fs.tripServiceServiceId=ts.service_id';
		
		Yii::$app->db->createCommand($q)->execute();
    }

    public function safeDown()
    {
		echo 'Нельзя обратить'.PHP_EOL;
    }
}
