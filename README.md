# Collection-MPOS
### 安装说明文档
1. 项目环境
 1. 使用环境：PHP 7.0+ mysql5.6 +Nginx LNMP
 2. 使用框架：Yaf2.0
1.安装完成后进入php 修改php.ini文件 尾部添加以下代码
>[yaf]
  yaf.library =  extension=php_yaf.dll
PS：修改配置文件添加yaf框架拓展 载入library类库  路径请根据实际情况修改

### 操作二：
3. 修改配置
1. Application.host主机名，修改为当前域名
2. application.image_url，图片路径，修改为当前域名

3. 支付接口
> \library\Pay\Weixin\WxPay.Config.php配置相关参数 证书4个  调用2个
4. 4.微信公众后台 对应配置都要修改

### 项目说明
1. 此项目是采集重点新闻数据自动识别 保持长连接
