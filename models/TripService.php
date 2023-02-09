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
 * @SWG\Property(property="id", type="string")
 * @SWG\Property(property="name", type="string")
 * @SWG\Property(property="description", type="string")
 * @SWG\Property(property="createdAt", type="integer")
 * @SWG\Property(property="updatedAt", type="integer")
 */
class TripService extends ActiveRecord
{	
    public static function tableName(): string
    {
        return 'trip_service';
    }

    public function rules(): array
    {
        return [
			[['trip_id','service_id'],'integer'],
        ];
    }
	
	public function getTrip()
	{
		return $this->hasOne();
	}

    public function attributeLabels(): array
    {
        return [
            'id' 			=> 	'id',
            'name' 			=> 	'Наименование',
            'description' 	=> 	'Описание',
			'createdAt'		=>	'Дата создания',
			'updatedAt'		=>	'Дата изменения'
        ];
    }
}
