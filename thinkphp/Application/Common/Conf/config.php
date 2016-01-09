<?php
return array(
    //'配置项'=>'配置值'
    //'URL_MODEL'             =>  2,
    'LOAD_EXT_FILE' => 'test',
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_USER' => 'root',
    'DB_PWD' => '009009',
    'DB_NAME' => 'wish',
    'ACTION_SUFFIX' => 'Action',
    //验证码配置
    'verifyconfig' => array(
        'fontSize'    =>    35,    // 验证码字体大小
        'length'      =>    4,     // 验证码位数
        'useNoise'    =>    false, // 关闭验证码杂点
        'useCurve'    =>    false,
        'useImgBy'    =>    true
    ),
    //保存session到数据库中
    'SESSION_OPTIONS' => array(
        //'path'=>'D:/wamp/tmp'
        'type' => 'db',
        'expire' => 11400
        ),
    'SESSION_TABLE' => 'session',
    //表单令牌配置
    'TOKEN_ON' => true, // 是否开启令牌验证 默认关闭
    'TOKEN_NAME' => '__hash__', // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE' => 'md5', //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET' => true, //令牌验证出错后是否重置令牌 默认为true

    //查看调试信息
    'SHOW_PAGE_TRACE' => true,
    //RBAC权限配置
    'RBAC_SUPERADMIN' => 'admin',//超级管理员名称
    'ADMIN_AUTH_KEY' => 'superadmin', //超级管理员识别
    'USER_AUTH_ON' => 'true',
    'USER_AUTH_TYPE' => 1,          //验证类型(1：登陆验证, 2:时时验证)
    'USER_AUTH_KEY' => 'uid',       //用户认证识别号
    'NOT_AUTH_MODULE' => '',        //无需认证的控制器?
    'NOT_AUTH_ACTION' => 'setAccess,addNodeHandle,addRoleHandle,addUserHandle,index',        //无需认证的动作方法
    'RBAC_ROLE_TABLE' => 'role',    //角色表名称
    'RBAC_USER_TABLE' => 'role_user',   //角色与用户的中间表名称
    'RBAC_ACCESS_TABLE' => 'access',    //权限表名称
    'RBAC_NODE_TABLE' => 'node',        //节点表名称
);