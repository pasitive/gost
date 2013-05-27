<?php
/**
 * Class SellerController
 * @package api
 */

class SellerController extends Controller
{
    public function actionIndex($lt, $lg)
    {
        $model = Place::model()->sellers()->byLatLng($lt, $lg)->findAll();

        $result = array();

        /* @var $seller Place */

        foreach ($model as $seller) {

            $images = CJSON::decode($seller->images) ? CJSON::decode($seller->images) : array();

            $item = array(
                'id' => $seller->id,
                'name' => $seller->title,
                'lt' => $seller->location_lat,
                'lg' => $seller->location_lng,
                'type' => $seller->typeid,
                'images' => $images,
                'avg_rating' => 0.0,
            );

            $menus = MenuItem::getCatsChildren($seller->id, 0);
            $item['menus'] = $menus;

            $services = Service::getCatsChildren($seller->id, 0);
            $item['services'] = $services;

            $result[] = $item;
        }

        $response = new Response($result);
        print $response;
    }

}