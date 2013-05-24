<?php

class m130524_122458_create_tour_images_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_tour_images', array(
            'id' => 'pk',
            'tourid' => 'integer',
            'img' => 'string',
        ));
        $this->addForeignKey('fk_tourimage_tourid', 'tbl_tour_images', 'tourid', 'tbl_tours', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_tourimage_tourid', 'tbl_tour_images');
        $this->dropTable('tbl_tour_images');
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