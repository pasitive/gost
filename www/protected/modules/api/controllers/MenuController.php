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


}