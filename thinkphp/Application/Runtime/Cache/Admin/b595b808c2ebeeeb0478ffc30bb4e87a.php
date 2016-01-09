<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Examples</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/thinkphp/Public/Css/bootstrap.css">
</head>

<body>
    <div class="navbar-wrapper">
        <div class="container" id="navcontainer">
            <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">后台</a>
                    </div>
                    <!--<form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>-->
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a data-toggle="modal" data-target="#register" href="<?php echo U('Admin/Login/logout');?>">退出</a></li>
                            <li><a data-toggle="modal" data-target="#signin">登录</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-2" style="background:; height:100px ; border-right:1px solid red;">
  				<ul id="msgMan" class="wrapper nav navbar-nav">
  					<li><a href="#" data-id="1">所有帖子</a></li>
            		<li><a href="#" data-id="2">测试一下</a></li>
  				</ul>
				<dl id="Rbac" class="wrapper nav navbar-nav">
  					<dt>后台管理</dt>
                    <dd><a href="<?php echo U('Admin/Rbac/user');?>" data-id="1" onclick="return false;" >用户列表</a></dd>
                    <dd><a href="<?php echo U('Admin/Rbac/role');?>" data-id="2" onclick="return false;" >角色列表</a></dd>
                    <dd><a href="<?php echo U('Admin/Rbac/node');?>" data-id="3" onclick="return false;" >节点列表</a></dd>
                    <dd><a href="<?php echo U('Admin/Rbac/addUser');?>" data-id="4" onclick="return false;" >添加用户</a></dd>
                    <dd><a href="<?php echo U('Admin/Rbac/addRole');?>" data-id="5" onclick="return false;" >添加角色</a></dd>
                    <dd><a href="<?php echo U('Admin/Rbac/addNode');?>" data-id="6" onclick="return false;" >添加节点</a></dd>
  				</dl>
            </div>
            <div class="col-md-10" id="view">
            	
            </div>
        </div>
    </div>

    <script src="/thinkphp/Public/Js/jquery-1.7.2.min.js"></script>
    <script src="/thinkphp/Public/Js/admin.js"></script>
</body>
</html>