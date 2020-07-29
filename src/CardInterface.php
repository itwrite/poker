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
     * 获取牌名
     * @return mixed
     * itwri 2020/7/3 17:18
     */
    public function getName();

    /**
     * 获取牌值
     * @return int
     * itwri 2020/7/3 17:19
     */
    public function getValue();

    /**
     * 获取牌的类型
     * @return int
     * itwri 2020/7/3 17:19
     */
    public function getType();

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