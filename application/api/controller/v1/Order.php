<?php
/**
 * Created by PhpStorm.
 * User: shouwang
 * Date: 2019/4/19 0019
 * Time: 17:13
 */

namespace app\api\controller\v1;


use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;

class Order extends BaseController
{
    //    用户在选择商品后,向API提交包含它所选择的商品的相关信息
    //    API在接收到信息后需要检查订单相关商品的库存量
    //    有库存,把订单数据存入数据库中 = 下单成功了,返回客户端消息,告诉客户端可以支付了
    //    调用我们的支付接口,进行支付
    //    还学要再次进行库存量检测
    //    服务器这边就可以调用微信的支付接口进行支付
    //    微信会返回给我们一个支付的结果(异步)
    //    成功:也需要进行库存量的检查
    //    成功:进行库存量的扣除
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder']
    ];

    public function placeOrder()
    {
        (new OrderPlace())->gocheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();

        $order = new OrderService();
        $status = $order->place($uid, $products);
        return $status;
    }
}