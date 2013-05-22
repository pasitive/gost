<?php

class m130522_120340_create_services_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_services', array(
            'id' => 'pk',
            'catid' => 'integer',
            'title' => 'string',
            'desc' => 'text',
            'price' => 'decimal(10,2)',
            'img' => 'string'
        ));
        $this->addForeignKey('fk_service_catid', 'tbl_services', 'catid', 'tbl_service_cats', 'id');
    }

	public function down()
	{
        $this->dropForeignKey('fk_service_catid', 'tbl_services');
        $this->dropTable('tbl_services');
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