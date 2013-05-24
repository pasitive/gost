<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:40 PM
 */

class ServiceController extends Controller
{
    public function actionIndex($point_id)
    {

        $place = Place::model()->findByPk($point_id);
        if (empty($place))
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

    private function _getCatsChildren($placeid, $pid)
    {
        $cats = ServiceCat::model()->findAll('placeid=:id AND pid=:pid', array(':id' => $placeid, ':pid' => $pid));
        $ret = array();
        foreach ($cats as $element) {
            $new = & $ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;

            $buf = Service::model()->findAllByAttributes(array(
                'catid' => $element->id,
            ));

            /*@var $serviceItem Service */

            $serviceItems = array();
            foreach($buf as $serviceItem) {
                $serviceItems[] = array(
                    'id' => $serviceItem->id,
                    'point_id' => $placeid,
                    'name' => $serviceItem->title,
                    'desc' => $serviceItem->desc,
                    'image' => Yii::app()->request->getBaseUrl(true) . $serviceItem->getImg(450),
                    'price' => $serviceItem->price,
                );
            }

            $new['items'] = $serviceItems;
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