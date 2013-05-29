<?php

class m130529_135234_alter_order_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_orders', 'lt', 'float');
        $this->addColumn('tbl_orders', 'lg', 'float');
	}

	public function down()
	{
		$this->dropColumn('tbl_orders', 'lt');
		$this->dropColumn('tbl_orders', 'lg');
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