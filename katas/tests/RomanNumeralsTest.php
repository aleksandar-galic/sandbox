<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
	/**
	* @test
	* @dataProvider checks
	*/
	function it_generates_the_roman_numeral_for($numeral, $number)
	{
		$this->assertEquals($numeral, RomanNumerals::generate($number));
	}

	/** @test */
	function it_cannot_generate_a_roman_numeral_for_less_than_1()
	{
		$this->assertFalse(RomanNumerals::generate(0));
	}

	/** @test */
	function it_cannot_generate_a_roman_numeral_for_more_than_3999()
	{
		$this->assertFalse(RomanNumerals::generate(4000));
	}

	public function checks()
	{
		return [
			['I', 1],
			['II', 2],
			['III', 3],
			['IV', 4],
			['V', 5],
			['VI', 6],
			['VII', 7],
			['VIII', 8],
			['IX', 9],
			['X', 10],
			['XL', 40],
			['L', 50],
			['XC', 90],
			['C', 100],
			['CD', 400],
			['D', 500],
			['CM', 900],
			['M', 1000],
			['MMMCMXCIX', 3999],
			['MCDLIX', 1459],
		];
	}
}