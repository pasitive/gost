<?php

class TourController extends Controller
{
    /**
     * @param $category_id
     * @return array
     */
    public function actionIndex($category_id)
    {
        $tours = Tour::model()->findAll('catid=:catid', array(':catid'=>$category_id));

        $ret = array();
        foreach ( $tours as $tour ) {
            $new = &$ret[];
            $new['id'] = $tour->id;
            $new['name'] = $tour->title;
            $new['desc'] = $tour->desc;
            $new['images'] = array();
            foreach ( $tour->images as $image ) {
                $new['images'][] = $image->img;
            }
        }

        $response = new Response($ret);
        print $response;

    }

}