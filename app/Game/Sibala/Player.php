<?php

namespace App\Game\Sibala;

class Player
{
    public function __construct(
        private readonly array $dice,
        public readonly string $name
    ) {
    }

    public function getDiceHand(): DiceHand
    {
        return new DiceHand($this->dice);
    }
}
