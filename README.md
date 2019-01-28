<h1 align="left"><a href="https://www.easywechat.com">Thinkphp-EasyWeChat</a></h1>

## 安装

```shell
$ composer require "lisifu/thinkphp5-easywechat" dev-master
```

基于thinkphp5.1对easyWeChat 4.1的封装并使用tp的cache代替了easyWeChat 缓存方式。

## 用法

基本使用（以服务端为例）:

```php
<?php
// 配置请在config/weixin.php中设置，这里配置的会动态覆盖配置文件中的设置，默认可不传
$options = [
    'app_id'    => 'wx3cf0f39249eb0exxx',
    'secret'    => 'f1c242f4f28f735d4687abb469072xxx',
    'token'     => 'easywechat',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = \ThinkWeChat\WeChat::officialAccount($options);

$server = $app->server;
$user = $app->user;

$server->push(function($message) use ($user) {
    $fromUser = $user->get($message['FromUserName']);

    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
});

$server->serve()->send();
```

更多请参考  https://www.easywechat.com/docs/master。