<?php

class m130522_192331_drop_place_type_fk extends CDbMigration
{
	public function up()
	{
        $this->dropForeignKey('fk_place_placetype_id', 'tbl_places');
	}

	public function down()
	{
        $this->addForeignKey('fk_place_placetype_id', 'tbl_places', 'typeid', 'tbl_place_types', 'id');
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