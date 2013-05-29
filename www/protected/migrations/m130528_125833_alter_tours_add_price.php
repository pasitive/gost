<?php

class m130528_125833_alter_tours_add_price extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_tours', 'price', 'decimal(10,2)');
	}

	public function down()
	{
        $this->dropColumn('tbl_tours', 'price');
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