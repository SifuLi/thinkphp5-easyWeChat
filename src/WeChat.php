<?php
/**
 * 适用于thinkphp 5.1 的 easyWeChat 封装
 * 使用方法
 * WeChat::方法()或WeChat::方法($config),默认不用传配置
 *
 * User: lisifu
 * Date: 2019/1/23
 * Time: 17:58
 */

namespace lisifu\ThinkWeChat;

use EasyWeChat\MiniProgram\Application as MiniProgram;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;
use EasyWeChat\OpenPlatform\Application as OpenPlatform;
use EasyWeChat\Payment\Application as Payment;
use EasyWeChat\Work\Application as Work;
use EasyWeChat\OpenWork\Application as openWork;
use lisifu\ThinkWeChat\easyWechat\ThinkCache;
use think\facade\Config;

/**
 * @method static MiniProgram miniProgram() 小程序
 * @method static OfficialAccount officialAccount() 公众号
 * @method static Payment payment() 支付
 * @method static OpenPlatform openPlatform() 开放平台
 * @method static Work work() 企业微信
 * @method static openWork openWork() 企业微信开放平台
 */
class WeChat
{
    protected static $apps = [
        'officialAccount' => OfficialAccount::class,
        'miniProgram'     => MiniProgram::class,
        'payment'         => Payment::class,
        'openPlatform'    => OpenPlatform::class,
        'work'            => Work::class,
        'openWork'        => openWork::class
    ];

    /**
     * @param string $name      调用的方法名
     * @param array  $arguments 动态配置信息
     *
     * @return mixed|\think\App
     */
    public static function __callStatic($name, $arguments)
    {
        $config = array_merge(Config::pull('weixin'), ...$arguments);
//        $app = new self::$apps[$name](...[$config]);
        $app = app(self::$apps[$name], [$config]);
        // 重新绑定缓存使用tp的缓存
        $app->rebind('cache', app(ThinkCache::class));
        return $app;
    }

}
