# 阿里大鱼使用说明
在component中加载如下配置：
-------  
'taobao' => [<br>
>>>>'class'  =>	'Alidayu\Top',<br>
>>>>'appkey' =>	'655565216',<br>
>>>'secret' =>	'4b8981dfve4114c9d79387aa9'<br>
],
-------
阿里大鱼短信调用示例
-------  
$c = Yii::$app->taobao->TopClient;<br>
$req = Yii::$app->taobao->AlibabaAliqinFcSmsNumSendRequest;<br>
$req->setExtend("123456");<br>
$req->setSmsType("normal");<br>
$req->setSmsFreeSignName("久居你心");<br>
$req->setSmsParam("{\"name\":\"1234\"}");<br>
$req->setRecNum("18888888888");<br>
$req->setSmsTemplateCode("SMS_909254503");<br>
$resp = $c->execute($req);<br>
  
