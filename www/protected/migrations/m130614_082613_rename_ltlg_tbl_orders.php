<?php

class m130614_082613_rename_ltlg_tbl_orders extends CDbMigration
{
	public function up()
	{
        $this->renameColumn('tbl_orders', 'lt', 'location_lat');
        $this->renameColumn('tbl_orders', 'lg', 'location_lng');
    }

	public function down()
	{
        $this->renameColumn('tbl_orders', 'location_lat', 'lt');
        $this->renameColumn('tbl_orders', 'location_lng', 'lg');
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