<?php

class TourCategoryController extends Controller
{
    /**
     * @param $point_id
     * @return array
     */
    public function actionIndex($point_id)
    {

        $place = Place::model()->findByPk($point_id);
        if (empty($place))
            throw new CHttpException(404, 'Неверный ID места');

        $cats = $this->_getCatsChildren($place->id, 0);

        $response = new Response($cats);
        print $response;

    }

    private function _getCatsChildren($placeid, $pid)
    {
        $cats = TourCat::model()->findAll('placeid=:id AND pid=:pid', array(':id' => $placeid, ':pid' => $pid));
        $ret = array();
        foreach ($cats as $element) {
            $new = & $ret[];
            $new['id'] = $element->id;
            $new['name'] = $element->title;
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