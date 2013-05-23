<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 1:49 PM
 */

class TestHelper
{
    public static function curl($url)
    {
        $curl = new CurlRequest();

        try {
            $params = array('url' => $url,
                'method' => 'GET', // 'POST','HEAD'
                'referer' => '',
                'cookie' => '',
                'timeout' => 20
            );

            $curl->init($params);
            $result = $curl->exec();

            return $result;
//
//            if ($result['curl_error']) throw new Exception($result['curl_error']);
//            if ($result['http_code'] != '200') throw new Exception("HTTP Code = " . $result['http_code']);
//            if (!$result['body']) throw new Exception("Body of file is empty");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}