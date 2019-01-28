<?php
return [
    // ================== easywechat 配置格式=============
    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'app_id'        => '',         // AppID
    'secret'        => '',     // AppSecret

    // 消息服务
    'token'         => '',          // Token
    'aes_key'       => '', // EncodingAESKey，兼容与安全模式下请一定要填写！！！

    // 支付
    'mch_id'        => '',   // 商户号
    'key'           => '', // 商户支付密钥,设置地址：https://pay.weixin.qq.com/index.php/account/api_cert
    'notify_url'    => '',   // 你也可以在下单时单独设置来想覆盖它

    // 如需使用敏感接口（如退款、发送红包等）需要配置 API 证书路径,下载地址：https://pay.weixin.qq.com/index.php/account/api_cert
    'cert_path'     => '', // XXX: 绝对路径！！！！
    'key_path'      => '',      // XXX: 绝对路径！！！！

    /**
     * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
     * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
     */
    'response_type' => 'array',

    /**
     * 日志配置
     *
     * level: 日志级别, 可选为：
     *         debug/info/notice/warning/error/critical/alert/emergency
     * path：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log'           => [
        'default'  => 'dev', // 默认使用的 channel，生产环境可以改为下面的 prod
        'channels' => [
            // 测试环境
            'dev' => [
                'driver' => 'daily',
                'path'   => env('runtime_path') . 'easywechat.log',
                'level'  => 'debug',
            ],
        ],
    ]
];