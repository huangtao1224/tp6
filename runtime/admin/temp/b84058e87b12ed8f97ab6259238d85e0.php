<?php /*a:3:{s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\order\index.html";i:1655707569;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
        <div class="layui-card-body order_state">
            <a class="<?php echo !empty($state) ? '' : 'active'; ?>" href="/admin/order/index">全部</a>
            <?php if(is_array($statelike) || $statelike instanceof \think\Collection || $statelike instanceof \think\Paginator): $i = 0; $__LIST__ = $statelike;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="/admin/order/index?state=<?php echo htmlentities($vo['input_value']); ?>" class="<?php echo $state==$vo['input_value'] ? 'active' : ''; ?>"><?php echo htmlentities($vo['input_name']); ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="layui-card">
        <div class="layui-card-body layui-table-body">
            <table class="layui-table layui-form">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>会员名</th>
                    <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <th><?php echo htmlentities($vo['input_name']); ?></th>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <th width="160">创建时间</th>
                    <th width="200">操作</th>
                </tr>
                </thead>
                <tbody class="x-cate">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['order_id']); ?></td>
                    <td><?php echo htmlentities($vo['member_name']); ?></td>
                    <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <td>
                        <?php switch($vo2['input_type_id']): case "1": ?>
                        <!--输入框-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "8": ?>
                        <!--日期框-->
                        <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo[$vo2['field_name']])? strtotime($vo[$vo2['field_name']]) : $vo[$vo2['field_name']])); break; default: ?>
                        <?php echo htmlentities($vo[$vo2['field_name']]); ?>
                        <?php endswitch; ?>
                    </td>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('商品详情','<?php echo url('admin/order/goods'); ?>?content_id=<?php echo htmlentities($vo['order_id']); ?>')">商品详情</button>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('修改','<?php echo url('admin/order/edit'); ?>?content_id=<?php echo htmlentities($vo['order_id']); ?>')"><i class="layui-icon"></i>修改</button>
                        <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/order/del_save'); ?>','<?php echo htmlentities($vo['member_id']); ?>')"><i class="layui-icon"></i>删除</button>
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