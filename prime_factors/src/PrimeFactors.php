<?php

class PrimeFactors
{
  /**
   * [generate description]
   * @param  [type] $number [description]
   * @return array
   */
  public function generate($number)
  {
    $primes = [];

    for ($candidate = 2; $number > 1; $candidate++) 
    {
      for (; $number % $candidate == 0; $number /= $candidate) 
      {
        $primes[] = $candidate;
      }
    }

    return $primes;
  }
}
