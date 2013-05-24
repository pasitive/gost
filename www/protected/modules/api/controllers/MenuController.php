<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:30 PM
 */

class MenuController extends Controller
{
    /**
     * @param $hotelId
     * @return array
     */
    public function actionIndex($hotelId)
    {
        /**
         * @todo Необходимо возвращать иерархическую структуру Меню с Элементами меню
         * На входе метод принимает id Места (Place)
         * На выходе должен выдать Меню для этого Места
         */

        $place = Place::model()->findByPk($hotelId);
        if ( empty($place) )
            throw new CHttpException(404, 'Неверный ID места');

        $cats = $this->_getCatsChildren($place->id, 0);

        $response = new Response($cats);
        print $response;

        /*return array(
            'id' => 'Category id',
            'name' => 'Category name',
            'items' => array( // Массив элементов меню
                'item1' => array(
                    'id' => '',
                    'title' => '',
                    'desc' => '',
                    'img' => '',
                ),
            ),
            'categories' => array( // Массив вложенных категорий меню
                'id' => 'Category id',
                'name' => 'Category name',
                'items' => array( // Массив элементов меню
                    'item1' => array(
                        'id' => '',
                        'title' => '',
                        'desc' => '',
                        'img' => '',
                    ),
                ),
            ),
        );*/
    }

    private function _getCatsChildren($placeid, $pid) {
        $cats =  MenuCat::model()->findAll('placeid=:id AND pid=:pid', array(':id'=>$placeid, ':pid'=>$pid));
        $ret = array();
        foreach ( $cats as $element ) {
            $new = &$ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;
            $new['items'] =  MenuItem::model()->findAllByAttributes(array(
                'catid' => $element->id,
            ));
        }

        foreach ( $ret as &$element ) {
            $subcats = $this->_getCatsChildren($placeid, $element['id']);
            if ( !empty($subcats) ) {
                $element['categories'] = $subcats;
            }
        }
        return $ret;
    }

}