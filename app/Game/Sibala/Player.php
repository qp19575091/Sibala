<?php

namespace App\Game\Sibala;

class Player
{
    public function __construct(
        private readonly array $dice,
        private readonly string $name
    ) {
    }

    public function getHandDice(): HandDice
    {
        return new HandDice($this->dice);
    }
}
