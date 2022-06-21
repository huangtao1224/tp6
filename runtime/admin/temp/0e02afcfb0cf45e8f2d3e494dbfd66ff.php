<?php /*a:3:{s:53:"D:\phpstudy_pro\WWW\tp\app\admin\view\type\index.html";i:1652155802;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
    <div class="layui-card">
        <div class="layui-card-body">
            <a href="javascript:;" onclick="xadmin.open('添加表单','<?php echo url('admin/type/add'); ?>')" class="layui-btn"><i class="layui-icon"></i>添加表单</a>
        </div>
        <div class="layui-card-body layui-table-body">
            <table class="layui-table layui-form">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>表单类型名称</th>
                    <th>表名</th>
                    <th>页面名</th>
                    <th>显示</th>
                    <th>表单设置</th>
                    <th width="250">操作</th>
                </tr>
                </thead>
                <tbody class="x-cate">
                <?php if(is_array($table) || $table instanceof \think\Collection || $table instanceof \think\Paginator): $i = 0; $__LIST__ = $table;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['type_id']); ?></td>
                    <td><?php echo htmlentities($vo['type_name']); ?></td>
                    <td><?php echo htmlentities($vo['table_name']); ?></td>
                    <td><?php echo htmlentities($vo['page_name']); ?></td>
                    <td>
                        <?php if($vo['show_id'] == 2): ?>
                        <input type="checkbox" lay-skin="switch" lay-filter="show" lay-text="开启|关闭" pid="<?php echo htmlentities($vo['type_id']); ?>" checked>
                        <?php else: ?>
                        <input type="checkbox" lay-skin="switch" lay-filter="show" lay-text="开启|关闭" pid="<?php echo htmlentities($vo['type_id']); ?>">
                        <?php endif; ?>
                    </td>
                    <td><a href="<?php echo url('/admin/input/'); ?>?content_id=<?php echo htmlentities($vo['type_id']); ?>" class="layui-btn"><i class="layui-icon layui-icon-list"></i>表单数据</a></td>
                    <td>
                        <?php if($vo['biaoshi'] == 2): ?>
                        <button class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('修改表单','<?php echo url('admin/type/edit'); ?>?type_id=<?php echo htmlentities($vo['type_id']); ?>')"><i class="layui-icon"></i>修改</button>
                        <?php endif; ?>
                        <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" onclick="member_del(this,'<?php echo url('admin/type/del_save'); ?>','<?php echo htmlentities($vo['type_id']); ?>')"><i class="layui-icon"></i>删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>