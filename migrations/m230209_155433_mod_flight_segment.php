<?php

use yii\db\Migration;

class m230209_155433_mod_flight_segment extends Migration
{
    private string $tableName = '{{%flight_segment}}';
    private string $indexName = 'flight_segment-';
	
	private $tableOptions = null;
	
	private $indexes=
	[
		'num',
		'departureTerminal',
		'arrivalTerminal',
		'flightNumber',
		'departureDate',
		'arrivalDate',
		'stopNumber',
		'flightTime',
		'eTicket',
		'bookingClass',
		'bookingCode',
		'baggageValue',
		'baggageUnit',
		'depAirportId',
		'arrAirportId',
		'opCompanyId',
		'markCompanyId',
		'aircraftId',
		'depCityId',
		'arrCityId',
		'supplierRef',
		'arrTimestamp'
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
            'fk-' . $this->indexName . 'flight_id',
            $this->tableName,
            'flight_id',
            '{{%trip_service}}',
            'id',
            'CASCADE'
        );
		
		$this->addForeignKey(
            'fk-' . $this->indexName . 'depAirportId',
            $this->tableName,
            'depAirportId',
            '`nemo_guide_etalon`.{{%airport_name}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
		echo 'Нельзя обратить'.PHP_EOL;
    }
}
