<?php

/**
	Template Method Pattern

	It's good in situations where you are worried about code duplication.
	In scenarios where only one or few methods are different from the two classes.
	So, use an abstract class to extract mutual behavior.

	In this example, all code in both classes is the same,
	except for one method (addVeggies and addTurkey).

	The solution is to generalize the name of those two methods into one abstract method (addPrimaryToppings).
*/
 
abstract class Sub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addPrimaryToppings()
			->addSauces();
	}

	protected function layBread()
	{
		var_dump('laying down the bread');

		return $this;
	}

	protected function addLettuce()
	{
		var_dump('add some lettuce');

		return $this;
	}

	protected function addSauces()
	{
		var_dump('add oil and vinegar');

		return $this;
	}

	// Any subclass is required to have this method.
	protected abstract function addPrimaryToppings();

}

class TurkeySub extends Sub {

	public function addPrimaryToppings()
	{
		var_dump('add some turkey');

		return $this;
	}
}

class VeggieSub extends Sub {

	public function addPrimaryToppings()
	{
		var_dump('add some veggies');

		return $this;
	}
}

(new TurkeySub)->make();
echo("======================================\n");
(new VeggieSub)->make();
