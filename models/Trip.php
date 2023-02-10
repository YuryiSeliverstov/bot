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
 * @SWG\Property(property="corporate_id", type="integer")
 */
class Trip extends ActiveRecord
{	
    public static function tableName(): string
    {
        return 'trip';
    }

    public function rules(): array
    {
        return [
			[['corporate_id'], 'integer'],
		];
    }

    public function attributeLabels(): array
    {
        return [
            'id' 			=> 	'id',
            'corporate_id' 	=> 	'id Корпорации'
        ];
    }
	
	public function getTripService()
	{
		return $this->hasMany(TripService::className(), ['trip_id' => 'id']);
	}
	
	public function getFlightSegment()
	{
		return $this->hasMany(FlightSegment::className(), ['tripId' => 'id']);
	}
}
