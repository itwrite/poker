<?php
/**
 * Created by PhpStorm.
 * User: zzpzero
 * Date: 2017/11/11
 * Time: 13:01
 */

namespace Jasmine\Poker;


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
    protected $cardNames = array('A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

    /**
     * 所有牌色
     * @var array
     */
    protected $cardTypes = array(Card::TYPE_DIAMOND, Card::TYPE_CLUB, Card::TYPE_HEART, Card::TYPE_SPADE);

    /**
     * @var int
     */
    protected $kingValue = 100;

    /**
     * 是否需要大小王
     * @var bool 
     */
    protected $hasKings = false;

    function __construct($hasKings = false)
    {
        $this->hasKings = $hasKings;
        $this->reset();
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
        $this->reset();
        shuffle($this->cards);
        return $this;
    }

    /**
     * 单牌比较：大王>k>q>j>10>9>8>7>6>5>4>3>2>a。
     * 花色比较：黑桃>红桃>梅花>方块。
     * @param array $cards
     * @return Card
     */
    public static function findTheMaxCard(Array $cards)
    {
        if (count($cards) > 0) {
            $maxCard = $cards[0];
            $count = count($cards);
            for ($i = 1; $i < $count; $i++) {
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
   public static function findTheMinCard(Array $cards)
    {
        if (count($cards) > 0) {
            $minCard = $cards[0];
            $count = count($cards);
            for ($i = 1; $i < $count; $i++) {
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
     * @return $this
     * itwri 2020/7/4 12:12
     */
    public function reset()
    {
        //重置所有牌
        $this->cards = [];

        //初始化A~K
        foreach ($this->cardNames as $i => $name) {
            $value = $i + 1;
            foreach ($this->cardTypes as $type) {
                $this->cards[] = new Card($name, $value, $type);
            }
        }

        /**
         * 初始化大小王
         */
        if ($this->hasKings == true) {
            $this->cards[] = new Card('Joker♣', $this->kingValue, Card::TYPE_CLUB);//小王
            $this->cards[] = new Card('Joker♥', $this->kingValue, Card::TYPE_SPADE);//大王
        }

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

    /**
     * @return array
     * itwri 2020/7/6 12:39
     */
    public function toArray()
    {
        $result = [];
        foreach ($this->cards as $card) {
            if ($card instanceof CardInterface) {
                $result[] = $card->toArray();
            }
        }
        return $result;
    }
}



