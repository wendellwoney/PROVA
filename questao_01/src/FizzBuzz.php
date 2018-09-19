<?php

namespace Wendell\Questao01;

class FizzBuzz
{
    protected $numero;

    /**
     * FizzBuzz constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->numero = $number;
    }

    public function executaFizzBuzz()
    {

        if (!is_int($this->numero)) {
            throw new \InvalidArgumentException();
        }

        if ($this->numero % 3 == 0 && $this->numero % 5 == 0 ) {
            return "FizzBuzz";
        } elseif ($this->numero % 3 == 0) {
            return "Fizz";
        } elseif ($this->numero % 5 == 0) {
            return "Buzz";
        } else {
            return $this->numero;
        }

    }
}