# xTemplate
## 思路
1. 拆分组件化
2. 利用装饰器实现组件拼接
3. 自动装饰器拼接，简化使用过程
## 安装
* composer 安装
```
composer require xdd/x-template
```
> 如果国外镜像慢可以在composer.json中加入如下配置
```
  "repositories": {
    "packagist": {
      "type": "composer",
      "url": "https://packagist.phpcomposer.com"
    }
  },
```
* nginx 配置静态资源
```
    location /node_modules/ {
           root /usr/local/var/www/xTemplate/;
    }
```
## Done List
* Input 80%
* Select 80%
* Menu 70%
* Radio 80%
* Checkbox 80%
* Form 80%
* Divider 100%
* Cascader 20%
* Time Select 50%
* Time Picker 50%
* Date Picker 70%
* 增加配置解析
## Todo
* 功能完善
* bug修复
## 预览
![图片预览](https://github.com/xiangdong1987/xTemplate/raw/master/img/xTemplate1.png)
