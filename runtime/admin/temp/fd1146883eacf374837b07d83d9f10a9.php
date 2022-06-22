<?php /*a:3:{s:55:"D:\phpstudy_pro\WWW\tp\app\admin\view\member\index.html";i:1655707536;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
            <a href="javascript:;" onclick="xadmin.open('添加会员','<?php echo url('admin/member/add'); ?>')" class="layui-btn"><i class="layui-icon"></i>添加会员</a>

        </div>
        <div class="layui-card-body layui-table-body">
            <table class="layui-table layui-form">
                <thead>
                <tr>
                    <th width="160">ID</th>
                    <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <th><?php echo htmlentities($vo['input_name']); ?></th>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <th width="160">排序</th>
                    <th width="200">操作</th>
                </tr>
                </thead>
                <tbody class="x-cate">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($vo['member_id']); ?></td>
                    <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <td>
                        <?php switch($vo2['input_type_id']): case "1": ?>
                        <!--输入框-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "2": ?>
                        <!--多行框-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "3": ?>
                        <!--智能口-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "4": ?>
                        <!--多选框-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "5": ?>
                        <!--单选框-->
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; case "6": ?>
                        <!--下拉框-->
                        <select name="<?php echo htmlentities($vo2['field_name']); ?>[]">
                            <?php if(is_array($vo2['site_subclass']) || $vo2['site_subclass'] instanceof \think\Collection || $vo2['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo2['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo htmlentities($vo3['input_value']); ?>" <?php echo $vo[$vo2['field_name']]==$vo3['input_value'] ? 'selected' : ''; ?>><?php echo htmlentities($vo3['input_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <?php break; case "7": ?>
                        <!--上传口-->
                        <a href="/<?php echo htmlentities($vo[$vo2['field_name']]); ?>"><img src="/<?php echo htmlentities($vo[$vo2['field_name']]); ?>" style="width: 50px;height: 30px;"></a>
                        <?php break; case "8": ?>
                        <!--日期框-->
                        <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo[$vo2['field_name']])? strtotime($vo[$vo2['field_name']]) : $vo[$vo2['field_name']])); break; case "9": ?>
                        大文件
                        <?php break; case "10": ?>
                        <?php echo htmlentities($vo[$vo2['field_name']]); break; ?>
                        <?php endswitch; ?>
                    </td>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?></td>
                    <td>
                        <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('修改','<?php echo url('admin/member/edit'); ?>?content_id=<?php echo htmlentities($vo['member_id']); ?>')"><i class="layui-icon"></i>修改</button>
                        <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/member/del_save'); ?>','<?php echo htmlentities($vo['member_id']); ?>')"><i class="layui-icon"></i>删除</button>
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