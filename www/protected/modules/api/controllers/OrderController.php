<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:44 PM
 */

class OrderController extends Controller
{
    public function actionIndex($place_id, $room, $phone)
    {
        $order = new Order();
        $order->attributes = array(
            'room_number' => $room,
            'placeid' => $place_id,
            'phone' => $phone,
        );

        $response = null;

        if (!$order->save()) {
            $response = new Response(array(), 1, 'Unable to save Order model (' . join(',', $order->getErrors()) . ')');
        } else {
            $response = new Response(array('ok'));
        }

        print $response;
    }
}