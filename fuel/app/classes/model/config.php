<?php
class Model_Config extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'default_currency',
		'jeepney_maxspeed',
		'jeepney_minspeed',
		'tricycle_maxspeed',
		'tricycle_minspeed',
		'route_tolerance',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('default_currency', 'Default Currency', 'required|max_length[255]');
		$val->add_field('jeepney_maxspeed', 'Jeepney Maxspeed', 'required|max_length[255]');
		$val->add_field('jeepney_minspeed', 'Jeepney Minspeed', 'required|max_length[255]');
		$val->add_field('tricycle_maxspeed', 'Tricycle Maxspeed', 'required|max_length[255]');
		$val->add_field('tricycle_minspeed', 'Tricycle Minspeed', 'required|max_length[255]');
		$val->add_field('route_tolerance', 'Route Tolerance', 'required|max_length[255]');

		return $val;
	}

}
