<?php
/**
 * Created by PhpStorm.
 * User: zzpzero
 * Date: 2017/11/11
 * Time: 13:51
 */

namespace Jasmine\Component\Poker;


/**
 * 扑克牌的卡牌对象
 * Class Card
 * @package Game\lib\Poker
 */
class Card implements CardInterface
{
    /**
     * 牌名
     * @var string
     */
    private $name = '';

    /**
     * @var int
     */
    private $type = CardType::diamond;

    /**
     * @var int
     */
    private $value = 1;

    /**
     * Card constructor.
     * @param $name
     * @param $value
     * @param $type
     */
    function __construct($name, $value, $type = CardType::diamond)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * 获取牌名
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * 获取卡牌的值
     * @return int
     */
    function getValue()
    {
        return $this->value;
    }

    /**
     * 获取卡牌的类型
     * @return int
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param Card $card
     * @return int 返回：1比目标牌大，-1比目标牌小
     */
    function compareWith(Card $card)
    {
        if ($this->getValue() > $card->getValue()) {
            return 1;
        } elseif ($this->getValue() == $card->getValue()) {
            if ($this->getType() > $card->getType()) {
                return 1;
            } elseif ($this->getType() == $card->getType()) {
                return 0;
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }

    /**
     * Desc:
     * User: itwri
     * Date: 2019/1/30
     * Time: 14:53
     *
     * @return array
     */
    function toArray()
    {
        return [
            'name' => $this->getName(),
            'value' => $this->getValue(),
            'type' => $this->getType()
        ];
    }
}
