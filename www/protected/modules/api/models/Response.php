<?php
/**
 * User: Denis A Boldinov
 * Date: 5/22/13
 * Time: 10:40 PM
 */

class Response extends CModel
{

    // Статус ответа
    public $status = 0;

    // Описание ошибки, если была
    public $error = '';

    // Данные (JSON)
    public $result = array();

    /**
     * Returns the list of attribute names of the model.
     * @return array list of attribute names.
     */
    public function attributeNames()
    {
        return array(
            'status' => 'Status',
            'error' => 'Error',
            'result' => 'JSON Result',
        );
    }

    function __toString()
    {
        return CJSON::encode(array(
            'status' => $this->status,
            'error' => $this->error,
            'result' => $this->result,
        ));
    }
}