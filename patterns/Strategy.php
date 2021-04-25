<?php

/** 
	Strategy Pattern

	Here we have an example where specific 'Log' class is called.

	But we want to be able
	to easily switch the 'Log' classes.

	The solution is to pass the common interface, not specific class.
	That way you can pick your logger (strategy).
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

	public function log($data, Logger $logger)
	{
		$logger->log($data);
	}
}

$app = new App();

$app->log('Some information here.', new LogToDatabase());
$app->log('Some more information here.', new LogToXWebService());
