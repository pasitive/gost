<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Альберт
 * Date: 29.05.13
 * Time: 12:51
 * To change this template use File | Settings | File Templates.
 */

class MessageController extends Controller
{
    /**
     * @param string $msg
     * @return array
     */
    public function actionIndex($msg = "")
    {

        $message = new Message();
        $message->text = $msg;
        $message->save();

        $response = new Response(array('ok'));
        print $response;

    }
}