<?php

/** 
	Strategy Pattern

	Here we have an example where specific 'Log' class is called.

	But we want to be able
	to easily switch the 'Log' classes.
*/


// Define a family of algorithms.
class LogToFile implements Logger {

	public function log($data)
	{
		var_dump('Log the data to a file.');
	}
}

class LogToDatabase implements Logger {

	public function log($data)
	{
		var_dump('Log the data to the database.');
	}
}

class LogToXWebService implements Logger {

	public function log($data)
	{
		var_dump('Log the data to a Saas site.');
	}
}

// Encapsulate and make them interchangeable.
interface Logger {

	public function log($data);
}

class App {

	public function log($data)
	{
		$logger = new LogToFile();

		$logger->log($data);
	}
}

$app = new App();

$app->log('Some information here.');
