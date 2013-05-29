<?php

class m130529_084609_create_messages_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_messages', array(
            'id' => 'pk',
            'text' => 'string',
            'create_time' => 'datetime',
            'update_time' => 'datetime',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_messages');
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