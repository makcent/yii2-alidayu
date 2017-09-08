Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist makcent/yii2-alidayu
```

or add

```json
"makcent/yii2-alidayu": "~1.0.0"
```

to the require section of your composer.json.


Configuration
-------------

To use this extension, you have to configure the Connection class in your application configuration:

```php
return [
    //....
    'components' => [
        'taobao' => [
            'class'  =>	'Alidayu\Top',
            'appkey' =>	'655565216',
            'secret' =>	'4b8981dfve4114c9d79387aa9'
        ],
    ]
];
```

-------
Ali big fish SMS call example
-------  
```php
$c = Yii::$app->taobao->TopClient;
$req = Yii::$app->taobao->AlibabaAliqinFcSmsNumSendRequest;
$req->setExtend("123456");
$req->setSmsType("normal");
$req->setSmsFreeSignName("久居你心");
$req->setSmsParam("{\"name\":\"1234\"}");
$req->setRecNum("18888888888");
$req->setSmsTemplateCode("SMS_909254503");
$resp = $c->execute($req);
```
