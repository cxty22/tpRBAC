<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>许愿墙</title>
    <link rel="stylesheet" href="/thinkphp/Public/Css/index.css" />
    <script type="text/javascript" src='/thinkphp/Public/Js/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='/thinkphp/Public/Js/index.js'></script>
</head>

<body>
    <div id='top'>
        <span id='send'></span>
    </div>
    <div id='main'>
        <?php if(is_array($wish)): foreach($wish as $key=>$v): ?><dl class='paper a1'>
                <dt>
                    <span class='username'><?php echo ($v["username"]); ?></span>
                    <span class='num'><?php echo ($v["id"]); ?></span>
                </dt>
                <dd class='content'><?php echo (replace_phiz($v["content"])); ?></dd>
                <dd class='bottom'>
                    <span class='time'><?php echo (date("Y-m-d H:i:s",$v["time"])); ?></span>
                    <a href="" class='close'></a>
                </dd>
            </dl><?php endforeach; endif; ?>
    </div>
    <div id='send-form'>
        <p class='title'><span>许下你的愿望</span>
            <a href="" id='close'></a>
        </p>
        <form action="<?php echo U('tajax');?>" method="post" name='wish' id="wish">
            <p>
                <label for="username">昵称：</label>
                <input type="text" name='username' id='username' required="required" autofocus/>
            </p>
            <p>
                <label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
                <textarea name="content" id='content' required="required"></textarea>
                <div id='phiz'>
                    <img src="/thinkphp/Public/Images/phiz/zhuakuang.gif" alt="抓狂" />
                    <img src="/thinkphp/Public/Images/phiz/baobao.gif" alt="抱抱" />
                    <img src="/thinkphp/Public/Images/phiz/haixiu.gif" alt="害羞" />
                    <img src="/thinkphp/Public/Images/phiz/ku.gif" alt="酷" />
                    <img src="/thinkphp/Public/Images/phiz/xixi.gif" alt="嘻嘻" />
                    <img src="/thinkphp/Public/Images/phiz/taikaixin.gif" alt="太开心" />
                    <img src="/thinkphp/Public/Images/phiz/touxiao.gif" alt="偷笑" />
                    <img src="/thinkphp/Public/Images/phiz/qian.gif" alt="钱" />
                    <img src="/thinkphp/Public/Images/phiz/huaxin.gif" alt="花心" />
                    <img src="/thinkphp/Public/Images/phiz/jiyan.gif" alt="挤眼" />
                </div>
            </p>
            <button type="submit" id="send-btn" onclick="return false;"></button>
            <!--<span id='send-btn'></span>-->
        </form>
    </div>
    <!--[if IE 6]>
    <script type="text/javascript" src="/thinkphp/Public/Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>

</html>