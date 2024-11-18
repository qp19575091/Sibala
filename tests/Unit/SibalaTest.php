<?php

namespace Tests\Unit;

use App\Game\Sibala\SiBala;
use PHPUnit\Framework\TestCase;

class SibalaTest extends TestCase
{
    public function test_win_with_same_category(): void
    {
        $this->assertEquals("Player2 win 100 with 3",
            $this->game([1, 2, 1], [3, 2, 2], 100)
        );

        $this->assertEquals("Player1 win 100 with 3",
            $this->game([1, 4, 1], [3, 2, 2], 100)
        );
    }

    public function game($player1, $player2, $money): string
    {
        $game = new SiBala($player1, $player2, $money);
        return $game->result();
    }
}
