<?php

class m130524_122121_create_tours_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_tours', array(
            'id' => 'pk',
            'catid' => 'integer',
            'title' => 'string',
            'desc' => 'text',
        ));
        $this->addForeignKey('fk_tour_catid', 'tbl_tours', 'catid', 'tbl_tour_cats', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_tour_catid', 'tbl_tours');
        $this->dropTable('tbl_tours');
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