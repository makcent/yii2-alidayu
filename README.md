# 阿里大鱼使用说明
在component中加载如下配置：
  'taobao' => [
        	'class'  =>	'Alidayu\Top',
        	'appkey' =>	'655565216',
        	'secret' =>	'4b8981dfve4114c9d79387aa9'
        ],
      //阿里大鱼短信调用示例
        $c = Yii::$app->taobao->TopClient;
        $req = Yii::$app->taobao->AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("久居你心");
        $req->setSmsParam("{\"name\":\"1234\"}");
        $req->setRecNum("18888888888");
        $req->setSmsTemplateCode("SMS_909254503");
        $resp = $c->execute($req);
  
