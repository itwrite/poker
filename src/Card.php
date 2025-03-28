<?php
/**
 * Created by PhpStorm.
 * User: zzpzero
 * Date: 2017/11/11
 * Time: 13:51
 */

namespace Jasmine\Poker;


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
    protected $name = '';

    /**
     * @var int
     */
    protected $type = self::TYPE_DIAMOND;

    /**
     * @var int
     */
    protected $value = 1;

    /**
     * @var string
     */
    protected $icon = '';

    /**
     * @var array
     */
    protected static $icons = [
        self::TYPE_DIAMOND   =>'♦',
        self::TYPE_CLUB      =>'♣',
        self::TYPE_HEART     =>'♥',
        self::TYPE_SPADE     =>'♠'
    ];

    /**
     * Card constructor.
     * @param $name
     * @param $value
     * @param $type
     */
    function __construct($name, $value, $type = self::TYPE_DIAMOND)
    {
        $this->setName($name);
        $this->setValue($value);
        $this->setType($type);
        $this->setIcon(isset(self::$icons[$type]) ? self::$icons[$type] : '');
    }

    /**
     * @param $name
     * @return $this|mixed
     * itwri 2020/12/22 11:10
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * @param $value
     * @return $this|mixed
     * itwri 2020/12/22 11:10
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
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
     * @param $type
     * @return $this|mixed
     * itwri 2020/12/22 11:10
     */
    public function setType($type)
    {
       $this->type = $type;
       return $this;
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
     * @param mixed $icon
     * @return mixed|string
     * itwri 2020/7/29 11:08
     */
    public function setIcon($icon){
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return mixed|string
     * itwri 2020/7/29 11:20
     */
    function getIcon()
    {
        return $this->icon;
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
     * Desc: 转成数组
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
            'type' => $this->getType(),
            'icon' => $this->getIcon()
        ];
    }
}
