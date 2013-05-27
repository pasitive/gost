<?php

class ErrorController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $response = new Response(array(), $error['code'], $error['message']);
            print $response;
        }
    }
}