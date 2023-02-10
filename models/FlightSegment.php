<?php

namespace app\models;

use Exception;
use Swagger\Annotations as SWG;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @SWG\Definition()
 * @SWG\Property(property="id", type="integer")
 * @SWG\Property(property="flight_id", type="integer")
 * @SWG\Property(property="depAirportId", type="integer")
 */
class FlightSegment extends ActiveRecord
{	
    public static function tableName(): string
    {
        return 'flight_segment';
    }

    public function rules(): array
    {
        return [
			[['flight_id','depAirportId'],'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'flight_id' 			=> 	'flight_id',
            'depAirportId' 			=> 	'depAirportId'
        ];
    }
	
	public function getAirport():ActiveQuery
	{
		return $this->hasOne(AirPort::class, ['depAirportId' => 'airport_id']);
	}
}
