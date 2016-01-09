<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/thinkphp/Public/Css/bootstrap.css">
</head>
<body> 
	<div class="container">
		<div class="panel panel-default com-sm-6" style="margin-top:150px">
	   		<div class="panel-body">
		     	<form action="<?php echo U(login, '', '');?>" method="post" class="form-horizontal">
		     		<input type="hidden" value="0">
			    	<div class="form-group has-feedback">
			    		<label for="username" class="col-sm-2 control-label">用户名:</label>
			    		<div class="col-sm-3">
			    			<input type="text" name="username" class="form-control loginform" required="required" id="username" placeholder="用户名" aria-describedby="inputSuccess2Status">
			    			<span class="glyphicon form-control-feedback fbk" aria-hidden="true"></span>
			    			<span><?php echo ($userErr); ?></span>
			    		</div>
			    	</div>
			    	<div class="form-group has-feedback">
			    		<label for="password" class="col-sm-2 control-label">密码:</label>
			    		<div class="col-sm-3">
			    			<input type="password" name="password" class="form-control loginform" required="required" id="password" placeholder="密码">
			    			<span class="glyphicon  form-control-feedback fbk" aria-hidden="true"></span>
			    			<span><?php echo ($pwdErr); ?></span>
			    		</div>	
			    	</div>
			    	<div class="form-group has-feedback">
			    		<label for="verify" class="col-sm-2 control-label">验证码:</label>
			    		<div class="col-sm-2" >
			    			<input type="text" name="verify" class="form-control loginform" required="required" id="verify" placeholder="验证码">
			    			<span class="glyphicon  form-control-feedback fbk" aria-hidden="false"></span>
			    			<span><?php echo ($verifyErr); ?></span>
			    		</div>	
			    		<div class="col-sm-1">
			    			<img src="<?php echo U('Admin/Login/Verify', '', '');?>" alt="" style="height:35px">
			    			<span id="cgverify" style="color:#7B6811; cursor:pointer; block:inline-block">换一张</span>
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<div class="col-sm-offset-2 col-sm-10">
			    			<input type="submit" class="btn btn-default col-sm-2" style="background-color: #7B68EE">
			    		</div>
			    	</div>
		    	</form>
	   		</div>
		</div>
	</div>
	<script src="/thinkphp/Public/Js/jquery-1.7.2.min.js"></script>
	<script src="/thinkphp/Public/Js/login.js"></script>
</body>
</html>