<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Альберт
 * Date: 27.05.13
 * Time: 16:52
 * To change this template use File | Settings | File Templates.
 */

class ReviewController extends Controller
{
    /**
     * @param $place_id
     * @return array
     */
    public function actionIndex($place_id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'placeid=:placeid';
        $criteria->order = 'id DESC';
        $criteria->params = array(':placeid'=>$place_id);

        $reviews = PlaceReview::model()->findAll($criteria);

        $ret = array();

        foreach ( $reviews as $review ) {
            $new = &$ret[];
            $new['id'] = $review->id;
            $new['rating'] = $review->rating;
            $new['text'] = $review->text;
            $new['updated'] = $review->update_time;
        }

        /*

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

        */

        $response = new Response($ret);
        print $response;

    }

}