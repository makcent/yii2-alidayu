<?php
namespace Alidayu;
/**
 * TOP SDK 入口文件
 * 请不要修改这个文件，除非你知道怎样修改以及怎样恢复
 * @author xuteng.xt
 */
use yii\base\Component;

class Top extends Component
{
	public $appkey;
	public $secret;

	private static $classMap;

    /*
     * SDK入口文件方法
     * 获取对象使用： Yii::$app->top->TopClient
     * 自动加载机制会自动加载类文件
     */
    	
    public function __get($name)
    {
    	defined("TOP_SDK_WORK_DIR") or define("TOP_SDK_WORK_DIR", "/tmp/");

        defined("TOP_SDK_DEV_MODE") or define("TOP_SDK_DEV_MODE", true);

        defined("TOP_AUTOLOADER_PATH") or define("TOP_AUTOLOADER_PATH", dirname(__FILE__));

		//注册自动加载类
		spl_autoload_register('static::autoload');

		//单例模式
		if(!isset(static::$classMap[$name])){
			static::$classMap[$name] = new $name();
		}

		//帮助用户初始化相关的参数
		if(strtolower($name) == strtolower('TopClient')){
			static::$classMap[$name]->appkey = $this->appkey;
			static::$classMap[$name]->secretKey = $this->secret;
		}

		//返回对象的实例
		return static::$classMap[$name];
    }

	/**
     * 类库自动加载，写死路径，确保不加载其他文件。
     * @param string $class 对象类名
     * @return void
     */
    public static function autoload($class) {
        $name = $class;
        if(false !== strpos($name,'\\')){
          $name = strstr($class, '\\', true);
        }
        
        $filename = TOP_AUTOLOADER_PATH."/top/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH."/top/request/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH."/top/domain/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH."/aliyun/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH."/aliyun/request/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }

        $filename = TOP_AUTOLOADER_PATH."/aliyun/domain/".$name.".php";
        if(is_file($filename)) {
            include $filename;
            return;
        }         
    }
}
