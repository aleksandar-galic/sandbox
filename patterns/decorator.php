<?php

/**
Decorator pattern

You want to adjust behavior in some way, and you want to inherit from the class.
Ask yourself first:
---If I inherit from that class, do I really need to pull in all the functionality?
---Or instead, do I simply need to adjust the behavior of one or two methods?
If that's the case, you can use a Decorator.
*/

interface CarService {
	public function getCost();

	public function getDescription();
}

class BasicInspection implements CarService {
	public function getCost()
	{
		return 25;
	}

	public function getDescription()
	{
		return 'Baisic inspection.';
	}
}

class OilChange implements CarService {

	private $carService;

	public function __construct($carService)
	{
		$this->carService = $carService;
	}


	public function getCost()
	{
		return 29 + $this->carService->getCost();
	}

	public function getDescription()
	{
		return $this->carService->getDescription() . 'Oil Change.';
	}
}

class TireRotation implements CarService {

	private $carService;

	public function __construct($carService)
	{
		$this->carService = $carService;
	}


	public function getCost()
	{
		return 15 + $this->carService->getCost();
	}

	public function getDescription()
	{
		return $this->carService->getDescription() . 'Tire Rotation.';
	}
}

echo (new OilChange(new TireRotation(new BasicInspection())))->getDescription();
