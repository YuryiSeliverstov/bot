<?php

use yii\db\Migration;

class m230209_155431_mod_trip extends Migration
{
    private string $tableName = '{{%trip}}';
    private string $indexName = 'trip-';
	
	private $tableOptions = null;
	
	private $indexes=
	[
		'tag_le_id',
		'saved_at',
		'updated_at'
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
    }

    public function safeDown()
    {
		echo 'Нельзя обратить'.PHP_EOL;
    }
}
