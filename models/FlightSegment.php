<?php

namespace app\models;

use Exception;
use Swagger\Annotations as SWG;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\BaseActiveRecord;
use yii\behaviors\TimestampBehavior;

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
}
