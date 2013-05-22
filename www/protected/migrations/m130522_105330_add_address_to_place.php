<?php

class m130522_105330_add_address_to_place extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_places', 'address', 'string NOT NULL');
	}

	public function down()
	{
        $this->dropColumn('tbl_places', 'address');
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