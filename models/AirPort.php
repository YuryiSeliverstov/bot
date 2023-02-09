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
 * @SWG\Property(property="airport_id", type="integer")
 * @SWG\Property(property="language_id", type="integer")
 * @SWG\Property(property="value", type="string")
 */
class AirPort extends ActiveRecord
{	
	public static function getDb() 
	{
		return Yii::$app->db2;
	}
	
    public static function tableName(): string
    {
        return 'airport_name';
    }

    public function rules(): array
    {
        return [
			[['airport_id','language_id'], 'integer'],
            [['value'], 'string','max'=>255]
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'airport_id' 	=> 	'id Аэропорта',
            'language_id' 	=> 	'id Языка',
            'value' 		=> 	'Наименование'
        ];
    }
}
