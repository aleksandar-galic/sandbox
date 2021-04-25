<?php

/**
	Template Method Pattern

	It's good in situations where you are worried about code duplication.
	In scenarios where only one or few methods are different from the two classes.
	So, use an abstract class to extract mutual behavior.
*/
 
class TurkeySub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addTurkey()
			->addSauces();
	}

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

	public function addTurkey()
	{
		var_dump('add some turkey');

		return $this;
	}

	public function addSauces()
	{
		var_dump('add oil and vinegar');

		return $this;
	}
}

class VeggieSub {

	public function make()
	{
		return $this
			->layBread()
			->addLettuce()
			->addVeggies()
			->addSauces();
	}

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

	public function addVeggies()
	{
		var_dump('add some veggies');

		return $this;
	}

	public function addSauces()
	{
		var_dump('add oil and vinegar');

		return $this;
	}
}

(new TurkeySub)->make();
echo("======================================\n");
(new VeggieSub)->make();
