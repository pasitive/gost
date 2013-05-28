<?php

class ErrorController extends Controller
{
    /**
     * In error controller filters method return empty array
     *
     * @return array
     */
    public function filters()
    {
        return array();
    }

    /**
     * This is the action to handle external exceptions.
     *
     * @internal
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $response = new Response(array(), $error['code'], $error['message']);
            print $response;
        }
    }
}