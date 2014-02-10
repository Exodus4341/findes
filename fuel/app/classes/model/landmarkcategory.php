<?php
class Model_Landmarkcategory extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'categories',
		'category_icon',
		'pid',
	);


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('categories', 'Categories', 'required|max_length[255]');
		$val->add_field('category_icon', 'Category Icon', 'required');
		$val->add_field('pid', 'Pid', 'valid_string[numeric]');

		return $val;
	}

}
