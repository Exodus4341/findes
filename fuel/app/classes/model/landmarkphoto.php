<?php
class Model_Landmarkphoto extends \Orm\Model
{

	protected static $_belongs_to = array('landmark' => array('key_to' => 'id'));

	protected static $_properties = array(
		'id',
		'fileurl',
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
		$val->add_field('fileurl', 'Fileurl', 'max_length[50]');
		$val->add_field('landmark_id', 'Landmark_id', 'valid_string[numeric]');

		return $val;
	}

}
