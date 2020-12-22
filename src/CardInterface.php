<?php
/**
 * Created by PhpStorm.
 * User: itwri
 * Date: 2020/7/3
 * Time: 17:18
 */

namespace Jasmine\Poker;


interface CardInterface
{

    /**
     * 黑桃
     */
    const TYPE_SPADE = 4;

    /**
     * 红心
     */
    const TYPE_HEART = 3;

    /**
     * 梅花
     */
    const TYPE_CLUB = 2;

    /**
     * 方块
     */
    const TYPE_DIAMOND = 1;

    /** 
     * 设置名称
     * @return mixed
     * itwri 2020/12/22 11:04
     */
    public function setName($name);
    
    /**
     * 获取名称
     * @return mixed
     * itwri 2020/7/3 17:18
     */
    public function getName();

    /**
     * 设置牌值
     * @param $value
     * @return mixed
     * itwri 2020/12/22 11:04
     */
    public function setValue($value);
    
    /**
     * 获取牌值
     * @return int
     * itwri 2020/7/3 17:19
     */
    public function getValue();

    /**
     * 设置牌的类型
     * @param $type
     * @return mixed
     * itwri 2020/12/22 11:05
     */
    public function setType($type);
    
    /**
     * 获取牌的类型
     * @return int
     * itwri 2020/7/3 17:19
     */
    public function getType();

    /**
     * 设置卡牌图标
     * @param $icon
     * @return mixed
     * itwri 2020/12/22 11:06
     */
    public function setIcon($icon);
    
    /**
     * 获取卡牌图标
     * @return mixed
     * itwri 2020/7/29 11:19
     */
    public function getIcon();

    /**
     * 与另一张牌对比大小
     * @param Card $card
     * @return int 返回：1比目标牌大，-1比目标牌小
     * itwri 2020/7/3 17:20
     */
    public function compareWith(Card $card);

    /**
     * 转为数组数据
     * @return mixed
     * itwri 2020/7/3 17:22
     */
    public function toArray();
}