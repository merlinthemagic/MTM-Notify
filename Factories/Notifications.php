<?php
//© 2019 Martin Peter Madsen
namespace MTM\Notify\Factories;

class Notifications extends Base
{
	public function getSingle($masterObj=null, $slaveObj=null)
	{
		$rObj	= new \MTM\Notify\Models\Notifications\Single();
		if (is_object($masterObj) === true) {
			$rObj->setMaster($masterObj);
		}
		if (is_object($slaveObj) === true) {
			$rObj->setSlave($slaveObj);
		}
		return $rObj;
	}
}