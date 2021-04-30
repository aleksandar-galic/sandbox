<?php

/**
	Chain of Responsibility Pattern

	This pattern is useful when there is a sequence (chain)
	of things that need to be checked.

	The order is important! (You cannot check lights if the doors are locked)
	When the check passes, data is passed to next Check Class.

	It is like a procedure.
	If one check fails, the procedure is aborted, and Exception is thrown.
*/

abstract class HomeChecker {
	protected $successor;

	// Get the next Check Class. Notice that it accepts parent class.
	public function succeedWith(HomeChecker $successor)
	{
		$this->successor = $successor;
	}

	// Pass the data to next Check Class (if there is one).
	public function next(HomeStatus $home)
	{
		if ($this->successor)
		{
			$this->successor->check($home);
		}
	}

	// Check method that every Check Class must offer.
	public abstract function check(HomeStatus $home);
}

// Check Class.
class Locks extends HomeChecker {
	public function check(HomeStatus $home)
	{
		if (!$home->locked)
		{
			throw new Exception('The doors are not locked!! Abort abort.');
		}

		$this->next($home);
	}
}

// Check Class.
class Lights extends HomeChecker {
	public function check(HomeStatus $home)
	{
		if (!$home->lightsOff)
		{
			throw new Exception('The lights are still on!! Abort abort.');
		}

		$this->next($home);
	}
}

// Check Class.
class Alarm extends HomeChecker {
	public function check(HomeStatus $home)
	{
		if (!$home->alarmOn)
		{
			throw new Exception('The alarm has not been set!! Abort abort.');
		}

		$this->next($home);
	}
}

// Some data.
class HomeStatus {
	public $alarmOn = true;
	public $locked = true;
	public $lightsOff = false;
}

// Classes that handle checks.
$locks = new Locks();
$lights = new Lights();
$alarm = new Alarm();

// Sequence (chain, order) of checks.
$locks->succeedWith($lights);
$lights->succeedWith($alarm);

// In this example, Locks are firstly checked,
// which accept the given data.
$locks->check(new HomeStatus());
