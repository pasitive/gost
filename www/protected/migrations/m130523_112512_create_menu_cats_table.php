<?php

class m130523_112512_create_menu_cats_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_menu_cats', array(
            'id' => 'pk',
            'placeid' => 'integer',
            'pid' => 'integer',
            'title' => 'string',
        ));
    }

    public function down()
    {
        $this->dropTable('tbl_menu_cats');
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