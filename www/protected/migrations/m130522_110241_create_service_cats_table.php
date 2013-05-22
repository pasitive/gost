<?php

class m130522_110241_create_service_cats_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_service_cats', array(
            'id' => 'pk',
            'placeid' => 'integer',
            'pid' => 'integer',
            'title' => 'string',
        ));
        $this->addForeignKey('fk_service_cat_placeid', 'tbl_service_cats', 'placeid', 'tbl_places', 'id');
	}

	public function down()
	{
        $this->dropForeignKey('fk_service_cat_placeid', 'tbl_service_cats');
        $this->dropTable('tbl_service_cats');
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