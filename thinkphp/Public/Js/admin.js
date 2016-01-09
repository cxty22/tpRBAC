jQuery(document).ready(function($) {
    $("#msgMan").on("click", "li", function(evt) {
        var $evt = $(evt.target);
        var id = parseInt($evt.attr('data-id'));
        //确定是哪一个dd触发的以确定路由
        switch (id) {
            case 1:
                $.ajax({
                    url: 'msg',
                    type: 'get',
                    dataType: 'html',
                    beforeSend: function() {
                    },
                    success: function(data, status) {
                        if (status == 'success') {
                            $("#view").html(data);
                        }
                    },
                    error: function(err, status) {
                        console.log(err);
                        console.log(status);
                    }
                });
                break;
        }
    });
    $("#view").on("click", "#page, a", function(evt) {
        var $evt = $(evt.target);
        var url = $evt.attr('href');
        if (!url) {
            return;
        }
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'html',
            beforeSend: function() {
                if($evt.attr('data-value')  && $evt.attr('data-value') == 'delete'){
                    return confirm('确认要删除此节点么!!');
                }else{
                    return true;
                }
            },
            success: function(data, status) {
                $("#view").html(data);
            },
            error: function(err, status) {
                console.log(err);
                console.log(status);
            }
        });
    });
    $("#Rbac").on("click", "dd", function(evt) {
        var url = $(evt.target).attr('href');
        if (!url) {
            return;
        }
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'html',
            success: function(data, status) {
                $("#view").html(data);
            },
            error: function(err, status) {
                console.log(err);
                console.log(status);
            }
        });
    });
    $("#view").on("click", "#addRole, #addNode, #addUser", function(evt) {
        console.log($('form').serialize());
        console.log($(evt.target).parents('form').attr('action'));
        var url = $(evt.target).parents('form').attr('action');
        var data = $(evt.target).parents('form').serialize();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function(){
                return confirm('确认要保存此次操作么?');
            },
            success: function(data, status) {
                console.log(data);
                if (data.msg) {
                    confirm('操作成功!');
                }
            },
            error: function(err, status) {
                console.log(err);
                console.log(status);
            }
        });
    });
    $("#view").on("click", "#access, #alter", function(evt) {
        console.log($('form').serialize());
        console.log($(evt.target).parents('form').attr('action'));
        var url = $(evt.target).parents('form').attr('action');
        var data = $(evt.target).parents('form').serialize();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function(){
                return confirm('确认要保存此次操作么?');
            },
            success: function(data, status) {
                if (data.msg) {
                    confirm('操作成功!');
                }
            },
            error: function(err, status) {
                console.log(err);
                console.log(status);
            }
        });
    });
    $("#view").on("click", "input", function(evt) {
        var $input = $(evt.target);
        if ($input.attr('data-level') == 1) {
            var $inputs = $input.parents('.app').find('input');
            $input.attr('checked') ? $inputs.attr('checked', 'checked') :
                $inputs.removeAttr('checked');
        }
        if ($input.attr('data-level') == 2) {
            var $inputs = $input.parents('dl').find('input');
            $input.attr('checked') ? $inputs.attr('checked', 'checked') :
                $inputs.removeAttr('checked');
        }
    });
    $('#view').on("click", ".add-role", function(evt) {
        var obj = $(evt.target).parents('tr').clone();
        console.log(obj);
        obj.find('.add-role').remove();
        $(evt.target).parents('tr').nextAll('#last').before(obj);
    });
});
