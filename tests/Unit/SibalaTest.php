<?php

namespace Tests\Unit;

use App\Game\Game;
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


    public function test_three_of_a_kind_win_normal_point(): void
    {
        // player1 win
        $this->assertEquals("Player1 win 300 with 3",
            $this->game([3, 3, 3], [1, 3, 1], 100)
        );
    }

    public function test_three_of_a_kind_win_strong_straight(): void
    {
        // player1 win
        $this->assertEquals("Player1 win 300 with 3",
            $this->game([3, 3, 3], [5, 4, 6], 100)
        );
    }

    public function test_strong_straight_win_normal_point(): void
    {
        // player1 win
        $this->assertEquals("Player1 win 200 with 6",
            $this->game([5, 6, 4], [4, 4, 6], 100)
        );
    }

    public function test_three_of_a_kind_of_one_win_other_three_of_a_kind(): void
    {
        // player1 win
        $this->assertEquals("Player1 win 500 with 1",
            $this->game([1, 1, 1], [4, 4, 4], 100)
        );
    }


    public function test_normal_point_win_weak_straight(): void
    {
        // player1 win
        $this->assertEquals("Player1 win 200 with 2",
            $this->game([3, 2, 3], [1, 3, 2], 100)
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

        $this->assertEquals("Tie",
            $this->game([1, 1, 1], [1, 1, 1], 100)
        );

        $this->assertEquals("Tie",
            $this->game([1, 3, 5], [2, 4, 6], 100)
        );
    }

    public function test_invalid_input_should_throw_exception()
    {
        $this->expectException(\Exception::class);
        $this->game([1, 2, 0], [1, 2, 3], 100);
    }

    public function game($player1, $player2, $money): string
    {
        $game = new Game();
        $game = $game->sibala($player1, $player2, $money);
        return $game->result();
    }
}
