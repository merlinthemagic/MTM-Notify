<?php
//© 2019 Martin Peter Madsen
namespace MTM\Notify\Models\Notifications;

class Single extends Base
{
	protected $_masterObj=null;
	protected $_slaveObj=null;
	protected $_eventObjs=array();
	
	public function setMaster($obj)
	{
		$this->_masterObj	= $obj;
		return $this;
	}
	public function getMaster()
	{
		return $this->_masterObj;
	}
	public function setSlave($obj)
	{
		$this->_slaveObj	= $obj;
		return $this;
	}
	public function getSlave()
	{
		return $this->_slaveObj;
	}
	public function &getEvents()
	{
		return $this->_eventObjs;
	}
	public function bindEvent($event, $obj, $method)
	{
		//bind the slave to some master event
		$eventObj			= new \stdClass();
		$eventObj->event	= $event;
		$eventObj->obj		= $obj;
		$eventObj->method	= $method;
		$this->_eventObjs[]	= $eventObj;
		return $this;
	}
	public function newEvent($event, $throw=true)
	{
		//trigger an event from the master
		foreach ($this->getEvents() as $eventObj) {
			if ($eventObj->event == $event) {
				try {
					call_user_func_array(array($eventObj->obj, $eventObj->method), array($this, $event));
				} catch (\Exception $e) {
					if ($throw === true) {
						throw $e;
					}
				}
			}
		}
	}
}