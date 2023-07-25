<?php

namespace Dissect\Parser\LALR1\Analysis;

use \PHPUnit\Framework\TestCase;

class AutomatonTest extends TestCase
{
    protected $automaton;

    protected function setUp() : void
    {
        $this->automaton = new Automaton();
        $this->automaton->addState(new State(0, array()));
        $this->automaton->addState(new State(1, array()));
    }

    /**
     * @test
     */
    public function addingATransitionShouldBeVisibleInTheTransitionTable()
    {
        $this->automaton->addTransition(0, 'a', 1);
        $table = $this->automaton->getTransitionTable();

        $this->assertEquals(1, $table[0]['a']);
    }

    /**
     * @test
     */
    public function aNewStateShouldBeIdentifiedByItsNumber()
    {
        $state = new State(2, array());
        $this->automaton->addState($state);

        $this->assertSame($state, $this->automaton->getState(2));
    }
}
