<?php /*a:3:{s:53:"D:\phpstudy_pro\WWW\tp\app\admin\view\site\index.html";i:1650597271;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
<style>
    .layui-table td{border:none;}
</style>
<div id="right">
    <div class="layui-card">
        <div class="site_title">中文版</div>
        <div class="layui-card-body layui-table-body">
            <form class="layui-form" id="layui-form" enctype="multipart/form-data" method="post" action="/admin/site/edit_save">
                <input type="hidden" name="type_id" value="2">
                <input type="hidden" name="version_id" value="1">
                <table class="layui-table layui-form">
                    <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td class="caption"><?php echo htmlentities($vo['input_name']); if($vo['prompt']!=''): ?><i class="bi bi-question-circle-fill" lay-tips="<?php echo htmlentities($vo['prompt']); ?>"></i><?php endif; ?></td>
                        <td>
                            <?php switch($vo['input_type_id']): case "1": ?>
                            <!--输入框-->
                            <input name="<?php echo htmlentities($vo['field_name']); ?>" type="text" value="<?php echo htmlentities($site[$vo['field_name']]); ?>" autocomplete="off" class="layui-input"/>
                            <?php break; case "2": ?>
                            <!--多行框-->
                            <textarea name="<?php echo htmlentities($vo['field_name']); ?>" class="layui-textarea"><?php echo htmlentities($site[$vo['field_name']]); ?></textarea>
                            <?php break; case "3": ?>
                            <!--智能口-->
                            <script type="text/javascript">
                                KindEditor.ready(function(K){window.editor = K.create('#<?php echo htmlentities($vo['site']); ?>',{afterBlur:function(){this.sync();}});});
                            </script>
                            <textarea id="<?php echo htmlentities($vo['site']); ?>" name="<?php echo htmlentities($vo['field_name']); ?>" style="width:100%;height:200px;"><?php echo htmlentities($site[$vo['field_name']]); ?></textarea>
                            <?php break; case "4": ?>
                            <!--多选框-->
                            <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                            <input type="checkbox" name="<?php echo htmlentities($vo['field_name']); ?>[]" lay-skin="primary" title="<?php echo htmlentities($vo2['input_name']); ?>" value="<?php echo htmlentities($vo2['input_value']); ?>" <?php if(isset($vo['site'])&&(in_array($vo2['input_value'],$vo['site']))): ?> checked <?php endif; ?>>
                            <?php endforeach; endif; else: echo "" ;endif; break; case "5": ?>
                            <!--单选框-->
                            <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                            <input type="radio" name="<?php echo htmlentities($vo['field_name']); ?>" title="<?php echo htmlentities($vo2['input_name']); ?>" value="<?php echo htmlentities($vo2['input_value']); ?>" <?php echo $site[$vo['field_name']]==$vo2['input_value'] ? 'checked' : ''; ?>>
                            <?php endforeach; endif; else: echo "" ;endif; break; case "6": ?>
                            <!--下拉框-->
                            <select name="<?php echo htmlentities($vo['field_name']); ?>">
                            <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo2['input_value']); ?>" <?php echo $site[$vo['field_name']]==$vo2['input_value'] ? 'selected' : ''; ?>><?php echo htmlentities($vo2['input_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <?php break; case "7": ?>
                            <!--上传口-->
                            <div class="link_up_size layui-btn <?php echo !empty($vo['note']) ? 'state' : ''; ?>" data-id="<?php echo htmlentities($vo['input_id']); ?>" >
                                <input type="file" name="<?php echo htmlentities($vo['field_name']); ?>">
                                <i class="bi bi-cloud-arrow-up"></i>&nbsp;上传文件
                            </div>
                            <div class="layui-input-inline"></div>
                            <?php if(!(empty($site[$vo['field_name']]) || (($site[$vo['field_name']] instanceof \think\Collection || $site[$vo['field_name']] instanceof \think\Paginator ) && $site[$vo['field_name']]->isEmpty()))): ?>
                            <div class="layui-input-inline">
                                <img src="/<?php echo htmlentities($site[$vo['field_name']]); ?>" style="width: 50px;height: 30px;">
                                <?php if(!(empty($vo['note']) || (($vo['note'] instanceof \think\Collection || $vo['note'] instanceof \think\Paginator ) && $vo['note']->isEmpty()))): ?>
                                <span><?php echo htmlentities($vo['note']); ?></span>
                                <?php endif; ?>
                            </div>
                            <button type="button" class="layui-btn layui-btn-danger">删除</button>
                            <?php endif; break; case "8": ?>
                            <!--日期框-->
                            <input name="<?php echo htmlentities($vo['field_name']); ?>" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($site[$vo['field_name']])? strtotime($site[$vo['field_name']]) : $site[$vo['field_name']])); ?>" autocomplete="off" class="layui-input layerdate"/><i class="bi bi-calendar3"></i>
                            <?php break; case "9": ?>
                            大文件
                            <?php break; case "10": ?>
                            <div class="layui-form-item">
                                <div class="layui-input-inline">
                                    <input type="text" name="<?php echo htmlentities($vo['field_name']); ?>" value="<?php echo htmlentities($site[$vo['field_name']]); ?>" class="layui-input">
                                </div>
                                <div class="coloris"></div>
                            </div>
                            <?php break; ?>
                            <?php endswitch; ?>
                        </td>
                        <td class="operate">
                            <button type="button" class="layui-btn layui-btn-normal" class="copycode" onClick="site_children('<?php echo htmlentities($vo['field_name']); ?>')">代码</button>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="layui-form-item btn_box">
                    <button class="layui-btn" type="submit">立即提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>