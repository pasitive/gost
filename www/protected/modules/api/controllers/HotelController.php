<?php

class HotelController extends Controller
{
    /**
     * @param $lt
     * @param $lg
     */
    public function actionIndex($lt, $lg)
    {
        $model = Place::model()->hotels()->byLatLng($lt, $lg)->findAll();

        $result = array();

        /* @var $hotel Place */

        foreach ($model as $hotel) {

            $images = CJSON::decode($hotel->images) ? CJSON::decode($hotel->images) : array();

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