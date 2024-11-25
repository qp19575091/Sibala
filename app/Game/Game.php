<?php

namespace App\Game;

use App\Game\Sibala\Sibala;
use ReflectionException;

class Game
{
    use PropertyAttribute;

    /**
     * @throws ReflectionException
     */
    public function sibala($player1, $player2, $money): SiBala
    {
        return $this->proxy(new Sibala(... func_get_args()));
    }
}
