<?php
/**
 * Created by PhpStorm.
 * User: itwri
 * Date: 2020/12/22
 * Time: 10:39
 */

namespace Jasmine\Poker\Tests\Features;


use Jasmine\Poker\Poker;
use PHPUnit\Framework\TestCase;

class PockerTest extends TestCase
{

    function testPlay(){
        $pocker = new Poker(1);
        print_r($pocker->toArray());
    }
}