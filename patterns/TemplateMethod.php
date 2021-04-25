<?php

/**
	Template Method Pattern

	It's good in situations where you are worried about code duplication.
	In scenarios where only one or few methods are different from the two classes.
	So, use an abstract class to extract mutual behavior.
*/
 
abstract class Sub {

	public function layBread()
	{
		var_dump('laying down the bread');

		return $this;
	}

	public function addLettuce()
	{
		var_dump('add some lettuce');

		return $this;
	}

	public function addSauces()
	{
		var_dump('add oil and vinegar');

		return $this;
	}

}

class TurkeySub extends Sub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addTurkey()
			->addSauces();
	}

	public function addTurkey()
	{
		var_dump('add some turkey');

		return $this;
	}
}

class VeggieSub extends Sub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addVeggies()
			->addSauces();
	}

	public function addVeggies()
	{
		var_dump('add some veggies');

		return $this;
	}
}

(new TurkeySub)->make();
echo("======================================\n");
(new VeggieSub)->make();
