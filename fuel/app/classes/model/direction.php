<?php
class Model_Direction extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'directionname',
		'jeepneyprefix',
		'tricycleprefix',
		'midfix',
		'postfix',
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
		$val->add_field('directionname', 'Directionname', 'required|max_length[255]');
		$val->add_field('jeepneyprefix', 'Jeepneyprefix', 'required|max_length[255]');
		$val->add_field('tricycleprefix', 'Tricycleprefix', 'required|max_length[255]');
		$val->add_field('midfix', 'Midfix', 'required|max_length[255]');
		$val->add_field('postfix', 'Postfix', 'required|max_length[255]');

		return $val;
	}

}
