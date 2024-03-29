<?php

/**
 * Class TourController
 * @package api
 */

class TourController extends Controller
{
    /**
     * @param $place_id
     * @return array
     */
    public function actionIndex($place_id = "")
    {
        if (!empty($place_id)) {
            $place = Place::model()->findByPk($place_id);
            if (empty($place))
                throw new CHttpException(404, 'Неверный ID места');
            $cats = TourCat::getCatsChildren($place->id, 0);
        } else {
            $cats = TourCat::getCatsChildren(null, 0);
        }

        $response = new Response($cats);
        print $response;
    }
}