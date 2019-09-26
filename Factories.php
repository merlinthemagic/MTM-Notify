<?php
//© 2019 Martin Peter Madsen
namespace MTM\Notify;

class Factories
{
	private static $_cStore=array();
	
	//USE: $aFact		= \MTM\Notify\Factories::$METHOD_NAME();
	
	public static function getNotifications()
	{
		if (array_key_exists(__FUNCTION__, self::$_cStore) === false) {
			self::$_cStore[__FUNCTION__]	= new \MTM\Notify\Factories\Notifications();
		}
		return self::$_cStore[__FUNCTION__];
	}
}