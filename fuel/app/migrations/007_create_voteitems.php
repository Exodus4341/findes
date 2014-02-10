<?php

namespace Fuel\Migrations;

class Create_voteitems
{
	public function up()
	{
		\DBUtil::create_table('voteitems', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'landmark_id' => array('constraint' => 11, 'type' => 'int'),
			'votes' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'nrates' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('voteitems');
	}
}