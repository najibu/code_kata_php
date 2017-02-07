<?php

namespace spec\Acme;


use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Acme\Player;

class TennisSpec extends ObjectBehavior
{
    protected $najibu; 
    
    protected $nsubuga; 

    function let(){
      $this->najibu = new Player('Najibu', 0);
      $this->nsubuga = new Player('Nsubuga', 0);

      $this->beConstructedWith($this->najibu, $this->nsubuga);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Tennis');
    }

    function it_scores_a_scoreless_game()
    {
      $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_0_game()
    {
      $this->najibu->earnPoints(1);
      $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_0_game()
    {
      $this->najibu->earnPoints(2);
      $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_0_game()
    {
      $this->najibu->earnPoints(3);
      $this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_a_4_0_game()
    {
      $this->najibu->earnPoints(4);
      $this->score()->shouldReturn('Win for Najibu');
    }

    function it_scores_a_0_4_game()
    {
      $this->nsubuga->earnPoints(4);
      $this->score()->shouldReturn('Win for Nsubuga');
    }

    function it_scores_a_4_3_game()
    {
      $this->najibu->earnPoints(4);
      $this->nsubuga->earnPoints(3);

      $this->score()->shouldReturn('Advantage Najibu');
    }

    function it_scores_a_3_4_game()
    {
      $this->najibu->earnPoints(3);
      $this->nsubuga->earnPoints(4);

      $this->score()->shouldReturn('Advantage Nsubuga');
    }

    function it_scores_a_3_3_game()
    {
      $this->najibu->earnPoints(3);
      $this->nsubuga->earnPoints(3);

      $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_8_game()
    {
      $this->najibu->earnPoints(8);
      $this->nsubuga->earnPoints(8);

      $this->score()->shouldReturn('Deuce');
    }
}
