<?php

class m130528_111840_drop_tour_images_fk extends CDbMigration
{
	public function up()
	{
        $this->dropForeignKey('fk_tourimage_tourid', 'tbl_tour_images');
    }

	public function down()
	{
        $this->addForeignKey('fk_tourimage_tourid', 'tbl_tour_images', 'tourid', 'tbl_tours', 'id');
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