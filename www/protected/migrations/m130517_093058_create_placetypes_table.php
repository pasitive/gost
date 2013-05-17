<?php

class m130517_093058_create_placetypes_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_place_types', array(
            'id' => 'pk',
            'title' => 'string NOT NULL'
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_place_types');
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