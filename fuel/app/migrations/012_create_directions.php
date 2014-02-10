<?php

namespace Fuel\Migrations;

class Create_directions
{
	public function up()
	{
		\DBUtil::create_table('directions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'directionName' => array('constraint' => 255, 'type' => 'varchar'),
			'jeepneyPrefix' => array('constraint' => 255, 'type' => 'varchar'),
			'tricyclePrefix' => array('constraint' => 255, 'type' => 'varchar'),
			'midFix' => array('constraint' => 255, 'type' => 'varchar'),
			'postFix' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('directions');
	}
}