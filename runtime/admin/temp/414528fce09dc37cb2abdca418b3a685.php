<?php /*a:3:{s:66:"D:\phpstudy_pro\WWW\tp\app\admin\view\administrator\role_edit.html";i:1652347540;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1650277060;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
<style>
    .layui-form-item .layui-form-checkbox[lay-skin=primary]{margin-top: 0}
</style>
<div id="right">
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form" id="layui-form">
                <input type="hidden" name="role_id" value="<?php echo htmlentities($role['role_id']); ?>">
                <div class="layui-form-item">
                    <label for="role_name" class="layui-form-label">角色名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="role_name" name="role_name" value="<?php echo htmlentities($role['role_name']); ?>" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role_describe" class="layui-form-label">描述</label>
                    <div class="layui-input-inline">
                        <input type="text" id="role_describe" name="role_describe" value="<?php echo htmlentities($role['role_describe']); ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">权限</label>
                    <div class="layui-input-block">
                        <?php if(is_array($admin_classify) || $admin_classify instanceof \think\Collection || $admin_classify instanceof \think\Paginator): $i = 0; $__LIST__ = $admin_classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="perssion_box">
                            <?php if(empty($vo['subclass']) || (($vo['subclass'] instanceof \think\Collection || $vo['subclass'] instanceof \think\Paginator ) && $vo['subclass']->isEmpty())): ?>
                            <div class="perssion_box_title">
                                <input type="checkbox" lay-skin="primary" lay-filter="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?>" title="<?php echo htmlentities($vo['classify_name']); ?>" class="allChoose">
                            </div>
                            <div class="rule_box">
                                <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <input type="checkbox" name="rule[<?php echo htmlentities($vo['admin_classify_id']); ?>]" lay-skin="primary" title="<?php echo htmlentities($vo2['rule_name']); ?>" value="<?php echo htmlentities($vo2['rule_id']); ?>" class="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?>" <?php if(in_array($vo2['rule_id'],$vo['rule'])): ?> checked <?php endif; ?>>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <?php else: ?>
                            <div class="perssion_box_title">
                                <input type="checkbox" lay-skin="primary" lay-filter="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?>" title="<?php echo htmlentities($vo['classify_name']); ?>" class="allChoose">
                            </div>
                            <?php if($vo['admin_classify_id']==3): if(is_array($vo['subclass']) || $vo['subclass'] instanceof \think\Collection || $vo['subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                            <div class="rule_box">
                                <input type="checkbox" lay-skin="primary" lay-filter="allChoose2_<?php echo htmlentities($vo2['classify_id']); ?>" title="<?php echo htmlentities($vo2['classify_name']); ?>" class="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?> allChoose2">
                                <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                <input type="checkbox" name="rule2[<?php echo htmlentities($vo2['classify_id']); ?>]" lay-skin="primary" title="<?php echo htmlentities($vo3['rule_name']); ?>" value="<?php echo htmlentities($vo3['rule_id']); ?>" class="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?> allChoose2_<?php echo htmlentities($vo2['classify_id']); ?>" <?php if(in_array($vo3['rule_id'],$vo2['rule'])): ?> checked <?php endif; ?>>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vo['subclass']) || $vo['subclass'] instanceof \think\Collection || $vo['subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                            <div class="rule_box">
                                <input type="checkbox" lay-skin="primary" lay-filter="allChoose_<?php echo htmlentities($vo2['admin_classify_id']); ?>" title="<?php echo htmlentities($vo2['classify_name']); ?>" class="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?> allChoose2">
                                <?php if(is_array($rule) || $rule instanceof \think\Collection || $rule instanceof \think\Paginator): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                <input type="checkbox" name="rule[<?php echo htmlentities($vo2['admin_classify_id']); ?>]" lay-skin="primary" title="<?php echo htmlentities($vo3['rule_name']); ?>" value="<?php echo htmlentities($vo3['rule_id']); ?>" class="allChoose_<?php echo htmlentities($vo['admin_classify_id']); ?> allChoose_<?php echo htmlentities($vo2['admin_classify_id']); ?>" <?php if(in_array($vo3['rule_id'],$vo2['rule'])): ?> checked <?php endif; ?>>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="*" data-url="/admin/administrator/role_edit_save">立即提交</button>
                        <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>