<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:44 PM
 * @package api
 */

class OrderController extends Controller
{
    /**
     * @param $place_id
     * @param $room
     * @param $phone
     */
    public function actionIndex($place_id, $room = "", $phone = "", $lt = 0, $lg = 0)
    {
        $order = new Order();
        $order->attributes = array(
            'room_number' => $room,
            'placeid' => $place_id,
            'phone' => $phone,
            'lt' => $lt,
            'lg' => $lg
        );

        $response = null;

        if (!$order->save()) {
            $response = new Response(array(), 1, 'Unable to save Order model (' . join(',', $order->getErrors()) . ')');
        } else {
            $response = new Response($order);
        }

        print $response;
    }
}