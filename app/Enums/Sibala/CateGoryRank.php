<?php

namespace App\Enums\Sibala;

enum CateGoryRank: int
{
    case NoPoint = -1;
    case WeakStraight = 0;
    case NormalPoint = 1;
    case StrongStraight = 2;
    case OtherThreeOfAKind = 3;
    case ThreeOfAKindOfOne = 5;
}
