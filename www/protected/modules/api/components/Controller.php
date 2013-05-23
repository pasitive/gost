<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @param CAction $action
     */
    protected function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            header('Content-type: application/json');
            return true;
        }

        return false;
    }

}