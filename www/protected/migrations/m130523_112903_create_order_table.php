<?php

class m130523_112903_create_order_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_orders', array(
            'id' => 'pk',
            'room_number' => 'integer',
            'placeid' => 'integer',
            'phone' => 'text',
        ));
	}

	public function down()
	{
		$this->dropTable('tbl_orders');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}