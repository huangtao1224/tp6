<?php /*a:3:{s:63:"D:\phpstudy_pro\WWW\tp\app\admin\view\admin_classify\index.html";i:1649900276;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
                        <th>后台分类</th>
                        <th>链接</th>
                        <th>添加子分类</th>
                        <th width="190">排序</th>
                        <th width="100">显/隐</th>
                        <th width="250">操作</th>
                    </tr>
                    </thead>
                    <tbody class="x-cate">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr cate-id="<?php echo htmlentities($vo['admin_classify_id']); ?>" fid="<?php echo htmlentities($vo['classify_pid']); ?>">
                        <td>
                            <input name="admin_classify_id[]" type="hidden" value="<?php echo htmlentities($vo['admin_classify_id']); ?>" />
                            <?php echo htmlentities($vo['admin_classify_id']); ?>
                        </td>
                        <td status="<?php echo $vo['level_id']>3 ? 'true' : 'false'; ?>">
                            <?php if($vo['count']>0): ?>
                            <i class="bi bi-caret-right-fill" style="transform: rotate(90deg);"></i>
                            <?php endif; ?>
                            <?php echo htmlentities($vo['classify_name']); ?>
                        </td>
                        <td><input name="classify_url[]" type="text" value="<?php echo htmlentities($vo['classify_url']); ?>" autocomplete="off" class="layui-input"/></td>
                        <td><a href="javascript:;" onclick="xadmin.open('添加子分类','<?php echo url('admin/admin_classify/add'); ?>?admin_classify_id=<?php echo htmlentities($vo['admin_classify_id']); ?>')" class="layui-btn"><i class="layui-icon"></i>添加子分类</a></td>
                        <td><input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?>" autocomplete="off" class="layui-input"/></td>
                        <td>
                            <select name="is_delete[]">
                                <option value="1" <?php echo $vo['is_delete']=="1" ? 'selected' : ''; ?>>显示</option>
                                <option value="2" <?php echo $vo['is_delete']=="2" ? 'selected' : ''; ?>>隐藏</option>
                            </select>
                        </td>
                        <td>
                            <button class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" type="button" onclick="xadmin.open('修改信息','<?php echo url('admin/admin_classify/edit'); ?>?admin_classify_id=<?php echo htmlentities($vo['admin_classify_id']); ?>')"><i class="layui-icon"></i>编辑</button>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/adminclassify/del_save'); ?>','<?php echo htmlentities($vo['admin_classify_id']); ?>')"><i class="layui-icon"></i>删除</button>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="layui-form-item btn_box">
                    <button class="layui-btn" lay-submit lay-filter="batch_edit_save" data-url="/admin/admin_classify/batch_edit_save">立即提交</button>
                    <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>