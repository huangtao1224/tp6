<?php /*a:3:{s:57:"D:\phpstudy_pro\WWW\tp\app\admin\view\classify\index.html";i:1655692108;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
        <div class="layui-card-body layui-table-body">
            <form class="layui-form" id="layui-form">
                <table class="layui-table layui-form">
                    <thead>
                    <tr>
                        <th width="100">ID</th>
                        <th>栏目名称</th>
                        <th width="120">类型</th>
                        <th width="160">添加子分类</th>
                        <th width="160">内容列表</th>
                        <th width="160">排序时间</th>
                        <th width="100">显/隐</th>
                        <th width="200">操作</th>
                    </tr>
                    </thead>
                    <tbody class="x-cate">
                    <tr cate-id="<?php echo htmlentities($list['classify_id']); ?>" fid="<?php echo htmlentities($list['classify_pid']); ?>">
                        <td>
                            <input name="classify_id[]" type="hidden" value="<?php echo htmlentities($list['classify_id']); ?>" />
                            <?php echo htmlentities($list['classify_id']); ?>
                        </td>
                        <td status="<?php echo !empty($list['count']) ? 'false' : 'true'; ?>">
                            <?php if(!(empty($list['count']) || (($list['count'] instanceof \think\Collection || $list['count'] instanceof \think\Paginator ) && $list['count']->isEmpty()))): ?>
                            <i class="bi bi-caret-right-fill" style="transform:rotate(90deg);"></i>
                            <?php endif; ?>
                            <?php echo htmlentities($list['classify_name']); ?>
                        </td>
                        <td><?php echo htmlentities($list['type_name']); ?></td>
                        <td><button type="button" class="layui-btn" onclick="xadmin.open('添加','<?php echo url('admin/classify/add'); ?>?classify_id=<?php echo htmlentities($list['classify_id']); ?>')"><i class="layui-icon"></i>添加子分类</button></td>
                        <td>
                            <?php if($list['type_id']>1): ?>
                            <a href="/admin/content/?classify_id=<?php echo htmlentities($list['classify_id']); ?>" class="layui-btn layui-btn layui-btn-normal"><i class="layui-icon layui-icon-list"></i>内容列表(<?php echo htmlentities($list['relevanceTotal']); ?>)</a>
                            <?php else: ?>
                            无
                            <?php endif; ?>
                        </td>
                        <td><input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($list['date'])? strtotime($list['date']) : $list['date'])); ?>" autocomplete="off" class="layui-input"/></td>
                        <td>
                            <select name="is_delete[]">
                                <option value="1" <?php echo $list['is_delete']=="1" ? 'selected' : ''; ?>>显示</option>
                                <option value="2" <?php echo $list['is_delete']=="2" ? 'selected' : ''; ?>>隐藏</option>
                            </select>
                        </td>
                        <td>
                            <button href="javascript:;" onclick="xadmin.open('修改','<?php echo url('admin/classify/edit'); ?>?classify_id=<?php echo htmlentities($list['classify_id']); ?>')" class="layui-btn"><i class="layui-icon"></i>修改</button>
                            <?php if($list['relevanceTotal']<=0 && $list['count']<=0): ?>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/classify/del_save'); ?>','<?php echo htmlentities($list['classify_id']); ?>')"><i class="layui-icon"></i>删除</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php if(is_array($list2) || $list2 instanceof \think\Collection || $list2 instanceof \think\Paginator): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr cate-id="<?php echo htmlentities($vo['classify_id']); ?>" fid="<?php echo htmlentities($vo['classify_pid']); ?>">
                        <td>
                            <input name="classify_id[]" type="hidden" value="<?php echo htmlentities($vo['classify_id']); ?>" />
                            <?php echo htmlentities($vo['classify_id']); ?>
                        </td>
                        <td status="<?php echo !empty($vo['count']) ? 'false' : 'true'; ?>" style="padding-left:<?php echo htmlentities($vo['level_id']*25); ?>px;">
                            <?php if(empty($vo['count']) || (($vo['count'] instanceof \think\Collection || $vo['count'] instanceof \think\Paginator ) && $vo['count']->isEmpty())): ?>
                            |--
                            <?php else: ?>
                            <i class="bi bi-caret-right-fill" style="transform:rotate(90deg);"></i>
                            <?php endif; ?>
                            <?php echo htmlentities($vo['classify_name']); ?>
                        </td>
                        <td><?php echo htmlentities($vo['type_name']); ?></td>
                        <td><button type="button" class="layui-btn" onclick="xadmin.open('添加','<?php echo url('admin/classify/add'); ?>?classify_id=<?php echo htmlentities($vo['classify_id']); ?>')"><i class="layui-icon"></i>添加子分类</button></td>
                        <td>
                            <?php if($vo['type_id']>1): ?>
                            <a href="/admin/content/?classify_id=<?php echo htmlentities($vo['classify_id']); ?>" class="layui-btn layui-btn layui-btn-normal"><i class="layui-icon layui-icon-list"></i>内容列表(<?php echo htmlentities($vo['relevanceTotal']); ?>)</a>
                            <?php else: ?>
                            无
                            <?php endif; ?>
                        </td>
                        <td><input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?>" autocomplete="off" class="layui-input"/></td>
                        <td>
                            <select name="is_delete[]">
                                <option value="1" <?php echo $vo['is_delete']=="1" ? 'selected' : ''; ?>>显示</option>
                                <option value="2" <?php echo $vo['is_delete']=="2" ? 'selected' : ''; ?>>隐藏</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" onclick="xadmin.open('修改','<?php echo url('admin/classify/edit'); ?>?classify_id=<?php echo htmlentities($vo['classify_id']); ?>')" class="layui-btn"><i class="layui-icon"></i>修改</button>
                            <?php if($vo['relevanceTotal']<=0 && $vo['count']<=0): ?>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/classify/del_save'); ?>','<?php echo htmlentities($vo['classify_id']); ?>')"><i class="layui-icon"></i>删除</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="layui-form-item btn_box">
                    <button class="layui-btn" lay-submit lay-filter="batch_edit_save" data-url="/admin/classify/batch_edit_save">立即提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>