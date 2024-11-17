<?php

namespace App\Game\Sibala;

use function Symfony\Component\Translation\t;

class Sibala
{
    public function __construct(private $dice1, private $dice2, private $money)
    {
    }

    public function result()
    {
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $player1Category = $player1->getCategory();
        $player2Category = $player2->getCategory();

        return $this->compareResult($player1, $player2);
    }

    private function compareResult(Player $player1, Player $player2)
    {
        $player1Category = $player1->getCategory();
        $player2Category = $player2->getCategory();

        if ($player1Category->type === $player2Category->type && $player1Category->type === 1) {
            return $this->compareNormalPoint($player1, $player2);
        }

        if ($player1Category->type === $player2Category->type) {
            return "Tie";
        }

        if ($player1Category->type > $player2Category->type) {
            return $player1->name . " win 100 with " . $player1->getSingePoint();
        } elseif ($player1Category->type < $player2Category->type) {
            return $player2->name . " win 100 with " . $player2->getSingePoint();
        }
    }

    private function compareNormalPoint(Player $player1, Player $player2)
    {
        if ($player1->getSingePoint() > $player2->getSingePoint()) {
            return $player1->name . " win 100 with " . $player1->getSingePoint();
        } elseif ($player1->getSingePoint() < $player2->getSingePoint()) {
            return $player2->name . " win 100 with " . $player2->getSingePoint();
        } else {
            return "Tie";
        }
    }
}
