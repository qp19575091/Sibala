<?php

namespace Tests\Unit;

use App\Game\Sibala\Sibala;
use PHPUnit\Framework\TestCase;

class SibalaTest extends TestCase
{
    public function test_win_with_same_category(): void
    {
        $this->assertEquals("Player2 win 100 with 3",
            $this->game([1, 2, 1], [3, 2, 2], 100)
        );

        $this->assertEquals("Player1 win 100 with 4",
            $this->game([1, 4, 1], [3, 2, 2], 100)
        );
    }

    public function test_normal_point_win_no_point(): void
    {
        // player1 no point
        $this->assertEquals("Player2 win 100 with 3",
            $this->game([1, 4, 3], [3, 2, 2], 100)
        );

        // player2 no point
        $this->assertEquals("Player1 win 100 with 3",
            $this->game([1, 1, 3], [3, 2, 4], 100)
        );
    }

    public function test_tie(): void
    {
        // same normal point
        $this->assertEquals("Tie",
            $this->game([1, 2, 1], [3, 2, 3], 100)
        );

        // all of a kind
        $this->assertEquals("Tie",
            $this->game([3, 3, 3], [4, 4, 4], 100)
        );
    }

    public function game($player1, $player2, $money): string
    {
        $game = new Sibala($player1, $player2, $money);
        return $game->result();
    }
}
