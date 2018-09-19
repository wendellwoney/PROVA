<?php

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use Wendell\Questao01\FizzBuzz;

for ($i = 1 ; $i <= 100; $i++) {
    $fizzBuzz = new FizzBuzz($i);
    echo $fizzBuzz->executaFizzBuzz() . "<br>";
}