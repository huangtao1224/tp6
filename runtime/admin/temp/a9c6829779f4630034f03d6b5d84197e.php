<?php /*a:3:{s:52:"D:\phpstudy_pro\WWW\tp\app\admin\view\input\add.html";i:1649670421;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi">
    <link rel="stylesheet" href="/public/admin/js/layui/css/layui.css">
    <link rel="stylesheet" href="/public/admin/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/admin/css/common.css">
    <link rel="stylesheet" href="/public/admin/css/main.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_3306110_7buisppgqck.css">
    <script type="text/javascript" src="/public/admin/js/layui/layui.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/public/admin/js/canvas-particle.js"></script>
    <script type="text/javascript" src="/public/admin/js/common.js"></script>
    <script type="text/javascript" src="/public/admin/js/xadmin.js"></script>
    <script charset="utf-8" src="/public/kindeditor/kindeditor-all-min.js"></script>
</head>
<style>
    html,body{height: 100%;}

    @media screen and (min-width: 768px) {
        #right::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        #right::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        #right::-webkit-scrollbar-thumb
        {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .layui-table-body::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }

        /*定义滚动条轨道 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }

        /*定义滑块 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
        .layui-form-selected dl::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-thumb
        {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .classify_icon::-webkit-scrollbar {width : 5px;height: 5px;background: transparent;}
        .classify_icon::-webkit-scrollbar-thumb {border-radius: 5px;box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);background:#666;}
        .classify_icon::-webkit-scrollbar-track {background:transparent;}
    }
</style>
<body>
<div id="right">
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form" id="layui-form">
                <input type="hidden" name="type_id" value="<?php echo htmlentities($type_id); ?>">
                <div class="layui-form-item">
                    <label for="input_name" class="layui-form-label">表单名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="input_name" name="input_name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="field_name" class="layui-form-label">字段名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="field_name" name="field_name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">表单类型</label>
                    <div class="layui-input-inline" >
                        <select name="input_type_id">
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($vo['input_type_id']); ?>"><?php echo htmlentities($vo['input_type_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">数据类型</label>
                    <div class="layui-input-inline">
                        <select name="data_type_id" lay-filter="data_type_id">
                            <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($vo['data_type_id']); ?>"><?php echo htmlentities($vo['data_type_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="data_length" class="layui-form-label">数据长度</label>
                    <div class="layui-input-inline">
                        <input type="text" id="data_length" name="data_length" required="" lay-verify="required" autocomplete="off" class="layui-input" value="0">
                    </div>
                </div>
                <div class="layui-form-item decimal_point" style="display: none">
                    <label for="decimal_point" class="layui-form-label">小数位</label>
                    <div class="layui-input-inline">
                        <input type="text" id="decimal_point" name="decimal_point" required="" lay-verify="required" autocomplete="off" class="layui-input" value="2">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*" data-url="/admin/input/add_save">立即提交</button>
                        <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>