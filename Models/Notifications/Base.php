<?php
//© 2019 Martin Peter Madsen
namespace MTM\Notify\Models\Notifications;

class Base
{
	protected $_guid=null;
	
	public function getGuid()
	{
		if ($this->_guid === null) {
			$this->_guid	= \MTM\Utilities\Factories::getGuids()->getV4()->get(false);
		}
		return $this->_guid;
	}
	
}