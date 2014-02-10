<?php

namespace Fuel\Migrations;

class Create_tilemaps
{
	public function up()
	{
		\DBUtil::create_table('tilemaps', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'mapname' => array('constraint' => 255, 'type' => 'varchar'),
			'source' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tilemaps');
	}
}