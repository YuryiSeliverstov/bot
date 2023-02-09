<?php

use yii\db\Migration;

class m230209_155432_mod_trip_service extends Migration
{
    private string $tableName = '{{%trip_service}}';
    private string $indexName = 'trip_service-';
	
	private $tableOptions = null;
	
	private $indexes=
	[
		'price',
		'currency'
	];
	
	private $dropColumns=
	[
	];
	
	private $addColumns=
	[
		
	];
	
    public function safeUp()
    {
		foreach ($this->dropColumns as $k=>$columnName)
		{
			$this->dropColumn($this->tableName,$columnName);
		}
		
		foreach ($this->addColumns as $columnName=>$columnType)
		{
			$this->addColumn($columnName,$columnType);
		}
		
		foreach ($this->indexes as $k=>$v)
		{
			$this->createIndex($this->indexName.$v, $this->tableName, $v);
		}
		
		$this->addForeignKey(
            'fk-' . $this->indexName . 'trip_id',
            $this->tableName,
            'trip_id',
            '{{%trip}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
		echo 'Нельзя обратить'.PHP_EOL;
    }
}
