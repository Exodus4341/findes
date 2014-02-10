<?php
class Model_Voteitem extends \Orm\Model
{

	protected static $_belongs_to = array('landmark'=>array('key_to' => 'id'));

	protected static $_properties = array(
		'id',
		'landmark_id',
		'votes',
		'nrates',
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
		$val->add_field('landmark_id', 'Landmark Id', 'required|valid_string[numeric]');
		$val->add_field('votes', 'Votes', 'valid_string[numeric]');
		$val->add_field('nrates', 'Nrates', 'valid_string[numeric]');

		return $val;
	}

}
