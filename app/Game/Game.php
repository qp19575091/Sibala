<?php

namespace App\Game;

use App\Game\Sibala\Sibala;

class Game
{
    use PropertyAttribute;

    public function sibala($player1, $player2, $money): object
    {
        return $this->proxy(new Sibala(... func_get_args()));
    }
}
