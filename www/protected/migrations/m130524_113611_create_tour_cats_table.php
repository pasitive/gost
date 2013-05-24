<?php

class m130524_113611_create_tour_cats_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_tour_cats', array(
            'id' => 'pk',
            'placeid' => 'integer',
            'pid' => 'integer',
            'title' => 'string',
        ));
    }

    public function down()
    {
        $this->dropTable('tbl_tour_cats');
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