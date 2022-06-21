<?php /*a:3:{s:62:"D:\phpstudy_pro\WWW\tp\app\admin\view\administrator\index.html";i:1652174691;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1650277060;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
            width: 10px;
            height: 10px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        #right::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        #right::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .layui-table-body::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            background-color: #EEEEEE;
        }

        /*定义滚动条轨道 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #EEEEEE;
        }

        /*定义滑块 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
        .layui-form-selected dl::-webkit-scrollbar {
            width: 10px;
            height: 10px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
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
            <a href="javascript:;" onclick="xadmin.open('添加管理员','<?php echo url('admin/administrator/list_add'); ?>')" class="layui-btn"><i class="layui-icon"></i>添加管理员</a>
        </div>
        <div class="layui-card-body layui-table-body">
            <table class="layui-table layui-form">
                <thead>
                <tr>
                    <th width="100">ID</th>
                    <th>登录名</th>
                    <th>用户名</th>
                    <th>角色</th>
                    <th>状态</th>
                    <th width="250">操作</th>
                </tr>
                </thead>
                <tbody class="x-cate">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['user_id']); ?></td>
                    <td><?php echo htmlentities($vo['username']); ?></td>
                    <td><?php echo htmlentities($vo['name']); ?></td>
                    <td><?php echo htmlentities($vo['role']); ?></td>
                    <td>
                        <?php if($vo['state'] == 1): ?>
                        <input type="checkbox" lay-skin="switch" lay-filter="user_show" lay-text="启用|禁用" pid="<?php echo htmlentities($vo['user_id']); ?>" checked>
                        <?php else: ?>
                        <input type="checkbox" lay-skin="switch" lay-filter="user_show" lay-text="启用|禁用" pid="<?php echo htmlentities($vo['user_id']); ?>">
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('修改信息','<?php echo url('admin/administrator/list_edit'); ?>?user_id=<?php echo htmlentities($vo['user_id']); ?>')"><i class="layui-icon"></i>修改</button>
                        <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" onclick="member_del(this,'<?php echo url('admin/administrator/del_save'); ?>','<?php echo htmlentities($vo['user_id']); ?>')"><i class="layui-icon"></i>删除</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <?php echo $list; ?>
        </div>
    </div>

</div>
</body>
</html>