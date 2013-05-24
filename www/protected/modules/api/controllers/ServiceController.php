<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:40 PM
 */

class ServiceController extends Controller
{
    public function actionIndex($hotelId)
    {

        $place = Place::model()->findByPk($hotelId);
        if ( empty($place) )
            throw new CHttpException(404, 'Неверный ID места');

        $cats = $this->_getCatsChildren($place->id, 0);

        $response = new Response($cats);
        print $response;

        /*array(
            'name' => 'qwe',
            'items' => array(
                'item1' => array(
                    'price'
                ),
            ),
            'categories' => array(
                'name' => 'qwe1.1',
                'items' => array(
                    'item1' => array(
                        'name',
                        'desc', // text
                        'image',
                    ),
                ),
                'categories' => array(
                ),
            ),
        );*/
    }

    private function _getCatsChildren($placeid, $pid) {
        $cats =  ServiceCat::model()->findAll('placeid=:id AND pid=:pid', array(':id'=>$placeid, ':pid'=>$pid));
        $ret = array();
        foreach ( $cats as $element ) {
            $new = &$ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;
            $new['items'] =  Service::model()->findAllByAttributes(array(
                'catid' => $element->id,
            ));
        }

        foreach ( $ret as &$element ) {
            $subcats = $this->_getCatsChildren($placeid, $element['id']);
            if ( !empty($subcats) ) {
                $element['categories'] = $subcats;
            } else {
                $element['categories'] = array();
            }
        }
        return $ret;
    }

}