<?php

namespace Fuel\Migrations;

class Create_landmarkphotos
{
	public function up()
	{
		\DBUtil::create_table('landmarkphotos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'filename' => array('constraint' => 50, 'type' => 'varchar'),
			'fileurl' => array('type' => 'text'),
			'landmark_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('landmarkphotos');
	}
}