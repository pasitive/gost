<?php

class m130524_082750_add_images_to_place extends CDbMigration
{
	public function up()
	{
        $this->addColumn('tbl_places', 'images', 'text');
	}

	public function down()
	{
        $this->dropColumn('tbl_places', 'images');
	}
}