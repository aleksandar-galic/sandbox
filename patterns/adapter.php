<?php

/**
	An adapter allows you to translate one interface for use with another.

	Create an adapter and have it implement the interface that you are trying to adapt.
	Then you inject your class, and translate the original interface methodes over to the new one.
*/
 
interface BookInterface {
	public function open();
	public function turnPage();
}
 
interface eReaderInterface {
	public function turnOn();
	public function pressNextButton();
}

class Book implements BookInterface {
	public function open()
	{
		var_dump('opening the paper book');
	}
	
	public function turnPage()
	 {
	 	var_dump('turning the page of the paper book');
	 } 
}

class Kindle implements eReaderInterface {
	public function turnOn()
	{
		var_dump('turn the Kindle on');
	}

	public function pressNextButton()
	{
		var_dump('press the next button on  the Kindle');
	}
}

class Nook implements eReaderInterface {
	public function turnOn()
	{
		var_dump('turn the Nook on');
	}

	public function pressNextButton()
	{
		var_dump('press the next button on  the Nook');
	}
}

class eReaderAdapter implements BookInterface {
	private $reader;

	public function __construct(eReaderInterface $reader)
	{
		$this->reader = $reader;
	}

	public function open()
	{
		return $this->reader->turnOn();
	}
	
	public function turnPage()
	 {
	 	return $this->reader->pressNextButton();
	 } 
}

class Person {
	public function read(BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

(new Person)->read(new eReaderAdapter(new Nook));
