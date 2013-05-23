<?php

class HotelController extends Controller
{
    /**
     * @param $lt
     * @param $lg
     */
    public function actionIndex($lt, $lg)
	{
		$model = Place::model()->hotels()->findAll();
        $response = new Response($model);
        print $response;
	}
}