<?php
/**
 * Created by PhpStorm.
 * User: hero
 * Date: 26/10/2018
 * Time: 9:40 AM
 */

namespace Xpressengine\XePlugin\XeroPay\LG;


use App\Facades\XeConfig;
use Xpressengine\XePlugin\XeroPay\PaymentGate;

class LG extends PaymentGate
{
    static $version = 'PHP_Non-ActiveX_Standard';
    static $methods = [
        'SC0010'=>'신용카드',
        'SC0030'=>'계좌이체',
        'SC0040'=>'무통장입금',
    ];

    static $handler = LGHandler::class;

    protected static $configItems = [
        'id' => '상점아이디',
        'mertKey' => 'MertKey',
    ];

    public static function url()
    {
        return (self::isTest()) ?
            "https://pretestclient.uplus.co.kr:9443/xpay/Gateway.do" :
            "https://xpayvvipclient.uplus.co.kr/xpay/Gateway.do";
    }

    public static function isTest()
    {
        return !is_null(XeConfig::get('xero_pay')->get('test'));
    }
}
