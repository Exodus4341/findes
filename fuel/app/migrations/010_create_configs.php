<?php

namespace Fuel\Migrations;

class Create_configs
{
	public function up()
	{
		\DBUtil::create_table('configs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'default_currency' => array('constraint' => 255, 'type' => 'varchar'),
			'jeepney_maxspeed' => array('constraint' => 255, 'type' => 'varchar'),
			'jeepney_minspeed' => array('constraint' => 255, 'type' => 'varchar'),
			'tricycle_maxspeed' => array('constraint' => 255, 'type' => 'varchar'),
			'tricycle_minspeed' => array('constraint' => 255, 'type' => 'varchar'),
			'route_tolerance' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('configs');
	}
}