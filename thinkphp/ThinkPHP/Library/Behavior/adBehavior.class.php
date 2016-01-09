<?php

namespace Behavior;

class adBehavior{
    function run($arg){
    echo '我是一条'.$arg['name'].'广告,'.$arg['value'].'代言';
    }
}