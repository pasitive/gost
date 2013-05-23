<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 12:44 PM
 */

class OrderController extends Controller
{
    public function actionIndex($hotelId, $room, $phone)
    {
        $order = new Order();
        $order->attributes = array(
            'room_number' => $room,
            'placeid' => $hotelId,
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