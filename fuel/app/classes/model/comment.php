<?php
class Model_Comment extends \Orm\Model
{
	protected static $_belongs_to = array('landmark'=>array('key_to' => 'id'), 'user');

	protected static $_properties = array(
		'id',
		'name',
		'email',
		'message',
		'landmark_id',
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
		$val->add_field('name', 'Name', 'max_length[255]');
		$val->add_field('email', 'Email', '');
		$val->add_field('message', 'Message', 'required');
		$val->add_field('landmark_id', 'Landmark Id', 'required|valid_string[numeric]');

		return $val;
	}

}
