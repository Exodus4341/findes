<?php

namespace Fuel\Migrations;

class Create_jeepneyroutes
{
	public function up()
	{
		\DBUtil::create_table('jeepneyroutes', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'routename' => array('constraint' => 50, 'type' => 'varchar'),
			'routedesc' => array('constraint' => 255, 'type' => 'varchar'),
			'filename' => array('constraint' => 50, 'type' => 'varchar'),
			'size' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'type' => array('constraint' => 10, 'type' => 'varchar'),
			'fileurl' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('jeepneyroutes');
	}
}