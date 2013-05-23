<?php

class m130523_115226_create_menu_items_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_menu_items', array(
            'id' => 'pk',
            'catid' => 'integer',
            'title' => 'string',
            'desc' => 'text',
            'img' => 'string'
        ));
        $this->addForeignKey('fk_menuitem_catid', 'tbl_menu_items', 'catid', 'tbl_menu_cats', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_menuitem_catid', 'tbl_menu_items');
        $this->dropTable('tbl_menu_items');
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