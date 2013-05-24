<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:30 PM
 */

class MenuController extends Controller
{
    /**
     * @param $point_id
     * @return array
     */
    public function actionIndex($point_id)
    {
        /**
         * @todo Необходимо возвращать иерархическую структуру Меню с Элементами меню
         * На входе метод принимает id Места (Place)
         * На выходе должен выдать Меню для этого Места
         */

        $place = Place::model()->findByPk($point_id);
        if (empty($place))
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

    private function _getCatsChildren($placeid, $pid)
    {
        $cats = MenuCat::model()->findAll('placeid=:id AND pid=:pid', array(':id' => $placeid, ':pid' => $pid));
        $ret = array();
        foreach ($cats as $element) {
            $new = & $ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;

            $buf = MenuItem::model()->findAllByAttributes(array(
                'catid' => $element->id,
            ));

            $menuItems = array();
            /* @var $menuItem MenuItem */
            foreach($buf as $menuItem) {
                $menuItems[] = array(
                    'id' => $menuItem->id,
                    'point_id' => $placeid,
                    'category' => $menuItem->catid,
                    'name' => $menuItem->title,
                    'image' => Yii::app()->request->getBaseUrl(true) . $menuItem->getImg(450),
                );
            }


            $new['items'] = $menuItems;
        }

        foreach ($ret as &$element) {
            $subcats = $this->_getCatsChildren($placeid, $element['id']);
            if (!empty($subcats)) {
                $element['categories'] = $subcats;
            } else {
                $element['categories'] = array();
            }
        }
        return $ret;
    }

}