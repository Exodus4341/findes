<?php
class Model_Puvtype extends \Orm\Model
{

	protected static $_has_many = array('puvs');

	protected static $_properties = array(
		'id',
		'name',
		'icon_url',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('icon_url', 'Icon Url', 'required|max_length[255]');

		return $val;
	}

}
