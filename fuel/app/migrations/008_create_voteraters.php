<?php

namespace Fuel\Migrations;

class Create_voteraters
{
	public function up()
	{
		\DBUtil::create_table('voteraters', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'raters' => array('constraint' => 255, 'type' => 'varchar'),
			'landmark_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('voteraters');
	}
}