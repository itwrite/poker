<?php
/**
 * Created by PhpStorm.
 * User: zzpzero
 * Date: 2017/11/11
 * Time: 13:01
 */

namespace Poker;

use Poker\card\Card;
use Poker\card\CardType;

require_once("card/Card.php");
require_once("card/CardType.php");

/**
 * 扑克牌，共54张牌（含大小王）
 * 其中A、1、2、3、4、5、6、7、8、9、10、J、Q、K各4张。
 * 4张的牌型分别是方块、梅花、红心、黑桃。
 * Class Poker
 * @package Game\Bullfight\lib
 */
class Poker implements PokerInterface
{

    /**
     * 存放所有卡牌
     * @var array
     */
    protected $cards = array();

    /**
     * 所有牌名
     * @var array
     */
    private $cardNames = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

    /**
     * 所有牌色
     * @var array
     */
    private $cardTypes = array(CardType::diamond, CardType::club, CardType::heart, CardType::spade);

    protected $kingValue = 100;

    function __construct($hasKings = false)
    {
        $this->resetCards($hasKings);
    }

    /**
     * 返回所有卡牌
     * @return array
     */
    function getCards()
    {
        return $this->cards;
    }

    /**
     * 洗牌
     * 打乱所有牌的顺序
     * @return $this|PokerInterface
     * itwri 2020/7/3 17:31
     */
    function doWash()
    {
        shuffle($this->cards);
        return $this;
    }

    /**
     * 单牌比较：大王>k>q>j>10>9>8>7>6>5>4>3>2>a。
     * 花色比较：黑桃>红桃>梅花>方块。
     * @param array $cards
     * @return Card
     */
    function getTheMaxCard(Array $cards)
    {
        if (count($cards) > 0) {
            $maxCard = $cards[0];
            for ($i = 1; $i < count($cards); $i++) {
                $card = $cards[$i];
                if ($card instanceof Card) {
                    if ($card->compareWith($maxCard) > 0) {
                        $maxCard = $card;
                    }
                }
            }
            return $maxCard;
        }
        return null;
    }

    /**
     * @param array $cards
     * @return Card
     */
    function getTheMinCard(Array $cards)
    {
        if (count($cards) > 0) {
            $minCard = $cards[0];
            for ($i = 1; $i < count($cards); $i++) {
                $card = $cards[$i];
                if ($card instanceof Card) {
                    if ($card->compareWith($minCard) < 0) {
                        $minCard = $card;
                    }
                }
            }
            return $minCard;
        }
        return null;
    }

    /**
     * 重置所有牌
     * @param bool $hasKings
     * @return mixed|void
     * itwri 2020/7/4 12:12
     */
    public function reset($hasKings = false)
    {
        //重置所有版
        $this->cards = [];

        //初始化A~K
        foreach ($this->cardNames as $i => $name) {
            $value = $i + 1;
            foreach ($this->cardTypes as $j => $type) {
                $this->cards[] = new Card($name, $value, $type);
            }
        }

        /**
         * 初始化大小王
         */
        if ($hasKings == true) {
            $this->cards[] = new Card('King', $this->kingValue, CardType::diamond);//小王
            $this->cards[] = new Card('King', $this->kingValue, CardType::spade);//大王
        }

        //洗版
        $this->doWash();

        return $this;
    }

    /**
     * 发牌用到，每一张都是取出
     * 注：一付扑克牌张数是有限的
     * 取出最上面的一张牌
     * @return mixed
     * itwri 2020/7/3 17:36
     */
    public function pop()
    {
        return array_pop($this->cards);
    }

}



