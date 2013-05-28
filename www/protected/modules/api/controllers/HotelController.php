<?php

/**
 * Class HotelController
 * @package api
 */

class HotelController extends Controller
{
    /**
     * Method handles /api/hotel api request
     *
     * @api
     *
     * @param float $lt
     * @param float $lg
     */
    public function actionIndex($lt, $lg)
    {
        $model = Place::model()->hotels()->byLatLng($lt, $lg)->findAll();

        $result = array();

        /* @var $hotel Place */

        foreach ($model as $hotel) {

            $images = CJSON::decode($hotel->images) ? CJSON::decode($hotel->images) : array();
            if (!empty($images)) {
                foreach ($images as $index => $image) {
                    $images[$index] = Yii::app()->request->getBaseUrl(true) . $hotel->getImageByName($image);
                }
            }

            $item = array(
                'id' => $hotel->id,
                'name' => $hotel->title,
                'lt' => $hotel->location_lat,
                'lg' => $hotel->location_lng,
                'type' => $hotel->typeid,
                'images' => $images,
                'avg_rating' => 0.0,
            );

            $menus = MenuItem::getCatsChildren($hotel->id, 0);
            $item['menus'] = $menus;

            $services = Service::getCatsChildren($hotel->id, 0);
            $item['services'] = $services;

            $result[] = $item;
        }

        $response = new Response($result);
        print $response;
    }
}