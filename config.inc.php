<?php
if (!defined('SITE_PATH')) exit();
include_once('weixin.php');
$conf = array(
    // 数据库常用配置
    'DB_TYPE' => 'mysql', // 数据库类型

    'DB_HOST' => '127.0.0.1', // 数据库服务器地址
    'DB_NAME' => 'ts0413', // 数据库名
    'DB_USER' => 'root', // 数据库用户名
    'DB_PWD' => '1111222', // 数据库密码

    'DB_PORT' => 3306, // 数据库端口
    'DB_PREFIX' => 'ts_', // 数据库表前缀（因为漫游的原因，数据库表前缀必须写在本文件）
    'DB_CHARSET' => 'utf8', // 数据库编码
    'SECURE_CODE' => '351551812c6c540c0', // 数据加密密钥
    'COOKIE_PREFIX' => 'T3_', // 数据加密密钥
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误

);
return array_merge($weixin, $conf);