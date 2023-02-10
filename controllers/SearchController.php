<?php
namespace app\controllers;

use app\models\Trip;
use app\models\TripService;
use app\models\FlightSegment;
use app\models\AirPort;
use Yii;

class SearchController extends ApiController
{
	
	public $modelClass = 'app\models\Trip';
	
	private array $noAuthRoutes=
	[
		'index'
	];
	
	public function behaviors(): array
	{
		$behaviors = parent::behaviors();
		$behaviors['authenticator']['except'] = $this->noAuthRoutes;
		return $behaviors;
	}
	
	/**
	 * @SWG\Get(path="/search",
	 *     tags={"Поиск тура"},
	 *     summary="",
	 *     description="",
	 *     @SWG\Parameter(
	 *		  in ="query",
	 *        name = "trip.corporate_id",
	 *        description = "trip.corporate_id",
	 *        required = true,
	 *        type = "integer",
	 *        default = "3",
	 *     ),
	 *     @SWG\Parameter(
	 *		  in ="query",
	 *        name = "trip_service.service_id",
	 *        description = "trip_service.service_id",
	 *        required = true,
	 *        type = "integer",
	 *        default = "2",
	 *     ),
	 *     @SWG\Parameter(
	 *		  in ="query",
	 *        name = "airport_name.value",
	 *        description = "airport_name.value",
	 *        required = true,
	 *        type = "string",
	 *        default = "Домодедово, Москва",
	 *     ),
	 *     @SWG\Parameter(
	 *		  in ="query",
	 *        name = "offset",
	 *        description = "отступ",
	 *        required = false,
	 *        type = "integer",
	 *        default = "0",
	 *     ),
	 *     @SWG\Parameter(
	 *		  in ="query",
	 *        name = "limit",
	 *        description = "результатов",
	 *        required = false,
	 *        type = "integer",
	 *        default = "10",
	 *     ),		 
	 *     @SWG\Response(
	 *         response = 200,
	 *         description = "true",
	 *     ),	 
	 *     @SWG\Response(
	 *         response = 406,
	 *         description = "false",
	 *     )
	 * )
	 *
	 */
	public function actionIndex(int $trip_corporate_id=0, int $trip_service_service_id=0, string $airport_name_value='', int $offset=0, int $limit=10): array
	{
		$airportIds=array_keys(AirPort::find()->select('airport_id')->where(['LIKE','value',$airport_name_value])->indexBy('airport_id')->asArray()->limit(5)->all());
		$q=Trip::find();
		$q
			->where(['corporate_id'=>$trip_corporate_id])
			->joinWith('flightSegment')
			->andWhere(['tripServiceServiceId'=>$trip_service_service_id])
			->andWhere(['depAirportId'=>$airportIds]);
		
		#echo $q->createCommand()->getRawSql();
		#die();
		
		return $q->orderBy(['id'=>SORT_DESC])->offset($offset)->limit($limit)->all();
	}
}