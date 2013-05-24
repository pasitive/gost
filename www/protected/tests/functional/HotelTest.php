<?php
/**
 * User: Denis A Boldinov
 * Date: 5/23/13
 * Time: 1:28 PM
 */

class HotelTest extends GostWebTestCase
{
    public function testResponse()
    {
        $result = TestHelper::curl('http://gost.dev/api/v1/hotel?lt=1&lg=1');
        $this->assertEquals($result['curl_error'], '');
        $this->assertEquals($result['http_code'], 200);

        // JSON validate
        $jsonString = $result['body'];
        $data = CJSON::decode($jsonString);
        $this->assertNotNull($data);

        $structure = $data[0];

        /*$expected = array('id', 'name', 'lt', 'lg', 'type', 'images', 'avg_rating');

        foreach($expected as $key) {
            $this->assertArrayHasKey($key, $structure);
        }*/

    }
}