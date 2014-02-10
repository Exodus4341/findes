<?php

namespace Fuel\Migrations;

class Create_landmarks
{
	public function up()
	{
		\DBUtil::create_table('landmarks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'placename' => array('constraint' => 255, 'type' => 'varchar'),
			'slug' => array('constraint' => 255, 'type' => 'varchar'),
			'landmarkcategory_id' => array('constraint' => 255, 'type' => 'varchar'),
			'reviews' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'description' => array('type' => 'text'),
			'history' => array('type' => 'text'),
			'latitude' => array('constraint' => 255, 'type' => 'varchar'),
			'longhitude' => array('constraint' => 255, 'type' => 'varchar'),
			'fileurl' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('landmarks');
	}
}