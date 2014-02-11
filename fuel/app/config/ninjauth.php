<?php
/**
 * Configuration for NinjAuth
 */
return array(

	'providers' => array(
		
		'facebook' => array(
			'id' => '572327519473085',
			'secret' => 'b6bbd0d938c55c9961bb6ac57eab7da2',
			'scope' => array('email', 'offline_access','publish_stream'),
		),

		'twitter' => array(
			'key' => 'c305SozgmVVG6qCyoSwQg',
			'secret' => 'xuJTJmHTw1gsCWKbucKGIoFcyepMBYsGdbp1tnynbY',
		),

	),

	/**
	 * link_multiple_providers
	 * 
	 * Can multiple providers be attached to one user account
	 */
	'link_multiple_providers' => true,

	/**
	 * default_group
	 * 
	 * How should users be signed up
	 */
	'default_group' => 1,
);
