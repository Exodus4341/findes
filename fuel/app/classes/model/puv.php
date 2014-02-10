<?php
class Model_Puv extends \Orm\Model
{

	protected static $_belongs_to = array('puvtype' => array('key_from' => 'puv_id'));

	protected static $_properties = array(
		'id',
		'puv_id',
		'faretype',
		'initsucc',
		'succfare',
		'initdis',
		'succdis',
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
		$val->add_field('puv_id', 'Puvtype', 'required|max_length[255]');
		$val->add_field('faretype', 'Faretype', 'required|max_length[255]');
		$val->add_field('initsucc', 'Initsucc', 'required|max_length[255]');
		$val->add_field('succfare', 'Succfare', 'required|max_length[255]');
		$val->add_field('initdis', 'Initdis', 'required|max_length[255]');
		$val->add_field('succdis', 'Succdis', 'required|max_length[255]');

		return $val;
	}

}
