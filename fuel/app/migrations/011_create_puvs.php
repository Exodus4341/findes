<?php

namespace Fuel\Migrations;

class Create_puvs
{
	public function up()
	{
		\DBUtil::create_table('puvs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'PUV_id' => array('constraint' => 11, 'type' => 'int'),
			'FareType' => array('constraint' => 255, 'type' => 'varchar'),
			'initSucc' => array('constraint' => 255, 'type' => 'varchar'),
			'succFare' => array('constraint' => 255, 'type' => 'varchar'),
			'initDis' => array('constraint' => 255, 'type' => 'varchar'),
			'succDis' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('puvs');
	}
}