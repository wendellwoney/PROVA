<?php

namespace Wendell\Questao01\tests;

use PHPUnit\Framework\TestCase;
use Wendell\Questao01\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    public function fizzProvider()
    {
        return [
            [1,1],
            [26,26],
            [32,32],
            [3, "Fizz"],
            [6, "Fizz"],
            [18, "Fizz"],
            [93, "Fizz"],
            [10, "Buzz"],
            [25, "Buzz"],
            [50, "Buzz"],
            [55, "Buzz"],
            [65, "Buzz"],
            [60, "FizzBuzz"],
            [90, "FizzBuzz"],
            [45, "FizzBuzz"],
        ];
    }

    /**
     * @dataProvider fizzProvider
     */
    public function testFizzBuzz($numero, $expected)
    {
        $fizzBuzz = new FizzBuzz($numero);
        $this->assertEquals($expected, $fizzBuzz->executaFizzBuzz());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testArgumentoInvalido()
    {
        $fizzBuzz = new FizzBuzz("aaaaaaaaa");
        $fizzBuzz->executaFizzBuzz();

    }
}