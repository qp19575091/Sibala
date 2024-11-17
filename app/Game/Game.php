<?php

namespace App\Game;

use App\Game\Sibala\Sibala;
use ReflectionClass;

class Game
{
    public function sibala($player1, $player2, $money)
    {
        $game = new Sibala(...func_get_args());
        $this->registerAttributes($game);

        return $game;
    }

    private function registerAttributes($class): void
    {
        $reflectionClass = new ReflectionClass($class);
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $attributes = $property->getAttributes();
            foreach ($attributes as $attribute) {
                $attribute->newInstance()->validate($property->getValue($class));
            }
        }
    }
}
