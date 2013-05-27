<?php

class m130527_113303_create_place_reviews_table extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_place_reviews', array(
            'id' => 'pk',
            'placeid' => 'integer',
            'rating' => 'integer',
            'text' => 'string',
            'create_time' => 'datetime',
            'update_time' => 'datetime',
        ));
        $this->addForeignKey('fk_place_review_placeid', 'tbl_place_reviews', 'placeid', 'tbl_places', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_place_review_placeid', 'tbl_place_reviews');
        $this->dropTable('tbl_place_reviews');
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