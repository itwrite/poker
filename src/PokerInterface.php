<?php
/**
 * Created by PhpStorm.
 * User: itwri
 * Date: 2020/7/3
 * Time: 17:26
 */

namespace Jasmine\Component\Poker;


interface PokerInterface
{

    /**
     * 获取所有的牌
     * @return mixed
     * itwri 2020/7/3 17:27
     */
    public function getCards();

    /**
     * 洗牌
     * 打乱所有牌的顺序
     * @return $this
     * itwri 2020/7/3 17:27
     */
    public function doWash();

    /**
     * 重置所有牌
     * @return mixed
     * itwri 2020/7/4 12:12
     */
    public function reset();

    /**
     * 发牌用到，每一张都是取出
     * 注：一付扑克牌张数是有限的
     * 取出最上面的一张牌
     * @return mixed
     * itwri 2020/7/3 17:36
     */
    public function pop();

    /**
     * 提供对外的功能
     * 对比出最大的一张牌
     * @param array $cards 里面是牌Card
     * @return mixed
     * itwri 2020/7/3 17:37
     */
    public function getTheMaxCard(array $cards);

    /**
     * 提供对外的功能
     * 对比出最小的一张牌
     * @param array $cards 里面是牌Card
     * @return mixed
     * itwri 2020/7/3 17:37
     */
    public function getTheMinCard(array $cards);

    /**
     * 转成数组
     * @return mixed
     * itwri 2020/7/6 12:39
     */
    public function toArray();
}