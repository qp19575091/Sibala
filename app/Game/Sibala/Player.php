<?php

namespace App\Game\Sibala;

class Player
{
    public function __construct(public $dice, public $name)
    {

    }

    public function getHandDice(): HandDice
    {
        return new HandDice($this->dice);
    }
}
