<?php

namespace Fuel\Migrations;

class Create_landmarkcategories
{
	public function up()
	{
		\DBUtil::create_table('landmarkcategories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'categories' => array('constraint' => 255, 'type' => 'varchar'),
			'category_icon' => array('type' => 'text'),
			'pid' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true, 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('landmarkcategories');
	}
}