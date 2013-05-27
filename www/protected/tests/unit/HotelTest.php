<?php

class HotelTest extends CDbTestCase
{
	public $fixtures=array(
		'hotels'=>'Place',
	);

	public function testCreate()
	{
        $this->assertTrue(true);
	}
}