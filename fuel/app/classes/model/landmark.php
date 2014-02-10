<?php
class Model_Landmark extends \Orm\Model
{
	protected static $_belongs_to = array('landmarkcategory' => array('key_to' => 'id'),
										  'user' => array('key_to' => 'id'), 
										  'voteitem' => array('key_from' =>'id'),
										  'landmarkphoto' => array('key_from' =>'id'),
										  'roadlocation' => array('key_from' =>'id'),
		);

	protected static $_has_many = array('comments','voteitems','landmarkphotos','roadlocations');


	protected static $_properties = array(
		'id',
		'placename',
		'slug',
		'landmarkcategory_id',
		'description',
		'history',
		'latitude',
		'longitude',
		'fileurl',
		'user_id',
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
		$val->add_field('placename', 'Placename', 'required|max_length[255]');
		$val->add_field('slug', 'Slug', 'max_length[255]');
		$val->add_field('landmarkcategory_id', 'Landmark Category id', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('history', 'History', 'required');
		$val->add_field('latitude', 'Latitude', 'required');
		$val->add_field('longitude', 'Longitude', 'required');
		$val->add_field('fileurl', 'Fileurl', '');
		$val->add_field('user_id', 'User Id', '');
		
		return $val;
	}

}
