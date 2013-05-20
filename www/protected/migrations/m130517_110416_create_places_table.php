<?php

class m130517_110416_create_places_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_places', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'typeid' => 'integer',
            'location_lat' => 'float',
            'location_lng' => 'float'
        ));
        $this->addForeignKey('fk_place_placetype_id', 'tbl_places', 'typeid', 'tbl_place_types', 'id');
	}

	public function down()
	{
        $this->dropForeignKey('fk_place_placetype_id', 'tbl_places');
		$this->dropTable('tbl_places');
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