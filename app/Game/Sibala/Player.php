<?php

namespace App\Game\Sibala;

class Player
{
    public function __construct(
        public array $dice,
        public string $name
    ) {
    }

    public function getHandDice(): HandDice
    {
        return new HandDice($this->dice);
    }
}
