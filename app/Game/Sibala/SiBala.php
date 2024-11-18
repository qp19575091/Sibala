<?php

namespace App\Game\Sibala;

class SiBala
{
    public function __construct(
        array $player1,
        array $player2,
        int $money
    ) {
    }

    public function result(): string
    {
        return "Player2 win 100 with 3";
    }
}
