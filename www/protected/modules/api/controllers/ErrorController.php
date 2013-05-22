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

            $response = new Response();
            $response->status = 1;
            $response->error = 'Unknown error';
            $response->result = array();
            print $response;
        }
    }
}