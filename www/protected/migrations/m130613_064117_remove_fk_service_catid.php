<?php

class m130613_064117_remove_fk_service_catid extends CDbMigration
{
	public function up()
	{
        $this->dropForeignKey('fk_service_catid', 'tbl_services');
    }

	public function down()
	{
        $this->addForeignKey('fk_service_catid', 'tbl_services', 'catid', 'tbl_service_cats', 'id');
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