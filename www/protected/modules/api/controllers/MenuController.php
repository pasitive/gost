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

        $cats = $this->getCatsChildren($place->id, 0);

//        var_dump($cats);
        return $cats;

        return array(
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
        );
    }

    private function getCatsChildren($placeid, $pid) {

        $cats =  MenuCat::model()->findAll('placeid=:id AND pid=:pid', array(':id'=>$placeid, ':pid'=>$pid));

        $ret = array();
        foreach ( $cats as $cat ) {

            $new = &$ret[];
            $new['id'] = $cat->id;
            $new['name'] = $cat->title;

            $items = MenuItem::model()->findAll('catid=:catid', array(':catid'=>$cat->id));
            if ( !empty($items) ) {
                $tmp = array();
                foreach ( $items as $item ) {
                    $ins = &$tmp['item' . $item->id][];
                    $ins['id'] = $item->id;
                    $ins['title'] = $item->title;
                    $ins['desc'] = $item->desc;
                    $ins['img'] = $item->img;
                }
                $new['items'] = $tmp;
            }

        }

        foreach ( $ret as &$cat ) {
            $subcats = $this->getCatsChildren($placeid, $cat['id']);
            if ( !empty($subcats) ) {
                $cat['categories'] = $subcats;
            }
        }

        return $ret;

    }

}